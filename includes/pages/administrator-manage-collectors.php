<div class="payment d-flex flex-column gap-5 col-9">
<div class="table-responsive">
    <div class="row">
        <div class="col-md-6 p-5">
            <br>
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModalCenter">
                Add new collector
            </button>
        </div>
        <div class="col-md-6 p-5">
            <input type="file" class="form-input border border-md">
            <a href="" class="btn btn-success">Upload file</a> 
            <small class="text-danger">* Upload .xls .csv only</small>
        </div>
        <div class="col-md-6"></div>
    </div>
    <table class="table area text-sm" id="artisans">
        <thead>
            <tr>
                <th class="sp-admin" scope="col">S/N</th>
                <th class="sp-admin" scope="col">Collector name</th>
                <th class="sp-admin" scope="col">Full name</th>
                <th class="sp-admin" scope="col">Email</th>
                <th class="sp-admin" scope="col">Date created</th>
                <th class="sp-admin" scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <?php
                $artisans = get_users(['role'=>'collector']);
                if(count($artisans)<=0):
                    echo "<tr><td colspan='11'>NO Request made yet</td></tr>";
                else:
                    foreach ($artisans as $indx => $artisan):
                    $artisanMeta = get_user_meta($artisan->ID);
                ?>
                    <tr>
                        <td><?php echo ($indx+1);?></td>                        
                        <td><?php echo $artisan->display_name; ?></td>
                        <td><?php echo $artisan->first_name; ?>&nbsp;<?php echo $artisan->last_name; ?></td>
                        <td><?php echo $artisan->user_email; ?></td>
                        <td><?php echo $artisan->user_registered; ?></td>
                       
                        <td class='btn border border-sm'>
                            Edit|Delete
                        </td>
                    </tr>
            <?php endforeach;endif;?>
        </tbody>
            </table>
                    </div>

                    <!-- Button trigger modal -->
<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Add new collector</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="collector-registration">
      <div class="modal-body">
            <label class="mt-2" for="email">Email</label>
            <input name="email" id="email" type="text" placeholder="Enter email address" class="form-control" required>

            <label class="mt-2" for="fname">First name</label>
            <input type="text" name="fname" id="fname" placeholder="Enter first name" class="form-control" required>

            <label class="mt-2" for="lname">Last name</label>
            <input type="text" class="form-control" name="lname" id="lname" required>

            <label class="mt-2" for="name" title="official name registered with the school">Collection name</label>
            <input type="text" class="form-control" name="name" id="name" required>

            <label class="mt-2" for="password">Password</label>
            <input type="password" class="form-control mb-2" name="password" id="password" required>
            <!-- message starts -->
            <div class="alert alert-danger " style="display: none;" id="err-container">
                    <p id="err-msg"></p>
            </div>

            <div class="alert alert-success" style="display: none;" id="success-container">
                    Artisan registration successful. <br>
                    
            </div>
            <!-- message ends -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" value="Add collector" id="btn-register" name="Submit" class=" btn btn-success">
        <input type="button" id="btn-processing" value="Processing..." class="form-control btn btn-success m-2 " style="display: none;">
        <!-- <button type="submit" class="btn btn-success">Add collector</button> -->
      </div>
      </form>
    </div>
  </div>
</div>
</div>



<script type="text/javascript">
   
   //register new collector
$('#collector-registration').submit(function(e){
    // add a new user - role:collector
    e.preventDefault();
    var endpoint = '<?php echo admin_url('admin-ajax.php'); ?>';
    var form = $('#collector-registration').serialize();
    var formData = new FormData;
    formData.append('action', 'register-collector');
    formData.append('register-collector', form);

    $.ajax(endpoint, {
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,

        success: function(res){
            scrollTo(0,0)
            if(res.success === true){
                $('#err-container').hide();
                $('#success-container').show();
                setTimeout(function() {
                    location.reload();
                }, 1200);
                $('#collector-registration').hide();
            }else{
                // console.log(res)
                $('#err-container').show();
                $('#err-msg').html(res.data.join('<br>') || 'Unable to proces request')
            }
        },
        
        error: function(err){
            scrollTo(0,0)
            $('#err-container').show();
            $('#err-msg').html('Server error. Try again')
        }
    })
})
</script>