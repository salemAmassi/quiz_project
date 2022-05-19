<?php
require_once('../config.php');
//Salem: get all quizes and display them 

?>
<!DOCTYPE html>
  <html lang="en">
  <head>
      <meta charset="utf-8">
      <!--  This file has been downloaded from bootdey.com @bootdey on twitter -->
      <!--  All snippets are MIT license http://bootdey.com/license -->
      <title>Quizes Page</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.bundle.min.js"></script>
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
                <?php $sql = "SELECT q.id as qid, q.title as quiz_title   , s.name as subject_name 
                FROM (quiz as q JOIN subject as s ON q.subjectId = s.id ) ";
                    $sqlResult = $connection->query($sql);

                    if($sqlResult->num_rows > 0){
                      while($row = $sqlResult->fetch_assoc()){ 
                        $title = $row['quiz_title'];
                        $subjectName = $row['subject_name'];
                        $qId = $row['qid'];

                    echo '
                  <div class="col-sm-6 mb-3">
                    <div class="card h-100">
                      <div class="card-body">
                        <h5 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">Registered Quiz </i>';?><?php echo $title; ?> <?php echo '</h5>
                        <h6>Subject</h6>
                        <div class="col-sm-9 text-secondary">'; ?>
                      <?php 
                      echo $subjectName; 
                      echo '
                      </div><hr>
                      <a href="takeQuiz.php?id="'
                      ?>
                      <?php echo $qId; ?><?php echo ">Take quiz</a>
                     </div>
                     
                    </div>
                    
                  </div>
                "; 
                  }
                }
                ?>

              </div>   
              </div>
          </div>
      </div>
<style type="text/css">
  body{
      margin-top:20px;
      color: #1a202c;
      text-align: left;
      background-color: #e2e8f0;    
  }
  .main-body {
      padding: 15px;
  }
  .card {
      box-shadow: 0 1px 3px 0 rgba(0,0,0,.1), 0 1px 2px 0 rgba(0,0,0,.06);
  }
  
  .card {
      position: relative;
      display: flex;
      flex-direction: column;
      min-width: 0;
      word-wrap: break-word;
      background-color: #fff;
      background-clip: border-box;
      border: 0 solid rgba(0,0,0,.125);
      border-radius: .25rem;
  }
  
  .card-body {
      flex: 1 1 auto;
      min-height: 1px;
      padding: 1rem;
  }
  
  .gutters-sm {
      margin-right: -8px;
      margin-left: -8px;
  }
  
  .gutters-sm>.col, .gutters-sm>[class*=col-] {
      padding-right: 8px;
      padding-left: 8px;
  }
  .mb-3, .my-3 {
      margin-bottom: 1rem!important;
  }
  
  .bg-gray-300 {
      background-color: #e2e8f0;
  }
  .h-100 {
      height: 100%!important;
  }
  .shadow-none {
      box-shadow: none!important;
  }
  
  </style>
  
  <script type="text/javascript">
  
  </script>
  </body>
  </html>