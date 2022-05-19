<?php

require_once '../../config.php';

$quizId = $_GET['id'];
echo $std_id;

$sql = "delete from quiz q where q.id=". $std_id;
if(mysqli_query($conn,$sql)){
    header('Location:get.php');
    exit();
}else
echo "Error";