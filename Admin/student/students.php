<?php
// select students
require_once('config.php');
//Abood: get all students and display them
$studentName = $_POST['studentName'];
$getStudentSql = "SELECT name, email, gpa from student";
$studentResult = $connection->query($getStudentSql);
//TODO: print the result in the table


?>