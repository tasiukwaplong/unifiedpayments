<?php
       $current_user = wp_get_current_user();
       $role_name      = $current_user->roles[0];
       $userMeta = get_user_meta($current_user->ID);
       
?> 
<div class="payment d-flex flex-column gap-5 col-9">
    <div class="row">
        <div class="col-12 text-center h3 text-uppercase pt-3">
            <b><?php echo $current_user->display_name;?></b>
        </div>
        <div class="text-center">
            Level: <b><?php echo $userMeta['level'][0];?></b>&nbsp;&nbsp;|&nbsp;Faculty: <b><?php echo $userMeta['faculty'][0];?></b>&nbsp;&nbsp;|&nbsp;Faith: <b><?php echo $userMeta['faith'][0];?></b>&nbsp;&nbsp;|&nbsp;Gender: <b><?php echo $userMeta['gender'][0];?></b>&nbsp;&nbsp;|&nbsp;State/LGA: <b><?php echo $userMeta['state'][0];?>/<?php echo $userMeta['lga'][0];?></b>
        </div>
       
        <hr>
    </div>

    <!-- Level 3 payments -->
    <div class="payment-section row">
      <h4 class="mb-4">Submit a complain</h4>
      <form action="post" class="card p-5 m-5 well">
        <div class="card-body">
          <div class="row p-5 pt-0">
            <div class="col-6">
              <input type="email" placeholder="Enter email address" class="form-control">
            </div>

            <div class="col-6">
              <select name="" id="" class="form-control">
                <option value="">--Select reason--</option>
              </select>
            </div>
          
          <div class="col-6">
            <input type="email" placeholder="Enter subject" class="form-control mt-4">
          </div>

          <div class="col-6">
            <textarea name="" id="" cols="30" rows="10" class="form-control mt-4" placeholder="Enter details. Be as detailed as possible"></textarea>
          </div>

          <div class="col-6">
            <input type="button" value="Submit" class="form-control mt-4 btn btn-success">
          </div>
          </div>

        </div>
      </form>
    </div>
        <!-- Level 2 payments ends here-->
      </div>


    <!-- Vendor JS Files -->
    <script src="<?php echo get_template_directory_uri();?>/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Template Main JS File -->  
    <script src="<?php echo get_template_directory_uri();?>/assets/js/main.js"></script>
</body>

</html>