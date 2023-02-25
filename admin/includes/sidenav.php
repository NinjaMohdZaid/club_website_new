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
                    <span class="pcoded-mtext" data-i18n="nav.dash.main"><?php echo $obj->__('dashboard',$_SESSION['default_lang']); ?></span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>

            <li class="pcoded-hasmenu <?php if($current_file == 'manage_games.php' || $current_file == 'add_game.php' || $current_file == 'edit_game.php') echo 'active pcoded-trigger complete'; ?>">
                <a href="javascript:void(0)">
                    <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i></span>
                    <span class="pcoded-mtext"  data-i18n="nav.basic-components.main"><?php echo $obj->__('games',$_SESSION['default_lang']); ?></span>
                    <span class="pcoded-mcaret"></span>
                </a>
                <ul class="pcoded-submenu">
                    <li class="<?php if($current_file == 'add_game.php') echo 'active'; ?>">
                        <a href="add_game.php">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext" data-i18n="nav.basic-components.alert" style="font-weight: 400;"><?php echo $obj->__('add_game',$_SESSION['default_lang']); ?></span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li class="<?php if($current_file == 'manage_games.php') echo 'active'; ?>">
                        <a href="manage_games.php">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext" data-i18n="nav.basic-components.breadcrumbs" style="font-weight: 400;"><?php echo $obj->__('manage_games',$_SESSION['default_lang']); ?></span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="pcoded-hasmenu <?php if($current_file == 'manage_clubs.php' || $current_file == 'add_club.php' || $current_file == 'edit_club.php') echo 'active pcoded-trigger complete'; ?>">
                <a href="javascript:void(0)">
                    <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i></span>
                    <span class="pcoded-mtext"  data-i18n="nav.basic-components.main"><?php echo $obj->__('clubs',$_SESSION['default_lang']); ?></span>
                    <span class="pcoded-mcaret"></span>
                </a>
                <ul class="pcoded-submenu">
                    <li class="<?php if($current_file == 'add_club.php') echo 'active'; ?>">
                        <a href="add_club.php">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext" data-i18n="nav.basic-components.alert" style="font-weight: 400;" ><?php echo $obj->__('add_club',$_SESSION['default_lang']); ?></span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li class="<?php if($current_file == 'manage_clubs.php') echo 'active'; ?>">
                        <a href="manage_clubs.php">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext" data-i18n="nav.basic-components.breadcrumbs" style="font-weight: 400;" ><?php echo $obj->__('manage_clubs',$_SESSION['default_lang']); ?></span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="pcoded-hasmenu <?php if($current_file == 'add_cata.php' || $current_file == 'manage_cata.php' || $current_file == 'edit_cata.php') echo 'active pcoded-trigger complete'; ?>">
                <a href="javascript:void(0)">
                    <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i></span>
                    <span class="pcoded-mtext"  data-i18n="nav.basic-components.main"><?php echo $obj->__('categories',$_SESSION['default_lang']); ?></span>
                    <span class="pcoded-mcaret"></span>
                </a>
                <ul class="pcoded-submenu">
                    <li class="<?php if($current_file == 'add_cata.php') echo 'active'; ?>">
                        <a href="add_cata.php">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext" data-i18n="nav.basic-components.alert" style="font-weight: 400;"><?php echo $obj->__('add_category',$_SESSION['default_lang']); ?></span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li class="<?php if($current_file == 'manage_cata.php') echo 'active'; ?>">
                        <a href="manage_cata.php">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext" data-i18n="nav.basic-components.breadcrumbs" style="font-weight: 400;"><?php echo $obj->__('manage_categories',$_SESSION['default_lang']); ?></span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                </ul>
            </li>


            <li class="pcoded-hasmenu <?php if($current_file == 'add_product.php' || $current_file == 'manage_product.php' || $current_file == 'edit_product.php') echo 'active pcoded-trigger complete'; ?>">
                <a href="javascript:void(0)">
                    <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i></span>
                    <span class="pcoded-mtext"  data-i18n="nav.basic-components.main"><?php echo $obj->__('products',$_SESSION['default_lang']); ?></span>
                    <span class="pcoded-mcaret"></span>
                </a>
                <ul class="pcoded-submenu">
                    <li class="<?php if($current_file == 'add_product.php') echo 'active'; ?>">
                        <a href="add_product.php">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext" data-i18n="nav.basic-components.alert" style="font-weight: 400;" ><?php echo $obj->__('add_product',$_SESSION['default_lang']); ?></span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li class="<?php if($current_file == 'manage_product.php') echo 'active'; ?>">
                        <a href="manage_product.php">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext" data-i18n="nav.basic-components.breadcrumbs" style="font-weight: 400;" ><?php echo $obj->__('manage_products',$_SESSION['default_lang']); ?></span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>


                </ul>
            </li>

            <li class="pcoded-hasmenu <?php if($current_file == 'manage_tournaments.php' || $current_file == 'admin_sponsors.php' || $current_file == 'edit_sponsor.php' || $current_file == 'add_sponsor.php' || $current_file == 'manage_club_sponsors.php') echo 'active pcoded-trigger complete'; ?>">
                <a href="javascript:void(0)">
                    <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i></span>
                    <span class="pcoded-mtext"  data-i18n="nav.basic-components.main"><?php echo $obj->__('tournaments',$_SESSION['default_lang']); ?></span>
                    <span class="pcoded-mcaret"></span>
                </a>
                <ul class="pcoded-submenu">
                    <li class="<?php if($current_file == 'manage_tournaments.php') echo 'active'; ?>">
                        <a href="manage_tournaments.php">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext" data-i18n="nav.basic-components.alert" style="font-weight: 400;" ><?php echo $obj->__('all_tournaments',$_SESSION['default_lang']); ?></span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                <li class="pcoded-hasmenu">
                    <a href="javascript:void(0)">
                    <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i></span>
                    <span class="pcoded-mtext"  data-i18n="nav.basic-components.main"><?php echo $obj->__('sponsors',$_SESSION['default_lang']); ?></span>
                    <span class="pcoded-mcaret"></span>
                    </a>
                    <ul class="pcoded-submenu">
                    <li class="<?php if($current_file == 'manage_club_sponsors.php') echo 'active'; ?>">
                        <a href="manage_club_sponsors.php">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext" data-i18n="nav.basic-components.alert" style="font-weight: 400;" ><?php echo $obj->__('club_sponsors',$_SESSION['default_lang']); ?></span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                <li class="<?php if($current_file == 'admin_sponsors.php' || $current_file == 'edit_sponsor.php') echo 'active'; ?>">
                    <a href="admin_sponsors.php">
                        <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                        <span class="pcoded-mtext" data-i18n="nav.basic-components.breadcrumbs" style="font-weight: 400;" ><?php echo $obj->__('cllllb_sponsors',$_SESSION['default_lang']); ?></span>
                        <span class="pcoded-mcaret"></span>
                    </a>
                </li>


                </ul>
                </li>
                </ul>
            </li>

            <li class="pcoded-hasmenu <?php if($current_file == 'add_order.php' || $current_file == 'manage_order.php') echo 'active pcoded-trigger complete'; ?>">
                <a href="javascript:void(0)">
                    <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i></span>
                    <span class="pcoded-mtext"  data-i18n="nav.basic-components.main"><?php echo $obj->__('orders',$_SESSION['default_lang']); ?></span>
                    <span class="pcoded-mcaret"></span>
                </a>

                <ul class="pcoded-submenu">
                    <li class="<?php if($current_file == 'add_order.php') echo 'active'; ?>">
                        <a href="add_order.php">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext" data-i18n="nav.basic-components.alert" style="font-weight: 400;"><?php echo $obj->__('add_order',$_SESSION['default_lang']); ?></span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    


                </ul>


                <ul class="pcoded-submenu">
                    <li class="<?php if($current_file == 'manage_order.php') echo 'active'; ?>">
                        <a href="manage_order.php">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext" data-i18n="nav.basic-components.alert" style="font-weight: 400;"><?php echo $obj->__('manage_order',$_SESSION['default_lang']); ?></span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    


                </ul>
            </li>

            <li class="pcoded-hasmenu <?php if($current_file == 'add_subscription.php' || $current_file == 'manage_subscriptions.php' || $current_file == 'edit_subscription.php') echo 'active pcoded-trigger complete'; ?>">
                <a href="javascript:void(0)">
                    <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i></span>
                    <span class="pcoded-mtext"  data-i18n="nav.basic-components.main"><?php echo $obj->__('subscriptions',$_SESSION['default_lang']); ?></span>
                    <span class="pcoded-mcaret"></span>
                </a>
                <ul class="pcoded-submenu">
                    <li class="<?php if($current_file == 'add_subscription.php') echo 'active'; ?>">
                        <a href="add_subscription.php">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext" data-i18n="nav.basic-components.alert" style="font-weight: 400;" ><?php echo $obj->__('new_subscription',$_SESSION['default_lang']); ?></span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li class="<?php if($current_file == 'manage_subscriptions.php') echo 'active'; ?>">
                        <a href="manage_subscriptions.php">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext" data-i18n="nav.basic-components.breadcrumbs" style="font-weight: 400;" ><?php echo $obj->__('manage_subscriptions',$_SESSION['default_lang']); ?></span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>


                </ul>
            </li>
            

            <li class="pcoded-hasmenu <?php if($current_file == 'add_coupon.php' || $current_file == 'edit_coupon.php' || $current_file == 'manage_coupon.php') echo 'active pcoded-trigger complete'; ?>">
                <a href="javascript:void(0)">
                    <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i></span>
                    <span class="pcoded-mtext"  data-i18n="nav.basic-components.main"><?php echo $obj->__('special_offers',$_SESSION['default_lang']); ?></span>
                    <span class="pcoded-mcaret"></span>
                </a>
                <ul class="pcoded-submenu">
                    <li class="<?php if($current_file == 'add_coupon.php') echo 'active'; ?>">
                        <a href="add_coupon.php">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext" data-i18n="nav.basic-components.alert" style="font-weight: 400;" ><?php echo $obj->__('add_special_offer',$_SESSION['default_lang']); ?></span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li class="<?php if($current_file == 'manage_coupon.php') echo 'active'; ?>">
                        <a href="manage_coupon.php">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext" data-i18n="nav.basic-components.breadcrumbs" style="font-weight: 400;" ><?php echo $obj->__('manage_special_offers',$_SESSION['default_lang']); ?></span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>


                </ul>
            </li>
            <li class="pcoded-hasmenu  <?php if($current_file == 'manage_jobs.php' || $current_file == 'add_job.php' || $current_file == 'edit_job.php') echo 'active pcoded-trigger complete'; ?>">
                <a href="javascript:void(0)">
                    <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i></span>
                    <span class="pcoded-mtext"  data-i18n="nav.basic-components.main"><?php echo $obj->__('jobs',$_SESSION['default_lang']); ?></span>
                    <span class="pcoded-mcaret"></span>
                </a>
                <ul class="pcoded-submenu">
                    <li class="<?php if($current_file == 'add_job.php') echo 'active'; ?>">
                        <a href="add_job.php">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext" data-i18n="nav.basic-components.alert" style="font-weight: 400;" ><?php echo $obj->__('add_job',$_SESSION['default_lang']); ?></span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li class="<?php if($current_file == 'manage_jobs.php') echo 'active'; ?>">
                        <a href="manage_jobs.php">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext" data-i18n="nav.basic-components.breadcrumbs" style="font-weight: 400;" ><?php echo $obj->__('manage_jobs',$_SESSION['default_lang']); ?></span>
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
                    <span class="pcoded-mtext"  data-i18n="nav.basic-components.main"><?php echo $obj->__('users',$_SESSION['default_lang']); ?></span>
                    <span class="pcoded-mcaret"></span>
                </a>

                <ul class="pcoded-submenu">
                    <li class="<?php if($current_file == 'add_admin_user.php') echo 'active'; ?>">
                        <a href="add_admin_user.php">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext" data-i18n="nav.basic-components.alert" style="font-weight: 400;" ><?php echo $obj->__('add_user',$_SESSION['default_lang']); ?></span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    

                </ul>

                <ul class="pcoded-submenu">
                    <li class="<?php if($current_file == 'manage_user.php') echo 'active'; ?>">
                        <a href="manage_user.php">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext" data-i18n="nav.basic-components.alert" style="font-weight: 400;" ><?php echo $obj->__('manage_users',$_SESSION['default_lang']); ?></span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    

                </ul>
            </li>

            <?php }?>

            <li class="pcoded-hasmenu <?php if($current_file == 'customer_feedback.php') echo 'active pcoded-trigger complete'; ?>">
                <a href="javascript:void(0)">
                    <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i></span>
                    <span class="pcoded-mtext"  data-i18n="nav.basic-components.main"><?php echo $obj->__('reviews',$_SESSION['default_lang']); ?></span>
                    <span class="pcoded-mcaret"></span>
                </a>
                <ul class="pcoded-submenu">
                    <li class="<?php if($current_file == 'customer_feedback.php') echo 'active'; ?>">
                        <a href="customer_feedback.php">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext" data-i18n="nav.basic-components.alert" style="font-weight: 400;" ><?php echo $obj->__('customer_reviews',$_SESSION['default_lang']); ?></span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    

                </ul>
            </li>

            <li class="pcoded-hasmenu <?php if($current_file == 'add_links.php' || $current_file == 'add_logo.php' ||$current_file =='edit_logo.php') echo 'active pcoded-trigger complete'; ?>">
                <a href="javascript:void(0)">
                    <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i></span>
                    <span class="pcoded-mtext"  data-i18n="nav.basic-components.main"><?php echo $obj->__('customizations',$_SESSION['default_lang']); ?></span>
                    <span class="pcoded-mcaret"></span>
                </a>
                <ul class="pcoded-submenu">
                    <li class="<?php if($current_file == 'add_links.php') echo 'active'; ?>">
                        <a href="add_links.php">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext" data-i18n="nav.basic-components.alert" style="font-weight: 400;"><?php echo $obj->__('social_media',$_SESSION['default_lang']); ?></span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li class="<?php if($current_file == 'add_logo.php') echo 'active'; ?>">
                        <a href="add_logo.php">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext" data-i18n="nav.basic-components.breadcrumbs" style="font-weight: 400;"><?php echo $obj->__('change_logo',$_SESSION['default_lang']); ?></span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                   
                </ul>
            </li>
            <li class="pcoded-hasmenu <?php if($current_file == 'language_translations.php' || $current_file == 'add_translation.php') echo 'active pcoded-trigger complete'; ?>">
                <a href="javascript:void(0)">
                    <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i></span>
                    <span class="pcoded-mtext"  data-i18n="nav.basic-components.main"><?php echo $obj->__('languages',$_SESSION['default_lang']); ?></span>
                    <span class="pcoded-mcaret"></span>
                </a>
                <ul class="pcoded-submenu">
                    <li class="<?php if($current_file == 'add_translation.php') echo 'active'; ?>">
                        <a href="add_translation.php">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext" data-i18n="nav.basic-components.alert" style="font-weight: 400;"><?php echo $obj->__('add_language_translation',$_SESSION['default_lang']); ?></span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li class="<?php if($current_file == 'language_translations.php') echo 'active'; ?>">
                        <a href="language_translations.php">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext" data-i18n="nav.basic-components.breadcrumbs" style="font-weight: 400;"><?php echo $obj->__('manage_language_translations',$_SESSION['default_lang']); ?></span>
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

            <li class="pcoded-hasmenu <?php if($current_file == 'report.php') echo 'active pcoded-trigger complete'; ?>">
                <a href="javascript:void(0)">
                    <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i></span>
                    <span class="pcoded-mtext"  data-i18n="nav.basic-components.main"><?php echo $obj->__('report',$_SESSION['default_lang']); ?></span>
                    <span class="pcoded-mcaret"></span>
                </a>
                <ul class="pcoded-submenu">
                    <li class="<?php if($current_file == 'report.php') echo 'active'; ?>">
                        <a href="report.php">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext" data-i18n="nav.basic-components.alert" style="font-weight: 400;" ><?php echo $obj->__('bookings',$_SESSION['default_lang']); ?></span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li class="<?php if($current_file == 'report.php') echo 'active'; ?>">
                        <a href="report.php">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext" data-i18n="nav.basic-components.alert" style="font-weight: 400;" ><?php echo $obj->__('orders',$_SESSION['default_lang']); ?></span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li class="<?php if($current_file == 'report.php') echo 'active'; ?>">
                        <a href="report.php">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext" data-i18n="nav.basic-components.alert" style="font-weight: 400;" ><?php echo $obj->__('clubs',$_SESSION['default_lang']); ?></span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li class="<?php if($current_file == 'report.php') echo 'active'; ?>">
                        <a href="report.php">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext" data-i18n="nav.basic-components.alert" style="font-weight: 400;" ><?php echo $obj->__('tournaments',$_SESSION['default_lang']); ?></span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li class="<?php if($current_file == 'report.php') echo 'active'; ?>">
                        <a href="report.php">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext" data-i18n="nav.basic-components.alert" style="font-weight: 400;" ><?php echo $obj->__('members',$_SESSION['default_lang']); ?></span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li class="<?php if($current_file == 'report.php') echo 'active'; ?>">
                        <a href="report.php">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext" data-i18n="nav.basic-components.alert" style="font-weight: 400;" ><?php echo $obj->__('points',$_SESSION['default_lang']); ?></span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>

                </ul>
            </li>
        </ul>
    </div>
</nav>