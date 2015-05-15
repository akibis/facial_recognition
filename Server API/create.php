<?php
/* include db.config.php */
include_once('db_config.php');
include_once('create_id.php');

if($_SERVER['REQUEST_METHOD'] == "POST"){
// Get post data
$id = createUniqueId("contact");
$userId = isset($_POST['user_id']) ? mysql_real_escape_string($_POST['user_id']) : "";
$contactId = isset($_POST['contact_id']) ? mysql_real_escape_string($_POST['contact_id']) : "";
$firstName = isset($_POST['first_name']) ? mysql_real_escape_string($_POST['first_name']) : "";
$lastName = isset($_POST['last_name']) ? mysql_real_escape_string($_POST['last_name']) : "";
$phone = isset($_POST['phone']) ? mysql_real_escape_string($_POST['phone']) : "";
$address = isset($_POST['address']) ? mysql_real_escape_string($_POST['address']) : "";

$matchFound = 0; // Contact found state is set to false by default
// Save data into database
$query = "INSERT INTO contact (id, user_id, contact_id, first_name, last_name, phone, address, match_found) VALUES ('$id', '$userId', '$contactId', '$firstName', '$lastName', '$phone', '$address', '$match_found')";
$insert = mysql_query($query);

if($insert){
$data = array("result" => 1, "message" => "Contact successfully added!");
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
