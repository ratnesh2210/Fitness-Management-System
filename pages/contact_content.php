<?php
if (isset($_POST['send'])) {
	$to_email = "admin@mail.com";
	$un_name = $_POST['name'];
	$un_email = trim($_POST['email']);
	$un_message = trim($_POST['message']);
	$fk_id = 0;
	$error_msg = '';
	if (!empty($un_name)&&!empty($un_email)&&!empty($un_email)) {
			$dat = trim(date('Y-m-d'));
			$un_message = $un_message."[{Anonymous->Name: $un_name}]";
			$query = new DatabaseHelper();
			$sql = "INSERT INTO `messages`(`date`, `to_email`, `from`, `message`, `fk_id`) VALUES ('$dat','$to_email','$un_email','$un_message','$fk_id')";
          	$result=$query->insertQuery($sql);
          	if ($result) {
          		$error_msg = "Message sent!";
          		header("refresh: 2");
          	}else{
          		$error_msg = "Message sending failed!!";
          	}
	}else{
		$error_msg = "Field can't be empty!!!";
	}
}
?>
<div class="fh5co-contact animate-box">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 col-md-push-2 animate-box">
					<h2>Contact Details</h2>
					<p>Whether you are a beginner or an advanced gym, our world-class facilities have a climb for you. There is no minimum (or maximum!) age to climb, so climbers of all ages are welcome!

					All memberships, Punch Passes and Day Passes include: Climbing, Yoga Classes, our full line of cardio and strength equipment, full-service locker rooms, towel service and free WiFi.</p><br><br>

				</div>
				<div class="col-md-3">
					<h3>Contact Info.</h3>
					<ul class="contact-info">
						<li><i class="icon-map-marker"></i>Habib Super Market, 50 Gulshan South Avenue, Gulshan Circle - 1, Dhaka - 1212.</li>
						<li><i class="icon-phone"></i>Tel: 9595249, Mobile: 01715 586705 </li>
						<li><i class="icon-envelope"></i><a href="#">info@gymplus.com</a></li>
						<li><i class="icon-globe"></i><a href="#">www.gymplus.com</a></li>
					</ul>
				</div>
				<div class="col-md-8 col-md-push-1 col-sm-12 col-sm-push-0 col-xs-12 col-xs-push-0">
				<form class="form-horizontal" method="POST" action="" enctype="multipart/form-data">
					<div class="row">
					<?php if (!empty($error_msg)) {echo "<p style='color:red;'>$error_msg</p>";}?>
						<div class="col-md-6">
							<div class="form-group">
								<input class="form-control" placeholder="Name" type="text" name="name">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<input class="form-control" placeholder="Email" type="text" name="email">
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<textarea class="form-control" cols="30" rows="7" placeholder="Message" name="message"></textarea>
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<input value="Send Message" class="btn btn-primary" type="submit" name="send">
							</div>
						</div>
					</div>
				</form>
				</div>
			</div>
		</div>	
	</div>

	<div id="map" class="animate-box" data-animate-effect="fadeIn"></div>
	
	
	<!-- for map -->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCefOgb1ZWqYtj7raVSmN4PL2WkTrc-KyA&sensor=false"></script>

	<script src="assets/front_end_assets/js/google_map.js"></script>