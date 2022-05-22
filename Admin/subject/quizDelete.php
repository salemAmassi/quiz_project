<?php

require_once '../../config.php';

$quizId = $_GET['id'];

$subjectId  = $connection->query("SELECT subjectId from quiz where id = $quizId")->fetch_assoc()['subjectId'];
$sql = "DELETE from quiz where id=$quizId" ;

if($connection->query($sql)){
    header('Location:quizes.php?subjectId='.$subjectId);
    exit();
}else
echo $connection->error;