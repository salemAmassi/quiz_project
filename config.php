<?php
$connection = new mysqli('localhost','root','','quiz_db');
if(!$connection){
   echo $connection->error();
}


?>