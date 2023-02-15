<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>VOCTECH</title>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/css/homepage.css" />
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
    <section class="header">
      <img src="<?php echo get_template_directory_uri();?>/images/Group 26.png" class="logo" alt="logo" />

      <ul id="navigation">
        <li><a class="active" href="<?php echo home_url();?>">Home</a></li>
        <li><a href="./about">About</a></li>
        <li><a href="./trainings">Trainings</a></li>
        <li><a href="#contact">Contact Us</a></li>
        <li><a href="./store">Store</a></li>
        <a id="signup" style="color: indianred" href="./sign-up"
          >Register</a
        >
        <a id="login" href="sign-in">Login</a>
        <a href="#" id="close"><i class="fa-solid fa-xmark"></i></a>
      </ul>
      <div id="mobile">
        <i id="bar" class="fas fa-outdent"></i>
      </div>

      <ul class="nav-button">
        <li><a style="color: indianred" href="./sign-up">Register</a></li>
        <li><a href="./sign-in">Login</a></li>
      </ul>
    </section>
    <div class="tinner">
      <section class="container mx-auto pb-5 hero">
        <div class="row px-5 pb-5 g-0">
          <div class="col-sm-7 pb-5">
            <h1>Delivering swift and convinient services</h1>
            <div class="col-sm-9">
              <p class="" style="font-family: 'Inter'">
                We help you deliver a reliable and convient smart service that
                you don’t need visiting the workshop yourself.
              </p>
              <div class="pt-2 col-sm-12">
                <a
                  class="float-start"
                  style="
                    color: black;
                    text-decoration: none;
                    font-family: 'Inter';
                    font-weight: 600;
                  "
                  href="about/"
                  >Learn More</a
                >
              </div>
            </div>
          </div>
          <div class="col">
            <img src="<?php echo get_template_directory_uri();?>/images/Rectangle-img.png" class="img-fluid" alt="" />
          </div>
        </div>
        <div class="container px-5 pt-3 pb-5">
          <a href="sign-in"  class="Request" style="font-family: 'Inter'">
            Request Quote
          </a>
        </div>
      </section>
      <section
        class="w-12"
        id="about"
        style="background-color: rgba(231, 208, 201, 0.6)"
      >
        <div class="container p-5">
          <h1 class="text-center pt-5" style="font-family: 'Inter'">
            <b>About us</b>
          </h1>
          <div class="mx-auto pt-4">
            <p class="about_home" style="font-family: 'Inter'">
              VOC-best Nigeria limited is a company that since its existence has been committed to helping artisans discover creativity within them. It is a company that trains Artisans on vocational skills and help them become self employed. Here in Voc-best Limited is where artisans meet with customers, research and develop high quality  tech service
            </p>
          </div>
        </div>
        <div class="p-2">
          <img
            src="<?php echo get_template_directory_uri();?>/images/ant-design_pie-chart-outlined.png"
            alt="chart"
            class="img-fluid mx-auto d-block"
          />
        </div>

        <div class="d-flex justify-content-center text-center">
          <div class="row mx-auto">
            <div class="col-sm-4 px-5">
              <h1 class="trowwer" style="font-family: 'Inter'">1,265</h1>
              <div>
                <p class="trow" style="font-family: 'Inter'">Active Artisans</p>
              </div>
            </div>
            <div class="col-sm-4 px-5">
              <h1 class="trowwer" style="font-family: 'Inter'">2,865</h1>
              <div>
                <p class="trow" style="font-family: 'Inter'">
                  Certified Artisans
                </p>
              </div>
            </div>
            <div class="col-sm-4 px-5">
              <h1 class="trowwer" style="font-family: 'Inter'">102</h1>
              <div>
                <p class="trow" style="font-family: 'Inter'">Work hours</p>
              </div>
            </div>
          </div>
        </div>
        <div class="d-flex justify-content-end p-5">
          <a href="" class="goup float-end">
            <img src="<?php echo get_template_directory_uri();?>/images/go up.png" class="img-fluid" />
          </a>
        </div>
      </section>
    </div>
    <section id="contact" class="w-12">
      <div class="mx-auto rounded mb-5 container justify-content-center max">
        <div class="row">
          <div class="col-sm align-items-buttom">
            <div class="twist">
              <h1 class="" style="font-family: 'Inter'; letter-spacing: 1px">
                Lets'<br />
                Discuss<br />
                your project
              </h1>
            </div>
            <div class="twitimg">
              <img
                src="<?php echo get_template_directory_uri();?>/images/Rectangle-contact.png"
                class="img-fluid"
                alt=""
              />
            </div>
          </div>
          <div class="col-7">
            <div class="contact-holder">
              <div class="form-holder">
                <div class="text-holderc">
                  <h5 style="font-family: 'Inter'">Want us to contact you</h5>
                  <p style="font-family: 'Inter'">Insert your message here</p>
                </div>
                <form>
                  <div class="user-details">
                    <div class="input-box">
                      <input
                        type="text"
                        name="Name"
                        placeholder="Name"
                        id=""
                        style="font-family: 'Inter'"
                        required
                      />
                    </div>
                    <div class="input-box">
                      <input
                        style="font-family: 'Inter'"
                        type="email"
                        name="email"
                        placeholder="email"
                        id=""
                        required
                      />
                    </div>
                    <div class="input-box">
                      <textarea name="description" style="font-family: 'Inter'">
                      Message
                  </textarea
                      >
                    </div>
                    <div class="input-box">
                      <input type="submit" value="Send" />
                    </div>
                  </div>
                </form>
              </div>
              <div class="contact-detail">
                <div class="all-text">
                  <div class="all">
                    <h4 class="text-center turn" style="font-family: 'Inter'">
                      Contact us
                    </h4>
                  </div>
                  <div class="all">
                    <p style="font-family: 'Inter'">
                      FCT, Abuja. Nigeria.
                    </p>
                  </div>
                  <div class="all">
                    <p style="font-family: 'Inter'">info.vocbest@gmail.com</p>
                  </div>
                  <div class="all">
                    <p style="font-family: 'Inter'">
                      +2349000000000
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="d-flex justify-content-end p-5">
        <a href="" class="goup float-end">
          <img src="<?php echo get_template_directory_uri();?>/images/go up.png" class="img-fluid" />
        </a>
      </div>
    </section>
    <section class="container-fluid p-5" style="background-color: #03303e">
      <div class="mx-auto">
        <p class="text-center text-white" style="font-family: 'Inter'">
          &copy; 2022
        </p>
      </div>
    </section>
    <script src="<?php echo get_template_directory_uri();?>/index.js"></script>
  </body>
</html>
