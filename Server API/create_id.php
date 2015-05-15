<?php
// takes table name
// returns the next unique id used in record selection for that table
function createUniqueId($tableName) {
	//echo "table name: " .  $tableName . "<br>";
	$sql = "SELECT MAX(id) AS id FROM " . $tableName;
	$select = mysql_query($sql);
	$id;
	while ($row = mysql_fetch_assoc($select)) {
		//echo $row["id"] . "<br>";
		$id = $row["id"];
	}	
	//echo "id: " . ($id + 1);
	mysql_close($conn);
	
	return $id + 1;
}



?>
