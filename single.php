<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Artisan dashboard</title>
    <!-- jQuery library -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    <?php wp_head(); ?>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    
</head>
<body>
<h1 class="text-center"><a href="/"> GO HOME</a></h1>
	
	<?php if (have_posts()) : ?>
		<?php 
		while(have_posts()){
			the_post();
			get_template_part( 'includes/page','article');
		}
		?>
	
		<?php else: ?>
			<div class="row">
				<div class="col-lg-12">
					<h1 class="text-center"><i>NOTHING TO DISPLAY</i></h1>			
				</div>
			</div>
		<?php endif;?>
	
 <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>