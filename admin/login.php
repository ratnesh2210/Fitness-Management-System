<?php
	session_start();
	include '../php/database_connection.php';
	$database_include = TRUE;
	include '../php/database_services.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin Login</title>
	<link href="../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="../assets/css/login.css">
</head>
<body class="container">
<?php
$error = 0;
if (!empty($_SESSION["admin_email"]) && !empty($_SESSION["admin_password"])) {
	//has email and password
	$email = $_SESSION["admin_email"];
	$password = $_SESSION["admin_password"];
	//check with database
	if (loginChecker($email,$password)) {
		header("Location: index.php");
	}else{
		$error = 101;//email or password not match
		unsetSession();
	}
	
}else{
	//hasn't email and password
	if(isset($_POST['login'])){
	$email = htmlspecialchars(strip_tags(trim($_POST['email'])));
	$password = hash('sha256',htmlspecialchars(strip_tags(trim($_POST['password']))));
		if(!empty($email) && !empty($password)){
			if (loginChecker($email,$password)) {
				$_SESSION["admin_email"] = $email;
				$_SESSION["admin_password"] = $password;
				header("Location: index.php");
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
	unset($_SESSION['admin_email']);
	unset($_SESSION['admin_password']);
}
function loginChecker($email,$password){
	$admin_table_name = 'admin';
	$login = new DatabaseHelper();
	$result=$login->checkLogin($admin_table_name,$email,$password);
	if ($result) {
		return TRUE;
	}else{
		return FALSE;
	}
}
?>
<section class="login-info">
<div class="container">
  <div class="row main">
       <div class="form-header">
          <h1 class="text-center ">Admin Login</h1>
        </div>
    <div class="main-content">
           <form  method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off"> 
           <?php if($error==101){
            		echo "<p class = 'error'>Email or password not match.</p>";
            		}elseif($error==102){
            		echo "<p class = 'error'>Input field can't be empty.</p>";
            		}
            ?>
          <div class="input-group ">
            <span class="input-group-addon"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span></span>
            <input id="email" type="text" class="form-control" name="email" placeholder="Enter your Email">
          </div>
          <div class="input-group">
            <span class="input-group-addon"><span class="glyphicon glyphicon-lock" aria-hidden="true"></span></span>
            <input id="password" type="password" class="form-control" name="password" placeholder="Enter your Password">
          </div>
        
         <div class="checkbox">
            <label class="remember">
                <input name="remember" type="checkbox" checked="true" > Remember Me
            </label>
        </div>
          
          <div class="form-group ">
              <input type="submit" name="login" value="Login" class="btn btn-danger btn-lg btn-block login-button">
          </div>
         </form>
      </div>
    </div>
</div>
</section>
			
</body>
</html>
<?php
	$connection->close();
?>