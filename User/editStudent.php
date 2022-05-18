<?php
require_once('../config.php');
//edit validation: 
//basic update 
//TODO: make more validation in signup on photo size, 


//get old student data and put it in fields: 
$userId = $_GET['id'];
$checkStudent= "SELECT * from student where id = $userId ";
$student  = $connection->query($checkStudent)->fetch_assoc(); 
$oldUserName =$student['name'];
$oldEmail =$student['email'];
$oldGpa =$student['gpa'];
$oldPhoto = $student['profile_img'];
$oldPassword = $student['password'];
echo $oldPhoto; 
//if there is post request! 
//change photo needs work! 
if(isset($_POST['submit_edit'])){
    $userName = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $gpa = $_POST['gpa'];
		$photo_name = $_FILES['photo']['name'];
		$tempName = $_FILES['photo']['tmp_name'];
		$extenstions = array('png','jpg','jpeg');
		$extension = pathinfo($photo_name, PATHINFO_EXTENSION);
		$newName = $oldPhoto; 
		$output =  md5(time()).$extension;
		echo $output;
		copy( $_FILES['photo']['tmp_name'] , $output );
		echo (move_uploaded_file($tempName, 'images/'. $newName));
		$updateStudent  = 
		"UPDATE student set name ='$userName',
		email = '$email',
		password = '$password',
		gpa = $gpa,
		profile_img = '$newName'
		where id = $userId";
		if($connection->query($updateStudent)){
			header('location:index.php');
		}else 
		echo '<script>alert("update operation failed")</script>';
    
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!--  This file has been downloaded from bootdey.com @bootdey on twitter -->
    <!--  All snippets are MIT license http://bootdey.com/license -->
    <title>Edit Profile data</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<div class="container">
		<div class="main-body">
			<div class="row">
				<div class="col-lg-4">
					<div class="card">
						<div class="card-body">
							<div class="d-flex flex-column align-items-center text-center">
								<img src="<?php echo '../images/'.$oldPhoto?>" alt="<?php echo $oldUserName?>"  class="rounded-circle p-1 bg-primary" width="300">
								<div class="mt-3">
									<h4><?php $userName?></h4>
									<p class="text-secondary mb-1">Student</p>
								</div>
							</div>
							<hr class="my-4">
						</div>
					</div>
				</div>
				<div class="col-lg-8">
					<div class="card">
						<form  method="post" action ="<?php $_SERVER['PHP_SELF']?>" enctype="multipart/form-data" >
						<div class="card-body">
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Name</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" class="form-control" value="<?php echo $oldUserName;?>"  name="username">
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Email</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" class="form-control"  value="<?php echo $oldEmail;?>" name="email">
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Gpa</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" class="form-control"  value="<?php echo $oldGpa;?>"  name="gpa">
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Password</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="password" class="form-control"  value="<?php echo $oldPassword;?>"  name="password">
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Photo</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="file"  value="<?php echo $image; ?>"  name="photo">
								</div>
							</div>
							<div class="row">
								<div class="col-sm-3"></div>
								<div class="col-sm-9 text-secondary">
									<input type="submit" class="btn btn-primary px-4" value="Save Changes" name="submit_edit">
								</div>
							</div>
						</div>
					</div>
					</div>
				</div>
			</div>
		</form>
		</div>
	</div>

			

<style type="text/css">
body{
    background: #f7f7ff;
    margin-top:20px;
}
.card {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 0 solid transparent;
    border-radius: .25rem;
    margin-bottom: 1.5rem;
    box-shadow: 0 2px 6px 0 rgb(218 218 253 / 65%), 0 2px 6px 0 rgb(206 206 238 / 54%);
}
.me-2 {
    margin-right: .5rem!important;
}
</style>

<script type="text/javascript">

</script>
</body>
</html>