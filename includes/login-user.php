<section class="container-fluid">
        <div class="row">
            <div class="col-md-12 bg-light border">
                <div class="alert alert-danger " style="display: none;" id="err-container">
                    <p id="err-msg"></p>
                </div>
                <div class="alert alert-success" style="display: none;" id="success-container">
                    Logged in successfully. Redirecting to dashboard...
                    If you are not redirected, <a href="/sign-in">here to go to dashboard</a>
                </div>

                <?php if(!is_user_logged_in()):?>
                <form class="text-center" id="user-login">
                    <div class="col-md-12">
                        <h2 class="text-center">LOG IN TO DASHBOARD</h2>
                    </div>
                    <div class="">
                        <input placeholder="Enter email/username/matric" type="text" name="email" class="form-control" minlength="5" maxlength="40" required>
                    </div>

                    <div class="">
                        <input placeholder="Enter password" type="password" name="password1" class="form-control m-2" minlength="3" maxlength="10" required>
                    </div>

                    <div class="">
                        <input type="submit" id="btn-register" value="Log in" class="form-control btn btn-warning ">
                        <input type="button" id="btn-processing" value="Loggin in..." class="form-control btn btn-warning  " style="display: none;">
                    </div>
                    
                </form>
            <?php else: ?>
            <div class="alert alert-info text-center">
                Already logged in. <br>
                <?php 
                  $current_user   = wp_get_current_user();
                  $role_name      = $current_user->roles[0];
                ?>
                <a href="./<?php echo $role_name;?>-dashboard">Continue to dashboard</a>&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo wp_logout_url(home_url()) ?>">Logout</a>
            </div>
            <?php endif ?>
            </div>
            <div class="col-md-2"></div>
        </div>
    </section>

    <script type="text/javascript">
        $('#user-login').submit(function(e){

            e.preventDefault();
            var endpoint = '<?php echo admin_url('admin-ajax.php'); ?>';
            var form = $('#user-login').serialize();
            var formData = new FormData;
            formData.append('action', 'login');
            formData.append('login', form);

            $.ajax(endpoint, {
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,

                success: function(res){
                    if(res.success === true){
                    scrollTo(0,0)

                        $('#success-container').show();
                        $('#err-container').hide();
                        $('#user-login').hide();
                        // console.log(res.data)
                        if(res.data === 'student') window.location = 'student-dashboard'
                        else if(res.data === 'collector') window.location = 'collector-dashboard'
                        else if(res.data === 'administrator') window.location = 'administrator-dashboard'
                    }else{
                    scrollTo(0,0)
                        
                        // console.log(res.data)
                        $('#err-container').show();
                        $('#err-msg').html(res.data.join('<br>'))
                    }
                    
                },
                error: function(err){
                    $('#err-container').show();
                    $('#err-msg').html('Server error: could not login')
                }
            })
        })
    </script>