<?php
$title = '';
$message = '';
$error_msg = '';
$flag = FALSE;
	if (!empty($email)) {
		//if (!isset($_POST['feedback_submit'])) {
			$table_name = 'feedback';
			$query = new DatabaseHelper();
			$result  = $query->retrieveData($table_name,$email);
			if ($result!=0) {
			$title = $result['title'];
			$message = $result['message'];
			$flag = TRUE;
			}
		//}
		if (isset($_POST['feedback_submit'])) {
			$title = $_POST['title'];
			$message = $_POST['message'];
			if (!empty($title)&&!empty($message)) {
				$query = new DatabaseHelper();
				if ($flag) {
					//update
					$sql = "UPDATE `feedback` SET `title`= '$title',`message`= '$message' WHERE email = '$email'";
				}else{
					//insert
					$sql = "INSERT INTO `feedback`(`email`, `title`, `message`) VALUES ('$email','$title','$message')";
				}
				$result  = $query->runQuery($sql);
				if (!$result) {
					$error_msg = "Something went wrong!!";
				}else{
					$error_msg = "Successfull!!";
					header("refresh: 2");
				}
			}else{
				$error_msg = "Field can't be empty!!";
			}
		}
		
	}
?>

<h2 class="content-subhead" style="text-align: center;">Feedback</h2>
	<div style="text-align: right;">
	<a href="index.php">
    <button type="submit" class="btn btn-danger" name="send_message">Back</button>
    </a>
    </div>
<hr style="border-style: inset;border-width: 1px;">

<div>
	<form class="form-horizontal" method="POST" action="" enctype="multipart/form-data">
		<div class="row">
			<?php if (!empty($error_msg)) {echo "<p style='color:red;'>$error_msg</p>";}?>
			<input type="text" class="form-control input-sm" name="title" placeholder="Title" value="<?php if (!empty($title)){echo $title;}?>">
		</div><br>
		<div class="row">
			<textarea class="form-control" rows="5" name="message" placeholder="Message"><?php if (!empty($message)){echo $message;}?></textarea>
		</div>
		<br>
	<div style="text-align: right;">
    <button type="submit" class="btn btn-primary" name="feedback_submit"><?php if($flag){echo "Update Feedback";}else{echo "Submit";}?></button>
    </div>
	</form>
</div>