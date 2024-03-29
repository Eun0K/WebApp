<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Grade Store</title>
		<link href="https://selab.hanyang.ac.kr/courses/cse326/2019/labs/labResources/gradestore.css" type="text/css" rel="stylesheet" />
	</head>

	<body>

		<?php
		# Ex 4 :
		# Check the existence of each parameter using the PHP function 'isset'.
		# Check the blankness of an element in $_POST by comparing it to the empty string.
		# (can also use the element itself as a Boolean test!)

		  if (!isset($_POST["name"])||$_POST["name"]==""||!isset($_POST["id"])||$_POST["id"]==""||!isset($_POST["checklist"])||$_POST["checklist"]==""||
			!isset($_POST["grade"])||$_POST["grade"]==""||!isset($_POST["creditcard"])||$_POST["creditcard"]==""||!isset($_POST["cc"])||$_POST["cc"]==""){
				?>

		<!-- Ex 4 :
			Display the below error message :-->
			<h1>Sorry</h1>
			<p>You didn't fill out the form completely. <a href="http://localhost:8888/lab06/gradestore/gradestore.html">Try again?</a></p>



		<?php
		# Ex 5 :
		# Check if the name is composed of alphabets, dash(-), ora single white space.
	} elseif (!preg_match("/^[a-zA-Z'. -]+$/",$_POST["name"])) {
		?>

		<!-- Ex 5 :
			Display the below error message :-->
			<h1>Sorry</h1>
			<p>You didn't provide a valid name. <a href="http://localhost:8888/lab06/gradestore/gradestore.html">Try again?</a></p>


		<?php
		# Ex 5 :
		# Check if the credit card number is composed of exactly 16 digits.
		# Check if the Visa card starts with 4 and MasterCard starts with 5.
	} elseif (!preg_match("/^[4|5][0-9]{15}$/",$_POST["creditcard"]) {
		?>

		<!-- Ex 5 :
			Display the below error message :-->
			<h1>Sorry</h1>
			<p>You didn't provide a valid credit card number. <a href="http://localhost:8888/lab06/gradestore/gradestore.html">Try again?</a></p>


		<?php
		# if all the validation and check are passed
		 } else {
		?>

		<h1>Thanks, looser!</h1>
		<p>Your information has been recorded.</p>

		<!-- Ex 2: display submitted data -->
		<ul>
			<li>Name: <?=$_POST["name"]?> </li>
			<li>ID: <?=$_POST["id"]?></li>
			<!-- use the 'processCheckbox' function to display selected courses -->
			<li>Course: <?=processCheckbox($_POST["checklist"])?></li>
			<li>Grade: <?=$_POST["grade"]?></li>
			<li>Credit Card: <?=$_POST["creditcard"]?> (<?=$_POST["cc"]?>)</li>
		</ul>

		<!-- Ex 3 :-->
			<p>Here are all the loosers who have submitted here:</p>

			<!-- /* Ex 3:
			 * Save the submitted data to the file 'loosers.txt' in the format of : "name;id;cardnumber;cardtype".
			 * For example, "Scott Lee;20110115238;4300523877775238;visa"
			 */ -->
			 <?php
			 	$filename = "loosers.txt";
			 	$looser=$_POST["name"].";".$_POST["id"].";".$_POST["creditcard"].";".$_POST["cc"]."\n";

				//file_put_contents($filename,$looser);
			  ?>


		<!-- Ex 3: Show the complete contents of "loosers.txt".
			 Place the file contents into an HTML <pre> element to preserve whitespace -->

		 <?php
		 	$filename = "loosers.txt";
			file_put_contents("loosers.txt", $looser,FILE_APPEND);
		 	$content = file_get_contents($filename);
		 	?><pre><?php
		 	if ($content !== false) {
		 		 echo $content;
		 	} else {
		 		 echo "";
		 	}} ?></pre>

		<?php
			/* Ex 2:
			 * Assume that the argument to this function is array of names for the checkboxes ("cse326", "cse107", "cse603", "cin870")
			 *
			 * The function checks whether the checkbox is selected or not and
			 * collects all the selected checkboxes into a single string with comma separation.
			 * For example, "cse326, cse603, cin870"
			 */
			function processCheckbox($course)
			{
				if(isset($course)){
					$result=implode(' ,', $course);
					return $result;
				}else{return "";}
			}


		?>

	</body>
</html>
