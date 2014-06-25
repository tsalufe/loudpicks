
function CandlestickAjaxCommand(obj,callback){
	if(typeof obj==='undefined'||null==obj){
		return;
	} else{
		if(typeof callback==='undefined'||null==callback){
			callback=function(resp){};
		}
		$.ajax({
			url:'/ajax/candlestick.php',
			type:'post',
			data:obj,
			success:function(resp){
				callback(resp);
			}
		});
		return;
	}
}

function CandlestickPlots(ticker,canvas){
	this.candleWidth=180;// new candle every 3mins =180seconds
	this.prices=new Array(); // stock prices { Date time, float price}}
	this.updateInterval=2;//update stock prices every 5 seconds
	this.ticker='nmbl';
	if(typeof ticker==='string'||ticker instanceof String){
		this.ticker=ticker;
	}
	this.canvas=null;//the canvas object
	if(typeof canvas!=='undefined'&&canvas!=null){
		this.canvas=canvas;
	}
	var csobj=this;
	var ticker=this.ticker;
	this.x=10;
	this.plot=function(priceobj){
		if(csobj.canvas!=null){
			var ctx=csobj.canvas.getContext("2d");
			ctx.beginPath();
			ctx.lineWidth='1';
			ctx.rect(csobj.x+2,priceobj.open*4,6,-(priceobj.price-priceobj.open)*20);
			ctx.moveTo(csobj.x+5,priceobj.open*4);
			if(priceobj.price<priceobj.open){
				ctx.strokeStyle='red';
				ctx.lineTo(csobj.x+5,priceobj.open*4-(priceobj.high-priceobj.open)*20);
			} else {
				ctx.strokeStyle='green';
				ctx.lineTo(csobj.x+5,priceobj.open*4-(priceobj.low-priceobj.open)*20);
			}
			ctx.moveTo(csobj.x+5,priceobj.open*4-(priceobj.price-priceobj.open)*20);
			if(priceobj.price<priceobj.open){
				ctx.lineTo(csobj.x+5,priceobj.open*4-(priceobj.low-priceobj.open)*20);
			} else {
				ctx.lineTo(csobj.x+5,priceobj.open*4-(priceobj.high-priceobj.open)*20);
			}
			ctx.stroke();
			csobj.x=csobj.x+10;
		}
	}
	this.ajaxCallback=function(resp){
		try{
			var priceobj=JSON.parse(resp);
			csobj.prices.push({time:new Date(priceobj.time),price:parseFloat(priceobj.price)});
			csobj.plot(priceobj);
			csobj.timerok=true;
		} catch(e){
		 	csobj.stop();
			console.error('JSON.parse error',e);
		}
	};
	CandlestickAjaxCommand({symbol:ticker,range:'1d'},this.ajaxCallback);
	this.timerok=true;
	this.start=function(){
		this.timer=setInterval(function(){
			if(csobj.timerok){
				csobj.timerok=false;
				CandlestickAjaxCommand({symbol:ticker,last:csobj.prices.slice(-1)[0].price},csobj.ajaxCallback);
			}
		},this.updateInterval*1000);
	};
	this.start();
	this.stop=function(){clearInterval(this.timer);console.log("timer stopped");}
	return this;
}
