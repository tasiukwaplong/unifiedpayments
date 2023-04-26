<?php
  $allPayments = voctech_get_payment_history(['is_admin'=>true]);
?>
<div class="payment d-flex flex-column gap-5 col-9">
        <div class="activities row gap-5">
                <div class="item col pt-2">
                    <a href="<?php echo esc_url( add_query_arg( 'p', 'manage-collectors' ) );?>" class="text-decoration-none btn border border-md shadow">
                        <i class="bx bx-store"></i>
                        <p>Manage collectors</p>
                    </a>
                </div>
                <div class="item col p-2">
                    <a href="<?php echo esc_url( add_query_arg( 'p', 'manage-students' ) );?>" class="text-decoration-none btn border border-md shadow">
                        <i class="bx bx-user"></i>
                        <p>Manage Students</p>
                    </a>
                </div>
                <div class="item col pt-2">
                    <a href="<?php echo esc_url( add_query_arg( 'p', 'manage-feesdues' ) );?>" class="text-decoration-none btn border border-md shadow">
                        <i class="bx bx-money-withdraw"></i>
                        <p>Manage Fees<br></p>
                    </a>
                </div>
                <div class="item col pt-2">
                <a href="<?php echo esc_url( add_query_arg( 'p', 'manage-withdrawals' ) );?>" class="text-decoration-none btn border border-md shadow">
                        <i class="bx bx-wallet"></i>
                        <p>Manage withdrawals</p>
                    </a>
                </div>
            </div>
            <div class="record-table">
                <h1 class="text-center">RECENT PAYMENTS</h1>
                <div class="table-responsive text-sm bg-dark p-2 text-dark bg-opacity-10">
                    <table class="table table-sm text-sm table-sm" id="myTable">
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Description</th>
                                <th>Session</th>
                                <th>Collector ID</th>
                                <th>Student ID</th>
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
                            <td><?php echo $allPayments[$i]->session_;?></td>
                            <td>FUL/CL/<?php echo $allPayments[$i]->collector_id;?></td>
                            <td>FUL/ST/<?php echo $allPayments[$i]->student_id;?></td>
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