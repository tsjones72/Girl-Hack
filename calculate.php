<?php
	$num1 = $_POST ['num1'];
	$num2 = $_POST ['num2'];
	$name = $_POST ['myName'];
	$error = '';
	$protein = $_POST['foodProtein'];
	$carbs = $_POST['foodCarbs'];
	$fiber = $_POST['foodFiber'];
	$fat = $_POST['foodFat'];
	
	if (!is_numeric($num1)) {
		$error .= "Number 1 should be an number.<br />";
	}
	
	if (!is_numeric($num2)) {
		$error .= "Number 2 should be an number.<br />";
	}
	
	if ( $name == '' || $name == null ) {
		$error .= "Name should not be blank.";
	}
	
	function sum($number1, $number2) {
		return $number1 + $number2;
	}
	
	if($error == '') {
		$sum = sum($num1, $num2);
		$db = mysql_connect('127.0.0.1:3306', 'root');
		mysql_select_db('girl_dev_class', $db);
		mysql_query("INSERT INTO sumResults(sum, name) VALUES ($sum, \"$name\");", $db) or die(mysql_error());	
	}
?>

<html>
	<head>
		<title>My Result</title>
	</head>
	<body>
		<h1>My Form</h1>
		<?php 
			if($error == ''){ 
				echo "<h1>Your sum is $sum </h1>";
			} 
			else {
				echo "<h1>Error: $error </h1>";
			}
		?>
				
		<a href="index.php">Try Again</a>
	</body>
</html>