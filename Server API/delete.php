<?php

/* Deletes a contact from database by id */

/* include db.config.php */
include_once('db_config.php');

if($_SERVER['REQUEST_METHOD'] == "DELETE"){
// Get user id
$id = isset($_GET['id']) ? mysql_real_escape_string($_GET['id']) : "";

if(empty($id)){
$data = array("result" => 0, "message" => "Wrong id, please enter another.");
} else {
// get user data
$sql = "DELETE FROM contact WHERE id = '$id'";
$delete = mysql_query($sql);
if($delete){
$data = array("result" => 1, "message" => "Successfully deleted contact!");
} else {
$data = array("result" => 0, "message" => "Error!");
}
}
} else {
$data = array("result" => 0, "message" => "Request method is wrong!");
}

mysql_close($conn);
/* JSON Response */
header('Content-type: application/json');
echo json_encode($data);

?>