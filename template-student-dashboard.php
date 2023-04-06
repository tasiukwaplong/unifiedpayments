<?php
/*
Template Name: Student dashboard
*/
?>
<?php
       $current_user = wp_get_current_user();
       $role_name      = $current_user->roles[0];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Student | unitedPayment</title>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    <!-- Favicons -->
    <link href="<?php echo get_template_directory_uri();?>/assets/img/favicon.png" rel="icon" />
    <link href="<?php echo get_template_directory_uri();?>/assets/img/apple-touch-icon.png" rel="apple-touch-icon" />

    <!-- Google Fonts -->


    <!-- Vendor CSS Files -->
    <link href="<?php echo get_template_directory_uri();?>/assets/vendor/bootstrap/css/bootstrap.css" rel="stylesheet" />
    <link href="<?php echo get_template_directory_uri();?>/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet" />
    <link href="<?php echo get_template_directory_uri();?>/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet" />

    <!-- Template Main CSS File -->
    <link href="<?php echo get_template_directory_uri();?>/assets/css/style.css" rel="stylesheet" />
    <style>
        .btn-group-vertical>.btn:not(:first-child),
        .btn-group-vertical>.btn-group:not(:first-child) {
            margin-top: 0;
        }
    </style>
   <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />
   <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
</head>
</head>

<body>
    <nav>
        <div class="logo">
            <img src="<?php echo get_template_directory_uri();?>/assets/img/testimonials/testimonials-2.png" alt="" />
            <p class="text-uppercase">federal university of lafia</p>
        </div>
        <div class="d-flex gap-2">
            <form action="" method="post">
                <input class="border-opacity-25 " type="text" placeholder="search">
                <i class="bx bx-search search"></i>

            </form>
            <div class="notify">
                <a href="/logout" title='Settings' class='text-dark'><i class="bx bx-cog"></i></a>
                <a href="<?php echo wp_logout_url(home_url()) ?>" class='text-danger'><i class="bx bx-power-off"></i></a>
            </div>
        </div>
    </nav>
    <div class="container-fluid row">
        <div class="sidebar col-3 px-4">
            <div class="profile d-flex gap-3">
            <img src="<?php echo get_template_directory_uri();?>/assets/img/testimonials/user.png" alt="">
                <div class="">
                    <div class="fw-bold">
                        <?php echo $current_user->user_email ?? '';?>
                    </div>
                    <div><?php echo $role_name ?? '';?></div>
                </div>
            </div>
            <div class="dashboard-links">
                <li><a class=" text-decoration-none" href="/student-dashboard">Dashboard</a></li>
                <li><a class=" text-decoration-none" href="<?php echo esc_url( add_query_arg( 'p', 'payment-history' ) );?>">Payment history</a></li>
                <li><a class=" text-decoration-none" href="<?php echo esc_url( add_query_arg( 'p', 'complain' ) );?>">Complains</a></li>
                <li><a class=" text-decoration-none" href="/logout" title='Settings' class='text-dark'>Logout</a></li>
            </div>
        </div>
        <?php
        if( is_user_logged_in() ) {
               $current_user   = wp_get_current_user();
               $role_name      = $current_user->roles[0];

                if ( 'student' !== $role_name ) {
                    echo '<div class="payment d-flex flex-column gap-5 col-9">
                    <div class="activities row gap-5">
                        <div class="item col pt-2">';
                    echo '<div class="flex-d">CANNOT GRANT ACCESS !! <hr>';
                    echo '<a href="'.wp_logout_url(home_url()).'">Go back to login page</a> </div>';
                    echo '</div></div></div>';
                   die();
                }

                $page = htmlentities($_GET['p'] ?? '');

                $clientMeta = get_user_meta($current_user->ID);
                if(false === get_template_part('includes/pages/student', $page)){
                    get_template_part('includes/pages/student', 'dashboard');
                }
         
          } else {
               echo '<script>window.location="'.home_url().'"</script>';
               die();
          }
    ?>
    </div>
    <!-- Vendor JS Files -->
    <script src="<?php echo get_template_directory_uri();?>/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Template Main JS File -->
    <script src="<?php echo get_template_directory_uri();?>/assets/js/main.js"></script>
</body>

</html>