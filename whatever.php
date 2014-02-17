<?php
$buttonName = "Melissa Whatever-ed Me";
if (!file_exists('DB.php')) {
	$message = 'ERROR: Cannot find database file';
}else {
	include('DB.php');
	if (!isset($money)) {
		$money = 0.0;
	}
	if (isset($_POST['action'])) {
		if($_POST['action'] == "Reset") {
			$money = 0.0;
		}
		elseif ($_POST['action'] == $buttonName) {
			$money = $money +0.25;
		}
		else {
			$message = 'invalid post';
		}
		$money_str = var_export($money, true);
		$DBtext = "<?php\n\n\$money = $money_str;\n\n?>";
		file_put_contents('DB.php', $DBtext);
	
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
	<head profile="http://www.w3.org/2005/10/profile">
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
		<title>WHATEVER, KEVIN</title>
		<link href="file://localhost/Users/maseinyourface/Desktop/whatever.css" rel="stylesheet"/>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>		
		<script src="file://localhost/Users/maseinyourface/Desktop/whatever.js"></script>
	</head>
	<body>
		<div class="main">
			<h1>Whatever Jar</h1>
			<p class="owes">Melissa currently owes: <?php echo($money);?></p>
			<div id="jar">
			<form action="whatever.php" method="post">
				<input type="submit" name="action" value=<?php echo('"' . $buttonName.'"');?>/>
				<input type="submit" name="action" value="Reset"/>
			</form>	
			</div>
		</div>
	</body>
</html>