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
                        <p>Manage Fees&nbsp;&nbsp;&nbsp;&nbsp;</p>
                    </a>
                </div>
                <div class="item col pt-2">
                <a href="<?php echo esc_url( add_query_arg( 'p', 'manage-payments' ) );?>" class="text-decoration-none btn border border-md shadow">
                        <i class="bx bx-wallet"></i>
                        <p>Manage Payments</p>
                    </a>
                </div>
            </div>
            <div class="record-table">
                <h1 class="text-center">RECENT PAYMENTS</h1>
                <table class="table">
                    <thead>
                        <tr>
                            <th>payment for;</th>
                            <th>RRR</th>
                            <th>Date</th>
                            <th>Amount</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>undergratuate school charges</td>
                            <td>12345678</td>
                            <td>30/12/2022</td>
                            <td>45,000</td>
                            <td>
                                <div class="error">error</div>
                            </td>
                            <td><i class="bx bx-dots-vertical"></i></td>

                        </tr>
                        <tr>
                            <td>GST Charges</td>
                            <td>12345678</td>
                            <td>30/12/2022</td>
                            <td>45,000</td>
                            <td>
                                <div class="succes">succes</div>
                            </td>
                            <td><i class="bx bx-dots-vertical"></i></td>

                        </tr>
                        <tr>
                            <td>ESP Charges</td>
                            <td>12345678</td>
                            <td>30/12/2022</td>
                            <td>45,000</td>
                            <td>
                                <div class="error">error</div>
                            </td>
                            <td><i class="bx bx-dots-vertical"></i></td>

                        </tr>
                        <tr>
                            <td>ID Card Replacement</td>
                            <td>12345678</td>
                            <td>30/12/2022</td>
                            <td>45,000</td>
                            <td>
                                <div class="succes">succes</div>
                            </td>
                            <td><i class="bx bx-dots-vertical"></i></td>

                        </tr>
                        <tr>
                            <td>Portal Charges</td>
                            <td>12345678</td>
                            <td>30/12/2022</td>
                            <td>45,000</td>
                            <td>
                                <div class="error">error</div>
                            </td>
                            <td><i class="bx bx-dots-vertical"></i></td>

                        </tr>
                        <tr>
                            <td>Hostel Fee</td>
                            <td>12345678</td>
                            <td>30/12/2022</td>
                            <td>45,000</td>
                            <td>
                                <div class="succes">succes</div>
                            </td>
                            <td><i class="bx bx-dots-vertical"></i></td>

                        </tr>
                        <tr>
                            <td>Departmental Registration Charges</td>
                            <td>12345678</td>
                            <td>30/12/2022</td>
                            <td>45,000</td>
                            <td>
                                <div class="error">error</div>
                            </td>
                            <td><i class="bx bx-dots-vertical"></i></td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
</div>
    <!-- Vendor JS Files -->
    <script src="<?php echo get_template_directory_uri();?>/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Template Main JS File -->
    <script src="<?php echo get_template_directory_uri();?>/assets/js/main.js"></script>
</body>

</html>