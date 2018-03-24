<?php
include('../dbcon.php');
if (isset($_POST['submit'])) {
	$rollno = $_POST['rollno'];
	$sname = $_POST['name'];
	$scity = $_POST['city'];
	$pcno = $_POST['cno'];
	$std = $_POST['std'];
	$id = $_POST['sid'];
	$imgname = $_FILES['img']['name'];
	$tempimgname = $_FILES['img']['tmp_name'];
	move_uploaded_file($tempimgname, "../dataimg/$imgname");

	$qry = "UPDATE `student` SET `rollno`='$rollno',`name`='$sname',`city`='$scity',`pcno`='$pcno',`std`='$std',`image`='$imgname' WHERE `id`='$id'";
	$run = mysqli_query($con,$qry);
	if($qry==true){
		?>
		<script>
			alert('Data Updated Successfully!');
			window.open('updateform.php?sid=<?php echo $id; ?>','_self');
		</script>
		<?php
	}
}
?>