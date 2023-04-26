<?php
        
       $current_user = wp_get_current_user();
       $role_name      = $current_user->roles[0];
       $userMeta = get_user_meta($current_user->ID);
?>
<div class="payment d-flex flex-column gap-5 col-9">
<div class="row mt-3">
    <div class="col" style="border-right: 2px solid #000;background: #f4f4f4;">
      <h3 class="text-center">REQUEST WITHDRAWAL</h3>
        <!-- //add new -->
                         <!-- message starts -->
                         <div class="text-center alert alert-danger " style="display: none;" id="err-container">
                        <p id="err-msg"></p>
                </div>

                <div class="text-center alert alert-success" style="display: none;" id="success-container">
                  <p id="suc-msg"></p>      
                </div>
                <!-- message ends -->
            <form id="withdrawal-add">
        <div class="">
            Total amount: &#8358;<?php echo $userMeta['balance'][0];?><br>

            <label class="mt-2" for="amount">Amount</label>
            <input name="amount" id="amount" type="Number" min="100" max="<?php echo $userMeta['balance'][0];?>" placeholder="Enter amount" class="form-control" required>


            <label class="mt-2" for="account_number">Account number to be settled</label>
            <input name="account_number" id="account_number" type="text" maxlength="10" minlength="10" class="form-control" required>

            <label class="mt-2" for="account_name">Account name to be settled</label>
            <input name="account_name" id="account_name" type="text" maxlength="200" class="form-control" required>

            <label class="mt-2" for="bank">Bank to be settled</label>
            <input name="bank" id="bank" type="text" maxlength="200" class="form-control" required>

            <label class="mt-2" for="comment">comment</label>
            <textarea name="comment" id="comment" type="text" placeholder="Enter comment (optional)" class="form-control" ></textarea>

        </div>
        <div class="p-3 text-center">
            <input type="submit" value="&nbsp;&nbsp;Request&nbsp;&nbsp;" id="btn-register" name="Submit" class=" btn btn-success">
            <button type="clear" class="btn btn-danger">Cancel</button>
            <input type="button" id="btn-processing" value="Processing..." class="form-control btn btn-success m-2 " style="display: none;">
            <!-- <button type="submit" class="btn btn-success">Add collector</button> -->
        </div>
        </form>
        <!-- add new stops here -->
    </div>
    <div class="col">
      <!-- list of existing starts here -->
      <h3 class="text-center">LIST OF REQUESTS</h3>

        <div class="table-responsive">
        <table class="table text-sm table-sm">
            <thead>
                <tr>
                    <th class="sp-admin" scope="col">S/N</th>
                    <th class="sp-admin" scope="col">Date requested</th>
                    <th class="sp-admin" scope="col">Amount</th>
                    <th class="sp-admin" scope="col">Bank</th>
                    <th class="sp-admin" scope="col">Account name</th>
                    <th class="sp-admin" scope="col">Account number</th>
                    <th class="sp-admin" scope="col">Comment</th>
                    
                </tr>
            </thead>
            <tbody style="cursor: pointer;">
                <?php
                    $feesdues = voctech_get_withdrawals(['collector_id'=>get_current_user_id()]);
                    if(count($feesdues)<=0):
                        echo "<tr><td colspan='8'>No record added yet</td></tr>";
                    else:
                        foreach ($feesdues as $indx => $fd): 
                          $elemClass = ($fd->status_ === "0") ? "class='bg-warning text-s'" : "class='bg-success text-white text-sm'";
                    ?>
                        <tr <?php echo $elemClass;?>  onclick="openFD(<?php print_r($fd->ref);?>)" title="Created on: <?php print_r($fd->created_at);?>, updated on: <?php print_r($fd->updated_at);?>">
                            <td><?php print_r($indx+1);?></td>
                            <td><?php print_r($fd->created_at);?></td>
                            <td><?php print_r($fd->amount);?></td>
                            <td><?php print_r($fd->bank);?></td>
                            <td><?php print_r($fd->account_name);?></td>
                            <td><?php print_r($fd->account_number);?></td>
                            <td><?php print_r($fd->comment);?></td>
                        </tr>
                <?php endforeach;endif;?>
            </tbody>
        </table>
</div>
        <!-- list of existing ends here -->
    </div>
</div>
</div>



<script type="text/javascript">
   
   //register new collector
$('#withdrawal-add').submit(function(e){
    // add a new user - role:collector
    e.preventDefault();
    var endpoint = '<?php echo admin_url('admin-ajax.php'); ?>';
    var form = $('#withdrawal-add').serialize();
    var formData = new FormData;
    formData.append('action', 'add-withdrawal');
    formData.append('add-withdrawal', form);

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
                $('#suc-msg').html(res.data)
                setTimeout(function() {
                    location.reload();
                }, 6500);

                $('#withdrawal-add').hide();
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

function openFD(ref){
    window.location = '/collector-dashboard/?p=manage-feesdue&ref='+ref
}
</script>