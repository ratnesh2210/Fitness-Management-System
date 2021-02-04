<?php
$height = '';
$weight = '';
$heart_rate = '';
$workout = '';
$age = '';
$dat = '';
$error_msg = '';
if (!empty($email)) {
	if (isset($_POST['add'])) {
		$height = $_POST['height'];
		$weight = $_POST['weight'];
		$heart_rate = $_POST['heart_rate'];
		$workout = $_POST['workout'];
		$dob = $row['date_of_birth'];
		$age = calculateAge($dob);
		$dat = trim(date('Y-m-d'));
		if (!empty($height)&&!empty($weight)&&!empty($workout)&&!empty($age)) {
			if (empty($heart_rate)) {
				$heart_rate = getHeartRate($age);
			}
			$query = new DatabaseHelper();
			$sql = "INSERT INTO `user_activities`(`date`, `email`, `height`, `weight`, `heart_rate`, `workout`, `age`) VALUES ('$dat','$email','$height','$weight','$heart_rate','$workout','$age')";
			$result = $query->insertQuery($sql);
          	if ($result === TRUE) {
            	header("Location: user_activities.php");
          	}else{
            	$error_msg = "Something went Wrong!!!";
          	}
		}else{
			$error_msg = "Field Can't be empty.";
		}
	}
}
function calculateAge($dob){
		$birthdate = new DateTime($dob);
        $today   = new DateTime('today');
        $y = $birthdate->diff($today)->y;
        return $y;
}
function getHeartRate($age){
	return (220-$age);
}
?>
<h2 class="content-subhead" style="text-align: center;">Add Activities</h2>
<div style="text-align: right;">
<a href="user_activities.php" class="btn btn-danger btn-md">
   <span class="glyphicon glyphicon-minus"></span> Cancel
</a>	
</div>	
<hr style="border-style: inset;border-width: 1px;">
<div>
<form class="form-horizontal" method="POST" action="" enctype="multipart/form-data">
	<div class="row">
	<?php if (!empty($error_msg)) {echo "<p style='color:red;'>$error_msg</p>";}?>
		<div class="col-lg-6">
			<p>Enter your Height (CM):</p>
			<input type="number" class="form-control input-lg" name="height" placeholder="Height">
		</div>
		<div class="col-lg-6">
		<p>Enter your Weight (KG):</p>
			<input type="number" class="form-control input-lg" name="weight" placeholder="Weight">
		</div>
	</div><br>
	 <div class="row">
		<div class="col-lg-6">
			<p>Enter your Heart Rate / Minute:</p>
			<input type="number" class="form-control input-lg" name="heart_rate" placeholder="Heart Rate">
			<p>*If you don't know your heart rate , its better to leave this field.</p>
		</div>
		<div class="col-lg-6">
			<p>Enter your Workout Time:</p>
			<input type="counter" class="form-control input-lg" name="workout" placeholder="hh:mm:ss" value="hh:mm:ss">
		</div>
      </div>
      <br>
      <div style="text-align: right;">
    	<button type="submit" class="btn btn-primary btn-lg" name="add">Add</button>
    </div>
</form>
</div>
