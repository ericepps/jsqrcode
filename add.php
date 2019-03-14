<?php
foreach($_GET as $key=>$value) {
    if (is_array($value)) {
		foreach($value as $key2=>$value2) {
			$clean[$key][$key2]=htmlspecialchars($value2);
		}
	} else {
		$clean[$key]=htmlspecialchars($value);
	}
}
$id = $clean['id'];
$attName = $clean['name'];
$meetStatus = 0;
$convStatus = 0;

$db = new SQLite3('qr-quorum.db');

$db->exec("UPDATE quorum SET attName = '$attName', meetStatus = $meetStatus, convStatus = $convStatus WHERE attID = $id");

header('Location: scan.html?a='.$clean['a']);
?>