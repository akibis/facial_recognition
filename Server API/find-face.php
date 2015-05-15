<?php

/* 	Performs OpenCV Face Comparison on remote server.
	Trains faces in the process if any new contacts
	have been added to the database.

	By: Aleksandr Kibis
	CSC699: Facial Recognition
*/

include_once('db_config.php');
include_once('parse-output.php');

$jsonResponse;

if($_SERVER['REQUEST_METHOD'] == "POST") {
// Get image from Andee
$imgData = isset($_POST['image']) ? mysql_real_escape_string($_POST['image']) : "";
$decodedImage = base64_decode($imgData);

$test = fopen("image", "w");
fwrite($test, $decodedImage);
fclose($test);

$testcase = fopen("testcase","w");
fwrite($testcase, "0 unknown ../../../../../var/www/html/api/image");
fclose($testcase);


//echo '<img src="data:image/jpg;base64,'.$imgData.'" />';
//echo base64_decode($imgData);

/* MOVED TO upload-image.php */
// if (newContacts)
	// Generate folder structure
	// Populate with images
	// Train faces

// Run OpenCV Comparison
$cmd = "cd /home/ubuntu/opencv/FC_Comp/FC_Comp \n./onlineFaceRec test ../../../../../var/www/html/api/testcase";
 while (!$output = shell_exec($cmd)){
	// sleep
}

// Check output 
//echo $output;
//echo "\n\n";

/* PARSE OUTPUT */
// Nearest Contact: <person name>
// Confidence: <number>
// Is_Match: <FOUND or NOT FOUND>


// Parse output file
//$jsonResponse = array("result" => 1, "message" => "$output");
$jsonResponse = parseOutput($output);


} else {
	$jsonResponse = array("result" => 0, "message" => "Wrong request type!");
}

// Return result in JSON format
header('Content-type: application/json');
echo json_encode($jsonResponse);

?>
