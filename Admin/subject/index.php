<?php
require_once("../../config.php");?>
<!DOCTYPE html>
  <html lang="en">
  <head>
      <meta charset="utf-8">
      <!--  This file has been downloaded from bootdey.com @bootdey on twitter -->
      <!--  All snippets are MIT license http://bootdey.com/license -->
      <title>Quizzes Page</title>
      <link rel="icon" href="\quiz_project\online-course.png">
      <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" rel="stylesheet">
      <link href="../style.css" rel = "stylesheet">
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.bundle.min.js"></script>
      <style>
        .delete:link, .delete:visited {
          background-color: white;
          color: black;
          border: 2px solid rgb(62, 135, 163);
          padding: 5px 10px;
          text-align: center;
          text-decoration: none;
          display: inline-block;
          width: 30%;
          margin: 0px 0px 10px 10px;
          }
  
        .delete:hover, .delete:active {
          background-color: rgb(62, 135, 163);
          color: white;
        }
      </style>
  </head>
  <body>
  
  <div class="container">
      <div class="main-body">
      
            <!-- Breadcrumb -->
            <nav aria-label="breadcrumb" class="main-breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Quizes</li>
              </ol>
            </nav>
<?php
if(isset($_SESSION['username'])){
    $subjects = "SELECT * FROM subject";
    $result = $connection->query($subjects);
    if($result->num_rows>0){
        while($row = $result->fetch_assoc()){
            $name = $row['name']; 
            $subjectId = $row['id'];                
            echo '
            <div class="col-sm-6 mb-3">
              <div class="card h-100">
                <div class="card-body">
                  <h5 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">Subject  </i>';?>
                   <?php echo '</h5>
                  <h6>Name</h6>
                <div class="col-sm-9 text-secondary">'; ?>
                <?php echo $name; ?>
                <?php echo '
                </div><hr>
                '?>
                <?php   echo '
                </div>
                <a class="delete" href="quizes.php?subjectId='; echo $subjectId.'"';  ?> <?php echo '>Get Quizes</a>
               </div>
              </div>
              
            </div>
          ';
        }

    }

}else 
header('location:../../index.php'); 

?>