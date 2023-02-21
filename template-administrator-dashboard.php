<?php
/*
Template Name: Administrator dashboard
*/
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Administrator | unitedPayment</title>


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
</head>
</head>

<body>
    <nav>
        <div class="logo">
            <img src="<?php echo get_template_directory_uri();?>/assets/img/testimonials/testimonials-2.jpg" alt="" />
            <p class="text-uppercase">federal university of lafia</p>
        </div>
        <div class="d-flex gap-2">
            <form action="" method="post">
                <input class="border-opacity-25 " type="text" placeholder="search">
                <i class="bx bx-search search"></i>

            </form>
            <div class="notify">
                <a href="/logout" title='/cart' class='text-success'><i class="bx bx-cart  "></i></a>
                <a href="<?php echo wp_logout_url(home_url()) ?>" class='text-danger'><i class="bx bx-power-off"></i></a>
            </div>
        </div>
    </nav>
    <div class="container-fluid row">
        <div class="sidebar col-3 px-4">
            <div class="profile d-flex gap-3">
                <img class="" src="<?php echo get_template_directory_uri();?>/assets/img/testimonials/testimonials-4.jpg" alt="">
                <div class="">
                    <div class="fw-bold">Adulrazaq Sikirullah</div>
                    <div>00000000000</div>
                </div>
            </div>
            <div class="dashboard-links">
                <li><a class=" text-decoration-none" href="">Dashboard</a></li>
                <li><a class=" text-decoration-none" href="">Payment</a></li>
                <li><a class=" text-decoration-none" href="">Support</a></li>
            </div>
        </div>
        <div class="payment d-flex flex-column gap-5 col-9">
            <div class="activities row gap-5">
                <div class="item col pt-2">
                    <i class="bx bx-up-arrow"></i>
                    <p>Faculty Dues Owned</p>
                    <p>
                        You have not paid your faculty dues for this session, please do so in orde to be able to print
                        and sign clearance
                    </p>
                </div>
                <div class="item col p-2">
                    <i class="bx bx-home-smile"></i>
                    <p>Accomodmodation</p>
                    <p>
                        Payment was successful; Go yo Student Affairs office for acknowledgement and collect your
                        accommodation ballot
                    </p>
                </div>
                <div class="item col pt-2">
                    <i class="bx bx-registered"></i>
                    <p>Late Registration For 2022/2023</p>
                    <p>
                        Late Registration attracts fee penalty
                    </p>
                </div>
                <div class="item col pt-2">
                    <i class="bx bxs-school"></i>
                    <p>Departmental Dues Owned</p>
                    <p>
                        You have not paid your faculty dues for this session, please do so in order to be able to print
                        and sign clearance
                    </p>
                </div>
            </div>
            <div class="record-table">
                <table class="table">
                    <thead>
                        <tr>
                            <th>payment for;</th>
                            <th>RRR</th>
                            <th>Date</th>
                            <th>Amount</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>undergratuate school charges</td>
                            <td>12345678</td>
                            <td>30/12/2022</td>
                            <td>45,000</td>
                            <td>
                                <div class="error">error</div>
                            </td>
                            <td><i class="bx bx-dots-vertical"></i></td>

                        </tr>
                        <tr>
                            <td>GST Charges</td>
                            <td>12345678</td>
                            <td>30/12/2022</td>
                            <td>45,000</td>
                            <td>
                                <div class="succes">succes</div>
                            </td>
                            <td><i class="bx bx-dots-vertical"></i></td>

                        </tr>
                        <tr>
                            <td>ESP Charges</td>
                            <td>12345678</td>
                            <td>30/12/2022</td>
                            <td>45,000</td>
                            <td>
                                <div class="error">error</div>
                            </td>
                            <td><i class="bx bx-dots-vertical"></i></td>

                        </tr>
                        <tr>
                            <td>ID Card Replacement</td>
                            <td>12345678</td>
                            <td>30/12/2022</td>
                            <td>45,000</td>
                            <td>
                                <div class="succes">succes</div>
                            </td>
                            <td><i class="bx bx-dots-vertical"></i></td>

                        </tr>
                        <tr>
                            <td>Portal Charges</td>
                            <td>12345678</td>
                            <td>30/12/2022</td>
                            <td>45,000</td>
                            <td>
                                <div class="error">error</div>
                            </td>
                            <td><i class="bx bx-dots-vertical"></i></td>

                        </tr>
                        <tr>
                            <td>Hostel Fee</td>
                            <td>12345678</td>
                            <td>30/12/2022</td>
                            <td>45,000</td>
                            <td>
                                <div class="succes">succes</div>
                            </td>
                            <td><i class="bx bx-dots-vertical"></i></td>

                        </tr>
                        <tr>
                            <td>Departmental Registration Charges</td>
                            <td>12345678</td>
                            <td>30/12/2022</td>
                            <td>45,000</td>
                            <td>
                                <div class="error">error</div>
                            </td>
                            <td><i class="bx bx-dots-vertical"></i></td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Vendor JS Files -->
    <script src="<?php echo get_template_directory_uri();?>/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Template Main JS File -->
    <script src="<?php echo get_template_directory_uri();?>/assets/js/main.js"></script>
</body>

</html>