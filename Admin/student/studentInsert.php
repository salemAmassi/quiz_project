<?php
require_once('confing.php');

$userName = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $gpa = $_POST['gpa'];

    $checkStudent= "SELECT * from student where name = '$userName'";
	$student  = $connection->query($checkStudent); 
    if($student->num_rows>0){
        echo "you have already an account";//needs html code 
		header('location:index.php');
    }else{
		$photo_name = $_FILES['photo']['name'];
		$tempName = $_FILES['photo']['tmp_name'];
		$extenstions = array('png','jpg','jpeg');
		$extension = pathinfo($photo_name, PATHINFO_EXTENSION);
		$newName = uniqid(). ".". $extension; 
		echo (move_uploaded_file($tempName, 'images/'. $newName));
		$insertNewStudent  = 
		"INSERT INTO student(name, email,password,gpa,profile_img) VALUES('$userName','$email','$password',$gpa,'$newName')";
		if($connection->query($insertNewStudent)){
			header('location:index.php');
		}else 
        echo '<script>alert("insert operation failed")</script>';
        ?>