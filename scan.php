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
$meetStatus = 0;
$convStatus = 0;

$db = new SQLite3('qr-quorum.db');
$result = $db->querySingle('SELECT * FROM quorum WHERE attID = '.$id, true);

if(count($result) > 0) {
	$meetStatus = $result['meetStatus'];
	$convStatus = $result['convStatus'];
}
switch ($clean['a']) {
	case 'in':
		$meetStatus = 1;
		break;
	case 'out':
		$meetStatus = 0;
		break;
	case 'at':
		header('Location: addForm.php?id='.$clean['id']);
die();
	case 'gone':
		$convStatus = 0;
		break;
}

if(count($result) > 0) {
	$db->exec("UPDATE quorum SET meetStatus = $meetStatus, convStatus = $convStatus WHERE attID = $id");
} else {
	$db->exec("INSERT INTO quorum (attID, meetStatus, convStatus) VALUES ($id,$meetStatus,$convStatus)");
}
$db->exec("INSERT INTO quorumHist (attID, meetStatus, convStatus) VALUES ($id,$meetStatus,$convStatus)");


header('Location: scan.html?a='.$clean['a']);
?>