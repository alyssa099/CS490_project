<?php
$postType=$_POST['postType'];
$username=$_POST['ucid'];
$password=$_POST['pwd'];
$question=$_POST['question'];
$funcName=$_POST['funcName'];
$params=$_POST['params'];
$input=$_POST['input'];
$output=$_POST['output'];
$difficulty=$_POST['difficulty'];
$category=$_POST['category'];
$examName=$_POST['examName'];
$examQuestions=$_POST['examQuestions'];
$newQuestions=$_POST['newQuestions'];
$paramsValues=$_POST['paramsValues'];
$testcase=$_POST['testcase'];
$exampoints=$_POST['exampoints'];

  $stringdata =  array('postType'=> $postType,
                       'username'=> $username,
                       'password'=> $password,
                       'question'=> $question,
                       'funcName'=> $funcName,
                       'params'=> $params,
                       'input'=> $input,
                       'output'=> $output,
                       'difficulty'=> $difficulty,
                       'category'=> $category,
                       'examName'=> $examName,
                       'examQuestions'=> $examQuestions,
                       'newQuestions'=> $newQuestions,
                       'paramsValues'=> $paramsValues,
                       'testcase'=> $testcase,
                       'exampoints'=> $exampoints );
                       
	$infoback = curl_init();
 	curl_setopt($infoback, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($infoback, CURLOPT_POST, 1);
	curl_setopt($infoback, CURLOPT_POSTFIELDS, http_build_query($stringdata));
	curl_setopt($infoback, CURLOPT_URL,"https://web.njit.edu/~rjb57/CS490/betabackenddata.php");
  $stringrcvd = curl_exec($infoback);
	curl_close ($infoback);
	return $stringrcvd;
?> 
