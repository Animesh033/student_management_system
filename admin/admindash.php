<?php
session_start();
if (isset($_SESSION['uid'])) {
	echo " ";
}
else{
	header('location:../login.php');
}
?>
<?php
include('header.php');
?>
<div class="admintitle" align="center">
	<a href="../index.php" id="backto_dash">Back to Home</a>
	<h1>Welcome to Admin Dashboard</h1>
	<a href="../logout.php" id="logout">Logout</a>
</div>
<div class="dashboard">
	<ul>
		<li><a href="addstudent.php">Insert Student Details</a></li>
		<li><a href="updatestudent.php">Update Student Details</a></li>
		<li><a href="deletestudent.php">Delete Student Details</a></li>
	</ul>
</div>
<?php include('footer.php'); ?>