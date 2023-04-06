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
        $myPayments = voctech_get_payment_history(['student_id'=>get_current_user_id()]);
        $totalPaidAlready = 0;
        $alreadyPaid = [];
        foreach($myPayments as $payment){
          $totalPaidAlready += $payment->amount;
          $alreadyPaid[$payment->ref] = true;
        }
        // print_r($alreadyPaid);
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
       
        <hr>
    </div>

    <!-- Level 3 payments -->
    <div class="payment-section row">
      <h4 class="mb-4">Payment history</h4>
      <table class="table table-stripped" id="myTable">
        <thead>
          <tr>
            <th>Ref</th>
            <th>Collector ID</th>
            <th>Session</th>
            <th>Amount</th>
            <th>RRR</th>
            <th>Description</th>
            <th>Priority</th>
          </tr>
        </thead>

        <tbody>
          <?php
            foreach($myPayments as $payment):
          ?>
          <tr>
            <td><?php echo $payment->ref;?></td>
            <td>FUL/COL/<?php echo $payment->collector_id;?></td>
            <td><?php echo $payment->session_;?></td>
            <td><?php echo $payment->amount;?></td>
            <td><?php echo $payment->rrr;?></td>
            <td><?php echo $payment->reason;?></td>
            <td><?php echo $payment->priority_;?></td>
          </tr>
        <?php endforeach; ?>
        </tbody>
      </table>
      <div class="text-center">
        <button onclick="window.print()" class="btn btn-success">Print <i class="bx bx-printer"></i></button>
      </div>
    </div>
        <!-- Level 2 payments ends here-->
      </div>


    <!-- Vendor JS Files -->
    <script src="<?php echo get_template_directory_uri();?>/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Template Main JS File -->  
    <script src="<?php echo get_template_directory_uri();?>/assets/js/main.js"></script>
    <script>
      $(document).ready( function () {
        $('#myTable').DataTable();
        
      } );
    </script>
</body>

</html>