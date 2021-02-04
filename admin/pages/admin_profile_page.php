<?php
if (!empty($email)) {
$error_msg = "";
  ////image update
if (isset($_POST['upload_image'])) {
      $upload_dir="../images";
      if(isset($_FILES['fupload'])){
      $file_name = $_FILES['fupload']['name'];
      $file_type = $_FILES['fupload']['type'];
      if (!empty($file_name)) {
      $uniquename = time().uniqid(rand()).rand(1000, 9999);
      $image_path = trim($uniquename.$file_name);
      if(!is_dir ($upload_dir )){
      mkdir($upload_dir);
      }
      if($file_type=="image/jpeg" or $file_type=="image/gif" or $file_type=="image/png" or $file_type=="image/jpg"){
      $copy_to = "$upload_dir/$image_path";
      $t = copy($_FILES['fupload']['tmp_name'], $copy_to) or die("Couldn't copy!");
        if($t){
            //update  
          $update_query = new DatabaseHelper();
            $sql = "UPDATE `admin_info` SET `image_name`='$image_path' WHERE `email`='$email'";
            $result = $update_query->updateQuery($sql);
          if ($result === TRUE) {
            header("refresh: 0;");
          }else{
            echo "Image update or insert failed.";
          }
        }else{
          echo "Failed to copie image";
        }
      }else{
        echo "Images Type Error";
      }
    }else{
      echo "Select valied image first.";
    }
    }
}
///data update
    if (isset($_POST['update'])) {
      $name = $_POST['name'];
      $email = $_POST['email'];
      $password = $_POST['password'];
      if (!empty($name)&&!empty($email)) {
        $email = htmlspecialchars(strip_tags(trim($_POST['email'])));
        $password = hash('sha256',htmlspecialchars(strip_tags(trim($_POST['password']))));
        if (!empty($password)) {
          $sql = "UPDATE admin, admin_info SET admin.email = '$email', admin_info.email = '$email', admin.password = '$password', admin_info.name = '$name' WHERE admin.email=admin_info.email";
        }else{
          $sql = "UPDATE admin, admin_info SET admin.email = '$email', admin_info.email = '$email', admin_info.name = '$name' WHERE admin.email=admin_info.email";
        }
        $update_admin_info = new DatabaseHelper();
        $result = $update_admin_info->updateQuery($sql);
        if ($result) {
          $_SESSION["admin_email"] = $email;
          $_SESSION["admin_password"] = $password;
          header("refresh: 0;");
        }else{
          $error_msg = "Something went wrong!!!";
        }

      }else{
        $error_msg = "Name or Email Can't be empty.";
      }
    }
}else{
  //goto login page
  header("Location: login.php");
}

?>
<h2 class="content-subhead" style="text-align: center;">Admin Profile</h2>
<hr style="border-style: inset;border-width: 1px;">
<div >
<form class="form-horizontal" method="POST" action="" enctype="multipart/form-data">

	<div  style="text-align: center;">

    <img src="../images/<?php if (!empty($image_name)){echo $image_name;}else{echo 'default.png';}?>" style="width: 200px;height: auto;">

    <div class="input-group">
      <input type="file" name="fupload">
    </div><br>
    <div class="input-group">
      <input class="btn btn-default" type="submit" name="upload_image" value="Upload">
    </div>
  	</div><hr>
  <?php if(!empty($error_msg)){echo "<p style='color:red;'>$error_msg</p>";}?>
	<div class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
    <input type="text" class="form-control input-lg" name="name" placeholder="Name" value="<?php if(!empty($name))echo $name;?>">
  	</div><br>

	<div class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
    <input type="email" class="form-control input-lg" name="email" placeholder="Email" value="<?php if(!empty($email))echo $email;?>">
  	</div><br>

	<div class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
    <input type="password" class="form-control input-lg" name="password" placeholder="Password">
  	</div>
    
    <br>
    <div style="text-align: right;">
    <button type="submit" class="btn btn-default" name="update">Update</button>
    </div>
</form>
</div>