<?php
	$postType = $_POST ["postType"];

	$username = "none";
	$password = "none";
	$question = "none";
	$funcName = "none";
	$params = "none";
	$input = "none";
	$output = "none";
	$difficulty = "none";
	$category = "none";
	$examName = "none";
	$questions = "none";
	$studentName = "none";
	$pointValues = "none";
	$answers = "none";
	$revisedScores = "none";
	$completedExamID = "none";
	$gradedID = "none";
	
	if ( isset($_POST['ucid'])){ $username=$_POST['ucid'];}
	if ( isset($_POST['pwd'])){ $password=$_POST['pwd'];}    
	if ( isset($_POST['question'])){ $question=$_POST['question'];}
	if ( isset($_POST['funcName'])){ $funcName=$_POST['funcName'];}
	if ( isset($_POST['params'])){ $params=$_POST['params'];}
	if ( isset($_POST['input'])){ $input=$_POST['input'];}
	if ( isset($_POST['output'])){ $output=$_POST['output'];}
	if ( isset($_POST['difficulty'])){ $difficulty=$_POST['difficulty'];}
	if ( isset($_POST['category'])){ $category=$_POST['category'];}
	if ( isset($_POST['examName'])){ $examName=$_POST['examName'];}
	if ( isset($_POST['questions'])){ $questions=$_POST['questions'];}
	if ( isset($_POST['pointValues'])){ $pointValues=$_POST['pointValues'];}
	if ( isset($_POST['answers'])){ $answers=$_POST['answers'];}
	if ( isset($_POST['revisedScores'])){ $revisedScores=$_POST['revisedScores'];}
	if ( isset($_POST['completedExamID'])){ $completedExamID=$_POST['completedExamID'];}
	if ( isset($_POST['comments'])){ $comments=$_POST['comments'];}
	if ( isset($_POST['reasons'])){ $reasons=$_POST['reasons'];}
	if ( isset($_POST['gradedID'])){ $gradedID=$_POST['gradedID'];}
	if ( isset($_POST['looptype'])){ $looptype=$_POST['looptype'];}


	//post type must be implemented on back and middle 
	if ($postType == "login"){
		$stringdata =  array('postType'=> $postType, 'ucid'=> $username, 'pwd' => $password);
	}
	elseif ($postType == "addQuestion") {
		//Should add a wustion in the database
		$stringdata =  array('postType'=> $postType, 'question'=> $question, 'funcName' => $funcName, 'params'=> $params, 'input' => $input,'output' => $output, 'difficulty' => $difficulty, 'category' => $category, 'looptype' => $looptype );
	}
	elseif ($postType == "questionBank") {
		//should return all questions saved in the databade
		$stringdata =  array('postType'=> $postType);
	}
	elseif ($postType == "createExam") {
		//Should save the newly created exam
		$stringdata =  array('postType'=> $postType, 'examName' => $examName, 'questions' => $questions, 'pointValues' => $pointValues);
	}
	elseif ($postType == "scores") {
		//Should return student name, exam name, and score for all saved exam scores
		$stringdata =  array('postType'=> $postType);
	}
	elseif ($postType == "exams") {
		//Should return exam names
		$stringdata =  array('postType'=> $postType);
	}
	elseif ($postType == "studentScores") {
		//Should return examName, examQuestions, questionScore, and overall score for the specified student
		$stringdata =  array('postType'=> $postType, 'completedExamID' => $completedExamID, 'ucid' => $username);
	}
	elseif ($postType == "takeExam") {
		//Should return exam questions for given exam name
		$stringdata =  array('postType'=> $postType, 'examName' => $examName);
	}
	elseif ($postType == "submitExam") {
		//submits exam that student took
		$stringdata =  array('postType'=> $postType, 'ucid' => $username, 'examName' => $examName, 'questions' => $questions, 'answers' => $answers);
	}
	elseif ($postType == "revisedScores") {
		//revises the score that was originally given to student
		$stringdata =  array('postType'=> $postType, 'ucid' => $username, 'gradedID' => $gradedID, 'revisedScore' => $revisedScores, 'comments' => $comments, 'reasons' => $reasons);
	}

	 
	$infoback = curl_init();
	curl_setopt($infoback, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($infoback, CURLOPT_POSTFIELDS, http_build_query($stringdata));
	curl_setopt($infoback, CURLOPT_URL,"https://web.njit.edu/~mo27/CS490/betamiddlemain.php");
	curl_setopt($infoback, CURLOPT_COOKIEJAR, realpath($cookie));
	$stringrcvd = curl_exec($infoback);
	curl_close ($infoback);
	echo $stringrcvd;
?>
