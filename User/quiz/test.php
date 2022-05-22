<?php
require_once('../../config.php');
if(!isset($_SESSION['username']))
header("location:../../index.php");
if(isset($_POST['submit'])){
    $quizId  = $_POST['id'];
   $questionsSql = "SELECT * FROM question where quizId = $quizId";
   $questions = $connection->query($questionsSql);
?>

<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Quiz</title>
    <link rel="stylesheet" type="text/css" href="style.css"/>
    <link href='http://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic' rel='stylesheet' type='text/css'>
</head>
<body>
    <div id="page-wrap">
        <form action="grade.php" method="post" id="quiz">
            <ul id="test-questions">
            <?php 
        if($questions->num_rows>0){
            $i = 1; 
            while($question = $questions->fetch_assoc()){
                $question_content =  $question['question']; 
                $choices = explode("&",$question['choices'] );
                $rightAnswer = $question['correct_choice']; 
                $grade = $question['grade'];
                echo '
               <h1 class="transparent index-headline">'.$question_content.'</h1>
                <li>
                <div class="mtm">
                    <input type="radio" name="question-'.$i.'-answers" id="question-'.$i.'-answers-A" value="a" />
                    <label for="question-'.$i.'-answers-A" class="fwrd labela">a.'.$choices[0].'</label>
                </div>
                <div>
                    <input type="radio" name="question-'.$i.'-answers" id="question-'.$i.'-answers-B" value="b" />
                    <label for="question-'.$i.'-answers-B" class="fwrd labelb">b.'.$choices[1].'</label>
                </div>
                <div>
                    <input type="radio" name="question-'.$i.'-answers" id="question-'.$i.'-answers-C" value="c" />
                    <label for="question-'.$i.'-answers-C" class="fwrd labelc">c.'.$choices[2].'</label>
                </div>
                <div>
                    <input type="radio" name="question-'.$i.'-answers" id="question-'.$i.'-answers-D" value="d" />
                    <label for="question-'.$i.'-answers-D" >d.'.$choices[3].'</em></label>
                    <p class="quiz-progress">'.$i.' of '.$questions->num_rows.'</p>
                    </div>
                    </li>
                    <input type="text" hidden name = "rightAnswer'.$i.'" value = "'.$rightAnswer.'">
                    <div class="nomargin"></div>
                    <input type="text" hidden name = "grade'.$i.'" value = "'.$grade.'">
                    ';
                    $i++; 
                }
            }
        }
        ?>
        <input type="text" hidden name = "quizId" value = "<?php echo $quizId; ?>">
<input type="submit" name = "submit" value = "submit quiz" id = "submit-quiz">
<input type="text" hidden name = "noOfQuestions" value = "<?php echo $i-1?>">
</ul>
</form>
</div>
            </body>
  </html> 