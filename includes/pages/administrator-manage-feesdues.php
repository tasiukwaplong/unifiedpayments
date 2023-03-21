<div class="payment d-flex flex-column gap-5 col-9">
    <div class="container">
        <div class="row text-center p-2">
            <a href="<?php echo esc_url( add_query_arg( 'p', 'manage-feesdues' ) );?>" class="btn col border-top border p-2 bg-warning">
                Pending review
            </a>
            <a href="<?php echo esc_url( add_query_arg( 'p', 'manage-feesdues2' ) );?>" class="btn col border">
                    Active
            </a>
        </div>
    </div>
    <?php if(isset($_GET['delrec']) && isset($_GET['id'])): ?>
        Deleting record .....
        <br>
        <?php echo voctech_delete_feesdues(htmlspecialchars($_GET['delrec']));?>
        <script>
        setTimeout(function() {
            window.location = '/administrator-dashboard/?p=manage-feesdues'
        }, 1000 * 5);</script>

    <?php elseif(isset($_GET['id'])): ?>
        <a href="/administrator-dashboard/?p=manage-feesdues" class="btn btn-block btn-primary">&lt;&lt; Go back</a>
        <?php
            $id = htmlspecialchars($_GET['id']) ?? '';
            $fetchFeesDuesData = voctech_get_feesdues(['is_admin'=>true, 'id'=>$id]);

            $prioritiesOptions = [
                '1' => 'Level 1 (Compulsory)',
                '2' => 'Level 2 (Optional)',
                '3' => 'Level 3 (Others)',
                '0' => 'Disable (Hidden)',
            ];
            // print_r($fetchFeesDuesData);
            // die();
        ?>
               <!-- message starts -->
               <div class="text-center alert alert-danger " style="display: none;" id="err-container">
                        <p id="err-msg"></p>
                </div>

                <div class="text-center alert alert-success" style="display: none;" id="success-container">
                  <p id="suc-msg"></p>      
                </div>
                <!-- message ends -->

        <form id="feesdues-update" >
                <div class="row">
                    <div class="col-6">
                        <label class="mt-2" for="session">Session</label>
                        <input type="text" value="<?php print_r($fetchFeesDuesData[0]->session_);?>" class="form-control " readonly>
                    </div>

                    <div class="col-6">
                        <label class="mt-2" for="amount">Amount</label>
                        <input type="text" value="<?php print_r($fetchFeesDuesData[0]->amount);?>" class="form-control " readonly>
                    </div>

                    <div class="col-6">
                        <label class="mt-2" for="reason">Reason for payment</label>
                        <textarea class="form-control "><?php print_r($fetchFeesDuesData[0]->reason);?></textarea>
                    </div>


                    <div class="col-6">
                        <label class="mt-2" for="condition1" title="Condition 1 for this payment" >Condition 1</label>
                        <input type="text" value="<?php print_r($fetchFeesDuesData[0]->condition1);?>" class="form-control " readonly>
                    </div>


                    <div class="col-6">
                        <label class="mt-2" for="condition2" title="Condition 2 for this payment" >Condition 2</label>
                        <input type="text" value="<?php print_r($fetchFeesDuesData[0]->condition2);?>" class="form-control " readonly>
                        
                    </div>


                    <div class="col-6">
                        <label class="mt-2" for="condition3" title="Condition 3 for this payment" >Condition 3</label>
                        <input type="text" value="<?php print_r($fetchFeesDuesData[0]->condition3);?>" class="form-control " readonly>
                    </div>


                    <div class="col-6">
                        <label class="mt-2" for="condition4" title="Condition 4 for this payment" >Condition 4</label>
                        <input type="text" value="<?php print_r($fetchFeesDuesData[0]->condition4);?>" class="form-control " readonly>
                    </div>


                    <div class="col-6">
                        <label class="mt-2" for="condition5" title="Condition 5 for this payment" >Condition 5</label>
                        <input type="text" value="<?php print_r($fetchFeesDuesData[0]->condition5);?>" class="form-control " readonly>
                        
                    </div>
                    
                    <div class="col-6">
                        <label class="mt-2" for="comment">comment</label>
                        <textarea class="form-control "><?php print_r($fetchFeesDuesData[0]->comment);?></textarea>
                    </div>

                    <div class="col-6">
                        <label class="mt-2" for="priority" title="Condition 4 for this payment" >Change status</label>
                        <select name="priority" id="priority" class="form-control" required>
                            
                            <?php if(isset($fetchFeesDuesData[0]->priority_)): ?>
                              <option value="<?php echo $fetchFeesDuesData[0]->priority_; ?>">
                                <?php echo $prioritiesOptions[$fetchFeesDuesData[0]->priority_]; ?>
                              </option>
                            <?php else: ?>
                                <option value="">--Select priority level--</option>
                            <?php endif; ?>

                            <option value="1"><?php echo $prioritiesOptions['1'];?></option>
                            <option value="2"><?php echo $prioritiesOptions['2'];?></option>
                            <option value="3"><?php echo $prioritiesOptions['3'];?></option>
                            <option value="0"><?php echo $prioritiesOptions['0'];?></option>
                        </select>
                        <input type="hidden" name="id" value="<?php echo $id ?? '';?>">
                    </div>

                </div>
                <div class="p-3 text-center">
                    <input type="submit" value="&nbsp;&nbsp;Update&nbsp;&nbsp;" id="btn-register" name="Submit" class=" btn btn-success mr-2">
                    <button type="button" onclick="deleteFeeDue(<?php print_r($fetchFeesDuesData[0]->id);?>)" class="btn btn-danger">Delete</button>
                    <input type="button" id="btn-processing" value="Processing..." class="form-control  btn btn-success m-2 " style="display: none;">
                    <!-- <button type="submit" class="btn btn-success">Add collector</button> -->
                </div>
        </form>

        <?php else: ?>
            <div class="table-responsive">
            <table class="table text-sm table-sm">
                <thead>
                    <tr>
                        <th class="sp-admin" scope="col">S/N</th>
                        <th class="sp-admin" scope="col">Ref</th>
                        <th class="sp-admin" scope="col">Reason</th>
                        <th class="sp-admin" scope="col">Amount</th>
                        <th class="sp-admin" scope="col">Session</th>
                        <th class="sp-admin" scope="col">Date created</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody style="cursor: pointer;">
                    <?php
                        $feesdues = voctech_get_feesdues(['is_admin'=>true]);
                        $counter = 0;

                        if(gettype($feesdues) !== 'array' || count($feesdues)<=0):
                            echo "<tr><td colspan='8'>No record added yet</td></tr>";
                        else:
                            foreach ($feesdues as $indx => $fd):
                                if($fd->status_ == '0'): 
                        ?>
                            <tr>
                                <td><?php echo ++$counter;?></td>
                                <td><?php echo $fd->ref;?></td>
                                <td><?php echo $fd->reason;?></td>
                                <td>&#8358;<?php echo $fd->amount;?></td>
                                <td><?php echo $fd->reason;?></td>
                                <td><?php echo $fd->created_at;?></td>
                                <td>
                                    <a href="/administrator-dashboard/?p=manage-feesdues&id=<?php print_r($fd->id);?>" class="btn btn-primary">Edit</a>
                                    <button type="button" onclick="deleteFeeDue(<?php print_r($fd->id);?>)"  class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                    <?php endif;endforeach;endif;?>
                </tbody>
            </table>
        </div>
    
        <?php endif;?>

</div>



<script type="text/javascript">
   
   //register new collector
$('#feesdues-update').submit(function(e){
    // add a new user - role:collector
    e.preventDefault();
    var endpoint = '<?php echo admin_url('admin-ajax.php'); ?>';
    var form = $('#feesdues-update').serialize();
    var formData = new FormData;
    formData.append('action', 'update-feesdues');
    formData.append('update-feesdues', form);


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
                    window.location = '/administrator-dashboard/?p=manage-feesdues'
                }, 6500);

                $('#feesdues-update').hide();
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

function deleteFeeDue(id){
    var resp = window.confirm("You are about to delete this record (ID: "+id+"). \nIt will however not delete payments already made. \nAre you sure you want to do that?")
    if(resp === true){
        window.location = '/administrator-dashboard/?p=manage-feesdues&id='+id+'&delrec='+id
    }
}
</script>