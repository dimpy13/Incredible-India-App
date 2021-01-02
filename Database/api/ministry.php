<?php

	header("Access-Control-Allow-Origin: *");


	include("dbconfig.php");
	
 	$a=$_POST['id'];
	
	$data = array(); 
    $response = array(); 	
	
	
	if(isset($_REQUEST['ministry_id']))
	{
		 $query = "SELECT ministry_name,ministry_address,ministry_contact,ministry_email,state_images FROM `state_minandglance` WHERE state_id=$a";
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