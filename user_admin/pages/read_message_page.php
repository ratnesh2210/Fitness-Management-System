<?php
if (isset($_GET['msg'])) {
	$id = $_GET['msg'];
	if (!empty($email)) {
		$query = new DatabaseHelper();
		$sql = "SELECT * FROM `messages` WHERE (id = '$id' AND to_email = '$email')";
		$result = $query->runQuery($sql);
		if ($result) {
			$row = $result->fetch_assoc();
			$from = $row['from'];
			$msg = $row['message'];
			if($row['status']==0){
				$sql = "UPDATE `messages` SET `status`= '1' WHERE id = '$id'";
				$result = $query->runQuery($sql);
			}
		}else{
			header("Location: ./message.php");
		}
	}else{
		header("Location: ./message.php");
	}
	
}else{
	header("Location: ./message.php");
}
?>
<h2 class="content-subhead" style="text-align: center;">Read Message</h2>
	<div style="text-align: right;">
	<a href="message.php">
    <button type="submit" class="btn btn-danger" name="send_message">Back</button>
    </a>
    </div>
<hr style="border-style: inset;border-width: 1px;">
<div>
	<?php if (!empty($error_msg)) {echo "<p style='color:red;'>$error_msg</p>";}?>
	<div class="row">
			<div class="input-group">
    			<span class="input-group-addon">From: </span>
    			<input type="email" class="form-control input-sm" name="to_email" placeholder="From: info@mail.com" value="<?php if (!empty($from)){echo $from;}?>" disabled>
  			</div>
	</div><br>
	<div class="row">
			Message:<br>
			<textarea class="form-control" rows="5" name="to_message" placeholder="Message" disabled><?php if (!empty($msg)){echo $msg;}?></textarea>
	</div><br>
	<div style="text-align: right;">
		<a href="send_message.php?msg=<?php if (!empty($from)){echo $from;}?>">
    	<button type="submit" class="btn btn-primary" name="send_message">Reply</button>
    	</a>
    </div>
</div>