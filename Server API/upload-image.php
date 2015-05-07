<?php
/* include db.config.php */
include_once('db_config.php');

if($_SERVER['REQUEST_METHOD'] == "POST"){
// Get image data
$id = isset($_POST['id']) ? mysql_real_escape_string($_POST['id']) : "";
$userId = isset($_POST['user_id']) ? mysql_real_escape_string($_POST['user_id']) : "";
$contactId = isset($_POST['contact_id']) ? mysql_real_escape_string($_POST['contact_id']) : "";
$face = isset($_POST['face']) ? mysql_real_escape_string($_POST['face']) : "";

// Save blob in face table
$query = "INSERT INTO face (id, user_id, contact_id, face) VALUES ('$id', '$userId', '$contactId', '$face')";
$insert = mysql_query($query);

if($insert){
$data = array("result" => 1, "message" => "Face successfully uploaded!");
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
