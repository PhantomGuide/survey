<?php
session_start();
error_reporting(0);
require_once('class/database.php');
class movies extends database
{
    public function movieFunction()
    {
        $sql = "SELECT * from movies_tbl";
        $res = mysqli_query($this->link, $sql);
        if (mysqli_num_rows($res) > 0) {
            return $res;
        } else {
            return false;
        }
        # code...
    }
}
$obj = new movies;
$objMovie = $obj->movieFunction();



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

    img {
        width: 100%;
    }
    </style>


</head>

<body>
    <?php include('layout/navbar.php'); ?>




    <div class="p-5">
        <div class="bg-white shadow pb-3 container">

            <div class="row">
                <?php while ($row = mysqli_fetch_assoc($objMovie)) { ?>
                <div class="col-4 mt-3">
                    <a href="question.php?id=<?php echo $row['movie_id']; ?>">
                        <img src="images/<?php echo $row['movie_image']; ?>" alt="">
                    </a>

                </div>
                <?php } ?>
            </div>


        </div>
    </div>




    <?php include('layout/footer.php'); ?>

    <?php include('layout/script.php') ?>


</body>

</html>