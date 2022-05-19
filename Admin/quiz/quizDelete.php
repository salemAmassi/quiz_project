<?php

require_once '../../config.php';

$quizId = $_GET['id'];


$sql = "DELETE from quiz where id=$quizId" ;

if($connection->query($sql)){
    header('Location:quizes.php');
    exit();
}else
echo $connection->error;