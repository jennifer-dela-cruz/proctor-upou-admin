<?php

/*****************************************************/
/* Common functions                                  */
/*****************************************************/

use Aws\S3\S3Client;
use Aws\Exception\AwsException;

function show($stuff)
{
	echo "<pre>";
	print_r($stuff);
	echo "</pre>";
}

function console($stuff)
{
	echo "<script>console.log(".json_encode($stuff).")</script>";
}

function getValue($name, $type){
	if($type=="text"){
		echo isset($_POST[$name])?'value="'.htmlspecialchars($_POST[$name]).'"':'';
	}else if($type=="select"){
		return isset($_POST[$name])?$_POST[$name]:'';
	}
}

function c_file_exists($file){
    $file_headers = @get_headers($file);
    if(strpos($file_headers[0], '404 Not Found')) {
        return false;
    }
    return true;
}

function getS3Object($url){

	$result = new stdClass();

	// Get an instance of S3 Client. This is one one to do it:
	$s3Client = new S3Client([
		'version'     => 'latest',
		'region'      => 'us-east-1', //Region of the bucket
		'credentials' => array(
			'key' => 'AKIAVDOI25RN4WZOGTK6',
			'secret'  => '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',
		)
	]);

	$imgUrlArr = explode("/", $url);
	$bucketName = "";
	$imgKey = "";

	if(count($imgUrlArr) > 1){
		$bucketName = $imgUrlArr[0];
		$imgKey = $imgUrlArr[1];

		$fileType = explode(".", $imgKey)[1];


	}else{
		$bucketName = "upou-screen-stream"; //Default
		$imgKey = $imgUrlArr[0];

		$fileType="jpeg";
	}


	try{
		// Get a command to GetObject
		$cmd = $s3Client->getCommand('GetObject', [
			'Bucket' => $bucketName,
			'Key'    => $imgKey
		]);


		// The period of availability
		$request = $s3Client->createPresignedRequest($cmd, '+10 minutes');

		// Get the pre-signed URL
		$signedUrl = (string) $request->getUri();

		$result->signedUrl = $signedUrl;
		$result->fileType = $fileType;
		$result->imgKey = $imgKey;
		return $result;
	}catch(Exception $exc){

	}
}
