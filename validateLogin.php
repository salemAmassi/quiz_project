<?php
require_once('config.php');
//signup validation: 
session_start();

//login handling  
if(isset($_POST['submit_login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
if(strpos($email,"teacher@gmail.com")){//user is admin: 
    $findAdminQuery  = "SELECT * from admin where email = '$email' and password = '$password'"; 
    $adminResult = $connection->query($findAdminQuery);
    if($adminResult){
        $row = $adminResult->fetch_assoc();
        $_SESSION['username'] = $row['name'];
        $_SESSION['id'] = $row['id'];
        header('location:Admin/index.php');
    }else 
    echo '<script>alert("couldnt find admin")</script>';
}elseif(strpos($email,"student@gmail.com")){//user is student:
    $findStudentQuery  = "SELECT * from student where email = '$email' and password = '$password'"; 
    $studentResult = $connection->query($findStudentQuery);
    if($studentResult){
        $row = $studentResult->fetch_assoc();
        $_SESSION['username'] = $row['name'];
        $_SESSION['id'] = $row['id'];
        header('location:User/index.php');
    }else 
    header('location:index.php');
    
}else 
header('location:index.php');

    
}
?>