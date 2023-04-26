<div class="payment d-flex flex-column gap-5 col-9">
<div class="table-responsive">

    <table class="table area text-sm" id="myTable">
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
                    $feesdues = voctech_get_withdrawals(['is_admin'=>get_current_user_id()]);
                    if(count($feesdues)<=0):
                        echo "<tr><td colspan='8'>No record added yet</td></tr>";
                    else:
                        foreach ($feesdues as $indx => $fd): 
                          $elemClass = ($fd->status_ === "0") ? "" : "";
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



<script>
      $(document).ready( function () {
        $('#myTable').DataTable();
        
      } );
    </script>