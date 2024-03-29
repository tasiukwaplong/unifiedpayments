<div class="payment d-flex flex-column gap-5 col-9">
<div class="table-responsive">
    <div class="row">
        <div class="col-md-12 text-center p-3">
            <h4>Add new student(s)</h4>
        </div>
        <div class="col-md-6 p-5">
            <br>
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModalCenter">
                Add new student
            </button>
        </div>
        <div class="col-md-6 p-5">
            <input type="file" class="form-input border border-md">
            <a href="" class="btn btn-success">Upload file</a> 
            <small class="text-danger">* Upload .xls .csv only</small>
        </div>
        <div class="col-md-6"></div>
    </div>

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

                    <!-- Button trigger modal -->
<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Add new student</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="student-registration">
      <div class="modal-body">
            <label class="mt-2" for="matric">Matriculation number</label>
            <input name="matric" id="matric" type="text" placeholder="Enter student matric number" class="form-control" required>

            <label class="mt-2" for="email">Email</label>
            <input name="email" id="email" type="text" placeholder="Enter email address" class="form-control" required>

            <label class="mt-2" for="fname">First name</label>
            <input type="text" name="fname" id="fname" placeholder="Enter first name" class="form-control" required>

            <label class="mt-2" for="lname">Last name</label>
            <input type="text" class="form-control" name="lname" id="lname" required>

            <label class="mt-2" for="gender">Gender</label>
            <select name="gender" id="gender" class="form-control" required>
                <option value="">--Select student gender--</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>

            <label class="mt-2" for="state">State of origin</label>
            <select name="state" id="state" class="form-control" required>
                <option value="">--Select state of origin--</option>
                <option value="Abia">Abia State</option>
                <option value="Adamawa">Adamawa State</option>
                <option value="Akwa Ibom">Akwa Ibom State</option>
                <option value="Anambra">Anambra State</option>
                <option value="Bauchi">Bauchi State</option>
                <option value="Bayelsa">Bayelsa State</option>
                <option value="Benue">Benue State</option>
                <option value="Borno">Borno State</option>
                <option value="Cross River">Cross River State</option>
                <option value="Delta">Delta State</option>
                <option value="Ebonyi">Ebonyi State</option>
                <option value="Edo">Edo State</option>
                <option value="Ekiti">Ekiti State</option>
                <option value="Enugu">Enugu State</option>
                <option value="Gombe">Gombe State</option>
                <option value="Imo">Imo State</option>
                <option value="Jigawa">Jigawa State</option>
                <option value="Kaduna">Kaduna State</option>
                <option value="Kano">Kano State</option>
                <option value="Katsina">Katsina State</option>
                <option value="Kebbi">Kebbi State</option>
                <option value="Kogi">Kogi State</option>
                <option value="Kwara">Kwara State</option>
                <option value="Lagos">Lagos State</option>
                <option value="Nasarawa">Nasarawa State</option>
                <option value="Niger">Niger State</option>
                <option value="Ogun">Ogun State</option>
                <option value="Ondo">Ondo State</option>
                <option value="Osun">Osun State</option>
                <option value="Oyo">Oyo State</option>
                <option value="Plateau">Plateau State</option>
                <option value="Rivers">Rivers State</option>
                <option value="Sokoto">Sokoto State</option>
                <option value="Taraba">Taraba State</option>
                <option value="Yobe">Yobe State</option>
                <option value="Zamfara">Zamfara State</option>
            </select>

            <!-- <label class="mt-2" for="lga">Local Government or origin</label> -->
            <input name="lga" value="lga" type="hidden">

            <!-- <label class="mt-2" for="faculty">Faculty</label> -->
            <input type="hidden" value="faculty" name="faculty">

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
                <option value="Christianity">Christianity</option>
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
    </div>
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