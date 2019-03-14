<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="refresh" content="5;url=https://ericepps.me/qr-quorum/show-count.php" />
	<link href="style.css" rel="stylesheet">
	<meta content="width=device-width, initial-scale=1.0" name="viewport"/>

<title>Business Meeting Count</title>
</head>

<body>
	<section>
	<h2>Vote Counts</h2>
<?php
$db = new SQLite3('qr-quorum.db');
$result = $db->querySingle('SELECT SUM(meetStatus) AS present FROM quorum');
$voteSimple = round(($result * .5) );
$voteTwoThirds = round($result * .67);
$voteThreeFourths = round($result * .75);
echo '<ul style="font-size:1.25em;">';
echo '<li>Total Present: <strong>'.$result.'</strong></li>';
echo '<li>Majority Vote (50%): <strong>'.$voteSimple.'</strong></li>';
//echo '<li>Two-Thirds Vote (67%): <strong>'.$voteTwoThirds.'</strong></li>';
//echo '<li>Three-Fourths Vote (75%): <strong>'.$voteThreeFourths.'</strong></li>';
echo '</ul>';

echo '<h2>Present in Room</h2>';
//$result2 = $db->query('SELECT attName FROM quorum WHERE meetStatus = 1 ORDER BY id DESC');
$result2 = $db->query('SELECT attName FROM quorum WHERE meetStatus = 1 ORDER BY attName');
echo '<table>';
echo '<tr><td style="column-count:7">';
while ($row = $result2->fetchArray()) {
	echo '<p>'.$row['attName'].'</p>';
}
echo '</td></tr>';
echo '</table>';
echo '<p>&nbsp;</p>';
echo '<h2>Registered at Convention</h2>';
//$result2 = $db->query('SELECT attName FROM quorum WHERE meetStatus = 1 ORDER BY id DESC');
$result3 = $db->query('SELECT attName FROM quorum ORDER BY attName');
echo '<table>';
echo '<tr><td style="column-count:7">';
while ($row = $result3->fetchArray()) {
	echo '<p>'.$row['attName'].'</p>';
}
echo '</td></tr>';
echo '</table>';
		?>
</section>	</body>
</html>