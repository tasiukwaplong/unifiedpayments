<?php
       $current_user = wp_get_current_user();
       $role_name      = $current_user->roles[0];
       $userMeta = get_user_meta($current_user->ID);
       $feesDuesData = voctech_get_feesdues(['is_admin'=>true]);
       
       $studentDetails = [
        "state__".$userMeta['state'][0] => true,
        "lga__".$userMeta['lga'][0] => true,
        "faculty__".$userMeta['faculty'][0] => true,
        "department__".$userMeta['department'][0] => true,
        "gender__".$userMeta['gender'][0] => true,
        "level__".$userMeta['level'][0] => true,
        "faith__".$userMeta['faith'][0] => true,
        ];

        $feesToPay = voctech_check_condition($studentDetails, $feesDuesData);
        $total = 0;

        $inCart = [];
        $alreadyPaid = [];
?> 
<div class="payment d-flex flex-column gap-5 col-9">
    <div class="row">
        <div class="col-12 text-center h3 text-uppercase pt-3">
            <b><?php echo $current_user->display_name;?></b>
        </div>
        <div class="text-center">
            Level: <b><?php echo $userMeta['level'][0];?></b>&nbsp;&nbsp;|&nbsp;Faculty: <b><?php echo $userMeta['faculty'][0];?></b>&nbsp;&nbsp;|&nbsp;Faith: <b><?php echo $userMeta['faith'][0];?></b>&nbsp;&nbsp;|&nbsp;Gender: <b><?php echo $userMeta['gender'][0];?></b>&nbsp;&nbsp;|&nbsp;State/LGA: <b><?php echo $userMeta['state'][0];?>/<?php echo $userMeta['lga'][0];?></b>
        </div>
        <br>
        <br>
        <br>
        <hr>
        <h4 class="mb-4">Payments to make</h4>
        <div class="table-responsive text-sm bg-dark p-2 text-dark bg-opacity-10">
          <table class="table table-sm text-sm table-sm">
            <thead>
                <tr>
                    <th>S/N</th>
                    <th>Description/Session</th>
                    <th>Fee</th>
                    <th>Collector</th>
                    <th>Date added</th>
                    <th>Reference</th>
                    <th>Status</th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
                <?php
                //   compulsory payments that have not been paid yet
                  $level1 = (isset($feesToPay['level1']) && count($feesToPay['level1']) >= 1) ? $feesToPay['level1'] : [];
                  if (count($level1) < 1){
                    echo "<tr><td colspan='9' class='text-center'><i>No pending payments</i></td></tr>";
                  }
                  $count = 0;
                  for ($i=0; $i < count($level1); $i++): 
                    array_push($inCart, [
                        array_values($level1[$i])[0]['ref'] => array_values($level1[$i])
                    ]);
                    //if not already paid for or priority_
                  ?>
                    <tr>
                        <td><?php echo (++$count);?></td>
                        <td><?php echo array_values($level1[$i])[0]['reason'].'/'.array_values($level1[$i])[0]['session'];?></td>
                        <td>&#8358;<?php echo array_values($level1[$i])[0]['amount'];?></td>
                        <td><?php echo array_values($level1[$i])[0]['collector'];?></td>
                        <td><?php //echo array_values($level1[$i])[0]['created_at'];?></td>
                        <td><?php echo array_values($level1[$i])[0]['ref'];?></td>
                        <td><?php echo array_values($level1[$i])[0]['comment'];?></td>
                        <!-- <th title="remove"><i class="btn text-danger round border border-danger bx bx-minus"></i></th> -->
                        <th title="remove"></th>
                    </tr>
                <?php endfor; print_r($inCart);?>

            </tbody>
        </table>
    </div>
    <p class="h5 float-left">
        Total: &#8358;<?php echo $total; ?>
    </p>
        <hr>
    </div>

    <!-- Level 2 payments -->
        <div class="payment-section row">
            <h4 class="mb-4">Level 2 payments</h4>
            <?php
              $level2 = (isset($feesToPay['level2']) && count($feesToPay['level2']) >= 1) ? $feesToPay['level2'] : [];
            
              if (count($level2) < 1){
                echo "<i>No payments to show here</i>";
               }
               for ($i=0; $i < count($level2); $i++): 
                //if not already paid for or priority has_paid(ref)
               ?>
               <div class="col-3">
                    <div class="item-container">
                        <div class="item ">
                            <i class="bi bi-credit-card"></i>
                            <p class="text"><?php echo array_values($level2[$i])[0]['session'].'<br>'.array_values($level2[$i])[0]['reason'];?></p>
                            <small class="price">&#8358;<?php echo array_values($level2[$i])[0]['amount'];?></small>
                            <button class="btn btn-success" onclick="addToTable(`<?php echo array_values($level2[$i])[0]['ref'];?>`)">Add</button>
                        </div>
                    </div>
                </div>
                
            <?php  endfor;?>
            

        </div>
    <!-- Level 2 payments ends here-->

    <!-- Level 3 payments -->
    <div class="payment-section row">
            <h4 class="mb-4">Other payments</h4>
            <?php
              $level3 = (isset($feesToPay['level3']) && count($feesToPay['level3']) >= 1) ? $feesToPay['level3'] : [];
            
              if (count($level3) < 1){
                echo "<i>No payments to show here</i>";
               }
               for ($i=0; $i < count($level3); $i++): 
                //if not already paid for or priority has_paid(ref)
               ?>
               <div class="col-3">
                    <div class="item-container">
                        <div class="item ">
                            <i class="bi bi-credit-card"></i>
                            <p class="text"><?php echo array_values($level3[$i])[0]['session'].'<br>'.array_values($level3[$i])[0]['reason'];?></p>
                            <small class="price">&#8358;<?php echo array_values($level3[$i])[0]['amount'];?></small>
                            <button>Add</button>
                        </div>
                    </div>
                </div>
                
            <?php  endfor;?>
            

        </div>
    <!-- Level 2 payments ends here-->
</div>
    <!-- Vendor JS Files -->
    <script src="<?php echo get_template_directory_uri();?>/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Template Main JS File -->
    <script src="<?php echo get_template_directory_uri();?>/assets/js/main.js"></script>
    <script>
        function addToTable(data){
            console.log(data);
        }
    </script>
</body>

</html>