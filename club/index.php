<?php 
    require ("../class/adminback.php");
    $obj= new adminback();
    session_start();
    if(isset($_POST['admin_btn'])){
        $club_data = $obj->club_login($_POST);
        if(!empty($club_data)){
            $_SESSION['auth']['club_id'] = $club_data['club_id'];
            $_SESSION['auth']['email'] = $club_data['email'];
            $_SESSION['auth']['club_type'] = $club_data['type'];
            $_SESSION['auth']['default_lang'] = $club_data['default_lang'];
            if(!empty($_SESSION['auth']['club_id'])){
                header("location:dashboard.php");
            }
        }else{
            $log_msg = "Incorrect credentials";
        }
    }
    if(!empty($_SESSION['auth']['club_id'])){
        header("location:dashboard.php");
    }
?>

<?php 
    include ("includes/head.php")
?>

  <body>

  <section class="login p-fixed d-flex text-center bg-primary common-img-bg">
        <!-- Container-fluid starts -->
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <!-- Authentication card start -->
                    <div class="login-card card-block auth-body mr-auto ml-auto">
                        <form action="" method="post" class="md-float-material">
                            <div class="text-center">
                              
                            </div>
                            <div class="auth-box">
                                <div class="row m-b-20">
                                    <div class="col-md-12">
                                        <h3 class="text-left txt-primary">Club Sign In</h3>
                                        <h6 class="text-danger text-left">
                                            <?php 
                                                if(isset($log_msg)){
                                                    echo $log_msg;
                                                }
                                            ?>
                                        </h6>
                                    </div>
                                </div>
                                <hr/>
                                <div class="input-group">
                                    <input type="email" class="form-control" placeholder="Your Email Address" name="email">
                                    <span class="md-line"></span>
                                </div>
                                <div class="input-group">
                                    <input type="password" class="form-control" placeholder="Password" name="password">
                                    <span class="md-line"></span>
                                </div>
                                <div class="row m-t-25 text-left">
                                    <div class="col-sm-7 col-xs-12">
                                        <div class="checkbox-fade fade-in-primary">
                                            <label>
                                                <input type="checkbox" value="">
                                                <span class="cr"><i class="cr-icon icofont icofont-ui-check txt-primary"></i></span>
                                                <span class="text-inverse">Remember me</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-5 col-xs-12 forgot-phone text-right">
                                        <a href="admin_password_recover.php" class="text-right f-w-600 text-inverse"> Forgot Your Password?</a>
                                    </div>
                                </div>
                                <div class="row m-t-30">
                                    <div class="col-md-12">
                                        <input type="submit" name="admin_btn" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20" value="Sign in">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <a class="btn btn-danger btn-md btn-block waves-effect text-center m-b-20" href="register_club.php">Register Your Club</a>
                                    </div>
                                </div>
                                
                            </div>
                        </form>
                        <!-- end of form -->
                    </div>
                    <!-- Authentication card end -->
                </div>
                <!-- end of col-sm-12 -->
            </div>
            <!-- end of row -->
        </div>
        <!-- end of container-fluid -->
    </section>
	

  

<?php 
    include ("includes/script.php")
?>

