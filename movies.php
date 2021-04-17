<?php
session_start();
error_reporting(0);
require_once('class/database.php');
class movies extends database
{
    //This movieFunction will show all the movies list from the database
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

    img {
        width: 100%;
    }
    </style>


</head>

<body>
    <?php include('layout/navbar.php'); ?>




    <div class="p-5">
        <?php if (isset($_SESSION['admin'])) { ?>
        <h3 class="text-center font-weight-bold pb-4">View Movie Responses:</h3>
        <?php } else { ?>
        <h3 class="text-center font-weight-bold pb-4">Review a Movie:</h3>
        <?php } ?>

        <div class="bg-white shadow pb-3 container">

            <div class="row">
                <?php while ($row = mysqli_fetch_assoc($objMovie)) { ?>
                <div class="col-4 mt-3">
                    <?php if (isset($_SESSION['admin'])) { ?>
                    <a href="details.php?id=<?php echo $row['movie_id']; ?>">
                        <?php } else { ?>
                        <a href="question.php?id=<?php echo $row['movie_id']; ?>">
                            <?php } ?>

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