<div>

    <div style="background-color: #FFCC00;" class="text-center">
        <a class="navbar-brand font-weight-bold text-center" style="font-family: 'Lato', sans-serif; color: #481639"
            href="index.php"><img src="images/logo - Copy1.jpg" alt=""></a>
    </div>


    <ul class="nav justify-content-center bg_color pt-2 pb-2">
        <li class="nav-item p-1">
            <a class="nav-link text-dark font-weight-bold" href="index.php">Home</a>
        </li>
        <li class="nav-item p-1">
            <a class="nav-link text-dark font-weight-bold" href="movies.php">
                <?php if (isset($_SESSION['admin'])) { ?>
                View Responses
                <?php } else { ?>
                Review Movies
                <?php } ?>
            </a>
        </li>
        <li class="nav-item p-1">
            <a class="nav-link text-dark font-weight-bold" href="about_us.php">About Us</a>
        </li>
        <li class="nav-item p-1">
            <a class="nav-link text-dark font-weight-bold" href="login.php">Admin</a>
        </li>
        <?php if (isset($_SESSION['admin'])) { ?>
        <li class="nav-item p-1">
            <a class="nav-link text-dark font-weight-bold" href="logout.php">Logout</a>
        </li>
        <?php } ?>
    </ul>
</div>