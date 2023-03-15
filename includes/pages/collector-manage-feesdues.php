<?php
$conditions = '
        <option value="">NO CONDITION</option>
        <option disabled="disabled">LEVEL</option>
        <option value="level__100" title="Only 100 level should pay">100 level</option>
        <option value="level__200" title="Only 200 level should pay">200 level</option>
        <option value="level__300" title="Only 300 level should pay">300 level</option>
        <option value="level__400" title="Only 400 level should pay">400 level</option>
        <option value="level__500" title="Only 500 level should pay">500 level</option>
        <option value="level__600" title="Only 600 level should pay">600 level</option>
        <option value="level__700" title="Only 700 level should pay">700 level</option>
        <option value="level__all" title="all levels">All levels</option>

        <option disabled="disabled">&nbsp;</option>
        <option disabled="disabled">FACULTY</option>
        <option value="faculty__computing" title="Only Faculty of computing">Faculty of computing</option>
        <option value="faculty__science" title="Only Faculty of science">Faculty of science</option>
        <option value="faculty__arts" title="Only Faculty of arts">Faculty of arts</option>
        <option value="faculty__education" title="Only Faculty of education">Faculty of education</option>
        <option value="faculty__all" title="All Faculties">All faculties</option>

        <option disabled="disabled">&nbsp;</option>
        <option disabled="disabled">GENDER</option>
        <option value="gender__Male" title="Only gender of Male">Gender of Male</option>
        <option value="gender__Female" title="Only gender of Female">Gender of Female</option>
        <option value="gender__all" title="All genders">All genders</option>


        <option disabled="disabled">&nbsp;</option>
        <option disabled="disabled">STATE OF ORIGIN</option>
        <option value="state__Abia" title="Only indigenes of Abia should be affected">Abia state</option>
        <option value="state__Nasarawa" title="Only indigenes of Nasarawa should be affected">Nasarawa state</option>
        <option value="state__Plateau" title="Only indigenes of Plateau should be affected">Plateau state</option>
        <option value="state__FCT" title="Only indigenes of FCT should be affected">FCT</option>
        <option value="state__all" title="All states">All states</option>

        <option disabled="disabled">&nbsp;</option>
        <option disabled="disabled">DEPARTMENT</option>
        <option value="department__Computer_science" title="Only computer science">Computer science</option>
        <option value="department__Information_system" title="Only Information system">Information system</option>
        <option value="department__Biochemistry" title="Only Biochemistry">Biochemistry</option>
        <option value="department__all" title="All departments">All departments</option>

        <option disabled="disabled">&nbsp;</option>
        <option disabled="disabled">FAITH</option>
        <option value="faith__Islam" title="Only faith of Islam">Islam</option>
        <option value="faith__Christianity" title="Only faith of Christianity">Christianity</option>
        <option value="faith__all" title="All faiths">All faiths</option>';
        
       $current_user = wp_get_current_user();
       $role_name      = $current_user->roles[0];
       $userMeta = get_user_meta($current_user->ID);
