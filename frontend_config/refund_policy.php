<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cllllb | Refund Policy</title>
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
        <h1 class="text-light sw_main_heading">Refund Policy</h1>
    </div>
    <div class="separator"></div>
    <div class="container my-2">
        <div class="row mx-auto">
            <div class="col-sm-6 px-5">
                <h2 class="elemenator_heading">Refund Policy</h2>
                <p>Club has placed customer satisfaction at the top of its priority list<br>
In the event of any problem related to the request for services or goods, Club <br>
Company can be contacted through its available channels<br>
By e-mail or call center and we will help you<br>
And in cases where there is a problem and the dealer or customer proves eligibility<br>
Club is responsible for refunding the amount in whole or in part in the following cases:<br>
Unless your order has been delivered (you can request a full refund)</p>
                <p>- In the event that part of your order is lost, you can issue a partial refund request, knowing that we will make our full efforts.</p>
                <p>- Your financial rights will be recovered in your Club account electronically as your balance, unless you request a refund to the same original method of payment.</p>
                
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