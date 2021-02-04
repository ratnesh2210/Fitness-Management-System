<?php
///delete information
			if (isset($_GET['delete'])) {
			$id = $_GET['delete'];
			$sql = "DELETE FROM `trainer` WHERE `email`= '$id'";
			$delete = new DatabaseHelper();
			$result = $delete->deleteQuery($sql);
			if ($result == TRUE) {
				header("Location: ./trainer.php");
			}else{
				//Error
				echo "error";
			}
		}
?>

<h2 class="content-subhead" style="text-align: center;">Trainer List</h2>
    <div style="text-align: right;">
    <a href="add_trainer.php">
    <button type="submit" class="btn btn-primary">Add Trainer</button>
    </a>
    </div>
<hr style="border-style: inset;border-width: 1px;">


<div>
<?php
		$table_name = "trainer";
		$query = new DatabaseHelper();
		$result = $query->getAllData($table_name);
		while($row=$result->fetch_array()){
?>
	<div class="row">
			<div class="col-sm-1" style="text-align: center;">
      		<img src="../images/<?php echo $row['image_name']?>" style="width: 25px;height: auto;">
    		</div>
    		<div class="col-sm-3">
      		<p><?php echo substr($row['name'],0,16);?></p>
    		</div>
    		<div class="col-sm-3">
      		<p><?php echo $row['email'];?></p>
    		</div>
    		<div class="col-sm-3">
      		<p><?php echo substr($row['category'],0,16);?></p>
    		</div>
    		<div class="col-sm-2">
    		<a href="add_trainer.php?view=<?php echo $row['email'];?>" style="padding: 5px"><span class="glyphicon glyphicon-pencil"></span></a>
      		<a href="?delete=<?php echo $row['email'];?>" style="padding: 5px"><span class="glyphicon glyphicon-trash"></span></a>
    		</div>
	</div>
<?php
}
?>
</div>
