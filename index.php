<?php
session_start();
//valdiate the signup operation 
require_once('config.php');
//signup validation: 
//basic insert 
//TODO: make more validation in signup on photo size, 
if(isset($_POST['submit_signup'])){
    $userName = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $gpa = $_POST['gpa'];

    $checkStudent= "SELECT * from student where name = '$userName'";
	$student  = $connection->query($checkStudent); 
    if($student->num_rows>0){
		echo '<script>alert("student has already an account, please sign in!")</script>';
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
		echo '<script>alert("signup operation failed")</script>';
	}
}
// else 
// header('location:index.php');


?>

<!DOCTYPE html>
<html>
<head>
	<title>Quiz Man</title>
	<link rel="stylesheet" type="text/css" href="style.css">
<link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
</head>
<body>
	<div class="main">  	
		<!-- <input type="checkbox" id="chk" aria-hidden="true"> -->
			<div class="signup">
				<form method="post" action ="<?php $_SERVER['PHP_SELF']?>" enctype="multipart/form-data">
					<label for="chk" aria-hidden="true">Sign up</label>
					<input type="text" name="username" placeholder="User name" required="">
					<input type="email" name="email" placeholder="Email" required="">
					<input type="password" name="password" placeholder="Password" required="">
					<input type="text" name="gpa" placeholder="Gpa" required="">
                    <input type="file" name="photo">
					<button name = "submit_signup">Sign up</button>
				</form>
			</div>

	</div>
	<div class="login">
				<form method="post" action ="validateLogin.php">
					<label for="chk" aria-hidden="true">Login</label>
					<input type="email" name="email" placeholder="Email" required="">
					<input type="password" name="password" placeholder="Password" required="">
					<button name = "submit_login">Login</button>
				</form>
			</div>
</body>
</html>


