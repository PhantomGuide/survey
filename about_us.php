<?php
session_start();
error_reporting(0);

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

    h6,
    h3 {
        font-family: 'Lato', sans-serif;
    }
    </style>


</head>

<body>
    <?php include('layout/navbar.php'); ?>




    <div class="p-5">
        <div class="container">

            <h3 class="text-center font-weight-bold pb-4">About Us:</h3>
            <p class="text-justify font-weight-bold">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis quos
                voluptatibus
                eligendi fuga aliquam laudantium hic voluptas incidunt odio commodi ad, impedit aspernatur magni vitae
                ab inventore autem minus veniam nihil quae, id provident fugit labore quaerat. Nobis dolorum, ipsa saepe
                illum ea, quidem sint at, odit aut quasi quae dolor mollitia. Doloremque nostrum, nulla dignissimos
                itaque dicta minima aliquid exercitationem adipisci, culpa quidem, nesciunt odit debitis consequatur.
                Incidunt, distinctio molestiae atque voluptatum nemo quis debitis a consectetur corrupti consequatur
                adipisci rem, nam laborum provident? Sapiente ratione, accusantium iure dolore cupiditate omnis officia
                ullam! Doloribus est quisquam quis quasi placeat sit. Neque voluptatem iure itaque blanditiis minus
                officia voluptatibus fuga eum, maiores ad inventore odio quia, aperiam ipsam repellendus. Animi quo ipsa
                nulla mollitia porro perspiciatis enim modi, corporis pariatur doloremque error nihil iste
                necessitatibus hic exercitationem ea similique fuga sunt sequi? Quis eos excepturi nisi cupiditate cum
                temporibus facere earum inventore ab, nam molestiae autem, dolores, nobis eligendi commodi? Sint qui
                laboriosam, vitae ullam reiciendis perferendis voluptatibus corporis dolore unde culpa odio esse
                consectetur veritatis ab, aperiam commodi aspernatur, facilis repellat temporibus tenetur iure? Enim,
                asperiores soluta at voluptate, optio, iste placeat ut quae voluptates commodi dolorem ipsa distinctio.
            </p>

        </div>
    </div>




    <?php include('layout/footer.php'); ?>

    <?php include('layout/script.php') ?>


</body>

</html>