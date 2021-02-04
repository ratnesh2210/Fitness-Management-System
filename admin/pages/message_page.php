<?php
$error_msg = "";
	if (isset($_GET['del'])) {
		$id = $_GET['del'];
			$query = new DatabaseHelper();
			$sql = "DELETE FROM `messages` WHERE id = '$id'";
			$result=$query->runQuery($sql);
			if ($result) {
				header("Location: ./message.php");
			}else{
				$error_msg = "Message not found.";
			}
	}
?>
<h2 class="content-subhead" style="text-align: center;">Message</h2>
	<div style="text-align: right;">
	<a href="send_message.php">
    <button type="submit" class="btn btn-primary" name="send_message">Send Message</button>
    </a>
    </div>
<hr style="border-style: inset;border-width: 1px;">
<div>
	<?php 
		if (!empty($email)) {
			$i  = 1;
			$query = new DatabaseHelper();
			$sql = "SELECT * FROM `messages` WHERE to_email = '$email' ORDER BY id DESC";
			$result=$query->runQuery($sql);
			while($row=$result->fetch_array()){
	?>
		<div class="row" style="padding: 10px;background-color: <?php if($row['status']==0){echo "#adebad";}?>">
			<div class="col-sm-1">
				<?php echo $i.".";?>
			</div>
			<div class="col-sm-3">
				<span class="glyphicon glyphicon-calendar" style="padding: 5px"></span>
				<?php echo $row['date'];?>
			</div>
			<div class="col-sm-3">
				<?php echo substr($row['from'], 0,22);?>
			</div>
			<div class="col-sm-3">
				<?php echo substr($row['message'], 0,20).'..';?>
			</div>
			<div class="col-sm-2" style="text-align: center;">
				<a href="read_message.php?msg=<?php echo $row['id'];?>" style="padding-right: 2px">
					<span class="glyphicon glyphicon-comment"></span>
				</a>
				<a href="?del=<?php echo $row['id'];?>">
					<span class="glyphicon glyphicon-trash"></span>
				</a>
			</div>
		</div>
	<?php
				$i++;
			}
	}else{

	}
	?>

</div>
