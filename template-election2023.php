<?php
/*
Template Name: Election2023
*/
?>
<?php get_header();?>
	<main>
		<div class="container">
			<!-- Banner 1 -->
			<div class="row">
							<?php
						  $args = array( 'numberposts' => 8 );
						  $postslist = get_posts( $args );
						  foreach ($postslist as $indx=>$post) :  setup_postdata($post); ?>
						    <?php if($indx === 0 ):?>
				

						    	<div class="col-md-9">
									<div class="row">
										<div class="col-md-8" >
											<h4 class=""><span class="square-red-before"></span>ELECTION 2023</h4>
											<?php if ( has_post_thumbnail() ) { the_post_thumbnail('my-custom-image-size',['class' => 'img-full-width height-400'] ); }else{ /*something to display instead */ } ?>
											<!-- <img src="assets/images/atiku.png" class="red-border-before img-responsive" style="width: 100%;height: 250px;"> -->
										</div>
										<div class="col-md-4">
											<br>
											<br>
											<p class="meta-title"><?php the_title(); ?></p>
											<small class="meta-time"><?php the_date();?></small>
											<br>
											<a href="<?php the_permalink();?>" class="pl-4 pr-4 mt-2  btn btn-dark"><small>Read more</small></a>
										</div>
									</div>
								</div>
								<div class="col-md-3">
									<h6>Twitter Feeds</h6>
									<a href="https://twitter.com/intent/tweet?button_hashtag=nigeriadecides&ref_src=twsrc%5Etfw" class="twitter-hashtag-button" data-show-count="false">Tweet #nigeriadecides</a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
									<!-- to be replaced by the plugin -->
									<div style="background-color: grey;height: 90%;"></div>
								</div>
							</div>
							<!-- end of banner 1 -->
							<!-- banner 5 -->
							<div class="container mt-3 p-1 ">
								<div class="row  mt-3">
									<div class="col-md-9">
										<div class="row">
						<!-- if ( have_posts() ) : while ( have_posts() ) : the_post(); -->



						    <?php else:?>
						    	<div class="col-md-2">
						    		<a href="<?php the_permalink();?>">
						    		<?php if ( has_post_thumbnail() ) { the_post_thumbnail('my-custom-image-size',['class' => 'img-full-width height-200 curved-img pt-3'] ); }else{ /*something to display instead */ } ?>
						    		</a>
							</div>
							<div class="col-md-10">
								<a href="<?php the_permalink();?>" class="text-decoration-none text-dark">
									<p class="meta-title pt-3"><?php the_title();?></p>
									<p class="meta-excerpt"><?php the_excerpt();?></p>
								</a>
									<small><?php the_date();?></small>
									<span class="float-right right-comment"><?php comments_number();?> <i class="fa fa-comment"></i></span>
								<hr>
							</div>
						    <?php endif; ?>
						<?php endforeach; ?>
						</div>
					</div>
					<!-- adverts space -->
					<div class="col-md-3">
						<div class="row">
							<div class="col-md-12">
								<img src="assets/images/ad2.png" style="width: 100%;">
							</div>
							<div class="col-md-12 "><h5 class="mt-3">Presidential Candidates</h5></div>
							<div class="col-md-12">
								<!-- side news -->
								<div class="row mt-3">
									<div class="col-md-5">
										<img src="assets/images/buhari.jpg" style="width: 100%;" class="curved-img">
									</div>
									<div class="col-md-7">
										<h6>Muhamadu Buhari</h6>
										<small>67% probability</small>
									</div>
								</div>

								<div class="row mt-3">
									<div class="col-md-5">
										<img src="assets/images/buhari.jpg" style="width: 100%;" class="curved-img">
									</div>
									<div class="col-md-7">
										<h6>Muhamadu Buhari</h6>
										<small>67% probability</small>
									</div>
								</div>

								<div class="row mt-3">
									<div class="col-md-5">
										<img src="assets/images/buhari.jpg" style="width: 100%;" class="curved-img">
									</div>
									<div class="col-md-7">
										<h6>Muhamadu Buhari</h6>
										<small>67% probability</small>
									</div>
								</div>

								<div class="row mt-3">
									<div class="col-md-5">
										<img src="assets/images/buhari.jpg" style="width: 100%;" class="curved-img">
									</div>
									<div class="col-md-7">
										<h6>Muhamadu Buhari</h6>
										<small>67% probability</small>
									</div>
								</div>

								<div class="row mt-3">
									<div class="col-md-5">
										<img src="assets/images/buhari.jpg" style="width: 100%;" class="curved-img">
									</div>
									<div class="col-md-7">
										<h6>Muhamadu Buhari</h6>
										<small>67% probability</small>
									</div>
								</div>

								<div class="row mt-3">
									<div class="col-md-5">
										<img src="assets/images/buhari.jpg" style="width: 100%;" class="curved-img">
									</div>
									<div class="col-md-7">
										<h6>Muhamadu Buhari</h6>
										<small>67% probability</small>
									</div>
								</div>

								<div class="row mt-3">
									<div class="col-md-5">
										<img src="assets/images/buhari.jpg" style="width: 100%;" class="curved-img">
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
<?php  get_footer();?>