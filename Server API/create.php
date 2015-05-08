<?php
/* include db.config.php */
include_once('db_config.php');

// Get user id
$id = isset($_GET['id']) ? mysql_real_escape_string($_GET['id']) : "";

if(empty($id)){
$data = array("result" => 0, "message" => "Wrong or no user ID specified, please try again! Usage: select.php?id='id_number'");
} else {
// get user data
$sql = "SELECT * FROM contact WHERE id='$id'";
$select = mysql_query($sql);
$result = array();
while($data = mysql_fetch_assoc($select)) {
$result[] = $data;
}

$data = array("result" => 0, "data" => $result);
}

mysql_close($conn);
/* JSON Response */
header('Content-type: application/json');
echo json_encode($data);

?>
