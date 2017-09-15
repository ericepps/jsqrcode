<?php
$db = new SQLite3('qr-quorum.db');

//$db->exec('CREATE TABLE quorum (id INTEGER PRIMARY KEY, attID INTEGER, attCount INTEGER, timeStamp DATETIME DEFAULT CURRENT_TIMESTAMP)');
$db->exec("INSERT INTO quorum (attID, attCount) VALUES (7,7)");
$db->exec("INSERT INTO quorum (attID, attCount) VALUES (3,-3)");

$result = $db->query('SELECT SUM(attCount) FROM quorum');
while ($row = $result->fetchArray()) {
    var_dump($row);
}
?>