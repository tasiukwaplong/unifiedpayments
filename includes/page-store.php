<section class="container p-5">
    <div class="row p-2">
        <?php
          $args = [
            // 'numberposts'=>3,
            'order'=> 'ASC',
            'post_type'=>'store'
          ];
          
          $postslist = get_posts( $args );
          foreach ($postslist as $indx=>$post) :  setup_postdata($post); ?>
            <?php 
              $meta = get_post_meta( $post->ID);
              if(isset($meta['cost'])):
            ?>
                <div class="col-lg-4">
                    
                    <div class="card">
                        <div class="card-header">
                            <?php the_title(); ?>
                        </div>
                        <div class="card-body p-0 m-0">
                            <?php if ( has_post_thumbnail() ) { the_post_thumbnail('',['class' => 'w-100'] ); }else{ echo "<img src='https://files.idtechnology.com/VideoIcon-300px.jpg' class='img-full-width'/>"; } ?>
                        </div>
                        <div class="card-footer">
                            <?php echo '&#8358;'.$meta['cost'][0];?>

                            <a href="<?php the_permalink();?>" class="btn btn-warning float-right">Place order</a>
                        </div>
                    </div>
                </div>
        <?php endif; endforeach; ?>
        <div class="col-lg-12">
            <?php the_posts_pagination();?> </div>

    </div>
</section>