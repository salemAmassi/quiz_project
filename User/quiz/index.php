<?php
require_once('../../config.php');
if(!isset($_SESSION['username']))
header("location:../../index.php");
$id = $_GET['id'];
//get quiz basic info
$getQuiz = "SELECT * FROM quiz where id = $id";
$quiz = $connection->query($getQuiz);
if($quiz->num_rows>0){
    $row = $quiz->fetch_assoc();
    $title = $row['title'];
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Take Quiz</title>
</head>
<body>
<div id="page-wrap">
        <form id="start-quiz" method="post" action="test.php">
            <div class="overlay index">
            <div class="quiz-overlay"></div>
	        <h1 class="index-headline"><?php echo $title;?></h1><!-- put quiz name-->
		<p class="index-sell">This personality quiz will reveal which iconic metal band you resemble most.</p>
                <input type="submit" id="submit"
                 class="take-quiz-btn index-btn" name="submit" value="Take The Quiz" />
                 <input type="text"  hidden name = "id" value ="<?php echo $id;?>"/>
            </div>                       
        </form>
    </div>
</body>
<style>
    * { 
  margin: 0; 
  padding: 0; 
}
html {
  -moz-box-sizing: border-box;
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
  margin: 0 auto;
  width: 600px;
}
body { 
  background: #020305 url('../imgs/bg-texture.jpg') center center no-repeat;
  color: #fff; 
  font-family: 'Droid Serif', Times, serif; 
  font-size: 14px;
  max-width: 600px;
}
#page-wrap { 
  height: 450px;
  margin: 0 auto;
  overflow: hidden;
  position: relative;
  width: 600px;
}
h1 { 
  letter-spacing: 3px;
  margin: 25px 0; 
  text-transform: uppercase;
}
.index-sell, .index-headline {
  color: #1c2d37;
  left: 100px;
  margin: 0;
  position: absolute;
  text-align: center;
  width: 400px;
}
.index-headline {
  font-size: 36px;
  height: 0;
  letter-spacing: 1px;
  text-shadow: 1px 1px 2px #fff;
  top: 55px;
}
.index-sell {
  font-size: 21px;
  line-height: 28px;
  text-transform: uppercase;
}
.index-sell { top: 155px; }
.transparent {
  color: transparent;
  display: none;
  opacity: 0;
  visibility: hidden;
}
.take-quiz-btn, .embed-btn, .close-btn {
  -webkit-appearance: none;
  border: none;
  background: #6f42c1;
  color: #f3f4ef;
  cursor: pointer;
  font-family: 'Droid Serif', Times, serif;
}
.take-quiz-btn, .close-btn {
  background: #6f42c1;
  font-size: 21px;
  text-shadow: 1px 1px rgba(66,66,66,.666);
  text-transform: uppercase;
}
.take-quiz-btn {
  top: 267px; 
  width: 259px;
}
.index-btn {
  height: 49px;
  left: 168px;
  padding: 9px 0 6px 0;
  position: absolute;
  top: 267px; 
}
.quiz-overlay, .result {
  height: 325px;
  position: absolute;
  width: 552px;
  z-index: -1;
}
.index .quiz-overlay, .quiz-overlay { 
  background: #f06161; 
  background-size: cover;
}
.index .quiz-overlay {
  left: 24px;
}
/* .index:hover{
	background: #f06161;
} */
</style>
</html>