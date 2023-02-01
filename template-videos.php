<?php
/*
Template Name: Videos
*/
?>
<?php get_header();?>
	<main>
		<div class="container">
			<!-- Banner 1 -->
			<div class="row">
				<div class="col-md-9">
					<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
					  <div class="carousel-inner my-carousel pl-0 pr-0">
					  	<?php
						  $args = array( 'numberposts' => 3, 'category_name'=>'video', 'order'=>'ASC' );
						  $postslist = get_posts( $args );
						  foreach ($postslist as $indx=>$post) :  setup_postdata($post); ?>
						    <?php if($indx === 0 ):?>
						    	<div class="carousel-item active">
						    <?php else:?>
						    	<div class="carousel-item">
						    <?php endif; ?>
						        <div class="row">
						            <div class="col-md-12">
						                <?php if ( has_post_thumbnail() ) { the_post_thumbnail('',['class' => 'banner-carousel'] ); }else{ echo "<img src='https://files.idtechnology.com/VideoIcon-300px.jpg' class='img-full-width'/>"; } ?>
						           
						            </div>
						        </div>
						    </div>
						<?php endforeach; ?>
					  </div>
					  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
					    <span class="red carousel-control-prev-icon" aria-hidden="true"></span>
					    <span class="sr-only">Previous</span>
					  </a>
					  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
					    <span class="red carousel-control-next-icon" aria-hidden="true"></span>
					    <span class="sr-only">Next</span>
					  </a>
					</div>
				</div>
				<div class="col-md-3">
					<a href="https://twitter.com/intent/tweet?button_hashtag=nigeriadecides&ref_src=twsrc%5Etfw" class="twitter-hashtag-button" data-show-count="false">Tweet #nigeriadecides</a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
					<!-- to be replaced by the plugin -->
					<div style="background-color: grey;height: 90%;">
					</div>
				</div>
			</div>
			</div>
			<!-- end of banner 1 -->
			<!-- banner 4 -->
			<div class="container mt-3 p-1 ">
				<div class="row">
					<div class="col-md-9">
						<h2><span class="square-red-before"></span>Video Posts</h2>
									<div class="row">
						<?php
						  
						  $args2 = [
						  	'numberposts'=>4,
						  	'order'=> 'ASC',
						  	'category'=>'video',
						  	'offset'=>5
						  ];
						  $postslist2 = get_posts( $args2 );
						  foreach ($postslist2 as $indx=>$post) :  setup_postdata($post); ?>
						    <?php if($indx === 0 ):?>
						    	<div class="col-md-6">
						    		<!-- main video -->
						    		<a href="<?php the_permalink(); ?>">
						    		<?php if ( has_post_thumbnail() ) { the_post_thumbnail('',['class' => 'img-full-width height-200'] ); }else{ /*something to display instead */ } ?>
						    		</a>
										<a class="text-decoration-none text-dark" href="<?php the_permalink(); ?>">
											<p class="meta-excerpt"><?php punchng_election_monitor_custom_excerpt_length(the_excerpt()); ?></p>
										</a>
								<small class="meta-time"><?php the_date(); ?></small>
							</div>
							<div class="col-md-6">
						    <?php else:?>
						    	<!-- other videos -->
						    	<div class="row">
									<div class="col-md-4">
										<a href="<?php the_permalink(); ?>">
										<?php if ( has_post_thumbnail() ) { the_post_thumbnail('',['class' => 'equal-width-height-100 curved-img'] ); }else{ /*something to display instead */ } ?>
									</a>
									</div>
									<div class="col-md-8">
										<a class="text-decoration-none text-dark" href="<?php the_permalink(); ?>">
											<p class="meta-excerpt"><?php punchng_election_monitor_custom_excerpt_length(the_excerpt()); ?> </p>
										</a>
										<small class="meta-time"><?php the_date();?></small>
										<hr>
									</div>
								</div>
						    <?php endif; ?>
						<?php endforeach; ?>
						<?php 
						$catID = get_cat_ID('video'); 
						$catLink = get_category_link($catID);
						?>
					</div>

					</div>
					<div class="text-center p-2"><a href="<?php echo $catLink; ?>" class="btn btn-sm btn-danger pl-5 pr-5 circle text-center">See more</a></div>
					</div>
					<div class="col-md-3">
						<img src="<?php echo get_template_directory_uri();?>/assets/images/ad1.png" style="width: 100%;height: auto;">
					</div>
				</div>
			</div>
			<!-- banner 4 ends here -->

			<!-- banner 5 -->
			<div class="container mt-3 p-2 ">
				<h2><span class="square-red-before"></span>Election stories</h2>
				<div class="row">
					<div class="col-md-9">
						<div class="row">
							<div class="col-md-2">
								<img src="https://tasiukwaplong.github.io/punch-elections/assets/images/atiku.png" class="curved-img pt-3">
							</div>
							<div class="col-md-10">
								<h4 class="pt-3">Lorem Ipsium dotem</h4>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eius</p>
								<small>February 19, 2022</small>
								<span class="float-right right-comment">257 <i class="fa fa-comment"></i></span>
								<hr>
							</div>

							<div class="col-md-2">
								<img src="https://tasiukwaplong.github.io/punch-elections/assets/images/atiku.png" class="curved-img pt-3">
							</div>
							<div class="col-md-10">
								<h4 class="pt-3">Lorem Ipsium dotem</h4>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eius</p>
								<small>February 19, 2022</small>
								<span class="float-right right-comment">257 <i class="fa fa-comment"></i></span>
								<hr>
							</div>

							<div class="col-md-2">
								<img src="https://tasiukwaplong.github.io/punch-elections/assets/images/atiku.png" class="curved-img pt-3">
							</div>
							<div class="col-md-10">
								<h4 class="pt-3">Lorem Ipsium dotem</h4>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eius</p>
								<small>February 19, 2022</small>
								<span class="float-right right-comment">257 <i class="fa fa-comment"></i></span>
								<hr>
							</div>

							<div class="col-md-2">
								<img src="https://tasiukwaplong.github.io/punch-elections/assets/images/atiku.png" class="curved-img pt-3">
							</div>
							<div class="col-md-10">
								<h4 class="pt-3">Lorem Ipsium dotem</h4>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eius</p>
								<small>February 19, 2022</small>
								<span class="float-right right-comment">257 <i class="fa fa-comment"></i></span>
								<hr>
							</div>

							<div class="col-md-2">
								<img src="https://tasiukwaplong.github.io/punch-elections/assets/images/atiku.png" class="curved-img pt-3">
							</div>
							<div class="col-md-10">
								<h4 class="pt-3">Lorem Ipsium dotem</h4>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eius</p>
								<small>February 19, 2022</small>
								<span class="float-right right-comment">257 <i class="fa fa-comment"></i></span>
								<hr>
							</div>

							<div class="col-md-2">
								<img src="https://tasiukwaplong.github.io/punch-elections/assets/images/atiku.png" class="curved-img pt-3">
							</div>
							<div class="col-md-10">
								<h4 class="pt-3">Lorem Ipsium dotem</h4>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eius</p>
								<small>February 19, 2022</small>
								<span class="float-right right-comment">257 <i class="fa fa-comment"></i></span>
								<hr>
							</div>



							<div class="col-md-2">
								<img src="https://tasiukwaplong.github.io/punch-elections/assets/images/atiku.png" class="curved-img pt-3">
							</div>
							<div class="col-md-10">
								<h4 class="pt-3">Lorem Ipsium dotem</h4>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eius</p>
								<small>February 19, 2022</small>
								<span class="float-right right-comment">257 <i class="fa fa-comment"></i></span>
								<hr>
							</div>

							<div class="col-md-2">
								<img src="https://tasiukwaplong.github.io/punch-elections/assets/images/atiku.png" class="curved-img pt-3">
							</div>
							<div class="col-md-10">
								<h4 class="pt-3">Lorem Ipsium dotem</h4>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eius</p>
								<small>February 19, 2022</small>
								<span class="float-right right-comment">257 <i class="fa fa-comment"></i></span>
								<hr>
							</div>


						</div>
					</div>
					<div class="col-md-3">
						<div class="row">
							<div class="col-md-12">
								<img src="https://tasiukwaplong.github.io/punch-elections/assets/images/ad2.png" style="width: 100%;">
							</div>
							<div class="col-md-12 "><h5 class="mt-3">Presidential Candidates</h5></div>
							<div class="col-md-12">
								<!-- side news -->
								<div class="row mt-3">
									<div class="col-md-5">
										<img src="https://tasiukwaplong.github.io/punch-elections/assets/images/vid3.png" style="width: 100%;" class="curved-img">
									</div>
									<div class="col-md-7">
										<h6>Muhamadu Buhari</h6>
										<small>67% probability</small>
									</div>
								</div>

								<div class="row mt-3">
									<div class="col-md-5">
										<img src="https://tasiukwaplong.github.io/punch-elections/assets/images/vid3.png" style="width: 100%;" class="curved-img">
									</div>
									<div class="col-md-7">
										<h6>Muhamadu Buhari</h6>
										<small>67% probability</small>
									</div>
								</div>

								<div class="row mt-3">
									<div class="col-md-5">
										<img src="https://tasiukwaplong.github.io/punch-elections/assets/images/vid3.png" style="width: 100%;" class="curved-img">
									</div>
									<div class="col-md-7">
										<h6>Muhamadu Buhari</h6>
										<small>67% probability</small>
									</div>
								</div>

								<div class="row mt-3">
									<div class="col-md-5">
										<img src="https://tasiukwaplong.github.io/punch-elections/assets/images/vid3.png" style="width: 100%;" class="curved-img">
									</div>
									<div class="col-md-7">
										<h6>Muhamadu Buhari</h6>
										<small>67% probability</small>
									</div>
								</div>


								<div class="row mt-3">
									<div class="col-md-5">
										<img src="https://tasiukwaplong.github.io/punch-elections/assets/images/vid3.png" style="width: 100%;" class="curved-img">
									</div>
									<div class="col-md-7">
										<h6>Muhamadu Buhari</h6>
										<small>67% probability</small>
									</div>
								</div>

								<div class="row mt-3">
									<div class="col-md-12">
										<img src="https://tasiukwaplong.github.io/punch-elections/assets/images/ad1.png" style="width: 100%;" class="curved-img">
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