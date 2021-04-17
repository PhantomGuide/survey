<?php
session_start();
error_reporting(0);
//Date and time is set to London time
ini_set('date.timezone', 'Europe/London');


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include('layout/style.php'); ?>


    <style>
    .navbar-brand {
        width: 13%;
        display: inline-block;
        /* padding-top: .3125rem; */
        /* padding-bottom: .3125rem; */
        /* margin-right: 1rem; */
        font-size: 1.25rem;
        line-height: inherit;
        /* white-space: nowrap; */
    }

    .bg_color {
        background-color: #FFCC00 !important;
    }

    body {
        font-family: 'Raleway', sans-serif;
        background-color: #FBFBFB !important;
    }

    h6 {
        font-family: 'Lato', sans-serif;
    }
    </style>


</head>

<body>
    <?php include('layout/navbar.php'); ?>

    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="images/image1.jpg" alt="First slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="images/image2.jpg" alt="Second slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="images/image3.jpeg" alt="Third slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="images/image4.jpg" alt="Fourth slide">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>


    <div class="p-5">
        <div class="container">

            <h3 class="text-center font-weight-bold mt-5">Current Time & Date (UK)</h3>
            <div class="row">
                <div class="col-md-4 offset-4">
                    <div class="row text-center">
                        <div class="col-md-6">
                            <h5>Time: </h5>
                        </div>
                        <div class="col-md-6">
                            <h5>Date: </h5>
                        </div>
                    </div>
                    <div class="row text-center">
                        <div class="col-md-6">
                            <h6 class="font-weight-bold"><?php echo date("G:i", strtotime(date("g:i A")));
                                                            ?> (GMT)</h6>
                        </div>
                        <div class="col-md-6">
                            <h6 class="font-weight-bold"><?php echo date("jS \of F Y") ?></h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <?php include('layout/footer.php'); ?>

    <?php include('layout/script.php') ?>


</body>

</html>