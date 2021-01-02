<?php

	header("Access-Control-Allow-Origin: *");


	include("dbconfig.php");
	
 	$a=$_POST['city_id'];
	$b=$_POST['hotel_id'];
	
	$data = array(); 
    $response = array(); 	
	
	
	if(isset($_REQUEST['ministry_id']))
	{
		 $query = "SELECT hotel_name,hotel_img,hotel_descr,hotel_address,hotel_contact,hotel_website FROM `hotels` WHERE city_id=$a AND hotel_id=$b";
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