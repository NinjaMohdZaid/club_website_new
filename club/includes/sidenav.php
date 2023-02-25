<?php 
$file = $_SERVER["SCRIPT_NAME"];
$break = Explode('/', $file);
$current_file = $break[count($break) - 1];
?>

<nav class="pcoded-navbar">
    <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
    <div class="pcoded-inner-navbar main-menu">
        
        <div class="pcoded-navigatio-lavel" data-i18n="nav.category.navigation"></div>
        <ul class="pcoded-item pcoded-left-item">
            <li class="<?php if($current_file == 'dashboard.php') echo 'active'; ?>">
                <a href="dashboard.php">
                    <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
                    <span class="pcoded-mtext" data-i18n="nav.dash.main">Dashboard</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>

            <li class="pcoded-hasmenu <?php if($current_file == 'manage_games.php' || $current_file == 'add_game.php' || $current_file == 'edit_game.php' || $current_file == 'manage_tables.php') echo 'active pcoded-trigger complete'; ?>">
                <a href="javascript:void(0)">
                    <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i></span>
                    <span class="pcoded-mtext"  data-i18n="nav.basic-components.main">Games</span>
                    <span class="pcoded-mcaret"></span>
                </a>
                <ul class="pcoded-submenu">
                    <li class="<?php if($current_file == 'add_game.php') echo 'active'; ?>">
                        <a href="add_game.php">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext" data-i18n="nav.basic-components.alert" style="font-weight: 400;">Add Games To Club</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li class="<?php if($current_file == 'manage_games.php' || $current_file == 'manage_tables.php') echo 'active'; ?>">
                        <a href="manage_games.php">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext" data-i18n="nav.basic-components.breadcrumbs" style="font-weight: 400;">Manage Games</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="pcoded-hasmenu <?php if($current_file == 'manage_bookings.php' || $current_file == 'add_booking_manually.php' || $current_file == 'edit_booking.php') echo 'active pcoded-trigger complete'; ?>">
                <a href="javascript:void(0)">
                    <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i></span>
                    <span class="pcoded-mtext"  data-i18n="nav.basic-components.main">Bookings</span>
                    <span class="pcoded-mcaret"></span>
                </a>
                <ul class="pcoded-submenu">
                    <li class="<?php if($current_file == 'add_booking_manually.php') echo 'active'; ?>">
                        <a href="add_booking_manually.php">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext" data-i18n="nav.basic-components.alert" style="font-weight: 400;" >New Booking</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li class="<?php if($current_file == 'manage_bookings.php') echo 'active'; ?>">
                        <a href="manage_bookings.php">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext" data-i18n="nav.basic-components.breadcrumbs" style="font-weight: 400;" >Manage Bookings</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                </ul>
            </li>
            
            <li class="pcoded-hasmenu <?php if($current_file == 'add_coupon.php' || $current_file == 'manage_coupon.php') echo 'active pcoded-trigger complete'; ?>">
                <a href="javascript:void(0)">
                    <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i></span>
                    <span class="pcoded-mtext"  data-i18n="nav.basic-components.main">Special Offers</span>
                    <span class="pcoded-mcaret"></span>
                </a>
                <ul class="pcoded-submenu">
                    <li class="<?php if($current_file == 'add_coupon.php') echo 'active'; ?>">
                        <a href="add_coupon.php">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext" data-i18n="nav.basic-components.alert" style="font-weight: 400;" >Add Special Offers</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li class="<?php if($current_file == 'manage_coupon.php') echo 'active'; ?>">
                        <a href="manage_coupon.php">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext" data-i18n="nav.basic-components.breadcrumbs" style="font-weight: 400;" >Manage Special Offers</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="pcoded-hasmenu <?php if($current_file == 'add_product.php' || $current_file == 'manage_product.php' || $current_file == 'edit_product.php') echo 'active pcoded-trigger complete'; ?>">
                <a href="javascript:void(0)">
                    <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i></span>
                    <span class="pcoded-mtext"  data-i18n="nav.basic-components.main">Products</span>
                    <span class="pcoded-mcaret"></span>
                </a>
                <ul class="pcoded-submenu">
                    <li class="<?php if($current_file == 'add_product.php') echo 'active'; ?>">
                        <a href="add_product.php">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext" data-i18n="nav.basic-components.alert" style="font-weight: 400;" >Add Prodcut</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li class="<?php if($current_file == 'manage_product.php') echo 'active'; ?>">
                        <a href="manage_product.php">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext" data-i18n="nav.basic-components.breadcrumbs" style="font-weight: 400;" >Manage Product</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>


                </ul>
            </li>

            <li class="pcoded-hasmenu <?php if($current_file == 'add_order.php' || $current_file == 'manage_order.php') echo 'active pcoded-trigger complete'; ?>">
                <a href="javascript:void(0)">
                    <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i></span>
                    <span class="pcoded-mtext"  data-i18n="nav.basic-components.main">Order</span>
                    <span class="pcoded-mcaret"></span>
                </a>

                <ul class="pcoded-submenu">
                    <li class="<?php if($current_file == 'add_order.php') echo 'active'; ?>">
                        <a href="add_order.php">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext" data-i18n="nav.basic-components.alert" style="font-weight: 400;">Add Order</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    


                </ul>


                <ul class="pcoded-submenu">
                    <li class="<?php if($current_file == 'manage_order.php') echo 'active'; ?>">
                        <a href="manage_order.php">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext" data-i18n="nav.basic-components.alert" style="font-weight: 400;">Manage Order</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    


                </ul>
            </li>
            <li class="pcoded-hasmenu <?php if($current_file == 'report.php') echo 'active pcoded-trigger complete'; ?>">
                <a href="javascript:void(0)">
                    <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i></span>
                    <span class="pcoded-mtext"  data-i18n="nav.basic-components.main">Report</span>
                    <span class="pcoded-mcaret"></span>
                </a>
                <ul class="pcoded-submenu">
                    <li class="<?php if($current_file == 'report.php') echo 'active'; ?>">
                        <a href="report.php">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext" data-i18n="nav.basic-components.alert" style="font-weight: 400;" >Bookings</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li class="<?php if($current_file == 'report.php') echo 'active'; ?>">
                        <a href="report.php">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext" data-i18n="nav.basic-components.alert" style="font-weight: 400;" >Orders</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li class="<?php if($current_file == 'report.php') echo 'active'; ?>">
                        <a href="report.php">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext" data-i18n="nav.basic-components.alert" style="font-weight: 400;" >Clubs</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li class="<?php if($current_file == 'report.php') echo 'active'; ?>">
                        <a href="report.php">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext" data-i18n="nav.basic-components.alert" style="font-weight: 400;" >Tournaments</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li class="<?php if($current_file == 'report.php') echo 'active'; ?>">
                        <a href="report.php">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext" data-i18n="nav.basic-components.alert" style="font-weight: 400;" >Members</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li class="<?php if($current_file == 'report.php') echo 'active'; ?>">
                        <a href="report.php">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext" data-i18n="nav.basic-components.alert" style="font-weight: 400;" >Points</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>

                </ul>
            </li>
            <li class="pcoded-hasmenu  <?php if($current_file == 'manage_jobs.php' || $current_file == 'add_job.php' || $current_file == 'edit_job.php') echo 'active pcoded-trigger complete'; ?>">
                <a href="javascript:void(0)">
                    <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i></span>
                    <span class="pcoded-mtext"  data-i18n="nav.basic-components.main">Jobs</span>
                    <span class="pcoded-mcaret"></span>
                </a>
                <ul class="pcoded-submenu">
                    <li class="<?php if($current_file == 'add_job.php') echo 'active'; ?>">
                        <a href="add_job.php">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext" data-i18n="nav.basic-components.alert" style="font-weight: 400;" >Add Job</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li class="<?php if($current_file == 'manage_jobs.php') echo 'active'; ?>">
                        <a href="manage_jobs.php">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext" data-i18n="nav.basic-components.breadcrumbs" style="font-weight: 400;" >Manage Jobs</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>


                </ul>
            </li>
            <li class="pcoded-hasmenu <?php if($current_file == 'edit_tournament.php' || $current_file == 'manage_tournaments.php' || $current_file == 'manage_sponsors.php' || $current_file == 'edit_sponsor.php' || $current_file == 'add_tournament.php') echo 'active pcoded-trigger complete'; ?>">
                <a href="javascript:void(0)">
                    <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i></span>
                    <span class="pcoded-mtext"  data-i18n="nav.basic-components.main">Tournaments</span>
                    <span class="pcoded-mcaret"></span>
                </a>
                <ul class="pcoded-submenu">
                    <li class="<?php if($current_file == 'add_tournament.php') echo 'active'; ?>">
                        <a href="add_tournament.php">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext" data-i18n="nav.basic-components.alert" style="font-weight: 400;" >Add Tornament</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li class="<?php if($current_file == 'manage_tournaments.php') echo 'active'; ?>">
                        <a href="manage_tournaments.php">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext" data-i18n="nav.basic-components.alert" style="font-weight: 400;" >All Tornaments</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li class="<?php if($current_file == 'manage_sponsors.php') echo 'active'; ?>">
                        <a href="manage_sponsors.php">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext" data-i18n="nav.basic-components.alert" style="font-weight: 400;" >All Sponsors</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                </ul>
                </li>
            
            
            <!--

            <li class="pcoded-hasmenu <?php if($current_file == 'add_subscription.php' || $current_file == 'manage_subscriptions.php' || $current_file == 'edit_subscription.php') echo 'active pcoded-trigger complete'; ?>">
                <a href="javascript:void(0)">
                    <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i></span>
                    <span class="pcoded-mtext"  data-i18n="nav.basic-components.main">Subscriptions</span>
                    <span class="pcoded-mcaret"></span>
                </a>
                <ul class="pcoded-submenu">
                    <li class="<?php if($current_file == 'add_subscription.php') echo 'active'; ?>">
                        <a href="add_subscription.php">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext" data-i18n="nav.basic-components.alert" style="font-weight: 400;" >New Subscription</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li class="<?php if($current_file == 'manage_subscriptions.php') echo 'active'; ?>">
                        <a href="manage_subscriptions.php">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext" data-i18n="nav.basic-components.breadcrumbs" style="font-weight: 400;" >Manage Subscription</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>


                </ul>
            </li>
            

           
            

            <?php 
                if($_SESSION['role']==1){
            ?>

            <li class="pcoded-hasmenu <?php if($current_file == 'add_admin_user.php' || $current_file == 'manage_user.php' || $current_file == 'edit_admin.php') echo 'active pcoded-trigger complete'; ?>">
                <a href="javascript:void(0)">
                    <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i></span>
                    <span class="pcoded-mtext"  data-i18n="nav.basic-components.main">User</span>
                    <span class="pcoded-mcaret"></span>
                </a>

                <ul class="pcoded-submenu">
                    <li class="<?php if($current_file == 'add_admin_user.php') echo 'active'; ?>">
                        <a href="add_admin_user.php">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext" data-i18n="nav.basic-components.alert" style="font-weight: 400;" >Add User</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    

                </ul>

                <ul class="pcoded-submenu">
                    <li class="<?php if($current_file == 'manage_user.php') echo 'active'; ?>">
                        <a href="manage_user.php">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext" data-i18n="nav.basic-components.alert" style="font-weight: 400;" >Manage User</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    

                </ul>
            </li>

            <?php }?>

            <li class="pcoded-hasmenu <?php if($current_file == 'customer_feedback.php') echo 'active pcoded-trigger complete'; ?>">
                <a href="javascript:void(0)">
                    <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i></span>
                    <span class="pcoded-mtext"  data-i18n="nav.basic-components.main">Reviews</span>
                    <span class="pcoded-mcaret"></span>
                </a>
                <ul class="pcoded-submenu">
                    <li class="<?php if($current_file == 'customer_feedback.php') echo 'active'; ?>">
                        <a href="customer_feedback.php">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext" data-i18n="nav.basic-components.alert" style="font-weight: 400;" >Customer Reviews</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    

                </ul>
            </li>-->

            <li class="pcoded-hasmenu <?php if($current_file == 'edit_club.php') echo 'active pcoded-trigger complete'; ?>">
                <a href="javascript:void(0)">
                    <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i></span>
                    <span class="pcoded-mtext"  data-i18n="nav.basic-components.main">Settings</span>
                    <span class="pcoded-mcaret"></span>
                </a>
                <ul class="pcoded-submenu">
                    
                    <li class="<?php if($current_file == 'edit_club.php') echo 'active'; ?>">
                        <a href="edit_club.php">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext" data-i18n="nav.basic-components.breadcrumbs" style="font-weight: 400;">Update Club</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>


                </ul>
            </li>



            <!-- <li class="pcoded-hasmenu">
                <a href="javascript:void(0)">
                    <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i></span>
                    <span class="pcoded-mtext"  data-i18n="nav.basic-components.main">Slider</span>
                    <span class="pcoded-mcaret"></span>
                </a>

                
                <ul class="pcoded-submenu">
                    <li class=" ">
                        <a href="manage_slider.php">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext" data-i18n="nav.basic-components.alert" style="font-weight: 400;">Manag Slider</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                

                </ul>
            </li> -->

            
        </ul>
    </div>
</nav>