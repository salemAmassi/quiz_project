<?php
session_start();
$connection = new mysqli('localhost','root','','quiz_database');
if(!$connection){
   echo $connection->error();
}


?>