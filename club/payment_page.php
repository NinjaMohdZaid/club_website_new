<?php 
    include ("includes/head.php");
    require ("../class/adminback.php");
    $obj= new adminback();
    session_start();
    // $_SESSION['auth']['club_id']=45;
    $club_data = $obj->display_clubByID($_SESSION['auth']['club_id']);
    if(!empty($club_data)){
        $subscription_data = $obj->display_subscriptionByID($club_data['subscription_id']);
    }
?>
<?php 
if(isset($_POST['paynow'])){
    header("location:dashboard.php");
}
?>
  <body>
  <h4 class="text-success"> <?php if(isset($rtnMsg)){ echo $rtnMsg; } ?> </h4>
  <?php
  if(!empty($club_data)){
    ?>
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
                                        <h3 class="text-left txt-primary">Subscription Payment (<?php echo 'Plan:'.$subscription_data['subscription'].' For '.$subscription_data['validity_months'].' Months' ?>)</h3>
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
                                        <input type="number" class="form-control" placeholder="Debit Card Number" name="number" required>
                                        <span class="md-line"></span>
                                    </div>
                                    <div class="input-group ml-2">
                                        <input type="number" maxlength="3" minlength="3" class="form-control" placeholder="CVV" name="cvv" required>
                                        <span class="md-line"></span>
                                    </div>
                                </div>
                                <div class="input-group">
                                    <input type="otp" name="otp" class="form-control" placeholder="otp" required>
                                    <span class="md-line"></span>
                                </div>  
                                <hr>
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="submit" name="paynow" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20" value="Pay Now <?php echo '('.$subscription_data['price'].' AED)' ?>">
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
  }else{
  ?>
  <div>Something Went Wrong </div>
  <?php
  }
  ?>
  


<?php 
    include ("includes/script.php")
?>