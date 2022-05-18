<?php
require_once('config.php');
//signup validation: 

//login handling  
if(isset($_POST['submit_login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
if(strpos($email,"teacher@gmail.com")){//user is admin: 
    $findAdminQuery  = "SELECT * from admin where email = '$email' and password = '$password'"; 
    $adminResult = $connection->query($findAdminQuery);
    if($adminResult){
        header('location:Admin\index.php');
    }else 
    header('location:index.php');
}elseif(strpos($email,"student@gmail.com")){//user is student:
    $findStudentQuery  = "SELECT * from student where email = '$email' and password = '$password'"; 
    $studentResult = $connection->query($findStudentQuery);
    if($studentResult){
        header('location:User\index.php');
    }else 
    header('location:index.php');
    
}else 
header('location:index.php');

    
}
?>