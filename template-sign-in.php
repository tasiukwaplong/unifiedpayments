<?php
/*
Template Name: Sign-in
*/
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />

  <title></title>
  <meta content="" name="description" />
  <meta content="" name="keywords" />

  <!-- Favicons -->
  <link href="<?php echo get_template_directory_uri();?>/assets/img/favicon.png" rel="icon" />
  <link href="<?php echo get_template_directory_uri();?>/assets/img/apple-touch-icon.png" rel="apple-touch-icon" />

  <!-- Google Fonts -->
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet" />

  <!-- Vendor CSS Files -->
  <link href="<?php echo get_template_directory_uri();?>/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
  <link href="<?php echo get_template_directory_uri();?>/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet" />
  <link href="<?php echo get_template_directory_uri();?>/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet" />

  <!-- Template Main CSS File -->
  <link href="<?php echo get_template_directory_uri();?>/assets/css/style.css" rel="stylesheet" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

</head>

<body>
  <main class="login d-flex justify-content-center align-items-center">
    <div class="form">
      <div class="form-header">
        <img src="<?php echo get_template_directory_uri();?>/assets/img/portfolio/portfolio-2.jpg" alt="" />
        <p><span>FMIS unitedPayments</span></p>
      </div>
      <?php get_template_part('includes/login', 'user'); ?>
      <p class="text">
        <span>New Students </span> are to use their Jamb Registration Number
        as the User ID
        <span>Returning </span>
        Students are to use their matriculation Number as the User ID
      </p>
    </div>
  </main>

  <!-- Vendor JS Files -->
  <script src="<?php echo get_template_directory_uri();?>/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Template Main JS File -->
  <script src="<?php echo get_template_directory_uri();?>/assets/js/main.js"></script>
</body>

</html>