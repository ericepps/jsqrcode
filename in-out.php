<?php
$db = new SQLite3('qr-quorum.db');
$count=$_GET['va'] * $_GET['io'];
$id=$_GET['id'];
$db->exec("INSERT INTO quorum (attID, attCount) VALUES ($id,$count)");
?>