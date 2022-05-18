
<?php
require_once("../config.php");

$stdId = $_GET['id'];

$sql = "SELECT * FROM student WHERE id = ".$stdId;
$sqlResult = $connection->query($sql);

if($sqlResult->num_rows > 0 ){
  while ($row = $sqlResult->fetch_assoc()) {
      $userName = $row['name'];
      $email = $row['email'];
      $gpa = $row['gpa'];
      $photo = $row['profile_img'];
    //  echo  "<pre>";
    //   print_r($row);
    //   echo "</pre>";
  }
}else{
  echo "vvv";
}





?>

  <!DOCTYPE html>
  <html lang="en">
  <head>
      <meta charset="utf-8">
      <!--  This file has been downloaded from bootdey.com @bootdey on twitter -->
      <!--  All snippets are MIT license http://bootdey.com/license -->
      <title>profile with data and skills - Bootdey.com</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.bundle.min.js"></script>
  </head>
  <body>
  <!DOCTYPE html>
  <html lang="en">
  <head>
      <meta charset="utf-8">
      <!--  This file has been downloaded from bootdey.com @bootdey on twitter -->
      <!--  All snippets are MIT license http://bootdey.com/license -->
      <title>profile with data and skills - Bootdey.com</title>
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
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">User</a></li>
                <li class="breadcrumb-item active" aria-current="page">User Profile</li>
              </ol>
            </nav>
            <!-- /Breadcrumb -->
      
            <div class="row gutters-sm">
              <div class="col-md-4 mb-3">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex flex-column align-items-center text-center">
                      <img src="<?php echo "../images/$photo";?>" alt="Admin" class="rounded-circle" width="300">
                      <div class="mt-3">
                        <h4><?php echo $userName; ?></h4>
                        <p class="text-secondary mb-1">Student</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-8">
                <div class="card mb-3">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-sm-3">
                        <h6 class="mb-0">Name</h6>
                      </div>
                      <div class="col-sm-9 text-secondary">
                      <?php echo $userName ; ?>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-3">
                        <h6 class="mb-0">Email</h6>
                      </div>
                      <div class="col-sm-9 text-secondary">
                      <?php echo $email; ?>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-3">
                        <h6 class="mb-0">Gpa</h6>
                      </div>
                      <div class="col-sm-9 text-secondary">
                      <?php echo $gpa;?>
                      </div>
                    </div>
                    <hr>
                        <div class="row">
                      <div class="col-sm-12">
                      <a class="btn btn-info "  href="editStudent.php?id=<?php echo$stdId; ?>">Edit</a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row gutters-sm">

                <?php $sql2 = "SELECT q.title as title, qs.submissionDate as submissionDate, qs.result as result , s.name as subject_name 
                FROM (quiz as q JOIN student_quiz as qs ON q.id = qs.quizId) JOIN subject as s ON q.subjectId = s.id WHERE qs.studentId= $stdId";
$sql2Result = $connection->query($sql2);

if($sql2Result->num_rows > 0){
  while($row2 = $sql2Result->fetch_assoc()){ 
    $title = $row2['title'];
    $result = $row2['result'];
    $submissionDate = $row2['submissionDate'];
    $subjectName = $row2['subject_name'];
echo '
                  <div class="col-sm-6 mb-3">
                    <div class="card h-100">
                      <div class="card-body">
                        <h5 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">Quiz Taken</i>';?><?php echo $title; ?> <?php echo '</h5>
                        <h6>Subject</h6>
                        <div class="col-sm-9 text-secondary">'; ?>
                      <?php echo $subjectName; ?>
                      <?php echo '
                      </div><hr>
                      <h6>Result</h6>
                        <div class="col-sm-9 text-secondary">
                        '; ?>
                        <?php echo $result; ?>
                      <?php   echo '
                      </div><hr>
                      <h6>Submission Date</h6>
                        <div class="col-sm-9 text-secondary">
                        '; ?>
                        <?php echo $submissionDate; ?>
                       <?php echo '
                      </div><hr>
                      </div>
                    </div>
                  </div>
                ';
  }
}
?>

</div>   
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




