
<?php 
$build_params = '';
$request_keys = array_keys($_GET); 
$request_values = array_values($_GET);
foreach ($request_keys as $key => $request_key) {
    $build_params .="$request_key=".$request_values[$key]."&";
}
list($notifications,) = $obj->display_notifications();

?>
<nav class="navbar header-navbar pcoded-header">
               <div class="navbar-wrapper">
                   <div class="navbar-logo">
                       <a class="mobile-menu" id="mobile-collapse" href="#!">
                           <i class="ti-menu"></i>
                       </a>
                       <div class="mobile-search">
                           <div class="header-search">
                               <div class="main-search morphsearch-search">
                                   <div class="input-group">
                                       <span class="input-group-addon search-close"><i class="ti-close"></i></span>
                                       <input type="text" class="form-control" placeholder="Enter Keyword">
                                       <span class="input-group-addon search-btn"><i class="ti-search"></i></span>
                                   </div>
                               </div>
                           </div>
                       </div>
                       <a href="index.php">

                       <?php 
                        $obj=new adminback();
                        $logo_info = $obj->display_logo();

                        $logo = mysqli_fetch_assoc($logo_info);

                       ?>
                           <img class="img-fluid" src="uploads/<?php echo $logo['img']; ?>" alt="Theme-Logo" /> 
                       </a>
                       <a class="mobile-options">
                           <i class="ti-more"></i>
                       </a>
                   </div>

                   <div class="navbar-container container-fluid">
                       <ul class="nav-left">
                           <li>
                               <div class="sidebar_toggle"><a href="javascript:void(0)"><i class="ti-menu"></i></a></div>
                           </li>
                           <li class="header-search">
                               <div class="main-search morphsearch-search">
                                   <div class="input-group">
                                       <span class="input-group-addon search-close"><i class="ti-close"></i></span>
                                       <input type="text" class="form-control">
                                       <span class="input-group-addon search-btn"><i class="ti-search"></i></span>
                                   </div>
                               </div>
                           </li>
                           <li>
                               <a href="#!" onclick="javascript:toggleFullScreen()">
                                   <i class="ti-fullscreen"></i>
                               </a>
                           </li>
                       </ul>
                       <ul class="nav-right">
                           <li class="header-notification">
                               <a href="#!">
                                   <i class="ti-bell"></i>
                                   <span class="badge bg-c-pink"></span>
                               </a>
                               <ul class="show-notification">
                                   <li>
                                       <h6>Notifications</h6>
                                       <label class="label label-danger">New</label>
                                   </li>
                                   
                                   <?php if(!empty($notifications)) {foreach ($notifications as $notification) {
                                    ?>
                                   <li>
                                       <div class="media">
                                           <?php echo $notification['notification_text'] ?>
                                       </div>
                                   </li>
                                  <?php }}else{ ?>
                                    <li>
                                    <div>No New Notifications</div>
                                    </li>
                                    <?php } ?>
                               </ul>
                           </li>
                           <li class="user-profile header-notification">
                               <a href="#!">
                                   <span> <?php if($_SESSION['default_lang'] == 'ar') echo 'عربي'; else echo 'English'; ?> </span>
                                   <i class="ti-angle-down"></i>
                               </a>
                               <ul class="show-notification profile-notification">
                                   <li>
                                       <a href="?set_default_language=ar&<?php echo $build_params ?>">
                                        (ar) عربي
                                       </a><br>
                                       <a href="?set_default_language=en&<?php echo $build_params ?>">
                                        (en) English
                                       </a>
                                   </li>
                               </ul>
                           </li>
                           <li class="user-profile header-notification">
                               <a href="#!">
                                   <i class="fa fa-user" aria-hidden="true"></i>
                                   <span> <?php echo $admin_email ?> </span>
                                   <i class="ti-angle-down"></i>
                               </a>
                               <ul class="show-notification profile-notification">
                                   <li>
                                       <a href="?adminLogout=logout">
                                       <i class="ti-layout-sidebar-left"></i> <?php echo $obj->__('logout',$_SESSION['default_lang']); ?>
                                   </a>
                                   </li>
                               </ul>
                           </li>
                       </ul>
                   </div>
               </div>
           </nav>
           <script>
            // cross_notification
            $( ".cross_notification" ).on( "click", function() {
                alert('clicked');
            });
           </script>