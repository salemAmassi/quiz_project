<?php
require_once('../../config.php');
if(isset($_POST['submit_question'])){
  //Abood: insert question into question table
  $noOfQuestion =  $_POST['total'];
  // echo '<pre>';
  // print_r($_POST);
  // echo '</pre>';
  for ($i=1; $i <= $noOfQuestion; $i++) { 
    $question = $_POST['qns'.$i];
    $answerA  = $_POST[$i.'a'];
    $answerB = $_POST[$i.'b'];
    $answerC  = $_POST[$i.'c'];
    $answerD  = $_POST[$i.'d'];
    $correctAnswer = $_POST['ans'.$i];
    $quiz_Id = $_POST['quizId'];
    $quesMark = $_POST['questionMark'];



    $sqlInsertQus = "INSERT INTO question(quizId,question,choices,correct_choice,grade) 
                     VALUES($quiz_Id,'$question','$answerA&$answerB&$answerC&$answerD','$correctAnswer',$quesMark)";

    $query2 = $connection->query($sqlInsertQus);

    if($query2){
      header('location:quizes.php?adminId='.$_SESSION['id']);
    }else{
      echo "000000000000000000000000000";

    }
  }

  // foreach($_POST as $key=>$value)
  // echo $key."<br>";
}
//handle quiz create 
if(isset($_POST['submit'])){
  //Abood : insert quiz into quiz table 
  $quizName = $_POST['quizName'];
  $quizSubject = $_POST['subject'];
  $questionMark = $_POST['rightMark'];

  //get id for the quiz to use it in inserting new questions for this quiz 
  
    //get id for the selected subject 
  $sqlGetSubjectId = "SELECT s.id as subject_id FROM subject s WHERE s.name = '$quizSubject'";

  $sqlResult = $connection->query($sqlGetSubjectId);
    if($sqlResult->num_rows > 0){
      $row = $sqlResult->fetch_assoc();
        $subject_id = $row['subject_id'];
    }
    $adminId = $_SESSION['id'];
    $sqlInsertQuiz = "INSERT INTO quiz(title,subjectId,adminId) VALUES('$quizName',$subject_id,$adminId)";
    
    $sqlInsertRows = $connection->query($sqlInsertQuiz);
    if($sqlInsertRows){
      $sqlGetQuizId = "SELECT q.id as quiz_id FROM quiz as q WHERE q.title = '$quizName'";
      $sqlResult = $connection->query($sqlGetQuizId);
        if($sqlResult->num_rows > 0){
          $row = $sqlResult->fetch_assoc();
            $quizId = $row['quiz_id'];
        }
    }else{
     //error msg 
    }

  
  


    if($_POST['total']>0){
        echo '
  <!DOCTYPE html>
  <html lang="en">
  <head>
  <meta charset="UTF-8">
  <link rel="icon" href="\quiz_project\online-course.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Question</title>';
require_once("cssLinks.php");
   echo'
</head>
<body>
        <div class="row">
<span class="title1" style="margin-left:40%;font-size:30px;"><b>Enter Question Details</b></span><br /><br />
 <div class="col-md-3"></div><div class="col-md-6">'?>
 <form class="form-horizontal title1" name="form" action="<?php $_SERVER['PHP_SELF']?>"  method="post">
<fieldset>
<?php
$total = $_POST['total']; 
        for($i=1;$i<=$total;$i++){
       echo '<b>Question number&nbsp;'.$i.'&nbsp;:</><br /><!-- Text input-->
       <div class="form-group">
         <label class="col-md-12 control-label" for="qns'.$i.' "></label>  
         <div class="col-md-12">
         <textarea rows="3" cols="5" name="qns'.$i.'" class="form-control" placeholder="Write question number '.$i.' here..."></textarea>  
         </div>
       </div>
       <!-- Text input-->
       <div class="form-group">
         <label class="col-md-12 control-label" for="'.$i.'a"></label>  
         <div class="col-md-12">
         <input  name="'.$i.'a" placeholder="Enter option a" class="form-control input-md" type="text">
           
         </div>
       </div>
       <!-- Text input-->
       <div class="form-group">
         <label class="col-md-12 control-label" for="'.$i.'b"></label>  
         <div class="col-md-12">
         <input  name="'.$i.'b" placeholder="Enter option b" class="form-control input-md" type="text">
           
         </div>
       </div>
       <!-- Text input-->
       <div class="form-group">
         <label class="col-md-12 control-label" for="'.$i.'c"></label>  
         <div class="col-md-12">
         <input  name="'.$i.'c" placeholder="Enter option c" class="form-control input-md" type="text">
           
         </div>
       </div>
       <!-- Text input-->
       <div class="form-group">
         <label class="col-md-12 control-label" for="'.$i.'d"></label>  
         <div class="col-md-12">
         <input  name="'.$i.'d" placeholder="Enter option d" class="form-control input-md" type="text">
           
         </div>
       </div>
       <br />
       <b>Correct answer</b>:<br />
       <select id="ans'.$i.'" name="ans'.$i.'" placeholder="Choose correct answer " class="form-control input-md" >
          <option value="a">Select answer for question '.$i.'</option>
         <option value="a">option a</option>
         <option value="b">option b</option>
         <option value="c">option c</option>
         <option value="d">option d</option> </select><br /><br />
         <input type="hidden"  name="total" value="'.$total.'">
         <input type="hidden"  name="quizId" value="'.$quizId.'">   
         <input type="hidden"  name="questionMark" value="'.$questionMark.'">    
         '; 
        }

echo '          
    </body>
    </html>'; 
      }?>
  
      
      
      
      
  

<div class="form-group">
    <label class="col-md-12 control-label" for=""></label>
    <div class="col-md-12"> 
    </div>
    </div>
    
    </fieldset>
    <input  type="submit" style="margin-left:45%" name = "submit_question" class="btn btn-primary" value="Submit" class="btn btn-primary"/>
    </form></div>
<?php
}
    ?>