<?php
$plan = 'pro';
$error_msg = '';
$email = '';
if(isset($_SESSION['user_email'])&&isset($_SESSION['user_password'])){
	unsetSession();
	$plan = $_GET['plan'];
	header("Location: ./registration.php?plan=$plan");
}
if(!empty($_GET['plan'])&&!isset($_POST['registration'])){
	$plan = $_GET['plan'];
}
if(isset($_POST['registration'])){
	$email = htmlspecialchars(strip_tags(trim($_POST['email'])));
	$password = hash('sha256',htmlspecialchars(strip_tags(trim($_POST['password']))));
	$repassword = hash('sha256',htmlspecialchars(strip_tags(trim($_POST['re-password']))));
	$plan = htmlspecialchars(strip_tags(trim($_POST['r-plan'])));
	if(!empty($email) && !empty($password)&& !empty($repassword) && !empty($plan)){
			$table_name = 'users';
			$reg = new DatabaseHelper();
			$sql = "SELECT * FROM `$table_name` WHERE email = '$email'";
			$result=$reg->runQuery($sql);
		if($result){
			if($password==$repassword){
				$sql = "INSERT INTO `users`(`email`, `password`) VALUES ('$email','$password')";
				$result=$reg->runQuery($sql);
				if($result){
					$sql = "INSERT INTO `users_plan`(`email`, `plan`) VALUES ('$email','$plan')";
					$result=$reg->runQuery($sql);
					if($result){
					//successfull
					$_SESSION['user_email'] = $email;
					$_SESSION['user_password'] = $password;
					header("Location: user_admin/user_profile.php");
					}else{
					$error_msg = 'something went wrong';
				}
				}else{
					$error_msg = 'something went wrong';
				}
			}else{
				$error_msg = 'password not match';
			}
		}else{
			$error_msg = 'email already taken try another one';
			$email='';
		}
	}else{
		$error_msg = 'input field empty';
	}
}
	function unsetSession(){
	unset($_SESSION['user_email']);
	unset($_SESSION['user_password']);
	}
?>

<div class="fh5co-contact animate-box">
<div class="container">
	<div class="col-md-12  animate-box" style="text-align:center;">
	<u><h2>Registration Form</h2></u>
	</div>
<div class="row">
<div class="col-md-2"></div>
<div class="col-md-8">
<form class="form-horizontal" method="POST" action="" enctype="multipart/form-data">
<div class="row">
  <?php if(!empty($error_msg)){echo "<p style='color:red;'>$error_msg</p>";}?>

	<div class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
    <input type="email" class="form-control input-lg" name="email" placeholder="Email" value="<?php echo $email;?>">
  	</div>

	<div class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
    <input type="password" class="form-control input-lg" name="password" placeholder="Password">
  	</div>


	<div class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
    <input type="password" class="form-control input-lg" name="re-password" placeholder="Re-Password">
  	</div>
	</div>
	<hr>
	<div class="row">
	<div class="row">
	<div class="col-md-12" style="font-weight:bold;">Select your Plan:</div>
	</div>
    <div class="col-md-3">
	<div class="radio-inline">
      <label><input type="radio" name="r-plan" <?php if($plan=='starter'){echo 'checked';}?> value="starter">STARTER</label>
    </div>
	</div>
	<div class="col-md-3">
    <div class="radio-inline">
      <label><input type="radio" name="r-plan" <?php if($plan=='basic'){echo 'checked';}?> value="basic">BASIC</label>
    </div>
	</div>
	<div class="col-md-3">
    <div class="radio-inline">
      <label><input type="radio" name="r-plan" <?php if($plan=='pro'){echo 'checked';}?>  value="pro">PRO</label>
    </div>
	</div>
	<div class="col-md-3">
	<div class="radio-inline">
      <label><input type="radio" name="r-plan" <?php if($plan=='unlimited'){echo 'checked';}?>  value="unlimited">UNLIMITED</label>
    </div>
	</div>
	</div>
    <br>
    <div style="text-align: left;">
    <button type="submit" class="btn btn-primary" name="registration">Registration</button>
    </div>
</form>
</div>
<div class="col-md-2"></div>
</div>
</div>
</div>