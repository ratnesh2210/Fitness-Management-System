<?php
$total = '';
$current = '';
$last = '';
if (!empty($email)) {
	$current_month = dateT(0);
	$last_month = $today = dateT(-1);
	$total_sql = "SELECT SUM(amount) AS total FROM payment";
	$current_sql = "SELECT SUM(amount) AS total FROM payment WHERE payment_month = '$current_month'";
	$last_sql = "SELECT SUM(amount) AS total FROM payment WHERE payment_month = '$last_month'";
	$total = totalData($total_sql);
	$current = totalData($total_sql);
	$last = totalData($last_sql);
	
}
function totalData($sql){
	$query = new DatabaseHelper();
	$result = $query->runQuery($sql);
	$row = $result->fetch_assoc();
	if (!empty($row['total'])) {
	return $row['total'];
}else{
	return 0;
}
}
function dateT($i){
	$today = new DateTime();
	$y = $today->format("Y");
	$m = $today->format("m")+$i;
	return $y."-".$m."-01";
}
?>
<h2 class="content-subhead" style="text-align: center;">Account Information</h2>
<hr style="border-style: inset;border-width: 1px;">
<div>
  <div class="row">
    <div class="col-lg-8" style="padding-bottom: 10px;">
    <script src="../assets/javascript/chart.min.js"></script>
      <canvas id="income_by_month" width="400" height="400"></canvas>
      <script type="text/javascript" src="../assets/javascript/income_graph.js"></script>
    </div>
    <div class="col-lg-4">
      <div class="table-responsive">          
  		<table class="table table-bordered">
  		<div style="text-align: center;font-weight: bold;">
  			Income
  		</div>
      		<tr>
        		<td>Last Month:</td>
        		<td><?php echo $last;?></td>
      		</tr>
      		<tr>
        		<td>Current Month:</td>
        		<td><?php echo $current;?></td>
      		</tr>
      		<tr>
        		<td>Total:</td>
        		<td><?php echo $total;?></td>
      		</tr>
  		</table>
  	  </div>
    </div>
  </div>
</div>









