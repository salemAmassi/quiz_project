<?php
require_once('../../config.php');

?>
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
            <!-- /Breadcrumb -->
      <!--  -->
            <div class="row gutters-sm">
                <?php 
                if(isset($_GET['adminId'])){
                  $adminId = $_GET['adminId'];
                  $sql = "SELECT q.title as Quiz_Title , q.id as id_quiz  , q.created_time as Craeted_Time , s.name as Subject_Name 
                  FROM (quiz as q JOIN subject as s ON q.subjectId = s.id ) JOIN admin as a ON a.id = q.adminId WHERE a.id= $adminId";
                      $sqlResult = $connection->query($sql);
  
                      if($sqlResult->num_rows > 0){
                        while($row = $sqlResult->fetch_assoc()){ 
                          $quizId = $row['id_quiz'];
                          $title = $row['Quiz_Title'];
                          $created_time = $row['Craeted_Time'];
                          $subjectName = $row['Subject_Name'];
                      echo '
                    <div class="col-sm-6 mb-3">
                      <div class="card h-100">
                        <div class="card-body">
                          <h5 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">Registered Quiz </i>';?><?php echo $title; ?> <?php echo '</h5>
                          <h6>Subject</h6>
                          <div class="col-sm-9 text-secondary">'; ?>
                        <?php echo $subjectName; ?>
                        <?php echo '
                        </div><hr>
                        <h6>Created Time</h6>
                          <div class="col-sm-9 text-secondary">
                          '; ?>
                          <?php echo $created_time; ?>
                        <?php   echo '
                        </div><hr>
                        <form method="POST" action="">
                        <a class="delete" href="quizDelete.php?id='; echo $quizId.'"';  ?> <?php echo '>Delete</a>
                        </form>
                       </div>
                       
                      </div>
                      
                    </div>
                  ';
                    }
                  }
                }elseif(isset($_GET['subjectId'])){
                  $subjectId = $_GET['subjectId'];
                  $sql = "SELECT q.id as qid, q.title as quizName, q.created_time as created_time, s.name as subjectName 
                  from quiz as q join subject as s on q.subjectId = s.id where subjectId = $subjectId";

                      $sqlResult = $connection->query($sql);
                      if($sqlResult->num_rows > 0){
                        while($row = $sqlResult->fetch_assoc()){ 
                          $quizId = $row['qid'];
                          $title = $row['quizName'];
                          $created_time = $row['created_time'];
                          $subjectName = $row['subjectName'];
                      echo '
                    <div class="col-sm-6 mb-3">
                      <div class="card h-100">
                        <div class="card-body">
                          <h5 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">Registered Quiz </i>';?>
                          <?php echo $title; ?> <?php echo '</h5>
                          <h6>Subject</h6>
                          <div class="col-sm-9 text-secondary">'; ?>
                        <?php echo $subjectName; ?>
                        <?php echo '
                        </div><hr>
                        <h6>Created Time</h6>
                          <div class="col-sm-9 text-secondary">
                          '; ?>
                          <?php echo $created_time; ?>
                        <?php   echo '
                        </div><hr>
                        <form method="POST" action="">
                        <a class="delete" href="quizDelete.php?id='; echo $quizId.'"';  ?> <?php echo '>Delete</a>
                        </form>
                       </div>
                       
                      </div>
                      
                    </div>
                  ';
                    }
                  }

                }
              
                ?>

              </div>   
            </div>
          </div>
      </div>
  
 
  
  </style>
  </body>
  </html>