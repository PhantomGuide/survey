<?php
session_start();
error_reporting(0);

include('class/database.php');
class signInUp extends database
{
    protected $link;

    public function signInFunction()
    {
        if (isset($_POST['signIn'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            //$sql variable will get the username and password from admin_tbl
            $sql = "select * from admin_tbl where username = '$username' ";
            $res = mysqli_query($this->link, $sql);
            if (mysqli_num_rows($res) > 0) {
                $row = mysqli_fetch_assoc($res);
                $pass = $row['password'];
                //password verify will check the hashed password from database and match with users password
                if (password_verify($password, $pass) == true) {
                    $_SESSION['admin'] = $username;
                    header('location:movies.php');
                    return $res;
                } else {
                    $msg = "Wrong password";
                    return $msg;
                }
            } else {
                $msg = "Invalid Information";
                return $msg;
            }
        }
        # code...
    }
}
$obj = new signInUp;
$objSignIn = $obj->signInFunction();


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




    <div class="p-5">
        <div class="container">

            <div class="row">
                <div class="col-md-6 offset-3 ">
                    <form action="" method="post" data-parsley-validate>

                        <div class="text-center">
                            <h4 class="font-weight-bold pt-5 pb-4">LOGIN</h4>

                            <?php if ($objSignIn) { ?>
                            <?php if (strcmp($objSignIn, 'Wrong password') == 0) { ?>
                            <div class="alert alert-danger alert-dismissible fade show">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <strong>Wrong Password!</strong>
                            </div>
                            <?php } ?>
                            <?php if (strcmp($objSignIn, 'Invalid Information') == 0) { ?>
                            <div class="alert alert-warning alert-dismissible fade show">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <strong>Wrong Information!</strong>
                            </div>
                            <?php } ?>

                            <?php } ?>
                        </div>
                        <input type="text" name="username" class="form-control p-4  border-0 bg-light"
                            placeholder="Enter Username" required>
                        <input type="password" class="form-control mt-4 p-4 border-0 bg-light" name="password"
                            placeholder="Enter Password" required>


                        <button type="submit" name="signIn"
                            class="btn btn-block log_btn font-weight-bold  btn-lg mt-4">LOGIN</button>



                    </form>
                </div>

                <!-- <form action="" method="post"> -->

                <!-- </form> -->
            </div>
        </div>
    </div>




    <?php include('layout/footer.php'); ?>

    <?php include('layout/script.php') ?>


</body>

</html>