?>
<div class="payment d-flex flex-column gap-5 col-9">
<div class="row mt-3">
    <div class="col" style="border-right: 2px solid #000;background: #f4f4f4;">
      <h3 class="text-center">ADD NEW FEE/DUE</h3>
        <!-- //add new -->
                         <!-- message starts -->
                         <div class="text-center alert alert-danger " style="display: none;" id="err-container">
                        <p id="err-msg"></p>
                </div>

                <div class="text-center alert alert-success" style="display: none;" id="success-container">
                  <p id="suc-msg"></p>      
                </div>
                <!-- message ends -->
            <form id="feesdues-add">
        <div class="">
            <label class="mt-2" for="session">Session</label>
            <select name="session" id="session" class="form-control" required>
                <option value="">--Select session--</option>
                <option value="2010/2011">2010/2011</option>
                <option value="2011/2012">2011/2012</option>
                <option value="2012/2013">2012/2013</option>
                <option value="2013/2014">2013/2014</option>
                <option value="2014/2015">2014/2015</option>
                <option value="2015/2016">2015/2016</option>
                <option value="2016/2017">2016/2017</option>
                <option value="2017/2018">2017/2018</option>
                <option value="2018/2019">2018/2019</option>
                <option value="2019/2020">2019/2020</option>
                <option value="2020/2021">2020/2021</option>
                <option value="2021/2022">2021/2022</option>
                <option value="2022/2023">2022/2023</option>
                <option value="2023/2024" selected>2023/2024</option>
            </select>

            <label class="mt-2" for="amount">Amount</label>
            <input name="amount" id="amount" type="Number" min="100" max="1000000" placeholder="Enter amount" class="form-control" required>


            <label class="mt-2" for="reason">Reason for payment</label>
            <input name="reason" id="reason" type="text" placeholder="Enter reason" maxlength="200" class="form-control" required>


            <label class="mt-2" for="condition1" title="Condition 1 for this payment" >Condition 1</label>
            <select name="condition1" id="condition1" class="form-control">
                    <?php echo $conditions; ?>
            </select>


            <label class="mt-2" for="condition2" title="Condition 2 for this payment" >Condition 2</label>
            <select name="condition2" id="condition2" class="form-control">
                    <?php echo $conditions; ?>
            </select>


            <label class="mt-2" for="condition3" title="Condition 3 for this payment" >Condition 3</label>
            <select name="condition3" id="condition3" class="form-control">
                    <?php echo $conditions; ?>
            </select>


            <label class="mt-2" for="condition4" title="Condition 4 for this payment" >Condition 4</label>
            <select name="condition4" id="condition4" class="form-control">
                    <?php echo $conditions; ?>
            </select>


            <label class="mt-2" for="condition5" title="Condition 5 for this payment" >Condition 5</label>
            <select name="condition5" id="condition5" class="form-control" >
                    <?php echo $conditions; ?>
            </select>


            <label class="mt-2" for="comment">comment</label>
            <textarea name="comment" id="comment" type="text" placeholder="Enter comment (optional)" class="form-control" ></textarea>

        </div>
        <div class="p-3 text-center">
            <input type="submit" value="&nbsp;&nbsp;Add&nbsp;&nbsp;" id="btn-register" name="Submit" class=" btn btn-success">
            <button type="clear" class="btn btn-danger">Cancel</button>
            <input type="button" id="btn-processing" value="Processing..." class="form-control btn btn-success m-2 " style="display: none;">
            <!-- <button type="submit" class="btn btn-success">Add collector</button> -->
        </div>
        </form>
        <!-- add new stops here -->
    </div>
    <div class="col">
      <!-- list of existing starts here -->
      <h3 class="text-center">LIST OF FEES/DUES</h3>

        <div class="table-responsive">
        <table class="table text-sm table-sm">
            <thead>
                <tr>
                    <th class="sp-admin" scope="col">S/N</th>
                    <th class="sp-admin" scope="col">Ref</th>
                    <th class="sp-admin" scope="col">Reason</th>
                    <th class="sp-admin" scope="col">Amount</th>
                    <th class="sp-admin" scope="col">Session</th>
                    <th class="sp-admin" scope="col">Conditions</th>
                </tr>
            </thead>
            <tbody style="cursor: pointer;">
                <?php
                    $feesdues = voctech_get_feesdues(['collector_id'=>get_current_user_id()]);
                    if(count($feesdues)<=0):
                        echo "<tr><td colspan='8'>No record added yet</td></tr>";
                    else:
                        foreach ($feesdues as $indx => $fd): 
                          $elemClass = ($fd->status_ === "0") ? "class='bg-warning text-s'" : "class='bg-success text-white text-sm'";
                    ?>
                        <tr <?php echo $elemClass;?>  onclick="openFD(<?php print_r($fd->ref);?>)" title="Created on: <?php print_r($fd->created_at);?>, updated on: <?php print_r($fd->updated_at);?>">
                            <td><?php print_r($indx+1);?></td>
                            <td><?php print_r($fd->ref);?></td>
                            <td><?php print_r($fd->reason);?></td>
                            <td>&#8358;<?php print_r($fd->amount);?></td>
                            <td><?php print_r($fd->reason);?></td>
                            <td>
                                <small>
                                  <?php print_r($fd->condition1);?>
                                  <?php print_r($fd->condition2);?>
                                  <?php print_r($fd->condition3);?>
                                  <?php print_r($fd->condition4);?>
                                  <?php print_r($fd->condition5);?>
                                </small>
                            </td>
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
$('#feesdues-add').submit(function(e){
    // add a new user - role:collector
    e.preventDefault();
    var endpoint = '<?php echo admin_url('admin-ajax.php'); ?>';
    var form = $('#feesdues-add').serialize();
    var formData = new FormData;
    formData.append('action', 'add-feesdues');
    formData.append('add-feesdues', form);

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

                $('#feesdues-add').hide();
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