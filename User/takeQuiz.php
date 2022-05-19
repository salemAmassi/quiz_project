<?php
require_once('../config.php');
$id = $_GET['id'];
$getQuiz = "SELECT * FROM quiz where id = $id";
$quiz = $connection->query($getQuiz);
if($quiz){
    echo "<pre>";
    print_r($quiz->fetch_assoc());
   echo "</pre>";
}


?>