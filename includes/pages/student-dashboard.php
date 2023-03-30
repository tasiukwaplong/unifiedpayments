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

        $feesToPay = voctech_check_condition($studentDetails, $feesDuesData)[0];
        $allPaymets = voctech_check_condition($studentDetails, $feesDuesData)[1];
        $total = 0;
        // TO_DO
        $alreadyPaid = [];
        // die();
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
          <table class="table table-sm text-sm table-sm" id="invoicesTbl">
            <thead>
                <tr>
                    <th>Description</th>
                    <th>Session</th>
                    <th>Fee</th>
                    <th>Reference</th>
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
                    $total += array_values($level1[$i])[0]['amount'];
                    
                    //if not already paid for or priority_
                  ?>
                    <tr>
                        <td><?php echo array_values($level1[$i])[0]['reason'];?></td>
                        <td><?php echo array_values($level1[$i])[0]['session'];?></td>
                        <td>&#8358;<?php echo array_values($level1[$i])[0]['amount'];?></td>
                        <td><?php echo array_values($level1[$i])[0]['ref'];?></td>
                        <th title="remove"><i class='btn btn-danger bx bx-minus'></i></th>
                    </tr>
                <?php endfor;?>

            </tbody>
        </table>
    </div>
    <p class="h5 float-left">
    Total: &#8358;<span id="total"><?php echo $total; ?></span> 
        <input type="hidden" value="<?php echo $total; ?>" id="total-inp">
        <button style="float:right;margin-right:12px;padding-top:5px;" onClick="initiatePayment()" class="btn btn-success">Pay now <i class="bi bi-credit-card"></i></button>
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
               <div class="col-3" id="<?php echo array_values($level2[$i])[0]['ref'];?>">
                    <div class="item-container">
                        <div class="item ">
                            <i class="bi bi-credit-card"></i>
                            <p class="text"><?php echo array_values($level2[$i])[0]['session'].'<br>'.array_values($level2[$i])[0]['reason'];?></p>
                            <small class="price">&#8358;<?php echo array_values($level2[$i])[0]['amount'];?></small>
                            <em>REF: <?php echo array_values($level2[$i])[0]['ref'];?>-<?php echo array_values($level2[$i])[0]['collector'];?></em>

                            <button id="<?php echo array_values($level2[$i])[0]['ref'];?>btn" class="btn btn-success" onclick="addToTable(`<?php echo array_values($level2[$i])[0]['ref'];?>`)">Add</button>
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
               <div class="col-3" id="<?php echo array_values($level3[$i])[0]['ref'];?>">
                    <div class="item-container">
                        <div class="item ">
                            <i class="bi bi-credit-card"></i>
                            <p class="text"><?php echo array_values($level3[$i])[0]['session'].'<br>'.array_values($level3[$i])[0]['reason'];?></p>
                            <small class="price">&#8358;<?php echo array_values($level3[$i])[0]['amount'];?></small>
                            <em>REF: <?php echo array_values($level3[$i])[0]['ref'];?>-<?php echo array_values($level3[$i])[0]['collector'];?></em>
                            <button id="<?php echo array_values($level3[$i])[0]['ref'];?>btn" class="btn btn-success" onclick="addToTable(`<?php echo array_values($level3[$i])[0]['ref'];?>`)">Add</button>
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
        
        var canClose = true;
        var allInvoices = <?php print_r(json_encode($allPaymets));?>;
        var selectedInvoices = <?php print_r(json_encode($level1)); ?>[0];
        var total = Number(document.getElementById('total-inp').value);

        function addToTable(selectedRef){
            if(allInvoices[selectedRef] === undefined) return alert('Error: Cannot add. Unidentified reference')
            else if (selectedInvoices[selectedRef] !== undefined) return alert('Error: Already added')
            else selectedInvoices[selectedRef] = allInvoices[selectedRef]

            canClose = false;

            window.onbeforeunload = function(e) {
                return 'Reloading can discard unsaved changes. Sure to continue?';
            };
            
            document.getElementById(selectedRef).style.opacity = '0.4'
            document.getElementById(selectedRef+'btn').style.display = 'none'

            // // Get a reference to the table element
            var table = document.getElementById("invoicesTbl");

            var selectedInvoice = [[
                allInvoices[selectedRef].reason,
                allInvoices[selectedRef].session,
                "&#8358;"+allInvoices[selectedRef].amount,
                allInvoices[selectedRef].ref,
                "<i onclick='removeFromCart("+allInvoices[selectedRef].ref+")' class='btn btn-danger bx bx-minus'></i>"
            ]];

            total += Number(allInvoices[selectedRef].amount)
            document.getElementById('total').innerHTML = total
            document.getElementById('total-inp').value = total
            // // Loop through the JSON data and create a new row for each item
            for (var i = 0; i < selectedInvoice .length; i++) {
            var row = table.insertRow(-1);
            row.id = 'tr'+selectedRef

            // Loop through the properties of the current item and add a new cell for each property
            for (var property in selectedInvoice[i]) {
                if (selectedInvoice [i].hasOwnProperty(property)) {
                var cell = row.insertCell(-1);
                cell.innerHTML = selectedInvoice[i][property];
                }
            }
            }

        }



        function removeFromCart(ref){
            if(selectedInvoices[ref] === undefined) return alert('Error: Cannot remove. Unidentified reference')
            
            document.getElementById(ref).style.opacity = '1'
            document.getElementById(ref+'btn').style.display = 'block'
            

            //substract from total
            total -= selectedInvoices[ref].amount
            document.getElementById('total').innerHTML = total
            document.getElementById('total-inp').value = total
            
            
            delete selectedInvoices[ref]
            document.getElementById('tr'+ref).remove()
        
        }

        function initiatePayment(){
            // initiate payment
            document.write(JSON.stringify(selectedInvoices))
            document.write(total)
        }
</script> 
</body>

</html>