<?php
session_start();
error_reporting(0);
require_once('class/database.php');
if (isset($_SESSION['admin'])) {
} else {
    header('location:login.php');
}
class details extends database
{
    public function detailsFunction()
    {
        $id = $_GET['id'];
        # code...
    }
}


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

    <input type="hidden" name="id" id="movie" value="<?php echo $_GET['id']; ?>">


    <div class="p-5">
        <div class="container">

            <h1>Details</h1>
            <div id="output"></div>
        </div>
    </div>




    <?php include('layout/footer.php'); ?>

    <?php include('layout/script.php') ?>
    <script>
    $(document).ready(function() {
        let id = $('#movie').val();

        var urls = ['./quesOne.php', './quesTwo.php', './quesThree.php', './quesFour.php', './quesFive.php',
            './quesSix.php', './quesSeven.php'
        ];

        $.each(urls, function(i, u) {
            $.ajax(u, {
                type: "POST",
                data: {
                    movie: id
                },
                success: function(response) {
                    console.log(response);
                    // $('#output').fadeIn().append(response);
                }
            });
        });
    })
    </script>


</body>

</html>