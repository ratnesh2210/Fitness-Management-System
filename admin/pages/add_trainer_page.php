<?php
$trainer_category = '';
$trainer_details = '';
$trainer_email = '';
$error_msg = '';
$trainer_name = '';
$trainer_image_name = '';
$flag = FALSE;
if (isset($_GET['view'])) {
  $trainer_email = $_GET['view'];
if (!empty($trainer_email)) {
      $table_name = 'trainer';
      $trainer = new DatabaseHelper();
      $result = $trainer->retrieveData($table_name,$trainer_email);
      if ($result!=0) {
        $trainer_category = $result['category'];
        $trainer_details = $result['details'];
        $trainer_name = $result['name'];
        $trainer_image_name = $result['image_name'];
        $flag = TRUE;
      }else{
        //error
      }
  }
  }
  if (isset($_POST['update'])) {
    $trainer_category = htmlspecialchars(strip_tags(trim($_POST['name'])));
    $trainer_details = htmlspecialchars(strip_tags(trim($_POST['details'])));
    $trainer_email = htmlspecialchars(strip_tags(trim($_POST['email'])));
    $trainer_name = htmlspecialchars(strip_tags(trim($_POST['category'])));
    if (!empty($trainer_category)&&!empty($trainer_details)&&!empty($trainer_email)&&!empty($trainer_name)) {
      $upload_dir="../images";
      if(isset($_FILES['fupload'])){
      $file_name = $_FILES['fupload']['name'];
      $file_type = $_FILES['fupload']['type'];
      if (!empty($file_name)) {
      $uniquename = time().uniqid(rand()).rand(1000, 9999);
      $image_path = trim($uniquename.$file_name);
      if(!is_dir ($upload_dir)){
      mkdir($upload_dir);
      }
      if($file_type=="image/jpeg" or $file_type=="image/gif" or $file_type=="image/png" or $file_type=="image/jpg"){
      $copy_to = "$upload_dir/$image_path";
      $t = copy($_FILES['fupload']['tmp_name'], $copy_to) or die("Couldn't copy!");
        if($t){
          $sql = "INSERT INTO `trainer`(`email`, `name`, `category`, `image_name`, `details`) VALUES ('$trainer_email','$trainer_name','$trainer_category','$image_path','$trainer_details')";
          $query = new DatabaseHelper();
          $result = $query->runQuery($sql);
          if ($result == TRUE) {
            header("Location: ./add_trainer.php?view=$trainer_email");
          }else{
            $error_msg = "Image update or insert failed.";
          }
        }else{
          $error_msg = "Failed to copie image";
        }
      }else{
        $error_msg = "Images Type Error";
      }
    }else{
      $error_msg = "Select valied image first.";
    }
    }
    }else{

    $error_msg = "Field can't be empty.";
    }
  }

?>

<h2 class="content-subhead" style="text-align: center;">Trainer Profile</h2>
<hr style="border-style: inset;border-width: 1px;">
<div >
<form class="form-horizontal" method="POST" action="" enctype="multipart/form-data">

	<div  style="text-align: center;">

    <img src="../images/<?php if (!empty($trainer_image_name)){echo $trainer_image_name;}else{echo 'default.png';}?>" style="width: 200px;height: auto;">

    <div class="input-group">
      <input type="file" name="fupload" <?php if ($flag){echo 'disabled';} ?>>
    </div>
  </div>
  <hr>
  <?php if(!empty($error_msg)){echo "<p style='color:red;'>$error_msg</p>";}?>

	<div class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
    <input type="text" class="form-control input-lg" name="name" placeholder="Name" value="<?php if(!empty($trainer_name))echo $trainer_name;?>" <?php if ($flag){echo 'disabled';} ?>>
  	</div><br>

  <div class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
    <input type="email" class="form-control input-lg" name="email" placeholder="Email" value="<?php if(!empty($trainer_email))echo $trainer_email;?>" <?php if ($flag){echo 'disabled';} ?>>
    </div><br>

    <div class="input-group">
    <span class="input-group-addon">Category</span>
    <input type="text" class="form-control input-lg" name="category" placeholder="Category" value="<?php if(!empty($trainer_category))echo $trainer_category;?>" <?php if ($flag){echo 'disabled';} ?>>
    </div><br>

    <div class="input-group">
    <span class="input-group-addon">Details</span>
    <input type="text" class="form-control input-lg" name="details" placeholder="Details" value="<?php if(!empty($trainer_details))echo $trainer_details;?>" <?php if ($flag){echo 'disabled';} ?>>
    </div><br>

    <div style="text-align: right;">
    <input type="submit" class="btn btn-default" name="update" value="Save" <?php if ($flag){echo 'disabled';} ?> >
    </div>
</form>
</div>