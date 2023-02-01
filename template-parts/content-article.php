<div class="col-md-9 container">
          <hr>
          <h4><?php the_title();?></h4>
          By <span class="meta_author"><?php the_author_link();?> </span><small class="meta_date"><?php the_date();?></small>
          <div class="m-2">
              <span><img src="<?php echo get_template_directory_uri();?>/assets/images/twitter.png" class="social-icons"></span>&nbsp;&nbsp;
              <span><img src="<?php echo get_template_directory_uri();?>/assets/images/instagram.png" class="social-icons"></span>&nbsp;&nbsp;
              <span><img src="<?php echo get_template_directory_uri();?>/assets/images/facebook.png" class="social-icons"></span>
              <span class="float-right right-comment"><span class="float-right right-comment light-red"><?php comments_number(); ?> <i class="fa fa-comment"></i></span></span>
            </div>

             <?php if ( has_post_thumbnail() ) { the_post_thumbnail('',['class'=> 'img-full-width red-border-before height-400']);} ?>
            <p class="news-content pt-3 pb-3"><?php the_content( ); ?></p>

            <div class="m-2">
              <span><img src="<?php echo get_template_directory_uri();?>/assets/images/twitter.png" class="social-icons"></span>&nbsp;&nbsp;
              <span><img src="<?php echo get_template_directory_uri();?>/assets/images/instagram.png" class="social-icons"></span>&nbsp;&nbsp;
              <span><img src="<?php echo get_template_directory_uri();?>/assets/images/facebook.png" class="social-icons"></span>
              &nbsp;&nbsp;&nbsp;
              <span class="right-comment"><?php comments_number();?></span>
              &nbsp;&nbsp;&nbsp;
              <i class="fa fa-tag red"></i>
              &nbsp;&nbsp;
              <?php the_tags('#'); ?>
            </div>
</div>