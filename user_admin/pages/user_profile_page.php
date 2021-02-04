<?php
    $error_msg = '';
    $name = '';
    $contact_number = '';
    $date_of_birth = '';
    $gender = 'Male';
    $address = '';

if (!empty($email)) {
  if (!empty($row['name'])) {
    $name = $row['name'];
    $contact_number = $row['contact_number'];
    $date_of_birth = $row['date_of_birth'];
    $gender = $row['gender'];
    $address = $row['address'];
  }
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
            $query = new DatabaseHelper();
            if (!empty($image_name)) {
              $sql = "UPDATE `users_information` SET `image_name`='$image_path' WHERE `email`='$email'";
            }else{
              $sql = "INSERT INTO `users_information`(`email`, `image_name`) VALUES ('$email','$image_path')";
            }
            
            $result = $query->runQuery($sql);
          if ($result === TRUE) {
            header("refresh: 0;");
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
}
///data update
    if (isset($_POST['update'])) {
      $name = htmlspecialchars(strip_tags(trim($_POST['name'])));
      $password = hash('sha256',htmlspecialchars(strip_tags(trim($_POST['password']))));
      $contact_number = htmlspecialchars(strip_tags(trim($_POST['contact_number'])));
      $date_of_birth = htmlspecialchars(strip_tags(trim($_POST['date_of_birth'])));
      $gender = htmlspecialchars(strip_tags(trim($_POST['gender'])));
      $address = htmlspecialchars(strip_tags(trim($_POST['address'])));
      if (!empty($name)&&!empty($contact_number)&&!empty($date_of_birth)&&!empty($gender)&&!empty($address)) {
        $query = new DatabaseHelper();
        
        if (!empty($password)) {
          $sql = "UPDATE `users` SET `password`='$password' WHERE email = '$email'";
          $result=$query->updateQuery($sql);
          if (!$result) {
            $error_msg = 'Password update failed.';
          }else{
            $_SESSION["user_password"] = $password;
            header("refresh: 0;");
          }
        }
        if ($flag) {
            $sql = "UPDATE `users_information` SET `name`='$name',`contact_number`='$contact_number',`date_of_birth`='$date_of_birth',`gender`='$gender',`address`='$address' WHERE email = '$email'";
          }else{
            $sql = "INSERT INTO `users_information`(`email`, `name`, `contact_number`, `date_of_birth`, `gender`, `address`) VALUES ('$email','$name','$contact_number','$date_of_birth','$gender','$address')";
          }
          $result=$query->insertQuery($sql);
          if (!$result) {
            $error_msg = 'Data update failed.';
          }else{
            header("refresh: 0;");
          }
      }else{
        $error_msg = "Input Field Can't be empty.";
      }
    }
}else{
  //email empty goto login page
}
?>
<h2 class="content-subhead" style="text-align: center;">User Profile</h2>
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
    <input type="email" class="form-control input-lg" name="email" placeholder="Email" value="<?php if(!empty($email))echo $email;?>" disabled>
  	</div><br>

  <div class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-phone-alt"></i></span>
    <input type="number" class="form-control input-lg" name="contact_number" placeholder="Contact Number" value="<?php if(!empty($contact_number)){echo $contact_number;}?>">
    </div><br>

  <div class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
    <input type="date" class="form-control input-lg" name="date_of_birth" placeholder="Date of Birth" value="<?php if(!empty($date_of_birth)){echo $date_of_birth;}?>">
    </div><br>

    <div class="input-group">
      <div class="row">
        <div class="col-lg-12" style="font-weight:bold;">
          Select you Gender:
          <div>
      </div>
      <div class="row">
        <div class="col-lg-4">
          <div class="radio-inline">
            <label><input type="radio" name="gender" <?php if($gender=='Male'){echo 'checked';}?> value="Male">Male</label>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="radio-inline">
            <label><input type="radio" name="gender" <?php if($gender=='Female'){echo 'checked';}?> value="Female">Female</label>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="radio-inline">
            <label><input type="radio" name="gender" <?php if($gender=='Other'){echo 'checked';}?> value="Other">Other</label>
          </div>
        </div>
      </div>
      </div>
      </div>
    </div><br>

  <div class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
    <input type="address" class="form-control input-lg" name="address" placeholder="Current Address" value="<?php if(!empty($address)){echo $address;}?>">
    </div><br>

	<div class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
    <input type="password" class="form-control input-lg" name="password" placeholder="Password">
  	</div><br>

    <div style="text-align: right;">
    <button type="submit" class="btn btn-default" name="update"><?php if(!empty($name)){echo 'Update';}else{echo 'Save';}?></button>
    </div>
</form>
</div>