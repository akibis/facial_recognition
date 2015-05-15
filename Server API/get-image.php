<?php

/* Initialize DB Connection */
include_once('db_config.php');

// Check for GET Request

if($_SERVER['REQUEST_METHOD'] == "GET") {

$id = isset($_GET['id']) ? mysql_real_escape_string($_GET['id']) : "";

// run query
$query = "SELECT * FROM face WHERE id='$id'";
$sql = mysql_query($query);

if ($sql) {
$images = array();
while ($row = mysql_fetch_assoc($sql)) {
	$images[] = $row['face'];
}

foreach ($images as $image) {
	echo '<img src="data:image/x-ms-bmp;base64,'.$image.'" />';
	$imageEncoded = '<img src="data:image/x-ms-bmp;base64,'.$image.'" />';
}
$data = array("result" => 1, "message" => "BLOB retrieved successfully!");
} else {
$data = array("result" => 0, "message" => "Error!");
}
} else {
$data = array("result" => 0, "message" => "Request method is wrong!");
}

mysql_close($conn);
/* JSON Response */
header('Content-type: application/json');
echo json_encode($data);


?>
