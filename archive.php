
<?php get_header();?>
	<main>
		<div class="container">

			<!-- banner 5 -->
			<div class="container mt-3 p-2 ">
				<h2><span class="square-red-before"></span><?php the_archive_title(); ?></h2>
				<div class="row">
					<div class="col-md-9">
						<div class="row">
							<?php if( have_posts() ) : ?>
							<?php while( have_posts() ) : the_post() ?>

							<div class="col-md-2">
								<?php if ( has_post_thumbnail() ) { the_post_thumbnail('my-custom-image-size',['class' => 'img-full-width curved-img height-200 pt-3'] ); }else{ /*something to display instead */ } ?>
								<!-- <img src="https://tasiukwaplong.github.io/punch-elections/assets/images/atiku.png" class="curved-img pt-3"> -->
							</div>
							<div class="col-md-10">
								<p class="meta-title pt-3"><?php the_title();?></p>
								<p class="meta-excerpt"><p><?php punchng_election_monitor_custom_excerpt_length(the_excerpt()); ?></p>
								<a class="btn btn-sm btn-danger red decoration-none" href="<?php the_permalink();?>">Read more</a>
							</p>
								<small class="meta-time"><?php the_date();?></small>
									<span class="float-right right-comment light-red"><?php comments_number(); ?> <i class="fa fa-comment"></i></span>
								<hr>
							</div>
                      		<?php endwhile ?>  
                      		<?php the_posts_pagination();?>              
                      		<?php endif ?>                

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