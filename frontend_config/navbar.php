<?php 
    $script_name = $_SERVER["SCRIPT_NAME"];
    $break = explode('/', $script_name);
    $pfile = $break[count($break) - 1];
    if($pfile == 'index.php'){
      $index_link = '';
      $about_us_link = 'frontend_config/aboutus.php';
      $services_link = 'frontend_config/services.php';
      $clubs_link = 'frontend_config/services.php';
      $our_news_link = 'frontend_config/our_news.php';
      $contact_us_link = 'frontend_config/contact_us.php';
      $club_lgn_snp_link = 'club';
      $admin_lgn_link = 'admin';
      $cllllb_logo = 'frontend_config/images/cllllb7.png';
    }else{
      $index_link = '../';
      $about_us_link = 'aboutus.php';
      $services_link = 'services.php';
      $clubs_link = 'clubs.php';
      $our_news_link = 'our_news.php';
      $contact_us_link = 'contact_us.php';
      $club_lgn_snp_link = '../club';
      $admin_lgn_link = '../admin';
      $cllllb_logo = 'images/cllllb7.png';
    }
    $home_active = $aboutus_active = $services_active = $clubs_active = $our_news_active = $contact_us_active = '';
    if($pfile == 'index.php'){
      $home_active = 'active';
    }elseif($pfile == 'aboutus.php'){
      $aboutus_active = 'active';
    }elseif($pfile == 'services.php'){
      $services_active = 'active';
    }elseif($pfile == 'clubs.php'){
      $clubs_active = 'active';
    }elseif($pfile == 'our_news.php'){
      $our_news_active = 'active';
    }elseif($pfile == 'contact_us.php'){
      $contact_us_active = 'active';
    }
       echo '<div id="mySidenav" class="sw_sidenav">
       <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
       <a class="sw_sidenav_links '.$home_active.'" aria-current="page" href="'.$index_link.'">HOME</a>
       <a class="sw_sidenav_links '.$services_active.'" href="'.$services_link.'">SERVICES</a>
       <a class="sw_sidenav_links '.$clubs_active.'" href="'.$clubs_link.'">CLUBS</a>
       <a class="sw_sidenav_links '.$our_news_active.'" href="'.$our_news_link.'">OUR NEWS</a>
       <a class="sw_sidenav_links '.$contact_us_active.'" href="'.$contact_us_link.'">CONTACT US</a>
       <a class="sw_sidenav_links '.$aboutus_active.'" href="'.$about_us_link.'">ABOUT US</a>
       <a class="sw_sidenav_links" href="'.$club_lgn_snp_link.'">LOGIN/SIGNUP</a>
       <a class="sw_sidenav_links" href="'.$admin_lgn_link.'">ADMIN</a>
     </div>';
?>
<nav id="navbar">
  <div class="sw_nav_separation">
    <div id="menu" style="font-size: 18px;cursor:pointer" onclick="openNav()">&#9776; MENU</div>
    <div id="logo"><img src="<?php echo $cllllb_logo; ?>" alt=""></div>
    <div id="search"></div>
  </div> 
  <div class="sw_nav_divider">
  </div>
</nav> 

<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "360px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}
</script>
<style>
  .sw_sidenav_links{
    font-family: "RivieraNights", Sans-serif;
    font-size: 19px;
    font-weight: 500;
    text-transform: uppercase;
    letter-spacing: 1px;
  }
  .elemenator_heading{
    color: #F4941C;
    font-size: 30px;
    font-weight: 500;
  }
  .size_default_elemenator_heading{
    color: #F4941C;
    font-family: "RivieraNights", Sans-serif;
    font-size: 22px;
    font-weight: 600;
  }
  .text-sw{
    color: #f4941d;
  }
  .btn-sw{
    background-color: #f4941d;
  }
  .btn-sw:hover{
    background-color: #d17605;
  }
  #navbar{
    z-index: 2;
    position: absolute;
    width: 100%;
    height: 400px;
    background-color: #08080880;
  }
  .sw_main_heading{
    z-index: 3;
  }
  .sw_nav_separation{
    width: 80%;
    margin: auto;
    display: grid;
    margin-top: 20px;
    grid-template-columns: 1fr 1fr 1fr;
  }
  .sw_nav_divider{
    width: 80%;
    margin: auto;
    padding-top: .5px;
    padding-bottom: .5px;
    margin-top: 20px;
    background-color: #f8f9fa;
  }
  #menu{
    color: #f8f9fa;
    display: flex;
    align-items: center;
  }
  #logo{
    display: flex;
    justify-content: center;
    align-items: center;
  }
  .sw_sidenav {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 4;
  top: 0;
  left: 0;
  background-color: #02020238;
  backdrop-filter: blur(35px)!important;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sw_sidenav a {
  padding: 0px 0px 0px 32px;
  text-decoration: none;
  /* font-size: 25px; */
  color: #E1E1E1;
  display: block;
  transition: 0.3s;
}
.sw_sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

@media screen and (max-height: 450px) {
  .sw_sidenav {padding-top: 15px;}
  .sw_sidenav a {font-size: 18px;}
}
body{
  font-family: "Cabin", Sans-serif;
  color: #4a4a4a;
  overflow-wrap: break-word;
  font-size: 14px;
  line-height: 1.8;
  color: #4a4a4a;
  overflow-wrap: break-word;
  word-wrap: break-word;
}
</style>  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>