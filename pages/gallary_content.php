<div id="fh5co-work-section" class="fh5co-light-grey-section">
		<div class="container">
			<div class="row">
			
		<?php
			$table_name = 'gallery_image_list';
			$get_image_list = new DatabaseHelper();
			$result = $get_image_list->getAllData($table_name);
				if ($result) {
					//image found
					while($row=$result->fetch_array()){
			?>
				<div class="col-md-4 animate-box">
					<a href="#" class="item-grid text-center">
						<div class="image" style="background-image: url(images/<?php echo $row['image_name']?>)"></div>
						<!--
						<div class="v-align">
							<div class="v-align-middle">
								<h3 class="title">Geographical App</h3>
								<h5 class="category"><?php echo $row['image_name']?></h5>
							</div>
						</div>
						-->
					</a>
				</div>
		<?php
					}
			}else{
				//image not found
				echo "Image not listed.";
			}
		?>
			</div>
		</div>
	</div>
