<?php
session_start();
$connection = new mysqli('localhost','root','','dummy_db');
if(!$connection){
   echo $connection->error();
}


?>