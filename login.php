<?php 
	session_start();
	if (isset($_SESSION['uid'])) {
		header('location:admin/admindash.php');
	}
?>
<!DOCTYPE html>
<html lang="en_US">
<head>
	<meta charset="utf-8">
	<title>Admin Login</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<a href="index.php" style="position: absolute; top:20px; left: 30px;">Back to Home</a>
	<h1 align="center">Admin Login</h1>
	<form action="login.php" method="post">
		<table align="center" border="1">
			<tr>
				<td>User Name</td>
				<td><input type="text" name="uname" required="required"></td>
			</tr>
			<tr>	
				<td>Password</td>
				<td><input type="password" name="pass" required="required"></td>
			</tr>
			<tr>
				<td colspan="2" align="center"><input type="submit" name="login" value="Login"></td>
			</tr>
		</table>
	</form>
</body>
</html>
<?php
include('dbcon.php');
if (isset($_POST['login'])) {
	$username = $_POST['uname'];

	$password = $_POST['pass'];

	$qry = "SELECT * FROM `administrator` WHERE `username`='$username' AND `password`='$password'";
	$run = mysqli_query($con,$qry);
	$row = mysqli_num_rows($run);
	if ($row <1) {
		?>
		<script>
			alert('Username or Password not matched!');
			window.open('login.php', '_self');
		</script>
		<?php
	}
	else{
		$data = mysqli_fetch_assoc($run);
		$id=$data['id'];
		$_SESSION['uid'] = $id;
		header('location:admin/admindash.php');
	}
}
?>