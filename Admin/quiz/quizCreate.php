<?php
require_once("../../config.php"); 
if(!isset($_SESSION['username']))
  header("location: ../../index.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="\quiz_project\online-course.png">
	<title>Create Quiz</title>
  <?php require_once("cssLinks.php") ;?>
</head>
<body>
<div class="row">
<span class="title1" style="margin-left:40%;font-size:30px;"><b>Enter Quiz Details</b></span><br /><br />
 <div class="col-md-3"></div><div class="col-md-6">   
 <form class="form-horizontal title1" name="form" action="addQuizQuestions.php" method="POST">
<fieldset>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="name"></label>  
  <div class="col-md-12">
  <input id="name" name="quizName" placeholder="Enter Quiz title" class="form-control input-md" type="text">
    
  </div>
</div>



<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="total"></label>  
  <div class="col-md-12">
  <input id="total" name="total" placeholder="Enter total number of questions" class="form-control input-md" type="number" min="1">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="right"></label>  
  <div class="col-md-12">
  <input id="right" name="rightMark" placeholder="Enter marks on right answer" class="form-control input-md" min="0" type="number">
    
  </div>
</div>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="subject"></label>  
  <div class="col-md-12">
    <select id="subject" name="subject" class="form-control input-md">
<?php
    $query = "SELECT * FROM subject";
    $subjectResult = $connection->query($query);
    if($subjectResult->num_rows>0){
      while($row= $subjectResult->fetch_assoc()){
        $name = $row['name'];
        echo '<option value="'.$name.'">'.$name.'</option>';
        echo $name; 
      }
    }else 
    echo "nooo";
?>
    </select>
  </div>
</div>


<div class="form-group">
  <label class="col-md-12 control-label" for=""></label>
  <div class="col-md-12"> 
    <input  type="submit" style="margin-left:45%"  name = "submit" class="btn btn-primary" value="Submit" class="btn btn-primary"/>
  </div>
</div>

</fieldset>
</form></div>


</body>
</html>
