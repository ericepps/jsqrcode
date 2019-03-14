<html>
  <head>
    <title>Instascan &ndash; Demo</title>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/webrtc-adapter/3.3.3/adapter.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.1.10/vue.min.js"></script>
    <script type="text/javascript" src="instascan.min.js"></script>
	<link href="style.css" rel="stylesheet">
	<meta content="width=device-width, initial-scale=0.5" name="viewport"/>
  </head>
  <body>
    <div id="app">
      <div class="sidebar">
		<section class="actions">
			<h2>Actions</h2>
			<ul>
				<li><a href="scan.html?a=in" id="in">Scan IN Meeting</a></li>
				<li><a href="scan.html?a=out" id="out">Scan OUT Meeting</a></li>
				<li><a href="scan.html?a=at" id="at">Register at Convention (Voting)</a></li>
			</ul>
			<form action="add.php" method="get">
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
				echo '<input type="hidden" name="id" value="'.$clean['id'].'"/>';
				?>
				<label>Name: <input type="text" name="name" /></label>
				<input type="submit"/>
			</form>
		</section>
		</div></div>
  </body>
</html>
