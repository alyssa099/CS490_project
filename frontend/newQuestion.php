<?php
    $question = "none";
	$funcName = "none";
	$params = "none";
	$input = "none";
	$output = "none";
	$difficulty = "none";
    $category = "none";
    
	if ( isset($_POST['question']))
		{ $question=$_POST['question'];
			}
	if ( isset($_POST['funcName']))
		{ $funcName=$_POST['funcName'];
            }
    if ( isset($_POST['params']))
        { $params=$_POST['params'];
            }
    if ( isset($_POST['input']))
        { $input=$_POST['input'];
            }
    if ( isset($_POST['output']))
        { $output=$_POST['output'];
            }
    if ( isset($_POST['difficulty']))
        { $difficulty=$_POST['difficulty'];
             }
    if ( isset($_POST['category']))
        { $category=$_POST['category'];
            }
			
	$stringdata =  array('question'=> $question, 'funcName' => $funcName, 'params'=> $params, 'input' => $input,'output' => $output, 'difficulty' => $difficulty, 'category' => $category );
	$infoback = curl_init();
	curl_setopt($infoback, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($infoback, CURLOPT_POSTFIELDS, http_build_query($stringdata));
	curl_setopt($infoback, CURLOPT_URL,"https://web.njit.edu/~mo27/CS490/betamiddlemain.php");
	curl_setopt($infoback, CURLOPT_COOKIEJAR, realpath($cookie));
	$stringrcvd = curl_exec($infoback);
	curl_close ($infoback);
	echo $stringrcvd;
?>