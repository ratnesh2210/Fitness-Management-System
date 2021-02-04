	 <div id="fh5co-work-section" class="fh5co-light-grey-section">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-md-offset-3 text-center fh5co-heading animate-box">
					<h2>Meet Our Trainers</h2>
					<p style="text-align: justify;"> We are committed to providing outstanding customer service and we believe that commitment starts with having a friendly and knowledgeable staff. Our training program covers customer fitness,and much more.</p>
				</div>
			</div>
			<div class="row">
<?php
		$table_name = "trainer";
		$get_trainer_info = new DatabaseHelper();
		$result = $get_trainer_info->getAllData($table_name);
		while($row=$result->fetch_array()){
?>
				<div class="col-md-4 animate-box">
					<a href="<?php echo $row['email'];?>" class="item-grid text-center">
						<div class="image" style="background-image: url(images/<?php echo $row['image_name'];?>)"></div>
						<div class="v-align">
							<div class="v-align-middle">
								<h3 class="title"><?php echo $row['name'];?></h3>
								<h4 class="category"><?php echo $row['category'];?></h4>
							</div>
						</div>
					</a>
				</div>
<?php
}
?>
				<div class="col-md-12 text-center animate-box">
					<p><a href="#" class="btn btn-primary with-arrow">View Details <i class="icon-arrow-right"></i></a></p>
				</div>
			</div>
		</div>
	</div> 

	<div class="fh5co-cta" style="background-image: url(assets/front_end_assets/images/slide_1.jpg);">
		<div class="overlay"></div>
		<div class="container">
			<div class="col-md-12 text-center animate-box">
				<h3>We Try To Update our service Everyday</h3>
				<p><a href="#" class="btn btn-primary btn-outline with-arrow">Get started now! <i class="icon-arrow-right"></i></a></p>
			</div>
		</div>
	</div>
