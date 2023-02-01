<?php
/*
Template Name: Live updates
*/
?>
<?php get_header();?>
	<main>
		<div class="container">
			<!-- Banner 1 -->
			<div class="row">

				<div class="col-md-9">
                    <h2><span class="square-red-before"></span>Live Updates</h2>
                    <div style="padding-left: 20px;">
                        <ul class="experiences">

                        <?php
						  $args = [
						  	'numberposts'=>10,
						  	'order'=> 'DESC',
						  	'category'=>'live-updates'
						  ];

						  $postslist = get_posts( $args );
						  foreach ($postslist as $indx=>$post) :  setup_postdata($post); ?>

						    	<li>
						    		<a href="<?php the_permalink();?>">
							    		<h5><?php the_title();?></h5>
							    		<small><?php the_author_link();?></small>
							    		<p><?php the_excerpt();?>
							    		</p>
							    		<span>react | comment | share</span>
						    		</a>
						    		<hr>
						    	</li>						            
						<?php endforeach; ?>

                        <li></li>
                    </ul>

                    </div>
                </div>

				<div class="col-md-3">
                    <div class="row">
                        <div class="col-md-12">
                          <a href="https://twitter.com/intent/tweet?button_hashtag=nigeriadecides&ref_src=twsrc%5Etfw" class="twitter-hashtag-button" data-show-count="false">Tweet #nigeriadecides</a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                            <!-- to be replaced by the plugin -->
                            <div style="background-color: grey;height: 250px;">
                            </div>  
                        </div>    

                        <div class="col-md-12 text-center">
                            <br><hr>
                            <h3 class="mt-3">Weekly Newsletter</h3>
                            <small>Subscribe to stay up-to-date on all the latest news</small>
                            <input class="form-control m-1" placeholder="Email" />
                            <button class="mt-1 btn btn-danger">Sign up</button>
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
                                    <div class="col-md-12">
                                        <img src="assets/images/ad1.png" style="width: 100%;" class="curved-img">
                                    </div>
                                </div>
                            </div>
                        <div class="col-md-12">
                            <img src="assets/images/ad1.jpg" style="width:100%">
                        </div>
                    </div>
				</div>
			</div>
			<!-- end of banner 1 -->
		
		</div>
	</main>
<?php  get_footer();?>