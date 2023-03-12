<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cllllb | Clubs</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
</head>

<body>
    <?php
    include("../class/adminback.php");
    $obj = new adminback();
    $_REQUEST['status'] = 'A';
    list($clubs, $search) = $obj->display_clubs($_REQUEST, 'en');
    ?>
    <?php
    require('navbar.php');
    ?>
    <div class="sw-banner-data d-flex justify-content-center align-items-center">
        <h1 class="text-light sw_main_heading">Clubs</h1>
    </div>
    <div class="separator"></div>
    <div class="container my-2">
        <div class="row">
            <div class="my-5 px-5">
                <h2 class="elemenator_heading text-center">There is total <?php echo count($clubs); ?> clubs registered on Cllllb</h2>
            </div>
            <div class="row">
                <?php if (!empty($clubs)) {
                    foreach ($clubs as $key => $club) {
                ?>
                    <div class="col-sm d-flex my-2" style="min-width: 27rem;max-width: 27rem;">
                        <div class="card card-body flex-fill">
                            <img class="card-img-top" style="min-height: 15em" src="<?php echo '../assets/files/clubs/images/'.$club['club_id'].'/'.$club['image']; ?>" alt="<?php echo $club['club']; ?>" title="<?php echo $club['club']; ?>">
                            <h4 class="text-center"><?php echo $club['club']; ?></h4>
                            <p><?php echo $club['description']; ?></p>
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