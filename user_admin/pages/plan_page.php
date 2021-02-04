<?php
$plan = '';
$flag = FALSE;
if (!empty($email)) {
	$table_name = 'users_plan';
	$query = new DatabaseHelper();
	$result = $query->retrieveData($table_name,$email);
	if ($result!=0) {
		$plan = $result['plan'];
		$flag = TRUE;
	}
}
if (!empty($email)&&isset($_POST['update'])) {
	$plan = trim($_POST['plan']);
	if (!empty($plan)) {
		$query = new DatabaseHelper();
		if ($flag) {
			//update
			$sql = "UPDATE `users_plan` SET `plan`= '$plan' WHERE email = '$email'";
		}else{
			//insert
			$sql = "INSERT INTO `users_plan`(`email`, `plan`) VALUES ('$email', '$plan')";
		}
		$result = $query->insertQuery($sql);
		if ($result) {
			header("Location: ./plan.php");
		}else{
			//error
		}
	}
}

?>


<h2 class="content-subhead" style="text-align: center;">Price Planing</h2>
<hr style="border-style: inset;border-width: 1px;">

<div>
	<form class="form-horizontal" method="POST" action="" enctype="multipart/form-data">
	      <div class="row">
        <div class="col-lg-3">
          <div class="radio-inline">
            <label><input type="radio" name="plan" value="starter" <?php if($plan=='starter'){echo 'checked';}?>>STARTER</label>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="radio-inline">
            <label><input type="radio" name="plan" value="basic" <?php if($plan=='basic'){echo 'checked';}?> >BASIC</label>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="radio-inline">
            <label><input type="radio" name="plan" value="pro" <?php if($plan=='pro'){echo 'checked';}?>>PRO</label>
          </div>
        </div>
         <div class="col-lg-3">
          <div class="radio-inline">
            <label><input type="radio" name="plan" value="unlimited" <?php if($plan=='unlimited'){echo 'checked';}?>>UNLIMITED</label>
          </div>
        </div>
      </div>
          <div style="text-align: left;">
    <button type="submit" class="btn btn-default" name="update"><?php if($flag){echo 'Update';}else{echo 'Save';}?></button>
    </div>
      </form>
</div>