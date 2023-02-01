<?php get_header(); ?>
	<main>
		<div class="container">
			<!-- Banner 1 -->

			<div class="row">

				<div class="col-md-9">
					<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
					  <div class="carousel-inner my-carousel pl-0 pr-0">
					  	<?php
						  $args = array( 'numberposts' => 3 );
						  $postslist = get_posts( $args );
						  foreach ($postslist as $indx=>$post) :  setup_postdata($post); ?>
						    <?php if($indx === 0 ):?>
						    	<div class="carousel-item active">
						    <?php else:?>
						    	<div class="carousel-item">
						    <?php endif; ?>
						        <div class="row">
						            <div class="col-md-8">
						                <?php if ( has_post_thumbnail() ) { the_post_thumbnail('',['class' => 'banner-carousel'] ); }else{ /*something to display instead */ } ?>
						            </div>
						            <div class="col-md-4">
						                <br>
						                <span class="p-1 meta-link text-decoration-none float-right  right-notification">&nbsp;&nbsp;&nbsp;<?php the_category(',') || ''; ?></span>
						                <br>
						                <p class="meta-title"><?php the_title(); ?></p>
						                <p class="meta-excerpt"><?php punchng_election_monitor_custom_excerpt_length(the_excerpt()); ?></p>
						                <small class="meta-date text-dark"><?php the_date(); ?></small>
						                <br>
						                <a href="<?php the_permalink(); ?>" class="pl-4 pr-4 mt-2 mt-2 btn btn-dark"><small>Show more</small></a>
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
					<div style="background-color: grey;height: 100%;">
					</div>
				</div>
			</div>
		</div>
			<!-- end of banner 1 -->

			<!-- banner 2 -->
			<div class="container mt-3 p-1 presidential-carousel">
				<h2><span class="square-red-before"></span>Presidential Candidates</h2>
				<div id="carouselExampleSlidesOnly2" class="carousel slide" data-ride="carousel">
				  <div class="carousel-inner">
				  	<div class="carousel-item active">
				  		<div class="row">
				    <?php
						  $args = [
						  	'numberposts'=>20,
						  	'order'=> 'DESC',
						  	'category'=>'presidential-candidates'
						  ];

						  $postslist = get_posts( $args );
						  foreach ($postslist as $indx=>$post) :  setup_postdata($post); ?>

						    <?php if(($indx + 1) % 6 == 0){ ?>
						    	<div class="col-sm-2  col-xs-2  col-md-2">
						    		<a href="<?php the_permalink();?>">
						    			<?php if ( has_post_thumbnail() ) { the_post_thumbnail('',['class' => 'img-full-width d-block w-100'] ); }else{ 
								                	echo "<img src='https://icons-for-free.com/iconfiles/png/512/person-1324760545186718018.png' class='img-full-width d-block w-100'/>";} ?>
									</a>
								</div>
							</div>
						</div>
							 <div class="carousel-item">
							 	<!-- create a new row if already 12 -->
							    <div class="row">
									    <?php }else{ ?>
									    	<div class="col-sm-2  col-xs-2  col-md-2">
												    		<a href="<?php the_permalink();?>">
									                <?php if ( has_post_thumbnail() ) { the_post_thumbnail('',['class' => 'img-full-width d-block w-100'] ); }else{ 
									                	echo "<img src='https://icons-for-free.com/iconfiles/png/512/person-1324760545186718018.png' class='img-full-width d-block w-100'/>";} ?>
									                </a>
									            </div>
									    <?php } ?>

									            
									<?php endforeach; ?>
						        </div>
				  			</div>
				  			<a class="carousel-control-prev" href="#carouselExampleControls2" role="button" data-slide="prev">
				  				<span class="red carousel-control-prev-icon" aria-hidden="true"></span>
				  				<span class="sr-only">Previous</span>
				  			</a>
				  			<a class="carousel-control-next" href="#carouselExampleControls2" role="button" data-slide="next">
				  				<span class="red carousel-control-next-icon" aria-hidden="true"></span>
				  				<span class="sr-only">Next</span>
				  			</a>
				  		</div>
						<?php 
						$catID = get_cat_ID('presidential-candidates'); 
						$catLink = get_category_link($catID);
						?>
						<div class="text-center p-2"><a href="<?php echo $catLink; ?>" class="btn btn-sm btn-danger pl-5 pr-5 circle text-center">See more</a></div>
			</div>
		</div>
			<!-- end of banner 2 -->

			<!-- banner 3 -->
			<div class="container mt-3 p-1 ">
				<h2><span class="square-red-before"></span>Voter Education</h2>
				<div class="row">
					<?php
						  $args = array( 'numberposts' => 3, 'order'=> 'DESC', 'category'=>'voter-education');
						  $postslist = get_posts( $args );
						  foreach ($postslist as $indx=>$post) :  setup_postdata($post); ?>
						            <div class="col-md-3 ">
						                <a class="text-decoration-none meta-link text-dark" href="<?php the_permalink();?>">
						                <?php if ( has_post_thumbnail() ) { the_post_thumbnail('',['class' => 'img-full-width height-200'] ); }else{ /*something to display instead */ } ?>
						                <P class="meta-title"><?php the_title();?></P>
						                <p class="meta-excerpt"><?php the_excerpt();?></p>
						            </a>
						                <small class="meta-date"><?php the_date();?></small>

						            </div>
						<?php endforeach; ?>
					<div class="col-md-3 text-center">
						<h3 class="mt-3">Weekly Newsletter</h3>
						<small>Subscribe to stay up-to-date on all the latest news</small>
						<input class="form-control m-1" placeholder="Email" />
						<button class="mt-1 btn btn-danger">Sign up</button>
					</div>
					<div class="col-md-12">
						<?php 
						$catID = get_cat_ID('voter-education'); 
						$catLink = get_category_link($catID);
						?>
						<div class="text-center p-2"><a href="<?php echo $catLink; ?>" class="btn btn-sm btn-danger pl-5 pr-5 circle text-center">See more</a></div>
					</div>
				</div>
			</div>
			<!-- end of banner 3 -->

			<!-- banner 4 -->
			<div class="container mt-3 p-1 ">
				<div class="row">
					<div class="col-md-9">
						<h2><span class="square-red-before"></span>Video Posts</h2>
									<div class="row">
						<?php
						  
						  $args2 = [
						  	'numberposts'=>4,
						  	'order'=> 'DESC',
						  	'category-name'=>'election-stories'
						  ];
						  $postslist2 = get_posts( $args2 );
						  foreach ($postslist2 as $indx=>$post) :  setup_postdata($post); ?>
						    <?php if($indx === 0 ):?>
						    	<div class="col-md-6">
						    		<!-- main video -->
						    		<a href="<?php the_permalink(); ?>">
						    		<?php if ( has_post_thumbnail() ) { the_post_thumbnail('',['class' => 'img-full-width height-200'] ); }else{ /*something to display instead */ } ?>
						    		</a>
								<p class="meta-excerpt"><?php punchng_election_monitor_custom_excerpt_length(the_excerpt()); ?></p>
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
									<div class="col-md-8"><?php punchng_election_monitor_custom_excerpt_length(the_excerpt()); ?> 
										<p><small class="meta-time"><?php the_date();?></small></p>
										<hr>
									</div>
								</div>
						    <?php endif; ?>
						<?php endforeach; ?>
						<?php 
						$catID = get_cat_ID('election-stories'); 
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
						<?php
						  $args = [
						  	'numberposts'=>5,
						  	'order'=> 'DESC',
						  	'category'=>'election-stories'
						  ];
						  $postslist = get_posts( $args );
						  
						  foreach ($postslist as $indx=>$post) :  setup_postdata($post); ?>
						    	<div class="col-md-2">
									<a class="text-decoration-none text-dark" href="<?php the_permalink();?>">
									<?php if ( has_post_thumbnail() ) { the_post_thumbnail('',['class' => 'equal-width-height-100 curved-img'] ); }else{ /*something to display instead */ } ?>
									</a>
								</div>

								<div class="col-md-10">
									<a class="text-decoration-none text-dark" href="<?php the_permalink();?>">
									<p class="pt-3 meta-title"><?php the_title(); ?></p>
									<p><?php punchng_election_monitor_custom_excerpt_length(the_excerpt()); ?></p>
									<small class="meta-date"><?php the_date(); ?></small>
									<span class="float-right right-comment light-red"><?php comments_number(); ?> <i class="fa fa-comment"></i></span>
									<hr>
								</a>
								</div>
						<?php endforeach; ?>
						</div>

						<?php 
						$catID = get_cat_ID('election-stories'); 
						$catLink = get_category_link($catID);
						?>
					<div class="text-center p-2"><a href="<?php echo $catLink; ?>" class="btn btn-sm btn-danger pl-5 pr-5 circle text-center">See more</a></div>
					</div>
					<div class="col-md-3">
						
					</div>
				</div>
			</div>
			<!-- end of banner 5 -->
		</div>
	</main>
<?php get_footer(); ?>