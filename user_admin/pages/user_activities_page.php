<?php
	if (!empty($email)) {
		$query = new DatabaseHelper();
		$sql = "SELECT * FROM `user_activities` WHERE id = (SELECT MAX(id) FROM `user_activities` WHERE email = '$email')";
		$result = $query->runQuery($sql);
		if ($result->num_rows>0) {
			$max_row = $result->fetch_assoc();
			$bmi_status = calculateBMI($max_row);
		}
		}
		function calculateBMI($max_row){
		$bmi_height = ($max_row['height']/100);
		$bmi_weight = $max_row['weight'];
		$bmi_status = number_format((float)($bmi_weight/($bmi_height*$bmi_height)), 1, '.', '');
		return $bmi_status;
		}
?>
<h2 class="content-subhead" style="text-align: center;">User Activities</h2>
<div style="text-align: right;">
<a href="add_activities.php" class="btn btn-info btn-md">
   <span class="glyphicon glyphicon-plus"></span> Add Activities
</a>	
</div>	
<hr style="border-style: inset;border-width: 1px;">
<div>
	<div class="row">
		<div class="col-lg-6" style="text-align: center;">
			<canvas id="total_bmi" width="400" height="400"></canvas>
			<script type="text/javascript" src="../assets/javascript/linegraph.js"></script>
		</div>
		<div class="col-lg-6" style="text-align: center;">
			<table class="table table-bordered">
				BMI Table for Adults
    			<thead>
      				<tr>
        				<th>Category</th>
        				<th>BMI range (kg/m<sup>2</sup>)</th>
      				</tr>
    		</thead>
    		<tbody>
      			<tr class="<?php if ($bmi_status<16 && $bmi_status > 0) {echo 'danger';}?>">
        			<td>Severe Thinness</td>
        			<td>< 16</td>
      			</tr>
      			<tr class="<?php if ($bmi_status>=16&&$bmi_status<17) {echo 'danger';}?>">
        			<td>Moderate Thinness</td>
        			<td>16 - 17</td>
      			</tr>
      			<tr class="<?php if ($bmi_status>=17&&$bmi_status<18.5) {echo 'danger';}?>">
        			<td>Mild Thinness</td>
        			<td>17 - 18.5</td>
      			</tr>
      			<tr  class="<?php if ($bmi_status>=18.5&&$bmi_status<25) {echo 'danger';}?>">
        			<td>Normal</td>
        			<td>18.5 - 25</td>
      			</tr>
      			<tr  class="<?php if ($bmi_status>=25&&$bmi_status<30) {echo 'danger';}?>">
        			<td>Overweight</td>
        			<td>25 - 30</td>
      			</tr>
      			<tr  class="<?php if ($bmi_status>=30&&$bmi_status<35) {echo 'danger';}?>">
        			<td>Obese Class I</td>
        			<td>30 - 35</td>
      			</tr>
      			<tr class="<?php if ($bmi_status>=35&&$bmi_status<40) {echo 'danger';}?>">
        			<td>Obese Class II</td>
        			<td>35 - 40</td>
      			</tr>
      			<tr  class="<?php if ($bmi_status>=40) {echo 'danger';}?>">
        			<td>Obese Class III</td>
        			<td>> 40</td>
      			</tr>
    		</tbody>
  			</table>
		</div>
	</div>
<h2 class="content-subhead" style="text-align: center;">User Activity List</h2>
<hr style="border-style: inset;border-width: 1px;">

	<div>
	<?php 
		$query = new DatabaseHelper();
		$sql = "SELECT * FROM `user_activities` WHERE email = '$email' ORDER BY id DESC";
		$result = $query->runQuery($sql);
		while($activity_row=$result->fetch_array()){
			 $age = $activity_row['age'];
			 $weight = $activity_row['weight'];
			 $heart_rate = $activity_row['heart_rate'];
			 $time = $activity_row['workout'];
			 $date = $activity_row['date'];
	?>
	<div class="row" style="text-align: center;padding: 5px;color: black;">
		<div class="col-lg-3">
			<span class="glyphicon glyphicon-calendar" style="padding: 5px"></span>
			<?php echo $date;?>
		</div>
		<div class="col-lg-3">
			<span class="glyphicon glyphicon-scale" style="padding: 5px"></span>
			<?php echo $weight;?>
		</div>
		<div class="col-lg-3">
			<span class="glyphicon glyphicon-time" style="padding: 5px"></span>
			<?php echo $time;?>
		</div>
		<div class="col-lg-3">
			<span class="glyphicon glyphicon-fire" style="padding: 5px"></span>
			<?php
			$bfp = calculateBFP($age,$weight,$heart_rate,$time,$gender);
			echo $bfp." kcal";
			 ;?>
		</div>
	</div>
	<?php
		}
		function calculateBFP($age,$weight,$heart_rate,$time,$gender){
			$weight = $weight*2.20462262185;
			$parsed = date_parse($time);
			$seconds = $parsed['hour'] * 3600 + $parsed['minute'] * 60 + $parsed['second'];
			$time= $seconds/60;
			$e = 4.184;
			if ($gender=='Female') {
				$a = 0.074;
				$b = 0.05741;
				$c = 0.4472;
				$d = 20.4022;
			}else{
				$a = 0.2017;
				$b = 0.09036;
				$c = 0.6309;
				$d = 55.0969;
			}
			$result = (($age*$a)-($weight*$b)+($heart_rate*$c)-$d)*($time/$e);
			return number_format((float)($result/1000), 2, '.', '');
		}
	?>
	</div>
</div>