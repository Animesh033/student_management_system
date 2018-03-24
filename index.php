<!DOCTYPE html>
<html lang="en_US">
<head>
	<meta charset="utf-8">
	<title>Student Management System</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<h3 align="right"><a href="login.php">Admin Login</a></h3>
<h1 align="center">Welcome to Student Management System</h1>
<form action="index.php" method="post">
	<table width="30%" align="center" border="1">
		<tr>
			<td colspan="2" align="center">Student Information</td>
		</tr>
		<tr>
			<td>Choose Standard</td>
			<td>
				<select name="Standard" required="required">
					<option value="1st">1st</option>
					<option value="2nd">2nd</option>
					<option value="3rd">3rd</option>
					<option value="4th">4th</option>
					<option value="5th">5th</option>
					<option value="6th">6th</option>
					<option value="7th">7th</option>
					<option value="8th">8th</option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Enter Rollno</td>
			<td><input type="text" name="rollno" required="required"></td>
		</tr>
		<tr>
			<td colspan="2" align="center"><input type="submit" name="submit" value="Show Info"></td>
		</tr>
	</table>
</form>
<?php 
if (isset($_POST['submit'])) {
	$std = $_POST['Standard'];
	$rno = $_POST['rollno'];
	include ('dbcon.php');
	include ('function.php');
	show($std,$rno);
}
?>
</body>
</html>