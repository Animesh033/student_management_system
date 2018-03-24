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
include('titlehead.php');
?>
<form action="addstudent.php" method="post" enctype="multipart/form-data">
	<table align="center">
		<tr>
			<td>Roll No</td>
			<td><input type="text" name="rollno" placeholder="Enter roll no " required="required"></td>
		</tr>
		<tr>
			<td>Name</td>
			<td><input type="text" name="name" placeholder="Enter name" required="required"></td>
		</tr>
		<tr>
			<td>City</td>
			<td><input type="text" name="city" placeholder="Enter city" required="required"></td>
		</tr>
		<tr>
			<td>Parent's Contact No</td>
			<td><input type="text" name="cno" placeholder="Parent's Contact No" required="required"></td>
		</tr>
		<tr>
			<td>Standard</td>
			<td><input type="number" name="std" placeholder="Enter Standard" required="required"></td>
		</tr>
		<tr>
			<td>Image</td>
			<td><input type="file" name="img" required="required"></td>
		</tr>
		<tr>
			<td><input align="center" type="submit" name="submit" value="Submit"></td>
		</tr>
	</table>
</form>
<?php
include('../dbcon.php');
if (isset($_POST['submit'])) {
	$rollno = $_POST['rollno'];
	$sname = $_POST['name'];
	$scity = $_POST['city'];
	$pcno = $_POST['cno'];
	$std = $_POST['std'];
	$imgname = $_FILES['img']['name'];
	$tempimgname = $_FILES['img']['tmp_name'];
	move_uploaded_file($tempimgname, "../dataimg/$imgname");
	// echo $rollno;
	// echo $sname;
	// echo $scity;
	// echo $pcno;
	// echo $std;

	$qry = "INSERT INTO `student`(`rollno`, `name`, `city`, `pcno`, `std`, `image`) VALUES ('$rollno','$sname','$scity','$pcno','$std','$imgname')";
	$run = mysqli_query($con,$qry);
	if($qry==true){
		?>
		<script>
			alert('Data Inserted Successfully!');
		</script>
		<?php
	}
}
?>
<?php include('footer.php'); ?>
