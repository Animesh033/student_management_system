<?php
function show($std,$rno){
	include('dbcon.php');
	$sql="SELECT * FROM `student` WHERE `std`='$std' AND `rollno`='$rno'";
	$run=mysqli_query($con,$sql);
	if (mysqli_num_rows($run)>0) {
		$data=mysqli_fetch_assoc($run);
		?>
		<table align="center" style="width: 50%; margin-top: 20px;" border="1">
			<tr>
				<th colspan="3">Student Details</th>
			</tr>
			<tr>
				<td rowspan="5"><img src="dataimg/<?php echo $data['image'];?>" style="width:150px; height: 120px; padding-left: 150px;"></td>
				<th>Roll No</th>
				<td><?php echo $data['rollno']; ?></td>
			</tr>
			<tr>
				<th>Name</th>
				<td><?php echo $data['name']; ?></td>
			</tr>
			<tr>
				<th>City</th>
				<td><?php echo $data['city']; ?></td>
			</tr>
			<tr>
				<th>Parent's no</th>
				<td><?php echo $data['pcno']; ?></td>
			</tr>
			<tr>
				<th>Standard</th>
				<td><?php echo $data['std']; ?></td>
			</tr>

		</table>
		<?php
	}
	else{
		echo "Record not found!";
	}

}

?>