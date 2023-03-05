<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cllllb | Services</title>
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
        <h1 class="text-light">Services</h1>
    </div>
    <div class="separator"></div>
    <div class="container my-2">
        <div class="row mx-auto">
            <div class="col-sm-6 px-5">
                <h1 class="text-warning">About the Application</h1>
                <p>Cllllb has designed a specialized electronic system for sports center of all kinds for the purpose of managing its sports products and services through a comprehensive, easy-to-use sports platform that their customers can access in one place.</p>

                <ul>
                    <li>What are the services provided by the system for sports centers?</li>
                    <li>Manage all bookings on sports</li>
                    <li>Manage the sale of all services and products provided to the sports center</li>
                    <li>Management and marketing of all tournaments organized by the sports center</li>
                    <li>Managing and monitoring financial accounts</li>
                    <li>Keeping all operations of the sports center and its activities </li>
                    <li>Dissemation of sports center news and activities </li>
                    <li>Provide an integrated system for managing incentive points</li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="my-5 px-5">
                <h2 class="text-warning text-center">CLLLLB MONTHLY SUBSCRIPTION PACKAGES</h2>
            </div>
            <div class="row">
                <?php if (!empty($subscriptions)) {
                    foreach ($subscriptions as $key => $subscription) {
                ?>
                    <div class="col-sm d-flex my-2" style="min-width: 27rem;max-width: 27rem;">
                        <div class="card card-body flex-fill">
                            <h4 class="text-center"><?php echo $subscription['subscription']; ?></h4>
                            <h1 class="text-warning text-center"><?php echo $subscription['price'] .' AED For '.$subscription['validity_months']; ?> Months</h1>
                            <p><?php echo $subscription['description']; ?></p>
                            <a href="../club/register_club.php" class="btn btn-warning">Subscribe Now</a>
                        </div>
                    </div>
                <?php 
                    }
                } else { ?>
                    <p class="text-center">No subscription Data Found We will update soon</p>
                <?php } ?>
            </div>
        </div>
    </div>
    <?php
        require('footer.php');
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