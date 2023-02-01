<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>PUNCH | ELECTION MONITOR</title>
	<?php wp_head(); ?>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
	<header>
		<!-- navigation starts here -->
		<nav class="navbar navbar-expand-md red navbar-dark">
			<!-- Brand -->
			<a class="navbar-brand" href="#"></a>
			<!-- Toggler/collapsibe Button -->
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
				<span class="navbar-toggler-icon"></span>
			</button>

		  <!-- Navbar links -->
		  <div class="collapse navbar-collapse" id="collapsibleNavbar">
		  	<?php wp_nav_menu(
                array(
                    "theme_location" => 'top-menu',
                    'items_wrap' => '<ul class="navbar-nav">%3$s</ul>',
                    'container'=>''
                )
            );?>
		    <!--ul class="navbar-nav">
		    	<li class="nav-item">
		        <a class="nav-link" href="<?php echo home_url(); ?>">Home</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="live-updates">Live Update</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="election2023">Election 2023</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="videos">Videos</a>
		      </li>
		      <li class="nav-item">
		        <a href="https://punchng.com" class="nav-link " href="#">Return to home page</a>
		      </li>
		    </ul-->
		  </div>
		</nav>
		<!-- navigation stops here -->

		<div class="text-center m-3">
			<img src="<?php echo get_template_directory_uri();?>/assets/images/flier.png" class="img-responsive" style="height: 50px; ">
		</div>
	</header>