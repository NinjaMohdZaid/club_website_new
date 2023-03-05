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
echo '<section class="section-no-border mb-3 bg-dark text-light">
    <footer class="page-footer font-small stylish-color-dark pt-4" style="padding-left: 0px;">

        <!-- Footer Links -->
        <div class="container text-center text-md-left">

            <!-- Grid row -->
            <div class="row">

                <!-- Grid column -->
                <div class="col-md-4 mx-auto">

                    <!-- Content -->
                    <h5 class="font-weight-bold text-uppercase mt-3 mb-4">About Us</h5>
                    <p>WORLD CLUB PORTAL L.L.C</p>
                    <p>An electronic program specialized in the sports field that helps private establishments.</p>


                </div>
                <!-- Grid column -->

                <hr class="clearfix w-100 d-md-none">

                <!-- Grid column -->
                <div class="col-md-2 mx-auto">

                    <!-- Links -->
                    <h5 class="font-weight-bold text-uppercase mt-3 mb-4">Quick Links</h5>

                    <ul class="list-unstyled">
                        <li>
                            <a class="text-warning" href="'.$services_link.'">Services</a>
                        </li>
                        <li>
                            <a class="text-warning" href="'.$clubs_link.'">Clubs</a>
                        </li>
                        <li>
                            <a class="text-warning" href="#!">Tournaments</a>
                        </li>
                        <li>
                            <a class="text-warning" href="#!">Sponsors</a>
                        </li>
                        <li>
                            <a class="text-warning" href="'.$about_us_link.'">About Us</a>
                        </li>
                        <li>
                            <a class="text-warning" href="'.$contact_us_link.'">Contact Us</a>
                        </li>
                    </ul>

                </div>
                <!-- Grid column -->

                <hr class="clearfix w-100 d-md-none">

                <!-- Grid column -->
                <div class="col-md-2 mx-auto">

                    <!-- Links -->
                    <h5 class="font-weight-bold text-uppercase mt-3 mb-4">Policies</h5>

                    <ul class="list-unstyled">
                        <li>
                            <a class="text-warning" href="#!">Privacy Policy</a>
                        </li>
                        <li>
                            <a class="text-warning" href="#!">Shipping Policy</a>
                        </li>
                        <li>
                            <a class="text-warning" href="#!">Return And Refund Policy</a>
                        </li>
                        <li>
                            <a class="text-warning" href="#!">Terms Of Use</a>
                        </li>
                    </ul>

                </div>
                <!-- Grid column -->

                <hr class="clearfix w-100 d-md-none">

                <!-- Grid column -->
                <div class="col-md-2 mx-auto">

                    <!-- Links -->
                    <h5 class="font-weight-bold text-uppercase mt-3 mb-4">Support</h5>

                    <ul class="list-unstyled">
                        <li>
                            <p><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt-fill text-warning" viewBox="0 0 16 16">
                                    <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z" />
                                </svg> Hamdan Center for Creativity and Innovation - Port Said - Diera - Office T86</p>
                        </li>
                        <li>
                            <p><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-fill text-warning" viewBox="0 0 16 16">
                                    <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555ZM0 4.697v7.104l5.803-3.558L0 4.697ZM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757Zm3.436-.586L16 11.801V4.697l-5.803 3.546Z" />
                                </svg> info@cllllb.com</p>
                        </li>
                    </ul>

                </div>
                <!-- Grid column -->

            </div>
            <!-- Grid row -->

        </div>
        <!-- Footer Links -->

        <hr>
        <!-- Copyright -->
        <div class="footer-copyright text-center py-3">©2023 Cllllb.All Rights Reserved.
        </div>
        <!-- Copyright -->

    </footer>
</section>';

?>