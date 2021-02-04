<?php
	if (isset($_GET['msg'])) {
		$to_email = trim($_GET['msg']);
	}
	if (!empty($email)) {
	if (isset($_POST['send_message'])) {
		$to_email = trim($_POST['to_email']);
		$to_msg = trim($_POST['to_message']);
		$fk_id = 0;
		if (!empty($to_email)&&!empty($to_msg)) {
			$dat = trim(date('Y-m-d'));
			$query = new DatabaseHelper();
			$sql = "INSERT INTO `messages`(`date`, `to_email`, `from`, `message`, `fk_id`) VALUES ('$dat','$to_email','$email','$to_msg','$fk_id')";
          	$result=$query->insertQuery($sql);
          	if ($result) {
          		$error_msg = "Message sent!";
          	}else{
          		$error_msg = "Message sending failed!!";
          	}
		}else{
			$error_msg = "Field can't be empty";
		}
	}
}else{
	$error_msg = "User Email not Found!!";
}
?>

<h2 class="content-subhead" style="text-align: center;">Message</h2>
	<div style="text-align: right;">
	<a href="message.php">
    <button type="submit" class="btn btn-danger" name="send_message">Back</button>
    </a>
    </div>
<hr style="border-style: inset;border-width: 1px;">

<div>
	<form class="form-horizontal" method="POST" action="" enctype="multipart/form-data">
		<div class="row">
			<?php if (!empty($error_msg)) {echo "<p style='color:red;'>$error_msg</p>";}?>
			<input type="email" class="form-control input-sm" name="to_email" placeholder="To: info@mail.com" value="<?php if (!empty($to_email)){echo $to_email;}?>">
		</div><br>
		<div class="row">
			<textarea class="form-control" rows="5" name="to_message" placeholder="Message"></textarea>
		</div>
		<br>
	<div style="text-align: right;">
    <button type="submit" class="btn btn-primary" name="send_message">Send</button>
    </div>
	</form>
</div>