<?php
$error = '';
if (!empty($_SESSION["user_email"]) && !empty($_SESSION["user_password"])) {
	//has email and password
	$email = $_SESSION["user_email"];
	$password = $_SESSION["user_password"];
	//check with database
	if (loginChecker($email,$password)) {
		header("Location: ./index.php");
	}else{
		$error = 101;//email or password not match
		unsetSession();
	}
	
}else{
	if (isset($_POST['login'])) {
		$email = htmlspecialchars(strip_tags(trim($_POST['email'])));
		$password = hash('sha256',htmlspecialchars(strip_tags(trim($_POST['password']))));
		if(!empty($email) && !empty($password)){
			
			if (loginChecker($email,$password)) {
				$_SESSION["user_email"] = $email;
				$_SESSION["user_password"] = $password;
				header("Location: user_admin/");
			}else{
				//error msg
				$error = 101;//email or password not match
				unsetSession();
			}
		}else{
				//field empty
				$error = 102;//input field empty
		}
	}
}
	function unsetSession(){
	unset($_SESSION['user_email']);
	unset($_SESSION['user_password']);
	}
	function loginChecker($email,$password){
	$admin_table_name = 'users';
	$login = new DatabaseHelper();
	$result=$login->checkLogin($admin_table_name,$email,$password);
	if ($result) {
		return TRUE;
	}else{
		return FALSE;
	}
}
?>
<div class="fh5co-contact animate-box">
		<div class="container">
			<div class="row">
				<div class="row  animate-box">
					<div class="col-md-3"></div>
					<div class="col-md-6">
					<u><h2>Provide correct User Name and Password</h2></u>
					<br><br>
					</div>
					<div class="col-md-3"></div>
				</div>
				<div class="row">
				</div>
				<div class="col-md-12">
				<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off"> 
           		<?php if($error==101){
            		echo "<p class = 'error'>Email or password not match.</p>";
            		}elseif($error==102){
            		echo "<p class = 'error'>Input field can't be empty.</p>";
            		}
            		?>
					<div class="row">
						<div class="row">
						<div class="col-md-3"></div>
						<div class="col-md-6">
							<div class="form-group">
								<input class="form-control" placeholder="Email" type="text" name="email">
							</div>
						</div> 
						<div class="col-md-3"></div>
						</div>

						<div class="row">
						<div class="col-md-3"></div>
						<div class="col-md-6">
							<div class="form-group">
								<input class="form-control" placeholder="Password" type="password" name="password">
							</div>
						</div>
						<div class="col-md-3"></div>
						</div>

						<div class="row">
							<div class="col-md-3"></div>
							<div class="col-md-6">
							<div class="form-group">
								<input value="Log In" class="btn-primary" type="submit" name="login">
							</div></div>
							<div class="col-md-3"></div>
						</div>
					</div>
				</form>
				</div>
			</div>
		</div>	
	</div>

