<?php
$buttonName = "Melissa Whatever-ed Me";					//Name of the button to add a quarter
$message = '';
//If the database file cannot be found, display an error message
if (!file_exists('DB.php')) {
	$message = $message . 'ERROR: Cannot find database file';
}else {
	include('DB.php');			//Gets the db file with all variables
	
	// If there is no $money variable in the DB, set it to 0
	if (!isset($money)) {
		$money = 0.0;
	}
	
	// If a button was pushed
	if (isset($_POST['action'])) {
		
		// If the reset button was pushed, set $money back to 0
		if($_POST['action'] == "Reset") {
			$money = 0.0;
		}
		
		// If the add quarter button was pushed, add .25 to the variable
		elseif ($_POST['action'] == $buttonName) {
			$money = $money +0.25;
		}
		
		// If this is reached, there something went wrong/someone is hacking
		else {
			$message = $message . 'invalid post request';
		}
		
		// Save the new value of $money to the DB
		$money_str = var_export($money, true);				//turns $money into a string
		$DBtext = "<?php\n\n\$money = $money_str;\n\n?>";	//creates the text that will be in the DB file
		file_put_contents('DB.php', $DBtext);				//saves the text to the DB file
		
		/*
		 * This line redirects to the current page. Without the redirect, reloading the 
		 * page will cause a resubmission of whatever the last submit was
		 */ 
		header('Location: whatever.php');					
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
			<p class="error_msg"><?php echo($message);?></p>
			<p class="owes">Melissa currently owes: $<?php echo(number_format($money,2));?></p>
			<div id="jar">
			<form action="whatever.php" method="post">
				<input type="submit" name="action" value=<?php echo('"' . $buttonName.'"');?>/>
				<input type="submit" name="action" value="Reset"/>
			</form>	
			</div>
		</div>
	</body>
</html>