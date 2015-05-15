<?php
/* include db.config.php */
include_once('db_config.php');
include_once('create_id.php');

if($_SERVER['REQUEST_METHOD'] == "POST"){
// Get image data
$id = createUniqueId("face");
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

// TEST QUERY
//$img = mysql_query("SELECT face FROM face WHERE id = '1'");

//echo '<img src="data:image/x-ms-bmp;base64,' . $img . '" />';

?>
