<?php
if (isset($_GET['delete'])) {
	$id = $_GET['delete'];
	$images_table_name = 'gallery_image_list';
	$images = new DatabaseHelper();
	$sql = "SELECT * FROM `gallery_image_list` WHERE id = '$id'";
	$result= $images->runQuery($sql);
	$row=$result->fetch_array();
}else{
	echo "Image not found.";
}

if (isset($_POST['delete_image'])&&!empty($id)) {
	$sql = "DELETE FROM `gallery_image_list` WHERE id = '$id'";
	$result= $images->deleteQuery($sql);
	if ($result==TRUE) {
		header("Location: ./gallery.php");
	}else{
		echo "Something went wrong!!!";
	}
}
if (isset($_POST['back'])) {
	header("Location: ./gallery.php");
}
	
?>
<h2 class="content-subhead" style="text-align: center;">Gallery</h2>
<hr style="border-style: inset;border-width: 1px;">
<form class="form-horizontal" method="POST" action="">
<div class="row">
  <div class="col-md-12">
    <div class="thumbnail">
    <img src="../images/<?php echo $row['image_name']?>" style="width: 500px;">
    </div>
	<div>
      <input class="btn btn-primary btn-danger btn-lg" type="submit" name="delete_image" value="Delete">
      <input class="btn btn-primary btn-lg" type="submit" name="back" value="Back">
    </div>
  </div>
</div>
</form>