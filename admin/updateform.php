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
include ('../dbcon.php');
$sid = $_GET['sid'];
$sql = "SELECT * FROM `student` WHERE `id`='$sid'";
$run = mysqli_query($con, $sql);
$data = mysqli_fetch_assoc($run);

?>
<form action="updatedata.php" method="post" enctype="multipart/form-data">
	<table align="center">
		<tr>
			<td>Roll No</td>
			<td><input type="text" name="rollno" value="<?php echo $data['rollno']; ?>" required="required"></td>
		</tr>
		<tr>
			<td>Name</td>
			<td><input type="text" name="name" value="<?php echo $data['name']; ?>" required="required"></td>
		</tr>
		<tr>
			<td>City</td>
			<td><input type="text" name="city" value="<?php echo $data['city']; ?>" required="required"></td>
		</tr>
		<tr>
			<td>Parent's Contact No</td>
			<td><input type="text" name="cno" value="<?php echo $data['pcno']; ?>" required="required"></td>
		</tr>
		<tr>
			<td>Standard</td>
			<td><input type="number" name="std" value="<?php echo $data['std']; ?>" required="required"></td>
		</tr>
		<tr>
			<td>Image</td>
			<td><input type="file" name="img"></td>
		</tr>
		<tr>
			<input type="hidden" name="sid" value="<?php echo $data['id']; ?>">
			<td><input align="center" type="submit" name="submit" value="Submit"></td>
		</tr>
	</table>
</form>