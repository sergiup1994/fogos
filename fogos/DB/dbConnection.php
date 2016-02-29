<?php
// database connection.
function databaseConnection(){
$database_host='mysql2272.cp.blacknight.com';
$database_username='u1338425_eatRes';
$database_password='1SideSalad';
$connection=@mysql_connect($database_host,$database_username,$database_password);
if(!$connection){
die("Sorry!! Could not connect to Database");
}
$selection=mysql_select_db('db1338425_restauranteatnow',$connection);
if(!$selection){
die("Sorry!! Could not select database");
}
return $connection;
}//databaseConnection closed.


?>