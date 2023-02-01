<?php get_header(); ?>

	<!-- navigation stops here -->

	<!--div class="bg-dark text-light text-center p-2 mb-4" id="notification">
		Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
		tempor incididunt ut labore et dolore magna aliqua 
		<span style="cursor: pointer;" class="bg-light text-dark p-2 badge badge-c float-right" onclick="clearNotification()">x</span>
	</div-->

	<main class="container">
		<div class="container">
			<!-- Banner 1 -->
			<div class="row">
				<?php if (have_posts()) : ?>
		        <?php 
			        while(have_posts()){
			          the_post();
			          get_template_part( 'template-parts/content','article');
			        }
			    ?>
			<?php endif;?>
				<div class="col-md-3">
					<div class="row">
						<div class="col-md-12">
							<img src="<?php echo get_template_directory_uri();?>/assets/images/ad2.png" style="width: 100%">
						</div>
						<div class="col-md-12 pt-3">
							<img src="<?php echo get_template_directory_uri();?>/assets/images/ad1.png" style="width: 100%">
						</div>
					</div>
				</div>
			</div>
			<!-- end of banner 1 -->
			<!-- banner 5 -->
			<div class="container mt-3 p-1 ">
					<h5><span class="square-red-before"></span>You may also like</h5>
				<div class="row  mt-3">
					<div class="col-md-9">
						<div class="row">
							<div class="col-md-2">
								<img src="<?php echo get_template_directory_uri();?>/assets/images/atiku.png" class="curved-img pt-3">
							</div>
							<div class="col-md-10">
								<h4 class="pt-3">Lorem Ipsium dotem</h4>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eius</p>
								<small>February 19, 2022</small>
								<span class="float-right right-comment">257 <i class="fa fa-comment"></i></span>
								<hr>
							</div>

							<div class="col-md-2">
								<img src="<?php echo get_template_directory_uri();?>/assets/images/atiku.png" class="curved-img pt-3">
							</div>
							<div class="col-md-10">
								<h4 class="pt-3">Lorem Ipsium dotem</h4>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eius</p>
								<small>February 19, 2022</small>
								<span class="float-right right-comment">257 <i class="fa fa-comment"></i></span>
								<hr>
							</div>

							<div class="col-md-2">
								<img src="<?php echo get_template_directory_uri();?>/assets/images/atiku.png" class="curved-img pt-3">
							</div>
							<div class="col-md-10">
								<h4 class="pt-3">Lorem Ipsium dotem</h4>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eius</p>
								<small>February 19, 2022</small>
								<span class="float-right right-comment">257 <i class="fa fa-comment"></i></span>
								<hr>
							</div>

							<div class="col-md-2">
								<img src="<?php echo get_template_directory_uri();?>/assets/images/atiku.png" class="curved-img pt-3">
							</div>
							<div class="col-md-10">
								<h4 class="pt-3">Lorem Ipsium dotem</h4>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eius</p>
								<small>February 19, 2022</small>
								<span class="float-right right-comment">257 <i class="fa fa-comment"></i></span>
								<hr>
							</div>
							<div class="col-12">
								<h5><span class="square-red-before"></span>Comments</h5>
								comments section goes here
							</div>

						</div>
					</div>
					<!-- presidential candidates	 -->
					<div class="col-md-3">
						<div class="row">
							<div class="col-md-12">
								<img src="<?php echo get_template_directory_uri();?>/assets/images/ad2.png" style="width: 100%;">
							</div>
							<div class="col-md-12 "><h5 class="mt-3">Presidential Candidates</h5></div>
							<div class="col-md-12">
								<!-- side news -->
								<div class="row mt-3">
									<div class="col-md-5">
										<img src="<?php echo get_template_directory_uri();?>/assets/images/buhari.jpg" style="width: 100%;" class="curved-img">
									</div>
									<div class="col-md-7">
										<h6>Muhamadu Buhari</h6>
										<small>67% probability</small>
									</div>
								</div>

								<div class="row mt-3">
									<div class="col-md-5">
										<img src="<?php echo get_template_directory_uri();?>/assets/images/buhari.jpg" style="width: 100%;" class="curved-img">
									</div>
									<div class="col-md-7">
										<h6>Muhamadu Buhari</h6>
										<small>67% probability</small>
									</div>
								</div>

								<div class="row mt-3">
									<div class="col-md-5">
										<img src="<?php echo get_template_directory_uri();?>/assets/images/buhari.jpg" style="width: 100%;" class="curved-img">
									</div>
									<div class="col-md-7">
										<h6>Muhamadu Buhari</h6>
										<small>67% probability</small>
									</div>
								</div>

								<div class="row mt-3">
									<div class="col-md-5">
										<img src="<?php echo get_template_directory_uri();?>/assets/images/buhari.jpg" style="width: 100%;" class="curved-img">
									</div>
									<div class="col-md-7">
										<h6>Muhamadu Buhari</h6>
										<small>67% probability</small>
									</div>
								</div>

								<div class="row mt-3">
									<div class="col-md-5">
										<img src="<?php echo get_template_directory_uri();?>/assets/images/buhari.jpg" style="width: 100%;" class="curved-img">
									</div>
									<div class="col-md-7">
										<h6>Muhamadu Buhari</h6>
										<small>67% probability</small>
									</div>
								</div>

								<div class="row mt-3">
									<div class="col-md-5">
										<img src="<?php echo get_template_directory_uri();?>/assets/images/buhari.jpg" style="width: 100%;" class="curved-img">
									</div>
									<div class="col-md-7">
										<h6>Muhamadu Buhari</h6>
										<small>67% probability</small>
									</div>
								</div>

								<div class="row mt-3">
									<div class="col-md-5">
										<img src="<?php echo get_template_directory_uri();?>/assets/images/buhari.jpg" style="width: 100%;" class="curved-img">
									</div>
									<div class="col-md-7">
										<h6>Muhamadu Buhari</h6>
										<small>67% probability</small>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- end of banner 5 -->
		</div>
	</main>

	<script type="text/javascript">
		function clearNotification(){
			document.getElementById('notification').style.display = 'none';
		}
	</script>
<?php get_footer(); ?>