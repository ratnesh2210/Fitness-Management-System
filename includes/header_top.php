<header id="fh5co-header" role="banner">
		<div class="container">
			<div class="header-inner">
				<h1 title="You can fit yourself."><a href="index.php">Gym Plus</a></h1>
				<nav role="navigation">
					<ul>
						<li><a href="index.php">Home</a></li>
						<li><a href="trainer.php">Trainer</a></li>
						<li><a href="plan.php">Plan</a></li>
						<li><a href="gallary.php">Gallary</a></li>
						<li><a href="about.php">About</a></li>
						<li><a href="contact.php">Contact</a></li>
						<?php 
							if (!$flag) {
						?>
						<li><a href="log_in.php">Log In</a></li>
						<li class="cta"><a href="registration.php">Online Admission</a></li>
						<?php 	
							}else{
						?>
						<li class="dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown" href="">
								<?php  echo substr(htmlspecialchars($name), 0,10);?>
								<img src="./images/<?php echo htmlspecialchars($image_name);?>" style="width:25px;height:25px; margin-left:5px">
								<span class="caret"></span>
							</a>
        					<ul class="dropdown-menu" style="text-align: center;background-color: gray">
          						<li>
          							<div>
          								<img src="images/<?php echo htmlspecialchars($image_name);?>" style="width:100px;height:100px; padding:5px" class="img-circle">
          								<br>
          								<p style="color: black;"><?php echo htmlspecialchars($email);?></p>
          							</div><hr>
          						</li>
          						<li><a href="user_admin/user_activities.php">Activities</a></li><br>
          						<li><a href="user_admin/user_profile.php">Profile</a></li><br>
          						<li><a href="index.php?logout">Logout</a></li>
        					</ul>
      					</li>
						<?php
							}
						?>
					</ul>
				</nav>
			</div>
		</div>
	</header>
