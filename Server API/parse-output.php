<?php

function parseOutput($output){

$start = substr($output, strpos($output, "Nearest Contact"));

$nearest = substr($start, strlen("Nearest Contact = "), strpos($start, "\n") - strlen("Nearest Contact = "));

$confidence_string = substr($output, strpos($output, "Confidence"));
$confidence = substr($confidence_string, strlen("Confidence = "), strpos($confidence_string, "\n") - strlen("Confidence = "));

$found_string = substr($output, strpos($output, "Result"));
$found = substr($found_string, strlen("Result = "), strpos($found_string, "\n") - strlen("Result = "));

/*
echo "Substring test: " . $start;
echo "<pre>\n</pre>";
echo "Nearest: " . $nearest;
echo "<pre>\n</pre>";
echo "Confidence: " . $confidence;
echo "<pre>\n</pre>";
echo "Result: " . $found;
*/

$jsonResponse = array("Nearest" => "$nearest", "Confidence" => "$confidence", "Result" => "$found");

return $jsonResponse;



}



?>
