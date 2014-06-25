<?php
	$time=date('Y-m-d H:i:s');
	$price=rand(29*1000,31*1000)/1000.0+0.2;
	$open=rand(29*1000,31*1000)/1000.0+0.2;
	if(isset($_POST['last'])){
		$open=$_POST['last']+(rand(0,10)-5)/50.0;
		$price=$_POST['last']+(rand(0,100)-50)/50.0+0.2;
	}
	$high=$price;
	$low=$open;
	if($open>$price){
		$high=$open;
		$low=$price;
	}
	$high=$high+rand(0,10)/20.0;
	$low=$low-rand(0,10)/20.0;
	echo "{\"time\":\"$time\",\"open\":$open,\"price\":$price,\"high\":$high,\"low\":$low}";
