<?php

	header("Access-Control-Allow-Origin: *");


	include("dbconfig.php");
	
 	$a=$_POST['id'];
	$b=$_POST['fest_id'];
	
	$data = array(); 
    $response = array(); 	
	
	
	if(isset($_REQUEST['ministry_id']))
	{
		 $query = "SELECT fest_name,fest_descr,fest_img FROM `festivals` WHERE state_id=$a AND fest_id=$b";
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