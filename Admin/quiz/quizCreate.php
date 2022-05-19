<?php
require_once("../../config.php"); 
if(isset($_SESSION['username'])){
 echo   '<form action='.$_SERVER["PHP_SELF"].' method = "post" >
Enter number of questions: <input type="text" name= "noOfQuestions">
<input type="submit" value="Go" name="submit">

 </form>';

}




?>

<form action="$_SERVER['PHP_SELF']" method="post">

<?php


?>

</form>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
*,
*:after,
*:before {
	box-sizing: border-box;
}

$primary-color: #00005c; // Change color here. C'mon, try it! 
$text-color: mix(#000, $primary-color, 64%);

body {
	font-family: "Inter", sans-serif;
	color: $text-color;
	font-size: calc(1em + 1.25vw);
	background-color: mix(#fff, $primary-color, 90%);
    display: flex; 
    flex-direction: column;
}

form {
	display: flex;
	flex-wrap: wrap;
	flex-direction: column;
}

label {
	display: flex;
	cursor: pointer;
	font-weight: 500;
	position: relative;
	overflow: hidden;
	margin-bottom: 0.375em;
	/* Accessible outline */
	/* Remove comment to use */ 
	/*
		&:focus-within {
				outline: .125em solid $primary-color;
		}
	*/
	input {
		position: absolute;
		left: -9999px;
		&:checked + span {
			background-color: mix(#fff, $primary-color, 84%);
			&:before {
				box-shadow: inset 0 0 0 0.4375em $primary-color;
			}
		}
	}
	span {
		display: flex;
		align-items: center;
		padding: 0.375em 0.75em 0.375em 0.375em;
		border-radius: 99em; // or something higher...
		transition: 0.25s ease;
		&:hover {
			background-color: mix(#fff, $primary-color, 84%);
		}
		&:before {
			display: flex;
			flex-shrink: 0;
			content: "";
			background-color: #fff;
			width: 1.5em;
			height: 1.5em;
			border-radius: 50%;
			margin-right: 0.375em;
			transition: 0.25s ease;
			box-shadow: inset 0 0 0 0.125em $primary-color;
		}
	}
}

// Codepen spesific styling - only to center the elements in the pen preview and viewport
.container {
	/* position: absolute;
	top: 0;
	left: 0;
	right: 0;
	bottom: 0; */
	width: 50%;
	display: flex;
	justify-content: center;
	align-items: center;
	padding: 20px;
    margin: auto;
}
// End Codepen spesific styling
</style>
</head>
<body>
<?php
if(isset($_POST['submit'])){
    echo '<form action='.$_SERVER["PHP_SELF"].' method = "post">';
    $noOfQuestions = $_POST['noOfQuestions'];
for ($i=0; $i <$noOfQuestions ; $i++) { 
        echo '<div class="container">
        Question '.($i+1).'
        <label>
        <input type="text" name="question'.$i.'" placeholder="qustion content"/>
    </label>
            <label>
                <input type="radio" name="answer'.$i.'"  />
                <span>
                <input type="text" name="fAnswer" placeholder="choice 1">
                </span>
            </label>
            <label>
                <input type="radio" name="answer'.$i.'" />
                <span><input type="text" name="sAnswer" placeholder="choice 2">
                </span>
            </label>
            <label>
                <input type="radio" name="answer'.$i.'"/>
                <span><input type="text" name="thAnswer" placeholder="choice 3">
                </span>
            </label>
            <label>
                <input type="radio" name="answer'.$i.'"/>
                <span><input type="text" name="fthAnswer" placeholder="choice 4">
                </span>
            </label>
    </div>
    <hr>';
}
echo 
'<input type="submit" name="submit_create" value="create"></form>';
}?>

</body>
</html>
<?php
if(isset($_POST['submit_create'])){
echo "<pre>"; 
print_r($_POST);
echo"</pre>";    

}

?>

