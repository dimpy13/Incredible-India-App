<?php

	header("Access-Control-Allow-Origin: *");


	include("dbconfig.php");
	
 	$a=$_POST['id'];
	$b=$_POST['place_cat_id'];
	
	$data = array(); 
    $response = array();
	
	
	if(isset($_REQUEST['ministry_id']))
	{
		 $query = "SELECT  place_id,place_name,place_add,place_descr,place_image FROM `place` WHERE state_id=$a AND place_cat_id=$b";
	}
	
		
	$result=@mysqli_query($conn,$query);
	
    while($rows =@mysqli_fetch_assoc($result))
	{
		array_push($data,$rows);
	}
   
	//var_dump($data);
	if($data)
	{
		$response['error']="False";
		$response['data']=$data;
		
	}
	else{
		$response['error']="True";
	}
     
	echo json_encode($response);
	mysqli_close($conn);

 ?>