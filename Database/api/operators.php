
<?php

	header("Access-Control-Allow-Origin: *");


	include("dbconfig.php");
	
 	$a=$_POST['city_id'];
	$b=$_POST['op_cat_id'];
	
	$data = array(); 
    $response = array(); 	
	
	
	if(isset($_REQUEST['ministry_id']))
	{
		 $query = "SELECT op_name,op_address,op_contact,op_website FROM `operators` WHERE city_id=$a AND op_cat_id=$b";
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