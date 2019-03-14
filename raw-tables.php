<?php
echo '<pre>';
echo 'QUORUM';
echo "\r\n";
$db = new SQLite3('qr-quorum.db');
$result = $db->query('SELECT * FROM quorum');
while ($row = $result->fetchArray()) {
	var_dump($row);
}
echo "\r\n";
echo 'QUORUM-HIST';
echo "\r\n";
$result = $db->query('SELECT * FROM quorumHist');
while ($row = $result->fetchArray()) {
	var_dump($row);
}
echo '</pre>';
?>