<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cllllb | About Us</title>
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
        <h1 class="text-light">About Us</h1>
    </div>
    <div class="separator"></div>
    <div class="container my-2">
        <div class="row mx-auto">
            <div class="col-sm-6 px-5">
                <h1 class="text-warning">About Cllllb :</h1>
                <p>An electronic program specialized in the sports field that helps private facilities Managing the buying and selling services and communicating with their
                    customers through the Clubs . program In an advanced way by giving shopping points and savings offers – This program has many features and services that help the sports client to communicate electronically with own club, to get its
                    services in the least possible time and effort and with great benefit in terms of savings and offers the value, which all concerned parties will benefit from this smart system, As the program links all concerned parties electronically in one place that serves all parties and makes it easy for them Dealing and access to all services available through the smart application</p>
                <h1 class="text-warning">The Strategy :</h1>
                <h4 class="text-warning">- Vision :</h4>
                <p>Cllllb to be the first in the world in the field of electronic sports dealing</p>
                <h4 class="text-warning">- The Message :</h4>
                <p>To provide a fun, fair, stimulating and innovative environment in the sports field</p>
                <h4 class="text-warning">- Value :</h4>
                <ul>
                    <li>Justice and equality in booking roles</li>
                    <li>honest competition</li>
                    <li>Innovation and renewal</li>
                    <li>loyalty</li>
                    <li>Preserving and documenting sports memories</li>
                </ul>
                <h1 class="text-warning">The Goals of The Company :</h1>
                <ul>
                    <li>Providing an easy, simple and stimulating electronic environment for players</li>
                    <li>Building an environment for the challenge and competition between players.</li>
                    <li>Attracting all sports parties in one place.</li>
                    <li>To provide players with a system that preserves their rights and helps them to continue in practice and creativity to reach the world in practice and creativity to reach the world</li>
                    <li>Store all the happy moments experienced by the player and save them in spaces safe to return to at any time</li>
                    <li>Attracting major companies, sponsors and investors to support the sports field in all its stages</li>
                    <li>Providing sports subscriptions and offers for members</li>
                </ul>
                <h1 class="text-warning">Social Responsibilities :</h1>
                <ul>
                    <li>That the innovative Cllllb system be a system that helps to attract athletes, hobbyists, professionals and new people to reach out and make their lives healthier</li>
                    <li>Cllllb to be supportive of the sports field with its various activities, through Organizing annual local and international tournaments to encourage players to continue to develop their skills and highlight them on the sports scene</li>
                </ul>
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