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
    }else{
      $index_link = '../';
      $about_us_link = 'aboutus.php';
      $services_link = 'services.php';
      $clubs_link = 'clubs.php';
      $our_news_link = 'our_news.php';
      $contact_us_link = 'contact_us.php';
      $club_lgn_snp_link = '../club';
      $admin_lgn_link = '../admin';
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
    echo '<nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="'.$index_link.'">Cllllb</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link '.$home_active.'" aria-current="page" href="'.$index_link.'">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link '.$services_active.'" href="'.$services_link.'">Services</a>
          </li>
          <li class="nav-item">
            <a class="nav-link '.$clubs_active.'" href="'.$clubs_link.'">Clubs</a>
          </li>
        <li class="nav-item">
            <a class="nav-link '.$our_news_active.'" href="'.$our_news_link.'">Our News</a>
        </li>
        <li class="nav-item">
            <a class="nav-link '.$contact_us_active.'" href="'.$contact_us_link.'">Contact Us</a>
        </li>
        <li class="nav-item">
            <a class="nav-link '.$aboutus_active.'" href="'.$about_us_link.'">About Us</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="'.$club_lgn_snp_link.'">Login/Signup</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="'.$admin_lgn_link.'">Admin</a>
        </li>
        </ul>
      </div>
    </div>
  </nav>';    
?>