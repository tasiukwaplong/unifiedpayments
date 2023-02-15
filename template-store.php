<?php
/*
Template Name: Store
*/
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Voctech | Store</title>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/css/stylesheet.css" />
    <link href="http://fonts.cdnfonts.com/css/montserrat" rel="stylesheet" />
    <link
      href="https://fonts.googleapis.com/css?family=Inter"
      rel="stylesheet"
    />
    <!-- CSS only -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"
      integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
  </head>
  <body>
    <section class="header-store">
      <img src="<?php echo get_template_directory_uri();?>/images/Group 26.png" class="logo-store" alt="logo" />

      <ul id="navigation">
        <li><a class="active" href="<?php echo home_url();?>">Home</a></li>
      <li><a href="<?php echo home_url();?>/about">About</a></li>
        <li><a href="<?php echo home_url();?>/trainings">Trainings</a></li>
        <li><a href="<?php echo home_url();?>#contact">Contact Us</a></li>
        <li><a href="<?php echo home_url();?>/store">Store</a></li>
        <a id="signup-store" style="color: indianred" href="<?php echo home_url();?>/sign-up"
          >Register</a
        >
        <a id="login-store" href="<?php echo home_url();?>/sign-in">Login</a>
        <a href="#" id="close"><i class="fa-solid fa-xmark"></i></a>
      </ul>
      <div id="mobile">
        <i id="bar" class="fas fa-outdent"></i>
      </div>

      <ul class="nav-button-store">
        <li>
          <a
            style="color: indianred; font-family: 'Inter'; font-weight: 600"
            href="<?php echo home_url();?>/sign-up"
            >Register</a
          >
        </li>
        <li>
          <a style="font-family: 'Inter'; font-weight: 600" href="<?php echo home_url();?>/sign-in"
            >Login</a
          >
        </li>
      </ul>
    </section>
    <section class="store-store">
      <div class="container text-center">
        <h1 style="letter-spacing: 1px; font-family: 'Inter'; font-weight: 500">
          <b>Our convinient <br />Store services</b>
        </h1>
      </div>
      <div class="product-holder-store">
        <div class="product-item-store">
          <img src="<?php echo get_template_directory_uri();?>/images/Rectangle-contact.png" class="" alt="product" />
          <div class="product-details-store">
            <h6 style="font-family: 'Inter'">Frults</h6>
            <div>
              <button style="font-family: 'Inter'">Order</button>
              <!-- <a href="">Order</a>-->
            </div>
          </div>
        </div>
        <div class="product-item-store">
          <img src="<?php echo get_template_directory_uri();?>/images/Group 29.png" alt="product" />
          <div class="product-details-store">
            <h6 style="font-family: 'Inter'">Frults</h6>
            <div>
              <button style="font-family: 'Inter'">Order</button>
              <!-- <a href="">Order</a>-->
            </div>
          </div>
        </div>
        <div class="product-item-store">
          <img src="<?php echo get_template_directory_uri();?>/images/Group 29.png" alt="product" />
          <div class="product-details-store">
            <h6 style="font-family: 'Inter'">Frults</h6>
            <div>
              <button style="font-family: 'Inter'">Order</button>
              <!-- <a href="">Order</a>-->
            </div>
          </div>
        </div>
        <div class="product-item-store">
          <img src="<?php echo get_template_directory_uri();?>/images/Group 29.png" alt="product" />
          <div class="product-details-store">
            <h6 style="font-family: 'Inter'">Frults</h6>
            <div>
              <button style="font-family: 'Inter'">Order</button>
              <!-- <a href="">Order</a>-->
            </div>
          </div>
        </div>
        <div class="product-item-store">
          <img src="<?php echo get_template_directory_uri();?>/images/Group 29.png" alt="product" />
          <div class="product-details-store">
            <h6 style="font-family: 'Inter'">Frults</h6>
            <div>
              <button style="font-family: 'Inter'">Order</button>
              <!-- <a href="">Order</a>-->
            </div>
          </div>
        </div>
        <div class="product-item-store">
          <img src="<?php echo get_template_directory_uri();?>/images/Group 29.png" alt="product" />
          <div class="product-details-store">
            <h6 style="font-family: 'Inter'">Frults</h6>
            <div>
              <button style="font-family: 'Inter'">Order</button>
              <!-- <a href="">Order</a>-->
            </div>
          </div>
        </div>
      </div>
      <!---
      <div class="container mt-5 px-5">
        <div class="row px-5 g-1">
          <div class="col-4">
            <img src="./images/Rectangle-contact.png" class="" alt="product" />
            <div class="py-4 row">
              <div class="col-7 text-end"><h6>Frults</h6></div>
              <div class="col-4 pt-1 text-end">
                <a href="">Order</a>
              </div>
            </div>
          </div>
          <div class="col-4">
            <img src="./images/Group 29.png" alt="product" />
            <div class="py-4 row">
              <div class="col-7 text-end"><h6>Frults</h6></div>
              <div class="col-4 pt-1 text-end">
                <a href="">Order</a>
              </div>
            </div>
          </div>
          <div class="col-4">
            <img src="./images/Group 29.png" alt="product" />
            <div class="py-4 row">
              <div class="col-7 text-end"><h6>Frults</h6></div>
              <div class="col-4 pt-1 text-end">
                <a href="">Order</a>
              </div>
            </div>
          </div>
          <div class="col-4">
            <img src="./images/Group 29.png" class="img-fluid" alt="product" />
            <div class="py-4 row">
              <div class="col-7 text-end"><h6>Frults</h6></div>
              <div class="col-4 pt-1 text-end">
                <a href="">Order</a>
              </div>
            </div>
          </div>
          <div class="col-4">
            <img src="./images/Group 29.png" alt="product" />
            <div class="py-4 row">
              <div class="col-7 text-end"><h6>Frults</h6></div>
              <div class="col-4 pt-1 text-end">
                <a href="">Order</a>
              </div>
            </div>
          </div>
          <div class="col-4">
            <img src="./images/Group 29.png" alt="product" />
            <div class="py-4 row">
              <div class="col-7 text-end"><h6>Frults</h6></div>
              <div class="col-4 pt-1 text-end">
                <a href="">Order</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      -->
    </section>
    <section class="container-fluid p-5 mt-5" style="background-color: #03303e">
      <div class="mx-auto">
        <p class="text-center text-white" style="font-family: 'Inter'">
          (C) Lorem ipsum dolor sit amet, consectetur adipiscing elit.
        </p>
      </div>
    </section>
     <script src="<?php echo get_template_directory_uri();?>/index.js"></script>
  </body>
</html>
