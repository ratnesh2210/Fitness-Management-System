<?php
///delete information
			if (isset($_GET['delete'])) {
			$id = $_GET['delete'];
			$sql = "DELETE FROM `users` WHERE `email`= '$id'";
			$delete = new DatabaseHelper();
			$result = $delete->deleteQuery($sql);
			if ($result == TRUE) {
				header("Location: ./member_list.php");
			}else{
				//Error
				echo "error";
			}
		}
?>
<h2 class="content-subhead" style="text-align: center;">Member List</h2>
<div>
  <div class="row">
    <div class="col-lg-6">
      <!--Total User-->
      <div class="table-responsive">
      <table class="table">
      <tr>
        <td>
          <canvas id="gender" width="200" height="auto">
          <script type="text/javascript" src="../assets/javascript/gender_pie_chart.js"></script>
        </td>
        <td>
          <ul>
          <li style="color: lightgreen;"><span style="color: black;">Male: <pa id="male"></pa></span></li>
          <li style="color: cornflowerblue;"><span style="color: black;">Female: <pa id="female"></pa></span></li>
          <li style="color: orange;"><span style="color: black;">Other: <pa id="other"></pa></span></li>
          <li style="color: black;"><span style="color: black;">Total: <pa id="total"></pa></span></li>
        </ul>
        </td>
      </tr>
      </table>  
    </div>
    </div>
    <div class="col-lg-6">
      <!--Membership-->
      <div class="table-responsive">
      <table class="table">
      <tr>
        <td>
          <canvas id="member" width="200" height="auto">
          <script type="text/javascript" src="../assets/javascript/member_pie_chart.js"></script>
        </td>
        <td>
          <ul>
          <li style="color: lightgreen;"><span style="color: black;">Starter: <pa id="starter"></pa></span></li>
          <li style="color: cornflowerblue;"><span style="color: black;">Basic: <pa id="basic"></pa></span></li>
          <li style="color: orange;"><span style="color: black;">Pro: <pa id="pro"></pa></span></li>
          <li style="color: green;"><span style="color: black;">Unlimited: <pa id="unlimited"></pa></span></li>
          <li style="color: black;"><span style="color: black;">Total: <pa id="total1"></pa></span></li>
        </ul>
        </td>
      </tr>
      </table>  
    </div>
    </div>
  </div>
</div>
<form method="POST" action="">
  <div class="input-group">
    <input type="text" class="form-control input-lg" placeholder="Search" name="search_input" value="">
    <div class="input-group-btn">
      <button class="btn btn-primary btn-lg" type="submit" name="search">
        <i class="glyphicon glyphicon-search"></i>
      </button>
    </div>
  </div>
</form>
<hr style="border-style: inset;border-width: 1px;">
<div>
	<div class="container-fluid">
	<?php
		$user_table = "users";
		$user_info_table = "users_information";
		$value = '';
		$get_user_info = new DatabaseHelper();
		if (isset($_POST['search'])&&!empty($_POST['search_input'])) {
			$value = trim($_POST['search_input']);
			$sql = "SELECT * FROM `users` WHERE email = '$value'";
			$result = $get_user_info->runQuery($sql);
			if ($result->num_rows<=0) {
				echo "<h1>Member not Found!</h1>";
				$result = $get_user_info->getAllData($user_table);
			}
		}else{
			$result = $get_user_info->getAllData($user_table);
		}
		
		$i=0;
		while($row=$result->fetch_array()){
			$single_row = $get_user_info->retrieveData($user_info_table,trim($row['email']));
			if (!empty($single_row)) {
			
	?>
		<div class="row" style="border: 1px;padding: 10px;<?php if($i%2==0){echo 'background-color: #D3D6C5;';}else{echo 'background-color: white;';}?>">
			<div class="col-sm-1" style="text-align: center;">
      		<img src="../images/<?php echo $single_row['image_name']?>" style="width: 25px;height: auto;">
    		</div>
    		<div class="col-sm-3">
      		<p><?php echo substr($single_row['name'],0,16);?></p>
    		</div>
    		<div class="col-sm-3">
      		<p><?php echo $single_row['email'];?></p>
    		</div>
    		<div class="col-sm-3">
      		<p><?php echo substr($single_row['contact_number'],0,16);?></p>
    		</div>
    		<div class="col-sm-2">
    		<a href="user_view_profile.php?view=<?php echo $single_row['email'];?>" style="padding: 5px"><span class="glyphicon glyphicon-pencil"></span></a>
      		<a href="?delete=<?php echo $single_row['email'];?>" style="padding: 5px"><span class="glyphicon glyphicon-trash"></span></a>
    		</div>

		</div>
		<?php
				}
				$i++;
			}
			
		?>
	</div>
</div>
