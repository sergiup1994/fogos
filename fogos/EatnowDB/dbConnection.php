<?php
// database connection.
function databaseConnectionEatnow(){
$database_host='mysql2056.cp.blacknight.com';
$database_username='u1338425_emails';
$database_password='1SideSalad';
$connectionEatnow=@mysql_connect($database_host,$database_username,$database_password);
if(!$connectionEatnow){
die("Sorry!! Could not connect to Database");
}
$selection=mysql_select_db('db1338425_emails',$connectionEatnow);
if(!$selection){
die("Sorry!! Could not select database");
}
return $connectionEatnow;
}//databaseConnection closed.


?>