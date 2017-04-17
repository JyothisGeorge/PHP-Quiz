<?php
	extract($_POST);
	include"../class/users.php";
	$quiz=new users;
	$qus=htmlentities($qus);
	$option1=htmlentities($opt1);
	$option2=htmlentities($opt2);
	$option3=htmlentities($opt3);
	$option4=htmlentities($opt4);
	$answer=htmlentities($right_ans);
	$qshint=htmlentities($hint);
	$query="INSERT INTO quizqs VALUES ('','$qus', '$option1', '$option2', '$option3', '$option4', '$answer','$topic','$qshint')";
	if($quiz->add_quiz($query)){
		$quiz->url("questions.php?msg=run");
	}
	?>