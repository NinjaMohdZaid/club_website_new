<?php 
    include ("includes/head.php");
    require ("../class/adminback.php");
    $obj= new adminback();
    list($subscriptions,) = $obj->display_subscriptions([]);
?>
<?php 
if(isset($_POST['register_club'])){
    $_POST['address'] = '';
    $_POST['activities_desc'] = '';
    $_POST['history'] = '';
    $_POST['status'] = 'D';
    $_POST['default_lang'] = 'en';
    $club_id =   $obj->add_club($_POST);
    if(empty($club_id)){
        $rtnMsg =   "Failed To Register club";
    }else{
        session_start();
        $club_data = $obj->display_clubByID($club_id);
        $_SESSION['auth']['club_id'] = $club_id;
        $_SESSION['auth']['email'] = $club_data['email'];
        $_SESSION['auth']['club_type'] = $club_data['type'];
        $_SESSION['auth']['default_lang'] = $club_data['default_lang'];        
        if(!empty($_SESSION['auth']['club_id'])){
            header("location:payment_page.php");
        }
    }

}
?>
  <body>
  <h4 class="text-success"> <?php if(isset($rtnMsg)){ echo $rtnMsg; } ?> </h4>
  <section class="login p-fixed d-flex text-center bg-primary common-img-bg">
        <!-- Container-fluid starts -->
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <!-- Authentication card start -->
                    <div class="card-block auth-body mr-auto ml-auto">
                        <form action="" method="post" class="md-float-material" enctype="multipart/form-data">
                            <div class="text-center">
                              
                            </div>
                            <div class="auth-box">
                                <div class="row m-b-20">
                                    <div class="col-md-12">
                                        <h3 class="text-left txt-primary">Club Register</h3>
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
                                <div class="d-flex">
                                    <div class="input-group mr-2">
                                        <select name="type" class="form-control" required>
                                            <option value="">Type of club</option>
                                            <option value="C">Commercial</option>
                                            <option value="G">Government</option>
                                        </select>    
                                    </div>
                                    <div class="input-group mr-2">
                                        <input type="text" class="form-control" placeholder="Club Name" name="club" autocomplete="false">
                                        <span class="md-line"></span>
                                    </div>
                                    <div class="input-group ml-2">
                                        <input type="email" class="form-control" placeholder="Your Email Address" name="email" autocomplete="false">
                                        <span class="md-line"></span>
                                    </div>
                                </div>
                                <div class="input-group">
                                    <input type="phone" name="phone" class="form-control" placeholder="phone">
                                    <span class="md-line"></span>
                                </div>  
                                <hr>
                                <div class="d-flex">
                                    
                                    <div class="d-flex flex-column">                        
                                        <div class="input-group mr-2">
                                            <input type="text" name="contact_person" class="form-control" placeholder="Club Contact Person Name" >
                                        </div>
                                        <div class="input-group mr-2">
                                            <input type="website" name="website" class="form-control" placeholder="Website">
                                        </div>
                                    </div>
                                    <div class="d-flex flex-column mx-2">                        
                                        <div class="input-group mr-2">
                                            <input type="text" name="city" class="form-control" placeholder="City" >
                                        </div>
                                        <div class="input-group mr-2">
                                            <select name="subscription_id" required class="form-control">
                                                <option>---Choose Subscription---</option>
                                                <?php
                                                foreach ($subscriptions as $subscription) {
                                                    echo "<option value='".$subscription['subscription_id']."'>".$subscription['subscription']."(".$subscription['price']."AED For ".$subscription['validity_months']." Months)</option>";
                                                }
                                                ?>                                                
                                            </select>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-column">                        
                                        <div class="input-group mr-2 visible_label">
                                            <label for="banner">Club Logo</label>
                                            <input type="file" name="banner">
                                            <!-- <span class="md-line"></span> -->
                                        </div>
                                        <div class="input-group mr-2 visible_label">
                                            <label for="licence_copy" >Upload Trade License Copy</label>
                                            <input type="file" name="licence_copy" required>
                                        </div>
                                        <div class="input-group mr-2 visible_label">
                                            <label for="licence_expiry" >Licence Expiry</label>
                                            <input type="datetime-local" name="licence_expiry" required>
                                        </div>
                                    </div>
                                </div>    
                                <hr>
                                <div class="input-group">
                                    <input type="password" class="form-control" placeholder="Password" name="password" autocomplete="false">
                                    <span class="md-line"></span>
                                </div>
                                <div class="input-group">
                                    <input type="password" class="form-control" placeholder="Confirm Password" name="cpassword">
                                    <span class="md-line"></span>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="submit" name="register_club" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20" value="Register Now">
                                    </div>
                                </div>
                                <hr/>
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
	<style>
        .visible_label{
            color:black;
        }
    </style>

  

<?php 
    include ("includes/script.php")
?>