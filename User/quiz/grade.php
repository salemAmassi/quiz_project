<?php
require_once('../../config.php');
if(!isset($_SESSION['username']))
header("location:../../index.php");
if(isset($_POST['submit'])){
    $quizId = $_POST['quizId']; 
    $result = 0; 
    for ($i=1; $i <=$_POST['noOfQuestions']; $i++) { 
      $studentAnswer = $_POST["question-$i-answers"];
      $grade = $_POST['grade'.$i];
      $correctAnswer = $_POST["rightAnswer$i"];
      if($studentAnswer == $correctAnswer){
          $result += $grade;
      }
  }
  $title = $connection->query("SELECT title from quiz where id = $quizId")->fetch_assoc()['title'];
  $insertResultSql = "INSERT INTO student_quiz(studentId,quizId,result) VALUES(".$_SESSION['id'].",".$quizId.",$result)";
  $query = $connection->query($insertResultSql);
  if($query){
    echo   ' 
    <div class = "card">
    <div class="col-sm-6 mb-3">
    <div class="card-body">
    <h5 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">Registered Quiz </i>';?><?php echo $title; ?>
     <?php echo '</h5>
    <h6>Result</h6>
    <div class="col-sm-9 text-secondary">';
    echo $result;
  echo '
  <hr>
  <a href="quizes.php">Go Back to Quizzes</a>
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
    ';
}
}

?>

