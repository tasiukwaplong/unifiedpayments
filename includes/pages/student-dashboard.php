<?php
       $current_user = wp_get_current_user();
       $role_name      = $current_user->roles[0];
       $userMeta = get_user_meta($current_user->ID);
?>
<div class="payment d-flex flex-column gap-5 col-9">
    <div class="row">
        <div class="col-12 text-center h3 text-uppercase pt-3">
            <b><?php echo $current_user->display_name;?></b>
        </div>
        <div class="text-center">
            Level: <b>300</b>&nbsp;&nbsp;|&nbsp;Faculty: <b>Science</b>&nbsp;&nbsp;|&nbsp;Faith: <b>Islam</b>&nbsp;&nbsp;|&nbsp;Gender: <b>Male</b>&nbsp;&nbsp;|&nbsp;State/LGA: <b>Nasarawa/Lafia</b>&nbsp;&nbsp;|&nbsp;Others: <b>Others</b>
        </div>
        <br>
        <br>
        <br>
        <hr>
        <h4 class="mb-4">Selected invoice</h4>
        <div class="table-responsive bg-dark p-2 text-dark bg-opacity-10">
          <table class="table table-sm text-sm">
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
                <tr>
                    <td>1</td>
                    <td>2020/2021 NACOS Due</td>
                    <td>#2000</td>
                    <td>NACOS FULafia</td>
                    <td>12/12/2023 12:12</td>
                    <td>1236651GF</td>
                    <td>Payment pending</td>
                    <th title="remove"><i class="btn text-danger round border border-danger bx bx-minus"></i></th>
                </tr>

                <tr>
                    <td>2</td>
                    <td>2020/2021 NACOS Due</td>
                    <td>#2000</td>
                    <td>NACOS FULafia</td>
                    <td>12/12/2023 12:12</td>
                    <td>1236651GFs</td>
                    <td>Payment pending</td>
                    <th title="remove"><i class="btn text-danger round border border-danger bx bx-minus"></i></th>
                </tr>


            </tbody>
        </table>
    </div>
    <p class="h5 float-left">
        Total: #2000
    </p>
        <hr>
    </div>
        
    <div class="payment-section">
            <h4 class="mb-4">Select invoice to pay</h4>
            <div class="item-container">
                <div class="item ">
                    <i class="bi bi-credit-card"></i>
                    <p class="text">undergratuate school charges</p>
                    <p class="price">N45,500</p>
                    <button>pay fee</button>
                </div>
                <div class="item ">
                    <i class="bi bi-credit-card"></i>
                    <p class="text">hostel fee</p>
                    <p class="price">N20,000</p>
                    <button>pay fee</button>
                </div>
                <div class="item ">
                    <i class="bi bi-credit-card"></i>
                    <p class="text">faculty due</p>
                    <p class="price">N2,00</p>
                    <button>pay fee</button>
                </div>
                <div class="item ">
                    <i class="bi bi-credit-card"></i>
                    <p class="text">departmental Registration</p>
                    <p class="price">N45,00</p>
                    <button>pay fee</button>
                </div>
                <div class="item ">
                    <i class="bi bi-credit-card"></i>
                    <p class="text">GST charges</p>
                    <p class="price">N45,200</p>
                    <button>pay fee</button>
                </div>
                <div class="item ">
                    <i class="bi bi-credit-card"></i>
                    <p class="text">ESP charges</p>
                    <p class="price">N20,500</p>
                    <button>pay fee</button>
                </div>
                <div class="item ">
                    <i class="bi bi-credit-card"></i>
                    <p class="text">Portal Charges</p>
                    <p class="price">2,200</p>
                    <button>pay fee</button>
                </div>
                <div class="item ">
                    <i class="bi bi-credit-card"></i>
                    <p class="text">Turn-it-in fee</p>
                    <p class="price">45,200</p>
                    <button>pay fee</button>
                </div>
                <div class="item ">
                    <i class="bi bi-credit-card"></i>
                    <p class="text">ID Card Replacement</p>
                    <p class="price">45,200</p>
                    <button>pay fee</button>
                </div>
                <div class="item ">
                    <i class="bi bi-credit-card"></i>
                    <p class="text">Hostel Fee</p>
                    <p class="price">45,200</p>
                    <button>pay fee</button>
                </div>
                <div class="item ">
                    <i class="bi bi-credit-card"></i>
                    <p class="text">Libary Fee</p>
                    <p class="price">45,200</p>
                    <button>pay fee</button>
                </div>
                <div class="item ">
                    <i class="bi bi-credit-card"></i>
                    <p class="text">Portal Fee</p>
                    <p class="price">45,200</p>
                    <button>pay fee</button>
                </div>
            </div>
        </div>
</div>
    <!-- Vendor JS Files -->
    <script src="<?php echo get_template_directory_uri();?>/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Template Main JS File -->
    <script src="<?php echo get_template_directory_uri();?>/assets/js/main.js"></script>
</body>

</html>