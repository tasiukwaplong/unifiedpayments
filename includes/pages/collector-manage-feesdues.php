<?php
       $current_user = wp_get_current_user();
       $role_name      = $current_user->roles[0];
       $userMeta = get_user_meta($current_user->ID);
?>
<div class="payment d-flex flex-column gap-5 col-9">
<div class="row mt-3">
    <div class="col" style="border-right: 2px solid #000;">
      <h3 class="text-center">ADD NEW FEE/DUE</h3>
        <!-- //add new -->
            <form id="student-registration">
        <div class="">
                <label class="mt-2" for="matric">Matriculation number</label>
                <input name="matric" id="matric" type="text" placeholder="Enter student matric number" class="form-control" required>

                <label class="mt-2" for="email">Email</label>
                <input name="email" id="email" type="text" placeholder="Enter email address" class="form-control" required>

                <label class="mt-2" for="fname">First name</label>
                <input type="text" name="fname" id="fname" placeholder="Enter first name" class="form-control" required>

                <label class="mt-2" for="lname">Last name</label>
                <input type="text" class="form-control" name="lname" id="lname" required>

                <label class="mt-2" for="state">State of origin</label>
                <select name="state" id="state" class="form-control" required>
                    <option value="">--Select state of origin--</option>
                    <option value="Nasarawa">Nasarawa</option>
                </select>

                <label class="mt-2" for="lga">Local Government or origin</label>
                <select name="lga" id="faculty" class="form-control" required>
                    <option value="">--Select lga--</option>
                    <option value="Lafia">Lafia</option>
                </select>

                <label class="mt-2" for="faculty">Faculty</label>
                <select name="faculty" id="faculty" class="form-control" required>
                    <option value="">--Select faculty--</option>
                    <option value="Science">Science</option>
                </select>

                <label class="mt-2" for="department">Department</label>
                <select name="department" id="department" class="form-control" required>
                    <option value="">--Select department--</option>
                    <option value="Computer science">Computer science</option>
                </select>

                <label class="mt-2" for="level">Level</label>
                <select name="level" id="level" class="form-control" required>
                    <option value="">--Select student current level--</option>
                    <option value="100">100</option>
                    <option value="200">200</option>
                    <option value="300">300</option>
                    <option value="400">400</option>
                    <option value="500">500</option>
                    <option value="600">600</option>
                </select>

                <label class="mt-2" for="faith">Faith</label>
                <select name="faith" id="faith" class="form-control" required>
                    <option value="">--Select student faith--</option>
                    <option value="Islam">Islam</option>
                    <option value="Christianity">CHristianity</option>
                    <option value="Other">Other</option>
                </select>

                <label class="mt-2" for="password">Password</label>
                <input type="password" class="form-control mb-2" name="password" id="password" required>
                <!-- message starts -->
                <div class="alert alert-danger " style="display: none;" id="err-container">
                        <p id="err-msg"></p>
                </div>

                <div class="alert alert-success" style="display: none;" id="success-container">
                        Student registration successful. <br>
                        
                </div>
                <!-- message ends -->
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <input type="submit" value="Add student" id="btn-register" name="Submit" class=" btn btn-success">
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
        <table class="table area text-sm" id="students">
            <thead>
                <tr>
                    <th class="sp-admin" scope="col">S/N</th>
                    <th class="sp-admin" scope="col">Matric number</th>
                    <th class="sp-admin" scope="col">Full name</th>
                    <th class="sp-admin" scope="col">Email</th>
                    <th class="sp-admin" scope="col">Date created</th>
                    <th class="sp-admin" scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $students = get_users(['role'=>'student']);
                    if(count($students)<=0):
                        echo "<tr><td colspan='6'>NO student added yet</td></tr>";
                    else:
                        foreach ($students as $indx => $student):
                        $studentMeta = get_user_meta($student->ID);
                    ?>
                        <tr>
                            <td><?php echo ($indx+1);?></td>                        
                            <td><?php echo $studentMeta['matric'][0]; ?></td>
                            <td><?php echo $student->first_name; ?>&nbsp;<?php echo $student->last_name; ?></td>
                            <td><?php echo $student->user_email; ?></td>
                            <td><?php echo $student->user_registered; ?></td>
                        
                            <td class='btn border border-sm'>
                                Edit|Delete
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
$('#student-registration').submit(function(e){
    // add a new user - role:collector
    e.preventDefault();
    var endpoint = '<?php echo admin_url('admin-ajax.php'); ?>';
    var form = $('#student-registration').serialize();
    var formData = new FormData;
    formData.append('action', 'register-student');
    formData.append('register-student', form);

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
                $('#student-registration').hide();
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