<?php
error_reporting (E_ALL ^ E_NOTICE);
require('DB/dbConnection.php');
$connection=databaseConnection();

$resID=$_GET['id'];
$name=$_POST['name']; 
$contactEmail=$_POST['contactEmail'];
$phone=$_POST['phone'];
$message=$_POST['message'];
date_default_timezone_set('UTC');
$createdAt=date("Y-m-d H:i:s");

//echo ($name." ". $contactEmail." ". $phone." ". $message ."".$resID ."".$createdAt );
if(empty($resID)||empty($name)||empty($contactEmail)||empty($phone)||empty($message)||empty($createdAt)){
	//echo "The field are emply. Please go back and try again";
	header('location:index.php');

}
else{
$sql = "INSERT INTO `db1338425_restauranteatnow`.`contactUs` (`messageID`, `resID`, `contactsmallTitle`, `name`, `phone`, `contactEmail`, `message`, `createdAt`) VALUES (NULL, '$resID', 'welcome', '$name', '$phone', '$contactEmail', '$message','$createdAt')";
$result = mysql_query($sql);
	if($result){

		header('Location:index.php?a=Message sent succesfully#contact');

	}
	else{
		die();
	}

}


?>