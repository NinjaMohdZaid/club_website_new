<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cllllb | Our News</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
</head>

<body>
    <?php
    require('navbar.php');
    ?>
    <div class="sw-banner-data d-flex justify-content-center align-items-center">
        <h1 class="text-light">Our News</h1>
    </div>
    <div class="separator"></div>
    <div class="container my-2">
        <div class="row">
            <div class="my-5 px-5">
                <h2 class="text-warning text-center">Our News</h2>
            </div>
            <div class="row">
                <div class="col-sm d-flex my-2" style="min-width: 27rem;max-width: 27rem;">
                    <div class="card card-body flex-fill p-0">
                        <img class="card-img-top" src="../frontend_config/images/cllllb3.jpeg" alt="Card image" style="max-height:250px;width:100%">
                        <div class="card-img-overlay">
                            <h4 class="card-title text-light">Baseball</h4>
                            <p class="card-text text-light">Baseboll is a bat-and-ball sport played between two teams of nine players each, taking turns batting and fielding. The game is live when the umpire signals </p>
                        </div>
                    </div>
                </div>
                <div class="col-sm d-flex my-2" style="min-width: 27rem;max-width: 27rem;">
                    <div class="card card-body flex-fill p-0">
                        <img class="card-img-top" src="../frontend_config/images/cllllb4.jpeg" alt="Card image" style="max-height:250px;width:100%">
                        <div class="card-img-overlay">
                            <h4 class="card-title text-light">Hockey</h4>
                            <p class="card-text text-light">Read a brief summary of this topic. field hockey, also called hockeyIt is called field hockey to distinguish it from the similar game played on ice</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm d-flex my-2" style="min-width: 27rem;max-width: 27rem;">
                    <div class="card card-body flex-fill p-0">
                        <img class="card-img-top" src="../frontend_config/images/cllllb5.jpeg" alt="Card image" style="max-height:250px;width:100%">
                        <div class="card-img-overlay">
                            <h4 class="card-title text-light">Golf Club</h4>
                            <p class="card-text text-light">A pro would not play as well with lower quality off-shelf Golf Clubs, but the difference between cheap good quality clubs and more expensive branded clubs for an amateur is not significant.</p>
                        </div>
                    </div>
                </div>
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