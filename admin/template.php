<?php 
ob_start();
    include("../class/adminback.php");
    $obj= new adminback();

    session_start();
    $admin_id = $_SESSION['admin_id'];
    $admin_email = $_SESSION['admin_email'];
    if($admin_id==null){
        header("location:index.php");
    }

    if(isset($_GET['adminLogout'])){
        if($_GET['adminLogout']=="logout"){
            $obj->admin_logout();
        }
    }
    if(isset($_GET['set_default_language'])){
        if($_GET['set_default_language']=="ar" || $_GET['set_default_language']=="en"){
            $obj->set_deafult_language($_GET['set_default_language'],$_SESSION['admin_id']);
        }
    }
?>

<?php 
    include ("includes/head.php")
?>

  <body>
  <body>
	  <div class="fixed-button">
		
	  </div>
       <!-- Pre-loader start -->
    <div class="theme-loader">
        <div class="loader-track">
            <div class="loader-bar"></div>
        </div>
    </div>
    <!-- Pre-loader end -->
    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">

         <?php include_once ("includes/headernav.php") ?>


            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                   
                <?php include_once ("includes/sidenav.php") ?>


                    <div class="pcoded-content">
                        <div class="pcoded-inner-content">
                            <div class="main-body">
                                <div class="page-wrapper">

                                    <div class="page-body">
                                     
        
                                <?php 
                                    if($views){
                                        if($views=="dashboard"){
                                            include ('views/dashborad_view.php');
                                        }elseif($views=="add-cata"){
                                            include ("views/add_cata_view.php");
                                        }elseif($views=="manage-cata"){
                                            include ("views/manage_cata_view.php");
                                        }elseif($views=="add-product"){
                                            include ("views/add_product_view.php");
                                        }elseif($views=="manage-product"){
                                            include ("views/manage_product_view.php");
                                        }elseif($views=="add-user"){
                                            include ("views/add_user_view.php");
                                        }elseif($views=="manage-user"){
                                            include ("views/manage_user_view.php");
                                        }elseif($views=="edit_cata"){
                                            include ("views/edit_cata_view.php");
                                        }elseif($views=="edit_product"){
                                            include ("views/edit_product_view.php");
                                        }elseif($views=="manage_order"){
                                            include ("views/manage_order_view.php");
                                        }elseif($views=="add_link"){
                                            include ("views/add_links_view.php");
                                        }elseif($views=="edit_logo"){
                                            include ("views/edit_logo_view.php");
                                        }elseif($views=="add_logo"){
                                            include ("views/add_logo_view.php");
                                        }elseif($views=="edit_links"){
                                            include ("views/edit_links_view.php");
                                        }elseif($views=="manage_slider"){
                                            include ("views/manage_slider_view.php");
                                        }elseif($views=="edit_slider"){
                                            include ("views/edit_slider_view.php");
                                        }elseif($views=="add_order"){
                                            include ("views/add_order_view.php");
                                        }elseif($views=="add_coupon"){
                                            include ("views/add_coupon_view.php");
                                        }elseif($views=="manage_coupon"){
                                            include ("views/manage_coupon_view.php");
                                        }elseif($views=="customer_feedback"){
                                            include ("views/customer_feedback_view.php");
                                        }elseif($views=="edit_comment"){
                                            include ("views/edit_comment_view.php");
                                        }elseif($views=="add-admin-user"){
                                            include ("views/add_admin_user_view.php");
                                        }elseif($views=="edit_admin"){
                                            include ("views/edit_admin_view.php");
                                        }elseif($views=="make_report"){
                                            include ("views/make_report_view.php");
                                        }elseif($views=="add_game"){
                                            include ("views/add_game_view.php");
                                        }elseif($views=="manage_games"){
                                            include ("views/manage_games_view.php");
                                        }elseif($views=="edit_game"){
                                            include ("views/edit_game_view.php");
                                        }elseif($views=='add_subscription'){
                                            include ("views/add_subscription_view.php");
                                        }elseif($views=='manage_subscriptions'){
                                            include ("views/manage_subscriptions_view.php");
                                        }elseif($views=='edit_subscription'){
                                            include ("views/edit_subscription_view.php");
                                        }elseif($views=='add_club'){
                                            include ("views/add_club_view.php");
                                        }elseif($views=='manage_club'){
                                            include ("views/manage_clubs_view.php");
                                        }elseif($views=='edit_club'){
                                            include ("views/edit_club_view.php");
                                        }elseif($views=='add_booking'){
                                            include ("views/add_booking_view.php");
                                        }elseif($views=='manage_bookings'){
                                            include ("views/manage_bookings_view.php");
                                        }elseif($views=='edit_booking'){
                                            include ("views/edit_booking_view.php");
                                        }elseif($views=='manage_tournaments'){
                                            include ("views/manage_tournaments_view.php");
                                        }elseif($views=='add_job'){
                                            include ("views/add_job_view.php");
                                        }elseif($views=='manage_jobs'){
                                            include ("views/manage_jobs_view.php");
                                        }elseif($views=='edit_job'){
                                            include ("views/edit_job_view.php");
                                        }elseif($views=='edit_coupon'){
                                            include ("views/edit_coupon_view.php");
                                        }elseif($views=='report'){
                                            include ("views/report_view.php");
                                        }elseif($views=='manage_club_sponsors'){
                                            include ("views/manage_club_sponsors_view.php");
                                        }elseif($views=='admin_sponsors'){
                                            include ("views/admin_sponsors_view.php");
                                        }elseif($views=='add_sponsor'){
                                            include ("views/add_sponsor_view.php");
                                        }elseif($views=='edit_sponsor'){
                                            include ("views/edit_sponsor_view.php");
                                        }elseif($views=='language_translations'){
                                            include ("views/language_translations_view.php");
                                        }elseif($views=='add_translation'){
                                            include ("views/add_translation_view.php");
                                        }elseif($views=='edit_translation'){
                                            include ("views/edit_translation_view.php");
                                        }
                                        
                                    }
                                ?>


                                    <div id="styleSelector">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Warning Section Starts -->
        <!-- Older IE warning message -->
    <!--[if lt IE 9]>
<div class="ie-warning">
    <h1>Warning!!</h1>
    <p>You are using an outdated version of Internet Explorer, please upgrade <br/>to any of the following web browsers to access this website.</p>
    <div class="iew-container">
        <ul class="iew-download">
            <li>
                <a href="http://www.google.com/chrome/">
                    <img src="assets/images/browser/chrome.png" alt="Chrome">
                    <div>Chrome</div>
                </a>
            </li>
            <li>
                <a href="https://www.mozilla.org/en-US/firefox/new/">
                    <img src="assets/images/browser/firefox.png" alt="Firefox">
                    <div>Firefox</div>
                </a>
            </li>
            <li>
                <a href="http://www.opera.com">
                    <img src="assets/images/browser/opera.png" alt="Opera">
                    <div>Opera</div>
                </a>
            </li>
            <li>
                <a href="https://www.apple.com/safari/">
                    <img src="assets/images/browser/safari.png" alt="Safari">
                    <div>Safari</div>
                </a>
            </li>
            <li>
                <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                    <img src="assets/images/browser/ie.png" alt="">
                    <div>IE (9 & above)</div>
                </a>
            </li>
        </ul>
    </div>
    <p>Sorry for the inconvenience!</p>
</div>
<![endif]-->
<!-- Warning Section Ends -->
<!-- Required Jquery -->

<?php 
    include ("includes/script.php");
    ob_end_flush();
?>