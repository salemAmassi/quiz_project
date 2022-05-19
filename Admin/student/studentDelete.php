<?php
//DELETE STUDENT BY ID: 
require_once('../../config.php');
//do i need to put it in separte page or in students.php?
if(isset($_SESSION['username'])){//needs work
$id = $_GET['id'];
$delteStudentQuery = "DELETE FROM student where id = $id";
$deleteResult = $connection->query($delteStudentQuery);
if($deleteResult){
    // echo '<script>alert("Student with id = "'.$id.'has been deleted successfully)</script>';
    header('location:../index.php');
}else
echo '<script>alert("delete operation failed")</script>';
// header( "refresh:5;url=index.php" );




}





?>