<?php
$db = new SQLite3('qr-quorum.db');
$count=-1;
$id=$_POST['id'];
$db->exec("INSERT INTO quorum (attID, attCount) VALUES ($id,$count)");
header('Location: scan.php?id='.$id)
?>