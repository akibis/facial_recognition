<?php

include_once('parse-output.php');

$testString = "libdc1394 error: Failed to initialize libdc14\n
Nearest Contact = mshan\n 
Confidence = 0.656465 \n
Result = Found\n";

echo "<pre>$testString\n\n</pre>";

header('Content-type: application/json');
echo json_encode(parseOutput($testString));




?>
