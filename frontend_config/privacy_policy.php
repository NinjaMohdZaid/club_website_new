<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cllllb | Privacy Policy</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
</head>

<body>
    <?php
    include("../class/adminback.php");
    $obj = new adminback();
    $_REQUEST['status'] = 'A';
    list($subscriptions, $search) = $obj->display_subscriptions($_REQUEST, 'en');
    ?>
    <?php
    require('navbar.php');
    ?>
    <div class="sw-banner-data d-flex justify-content-center align-items-center">
        <h1 class="text-light sw_main_heading">Privacy Policy</h1>
    </div>
    <div class="separator"></div>
    <div class="container my-2">
        <div class="row mx-auto">
            <div class="col-sm-6 px-5">
                <h2 class="elemenator_heading">Privacy Policy</h2>
                <p>INFORMATION GATHERED BY CLLLLB.COM. This is CLLLLB.COM’s (“CLLLLB.COM”) online privacy policy (“Policy”). This policy applies only to activities CLLLLB.COM engages in on its website and does not apply to CLLLLB.COM activities that are “offline” or unrelated to the website.
                </p>
                <p>CLLLLB.COM collects certain anonymous data regarding the usage of the website. This information does not personally identify users, by itself or in combination with other information, and is gathered to improve the performance of the website. The anonymous data collected by the CLLLLB.COM website can include information such as the type of browser you are using, and the length of the visit to the website. You may also be asked to provide personally identifiable information on the CLLLLB.COM website, which may include your name, address, telephone number and e-mail address. This information can be gathered when feedback or e-mails are sent to CLLLLB.COM, when you register for services, or make purchases via the website. In all such cases you have the option of providing us with personally identifiable information.</p>
                <ol>
                    <li>USE AND DISCLOSURE OF INFORMATION. Except as otherwise stated below, we do not sell, trade or rent your personally identifiable information collected on the site to others. The information collected by our site is used to process orders, to keep you informed about your order status, to notify you of products or special offers that may be of interest to you, and for statistical purposes for improving our site. We will disclose your Delivery information to third parties for order tracking purposes or process your check or money order, as appropriate, fill your order, improve the functionality of our site, perform statistical and data analyses deliver your order and deliver promotional emails to you from us. For example, we must release your mailing address information to the delivery service to deliver products that you ordered.</li>
                    <li>All credit/debit cards’ details and personally identifiable information will NOT be stored, sold, shared, rented or leased to any third parties</li>
                </ol>
                <p>COOKIES. Cookies are small bits of data cached in a user’s browser. CLLLLB.COM utilizes cookies to determine whether or not you have visited the home page in the past. However, no other user information is gathered.</p>
                <p>CLLLLB.COM may use non-personal “aggregated data” to enhance the operation of our website, or analyze interest in the areas of our website. Additionally, if you provide CLLLLB.COM with content for publishing or feedback, we may publish your user name or other identifying data with your permission.</p>
                <p>CLLLLB.COM may also disclose personally identifiable information in order to respond to a subpoena, court order or other such request. CLLLLB.COM may also provide such personally identifiable information in response to a law enforcement agencies request or as otherwise required by law. Your personally identifiable information may be provided to a party if CLLLLB.COM files for bankruptcy, or there is a transfer of the assets or ownership of CLLLLB.COM in connection with proposed or consummated corporate reorganizations, such as mergers or acquisitions.</p>
                <ol start="3">
                    <li>CLLLLB.COM takes appropriate steps to ensure data privacy and security including through various hardware and software methodologies. However, CLLLLB.COM cannot guarantee the security of any information that is disclosed online.</li>
                    <li>OTHER WEBSITES. CLLLLB.COM is not responsible for the privacy policies of websites to which it links. If you provide any information to such third parties different rules regarding the collection and use of your personal information may apply. We strongly suggest you review such third party’s privacy policies before providing any data to them. We are not responsible for the policies or practices of third parties. Please be aware that our sites may contain links to other sites on the Internet that are owned and operated by third parties. The information practices of those Web sites linked to our site is not covered by this Policy. These other sites may send their own cookies or clear GIFs to users, collect data or solicit personally identifiable information. We cannot control this collection of information. You should contact these entities directly if you have any questions about their use of the information that they collect.</li>
                </ol>
                <p>MINORS. CLLLLB.COM does not knowingly collect personal information from minors under the age of 18. Minors are not permitted to use the CLLLLB.COM website or services, and CLLLLB.COM requests that minors under the age of 18 not submit any personal information to the website. Since information regarding minors under the age of 18 is not collected, CLLLLB.COM does not knowingly distribute personal information regarding minors under the age of 18.</p>
                <p>CORRECTIONS AND UPDATES. If you wish to modify or update any information CLLLLB.COM has received, please contact info@cllllb.com.</p>
                <ol start="5">
                    <li>
                        MODIFICATIONS OF THE PRIVACY POLICY. CLLLLB.COM. The Website Policies and Terms & Conditions would be changed or updated occasionally to meet the requirements and standards. Therefore the Customers’ are encouraged to frequently visit these sections in order to be updated about the changes on the website. Modifications will be effective on the day they are posted”.
                    </li>
                </ol>
            </div>
        </div>
    </div>
    <?php
    require('footer.php');
    ?>
    <?php
        require('cookie.php');
    ?>
</body>

</html>
<style>
    .sw-banner-data {
        width: 100%;
        min-height: 400px;
        /*same as separator*/
        position: absolute;
    }

    .sw-banner-data::before {
        content: "";
        background-image: url('images/cllllb2.webp');
        background-position: center center;
        position: absolute;
        height: 100%;
        width: 100%;
        z-index: -1;
        opacity: 0.7;
    }

    .separator {
        min-height: 400px;
        /*same as separator*/
    }
</style>