<?php
       $current_user = wp_get_current_user();
       $role_name      = $current_user->roles[0];
       $userMeta = get_user_meta($current_user->ID);
       
       $allPayments = voctech_get_payment_history(['collector_id'=> get_current_user_id()]);
?>
<div class="payment d-flex flex-column gap-5 col-9">
    <div class="row">
        <div class="col-12 text-center h3 text-uppercase pt-3">
            <b><?php echo $current_user->display_name;?></b>
        </div>
    </div>
            <div class="record-table">
                <h1 class="text-center">PAYMENTS COLLECTED</h1>
                <div class="table-responsive text-sm bg-dark p-2 text-dark bg-opacity-10">
                    <table class="table table-sm text-sm table-sm" id="myTable">
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Description</th>
                                <th>Collector ID</th>
                                <th>Student ID</th>
                                <th>Session</th>
                                <th>Amount</th>
                                <th>Reference</th>
                                <th>RRR</th>
                                <th>Date</th>
                            </tr>
                        </thead>

                        <tbody>
                        <?php
                        for ($i=0; $i < count($allPayments); $i++): 
                        ?>
                        <tr>
                            <td><?php echo $i + 1;?></td>
                            <td><?php echo $allPayments[$i]->reason;?></td>
                            <td>FUL/CL/<?php echo $allPayments[$i]->collector_id;?></td>
                            <td>FUL/ST/<?php echo $allPayments[$i]->student_id;?></td>
                            <td><?php echo $allPayments[$i]->session_;?></td>
                            <td>&#8358;<?php echo $allPayments[$i]->amount;?></td>
                            <td><?php echo $allPayments[$i]->ref;?></td>
                            <td><?php echo $allPayments[$i]->rrr;?></td>
                            <td><?php echo $allPayments[$i]->created_at;?></td>
                    </tr>
                <?php endfor;?>

            </tbody>
        </table>
        </div>
</div>
<script>
      $(document).ready( function () {
        $('#myTable').DataTable();
        
      } );
    </script>
    <!-- Vendor JS Files -->
    <script src="<?php echo get_template_directory_uri();?>/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Template Main JS File -->
    <script src="<?php echo get_template_directory_uri();?>/assets/js/main.js"></script>
</body>

</html>