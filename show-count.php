<?php
$db = new SQLite3('qr-quorum.db');
$result = $db->querySingle('SELECT SUM(attCount) AS present FROM quorum');
echo $result;
?>