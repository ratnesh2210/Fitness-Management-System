<div class="container">	
	</div> 
	 <aside id="fh5co-hero" class="js-fullheight">
		<div class="flexslider js-fullheight">
			<ul class="slides">
		   	<li style="background-image: url(.//assets/front_end_assets/images/slide_1.jpg);">
		   		<div class="overlay-gradient"></div>
		   		<div class="container">
		   			<div class="col-md-10 col-md-offset-1 text-center js-fullheight slider-text">
		   				<div class="slider-text-inner">
		   					<h2>Fitness & Health is a Mentality</h2>
		   					<p><a href="registration.php" class="btn btn-primary btn-lg">Get started</a></p>
		   				</div>
		   			</div>
		   		</div>
		   	</li>
		   	<li style="background-image: url(.//assets/front_end_assets/images/slide_2.jpg);">
		   		<div class="container">
		   			<div class="col-md-10 col-md-offset-1 text-center js-fullheight slider-text">
		   				<div class="slider-text-inner">
		   					<h2>Provides equipments, trainers, facilities and guidelines</h2>
		   					<p><a href="registration.php" class="btn btn-primary btn-lg">Get started</a></p>
		   				</div>
		   			</div>
		   		</div>
		   	</li>
		   	<li style="background-image: url(.//assets/front_end_assets/images/slide_3.jpg);">
		   		<div class="container">
		   			<div class="col-md-10 col-md-offset-1 text-center js-fullheight slider-text">
		   				<div class="slider-text-inner">
		   					<h2>We Think Different That Others Can't</h2>
		   					<p><a href="registration.php" class="btn btn-primary btn-lg">Get started</a></p>
		   				</div>
		   			</div>
		   		</div>
		   	</li>
		  	</ul>
	  	</div>
	</aside> 

	<div id="fh5co-programs-section">
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2">
						<div class="heading-section text-center animate-box">
							<h1 style="padding-top:30px;">Our Programs</h1>
							<p>Fitness provides quality equipments, trainers, facilities and guidelines to make your body strong, fit and healthy.</p>
						</div>
					</div>
				</div>
				<div class="row text-center">
					<div class="col-md-4 col-sm-6">
						<div class="program animate-box">
							<img src="assets/front_end_assets/images/fit-dumbell.svg" alt="Cycling">
							<h3>Body Combat</h3>
							<p  style="text-align: justify;">BODYCOMBAT is a high-energy martial arts-inspired workout that is totally non-contact. Punch and kick your way to fitness and burn up to 740 calories* in a class.</p>
							<span><a href="#" class="btn btn-default">Join Now</a></span>
						</div>
					</div>
					<div class="col-md-4 col-sm-6">
						<div class="program animate-box">
							<img src="assets/front_end_assets/images/fit-yoga.svg" alt="">
							<h3>Yoga Programs</h3>
							<p style="text-align: justify;">Yoga gives you the energy, inspiration, and power to transform your body in a fun, joyful, and liberating way. its own epistemology and metaphysics.</p>
							<span><a href="#" class="btn btn-default">Join Now</a></span>
						</div>
					</div>
					<div class="col-md-4 col-sm-6">
						<div class="program animate-box">
							<img src="assets/front_end_assets/images/fit-cycling.svg" alt="">
							<h3>Cycling Program</h3>
							<p style="text-align: justify;">The workout is a full-body, high-intensity, rhythm-based cardio-party. It maximizes calorie burn, accelerates fat loss, builds strength, and improves lean muscle tone. </p>
							<span><a href="#" class="btn btn-default">Join Now</a></span>
						</div>
					</div>
					<div class="col-md-4 col-sm-6">
						<div class="program animate-box">
							<img src="assets/front_end_assets/images/fit-boxing.svg" alt="Cycling">
							<h3>Boxing Fitness</h3>
							<p style="text-align: justify;">Gyms that are built on the idea of boxing-for-fitness are popping up left and right across the country, most advertising the promise of helping you burn up to 1,000 calories in an hour</p>
							<span><a href="#" class="btn btn-default">Join Now</a></span>
						</div>
					</div>
					<div class="col-md-4 col-sm-6">
						<div class="program animate-box">
							<img src="assets/front_end_assets/images/fit-swimming.svg" alt="">
							<h3>Swimming Program</h3>
							<p style="text-align: justify;">The body-shaping benefits of swimming workouts are the result of a perfect storm of calorie burn and muscle recruitment. An easy swim burns around 500 calories an hour. </p>
							<span><a href="#" class="btn btn-default">Join Now</a></span>
						</div>
					</div>
					<div class="col-md-4 col-sm-6">
						<div class="program animate-box">
							<img src="assets/front_end_assets/images/fit-massage.svg" alt="">
							<h3>Massage</h3>
							<p style="text-align: justify;">Massage describes a comprehensive system, rather than a single technique, that involves therapeutic, manipulation and movement of soft tissues to resolve pain and dysfunction.</p>
							<span><a href="#" class="btn btn-default">Join Now</a></span>
						</div>
					</div>
				</div>
			</div>
		</div>

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
		$i = 1;
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
if($i == 3){
break;
}
$i++;
}
?>

				<div class="col-md-12 text-center animate-box">
					<p><a href="#" class="btn btn-primary with-arrow">View Details <i class="icon-arrow-right"></i></a></p>
				</div>
			</div>
		</div>
	</div> 
	<div id="fh5co-testimony-section">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-md-offset-3 text-center fh5co-heading animate-box">
					<h2>Clients Feedback</h2>
					<p>One of the largest Gym and Health Fitness Center in Bangladesh</p>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 col-offset-0 to-animate">
					<div class="wrap-testimony animate-box">
						<div class="owl-carousel-fullwidth">
							<div class="item">
								<div class="testimony-slide active text-center">
									<figure>
										<img src="assets/front_end_assets/images/person1.jpg" alt="user">
									</figure>
									<blockquote>
										<p>"Provides quality equipments, trainers, facilities and guidelines to make your body strong, fit and healthy.Best Choice For you."</p>
									</blockquote>
									<span>Sobuj Talukder, via <a href="#" class="twitter">Twitter</a></span>
								</div>
							</div>
							<div class="item">
								<div class="testimony-slide active text-center">
									<figure>
										<img src="assets/front_end_assets/images/person2.jpg" alt="user">
									</figure>
									<blockquote>
										<p>"It maximizes calorie burn, accelerates fat loss, builds strength, and improves lean muscle tone. It gives you the energy, inspiration, and power to transform your body in a fun, joyful, and liberating way."</p>
									</blockquote>
									<span>Parvez, via <a href="#" class="twitter">Twitter</a></span>
								</div>
							</div>
							<div class="item">
								<div class="testimony-slide active text-center">
									<figure>
										<img src="assets/front_end_assets/images/person3.jpg" alt="user">
									</figure>
									<blockquote>
										<p>"The gym includes a huge selection of free weights, resistance stations, machines, and other gear that will help you maximize your potential."</p>
									</blockquote>
									<span>Monika, via <a href="#" class="twitter">Twitter</a></span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div> 
	<div id="fh5co-blog-section" class="fh5co-light-grey-section">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-md-offset-3 text-center fh5co-heading animate-box">
					<h2>Recent from Blog</h2>
					<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. </p>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6 col-sm-6 animate-box">
					<a href="#" class="item-grid">
						<div class="image" style="background-image: url(assets/front_end_assets/images/image_1.jpg)"></div>
						<div class="v-align">
							<div class="v-align-middle">
								<h3 class="title">Mobile App available</h3>
								<h5 class="date"><span>June 23, 2016</span> | <span>4 Comments</span></h5>
								<p>Fast and easy to manage your profile, communication and fitness masurement.This apps fully helpfull to your fitness.It is available in android and iOS.</p>
							</div>
						</div>
					</a>
				</div>
				<div class="col-md-6 col-sm-6 animate-box">
					<a href="#" class="item-grid">
						<div class="image" style="background-image: url(assets/front_end_assets/images/image_2.jpg)"></div>
						<div class="v-align">
							<div class="v-align-middle">
								<h3 class="title">Starting Summer session</h3>
								<h5 class="date"><span>feb 20, 2017</span> | <span>10 Comments</span></h5>
								<p>We’re always expanding and updating the facility, just like we expand and update our training programs to integrate the latest advancements.</p>
							</div>
						</div>
					</a>
				</div>
				<div class="col-md-12 text-center animate-box">
					<p><a href="#" class="btn btn-primary with-arrow">View More Post <i class="icon-arrow-right"></i></a></p>
				</div>
			</div>
		</div>
	</div> 
	<div id="fh5co-pricing-section">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-md-offset-3 text-center fh5co-heading animate-box">
					<h2>Pricing Plan</h2>
					<p>We’ve put a lot of focus into building a facility that will help fitness achieve your goals.</p>
				</div>
			</div>
			<div class="row">
				<div class="pricing">
					<div class="col-md-3 animate-box">
						<div class="price-box">
							<h2 class="pricing-plan">Starter</h2>
							<div class="price"><sup class="currency">$</sup>9<small>/month</small></div>
							<p style="text-align: left;" >Our gym includes a huge selection of free weights, resistance stations, machines, and other gear that will help you maximize your potential.</p>
							<ul class="float" style="list-style: none; text-align: left;">
								<li><a href="#">10 Cardio Classes</a></li>
								<li><a href="#">5 Swimming Lesson</a></li>
								<li><a href="#">5 Yoga Classes</a></li>
								<li><a href="#">10 Aerobics</a></li>
								<li><a href="#">5 Zumba Classes</a></li>
								<li><a href="#">5 Massage</a></li>
								<li><a href="#">5 Body Building</a></li>
							</ul>
							<a href="#" class="btn btn-select-plan btn-sm">Select Plan</a>
						</div>
					</div>

					<div class="col-md-3 animate-box">
						<div class="price-box">
							<h2 class="pricing-plan">Basic</h2>
							<div class="price"><sup class="currency">$</sup>27<small>/month</small></div>
							<p style="text-align: left;" >Our gym includes a huge selection of free weights, resistance stations, machines, and other gear that will help you maximize your potential.</p>
							<ul class="float" style="list-style: none; text-align: left;">
								<li><a href="#">10 Cardio Classes</a></li>
								<li><a href="#">10 Swimming Lesson</a></li>
								<li><a href="#">8 Yoga Classes</a></li>
								<li><a href="#">10 Aerobics</a></li>
								<li><a href="#">5 Zumba Classes</a></li>
								<li><a href="#">5 Massage</a></li>
								<li><a href="#">5 Body Building</a></li>
							</ul>
							<a href="#" class="btn btn-select-plan btn-sm">Select Plan</a>
						</div>
					</div>

					<div class="col-md-3 animate-box">
						<div class="price-box popular">
							<h2 class="pricing-plan pricing-plan-offer">Pro <span>Best Offer</span></h2>
							<div class="price"><sup class="currency">$</sup>74<small>/month</small></div>
							<p style="text-align: left;" >Our gym includes a huge selection of free weights, resistance stations, machines, and other gear that will help you maximize your potential.</p>
							<ul class="float" style="list-style: none; text-align: left;">
								<li><a href="#">15 Cardio Classes</a></li>
								<li><a href="#">10 Swimming Lesson</a></li>
								<li><a href="#">10 Yoga Classes</a></li>
								<li><a href="#">10 Aerobics</a></li>
								<li><a href="#">10 Zumba Classes</a></li>
								<li><a href="#">5 Massage</a></li>
								<li><a href="#">5 Body Building</a></li>
							</ul>
							<a href="#" class="btn btn-select-plan btn-sm">Select Plan</a>
						</div>
					</div>

					<div class="col-md-3 animate-box">
						<div class="price-box">
							<h2 class="pricing-plan">Unlimited</h2>
							<div class="price"><sup class="currency">$</sup>140<small>/month</small></div>
							<p style="text-align: left;" >Our gym includes a huge selection of free weights, resistance stations, machines, and other gear that will help you maximize your potential.</p>
							<ul class="float" style="list-style: none; text-align: left;">
								<li><a href="#">15 Cardio Classes</a></li>
								<li><a href="#">10 Swimming Lesson</a></li>
								<li><a href="#">10 Yoga Classes</a></li>
								<li><a href="#">20 Aerobics</a></li>
								<li><a href="#"> 10 Zumba Classes</a></li>
								<li><a href="#"> 5 Massage</a></li>
								<li><a href="#">10 Body Building</a></li>
							</ul>		
							<a href="#" class="btn btn-select-plan btn-sm">Select Plan</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
