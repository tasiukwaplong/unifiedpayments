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
        <div class="activities row gap-5 text-center">
                <div class="item col pt-2 well well-sm " style="border-left: 10px solid green;">
                    <div class="h3 p-5 pb-0">
                        &#8358;<?php echo $userMeta['balance'][0];?>
                    </div>
                    <small class="small pt-0 mt-0">
                        <em>Total money collected</em>
                    </small>

                </div>
                <div class="item col pt-2">
                    <a href="<?php echo esc_url( add_query_arg( 'p', 'manage-feesdues' ) );?>" class="text-decoration-none btn border border-md shadow">
                        <i class="bx bx-plus"></i>
                        <p>Add fees/dues</p>
                    </a>
                </div>
                <div class="item col p-2">
                    
                <a href="<?php echo esc_url( add_query_arg( 'p', 'manage-payments' ) );?>" class="text-decoration-none btn border border-md shadow">
                        <i class="bx bx-money"></i>
                        <p>Manage Payments</p>
                    </a>
                </div>
                <div class="item col pt-2">
                    <a href="<?php echo esc_url( add_query_arg( 'p', 'manage-withdrawals' ) );?>" class="text-decoration-none btn border border-md shadow">
                        <i class="bx bx-money-withdraw"></i>
                        <p>Manage withdrawal</p>
                    </a>
                </div>
            </div>
            <div class="record-table">
                <h1 class="text-center">RECENT PAYMENTS</h1>
                <div class="table-responsive text-sm bg-dark p-2 text-dark bg-opacity-10">
                    <table class="table table-sm text-sm table-sm" id="invoicesTbl">
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Description</th>
                                <th>Session</th>
                                <th>Fee</th>
                                <th>Reference</th>
                                <th>RRR</th>
                                <th>Date</th>
                                <th></th>
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
                            <td><?php echo $allPayments[$i]->amount;?></td>
                            <td><?php echo $allPayments[$i]->ref;?></td>
                            <td><?php echo $allPayments[$i]->rrr;?></td>
                            <td><?php echo $allPayments[$i]->created_at;?></td>
                            <td><a href="#view" class="btn btn-primary">View more</a> </td>
                    </tr>
                <?php endfor;?>

            </tbody>
        </table>
        </div>
</div>

    <!-- Vendor JS Files -->
    <script src="<?php echo get_template_directory_uri();?>/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Template Main JS File -->
    <script src="<?php echo get_template_directory_uri();?>/assets/js/main.js"></script>
</body>

</html>