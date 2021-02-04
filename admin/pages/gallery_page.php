<?php
$upload_dir="../images";
if (isset($_POST['upload_images'])) {
$img = $_FILES['img'];
if(!empty($img))
{
	if(!is_dir ($upload_dir )){
      mkdir($upload_dir);
      }
    $img_desc = reArrayFiles($img);
    	foreach($img_desc as $val){
    	$file_type = $val['type'];
    	//$uniquename = trim(time().uniqid(rand()).rand(1000, 9999).$val['name']);
    	$uniquename = trim(time().uniqid(rand()).rand(1000, 9999).".jpg");
        if($file_type=="image/jpeg" or $file_type=="image/gif" or $file_type=="image/png" or $file_type=="image/jpg"){
        	$copy_to = "$upload_dir/$uniquename";
        	$t = copy($val['tmp_name'], $copy_to) or die("Couldn't copy!");
        	if($t){
        		$sql = "INSERT INTO `gallery_image_list`(`image_name`) VALUES ('$uniquename')";
        		$insertImage = new DatabaseHelper();
        		$result = $insertImage->insertQuery($sql);
        		if ($result==TRUE) {
        			header("refresh: 0;");
        		}
        	}else{
        		echo "string";
        	}
        }

    	}
	}
}
function reArrayFiles($file)
{
    $file_ary = array();
    $file_count = count($file['name']);
    $file_key = array_keys($file);
    
    for($i=0;$i<$file_count;$i++)
    {
        foreach($file_key as $val)
        {
            $file_ary[$i][$val] = $file[$val][$i];
        }
    }
    return $file_ary;
}
?>
<h2 class="content-subhead" style="text-align: center;">Gallery</h2>
<form class="form-horizontal" action="" method="post" multipart="" enctype="multipart/form-data">
	<div class="input-group">
        <input type="file" name="img[]" multiple>
    </div><br>
    <div class="input-group">
        <input class="btn btn-default" type="submit" value="Upload" name="upload_images">
    </div>
</form>
<hr style="border-style: inset;border-width: 1px;">

 <div class="row">
 <?php
	$images_table_name = 'gallery_image_list';
	$images = new DatabaseHelper();
	$result= $images->getAllData($images_table_name);
	while($row=$result->fetch_array()){
   ?>
  <div class="col-md-4">
    <div class="thumbnail">
    	<a href="delete_image.php?delete=<?php echo $row['id']?>">
        <img src="../images/<?php echo $row['image_name']?>" style="width: 100%;">
        </a>
    </div>
	
  </div>
  <?php
  	}
  ?>
</div>