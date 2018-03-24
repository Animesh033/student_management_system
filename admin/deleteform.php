<?php
include('../dbcon.php');
	
	// $id = $_GET['sid']; OR
	$id = $_REQUEST['sid'];
	
	$qry = "DELETE FROM `student` WHERE `id`='$id'";
	$run = mysqli_query($con,$qry);
	if($qry==true){
		?>
		<script>
			alert('Data deleted Successfully!');
			window.open('deletestudent.php','_self');
		</script>
		<?php
	}
?>