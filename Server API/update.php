<?php

/* updates contact by id */

/* include db.config.php */
include_once('db_config.php');

if($_SERVER['REQUEST_METHOD'] == "PUT"){

$id = isset($_SERVER['HTTP_ID']) ? mysql_real_escape_string($_SERVER['HTTP_ID']) : "";
$userId = isset($_SERVER['HTTP_USER_ID']) ? mysql_real_escape_string($_SERVER['HTTP_USER_ID']) : "";
$contactId = isset($_SERVER['HTTP_CONTACT_ID']) ? mysql_real_escape_string($_SERVER['HTTP_CONTACT_ID']) : "";
$firstName = isset($_SERVER['HTTP_FIRST_NAME']) ? mysql_real_escape_string($_SERVER['HTTP_FIRST_NAME']) : "";
$lastName = isset($_SERVER['HTTP_LAST_NAME']) ? mysql_real_escape_string($_SERVER['HTTP_LAST_NAME']) : "";
$phone = isset($_SERVER['HTTP_PHONE']) ? mysql_real_escape_string($_SERVER['HTTP_PHONE']) : "";
$address = isset($_SERVER['HTTP_ADDRESS']) ? mysql_real_escape_string($_SERVER['HTTP_ADDRESS']) : "";

if(!empty($id)){
// Update data into database
$query = "UPDATE contact SET user_id = '$userId', contact_id = '$contactId', first_name = '$firstName', last_name = '$lastName', phone = '$phone', address = '$address' WHERE id = '$id'";
$update = mysql_query($query);

if($update){
$data = array("result" => 1, "message" => "Contact updated successfully!");
} else {
$data = array("result" => 0, "message" => "Error!");
}
} else {
$data = array("result" => 0, "message" => "Wrong id, please enter another.");
}
} else {
$data = array("result" => 0, "message" => "Request method is wrong!");
}

mysql_close($conn);
/* JSON Response */
header('Content-type: application/json');
echo json_encode($data);

?>
