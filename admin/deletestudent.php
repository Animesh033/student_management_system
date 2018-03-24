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
<table align="center">
	<form action="deletestudent.php" method="post">
		<th>Standard</th><td><input type="text" name="stand" placeholder="Enter standard" required="required"></td>
		<th>Name</th><td><input type="text" name="stuname" placeholder="Enter student name" required="required"></td>
		<th><td><input type="submit" name="submit" value="Search"></td></th>
	</form>
</table>
<table align="center" border="1" width="80%" style="margin-top: 10px;">
	<tr>
		<th>No</th>
		<th>Name</th>
		<th>Roll No</th>
		<th>Standard</th>
		<th>Image</th>
		<th>City</th>
		<th>Parent Contact No</th>
		<th>Edit</th>
	</tr>
<?php	
	if(isset($_POST['submit'])){	
	$std = $_POST['stand'];
	$sname = $_POST['stuname'];
	include ('../dbcon.php');
	$sql = "SELECT * FROM `student` WHERE `std` = '$std' AND `name` LIKE '%$sname%'";
	$run = mysqli_query($con,$sql);
	echo "<pre>";
	// print_r($run);
	$row = mysqli_num_rows($run);
	// print_r($row);
		if ($row <1){
			echo "<tr><td colspan='8'>Record not found!</td></tr>";
		}
		else{
			$count=0;
			while ($data=mysqli_fetch_assoc($run)){
				$count++;
			?>
			<tr align="center">
				<td><?php echo $count; ?></td>
				<td><?php echo $data['name']; ?></td>
				<td><?php echo $data['rollno']; ?></td>
				<td><?php echo $data['std']; ?></td>
				<td><img src="../dataimg/<?php echo $data['image']; ?>" style="width:; height: 100px;"></td>
				<td><?php echo $data['city']; ?></td>
				<td><?php echo $data['pcno']; ?></td>
				<td><a href="deleteform.php?sid=<?php echo $data['id'];?>">Delete</a></td>
				
			</tr>
			<?php
			}
		}
	}
?>
</table>
<?php include('footer.php'); ?>
