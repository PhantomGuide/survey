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
    <link rel="stylesheet" href="css/smart_wizard.min.css">
    <link rel="stylesheet" href="css/smart_wizard_arrows.min.css">
    <script src="https://use.fontawesome.com/b4564248e6.js"></script>
    <link rel="stylesheet" href="css/notifIt.min.css">



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
        font-family: 'Lato', sans-serif;
        background-color: #FBFBFB !important;
    }

    h6 {
        font-family: 'Lato', sans-serif;
    }

    img {
        width: 100%;
    }

    .frb-group {
        margin: 15px 0;
    }

    .frb~.frb {
        margin-top: 15px;
    }

    .frb input[type="radio"]:empty,
    .frb input[type="checkbox"]:empty {
        display: none;
    }

    .frb input[type="radio"]~label:before,
    .frb input[type="checkbox"]~label:before {
        font-family: FontAwesome;
        content: '\f096';
        position: absolute;
        top: 50%;
        margin-top: -15px;
        left: 15px;
        font-size: 22px;
    }

    .frb input[type="radio"]:checked~label:before,
    .frb input[type="checkbox"]:checked~label:before {
        content: '\f046';
    }

    .frb input[type="radio"]~label,
    .frb input[type="checkbox"]~label {
        position: relative;
        cursor: pointer;
        width: 100%;
        border: 1px solid #ccc;
        border-radius: 5px;
        background-color: #f2f2f2;
    }

    .frb input[type="radio"]~label:focus,
    .frb input[type="radio"]~label:hover,
    .frb input[type="checkbox"]~label:focus,
    .frb input[type="checkbox"]~label:hover {
        box-shadow: 0px 0px 3px #333;
    }

    .frb input[type="radio"]:checked~label,
    .frb input[type="checkbox"]:checked~label {
        color: #fafafa;
    }

    .frb input[type="radio"]:checked~label,
    .frb input[type="checkbox"]:checked~label {
        background-color: #f2f2f2;
    }

    .frb.frb-default input[type="radio"]:checked~label,
    .frb.frb-default input[type="checkbox"]:checked~label {
        color: #333;
    }

    .frb.frb-primary input[type="radio"]:checked~label,
    .frb.frb-primary input[type="checkbox"]:checked~label {
        background-color: #337ab7;
    }

    .frb.frb-success input[type="radio"]:checked~label,
    .frb.frb-success input[type="checkbox"]:checked~label {
        background-color: #5cb85c;
    }

    .frb.frb-info input[type="radio"]:checked~label,
    .frb.frb-info input[type="checkbox"]:checked~label {
        background-color: #5bc0de;
    }

    .frb.frb-warning input[type="radio"]:checked~label,
    .frb.frb-warning input[type="checkbox"]:checked~label {
        background-color: #f0ad4e;
    }

    .frb.frb-danger input[type="radio"]:checked~label,
    .frb.frb-danger input[type="checkbox"]:checked~label {
        background-color: #d9534f;
    }

    .frb input[type="radio"]:empty~label span,
    .frb input[type="checkbox"]:empty~label span {
        display: inline-block;
    }

    .frb input[type="radio"]:empty~label span.frb-title,
    .frb input[type="checkbox"]:empty~label span.frb-title {
        font-size: 16px;
        font-weight: 700;
        margin: 5px 5px 5px 50px;
    }

    .frb input[type="radio"]:empty~label span.frb-description,
    .frb input[type="checkbox"]:empty~label span.frb-description {
        font-weight: normal;
        font-style: italic;
        color: #999;
        margin: 5px 5px 5px 50px;
    }

    .frb input[type="radio"]:empty:checked~label span.frb-description,
    .frb input[type="checkbox"]:empty:checked~label span.frb-description {
        color: #fafafa;
    }

    .frb.frb-default input[type="radio"]:empty:checked~label span.frb-description,
    .frb.frb-default input[type="checkbox"]:empty:checked~label span.frb-description {
        color: #999;
    }



    .sw>.nav .nav-link {
        background-color: #F8F8F8;
        color: #999;
    }

    /* .sw-theme-arrows>.nav .nav-link {
        border-left: 30px solid #999;
    } */
    </style>


</head>

<body>
    <?php include('layout/navbar.php'); ?>




    <div class="p-5">
        <div class="bg-white shadow p-4 container">
            <div id="output"></div>
            <form action="" id="myForm">
                <div id="smartwizard">

                    <ul class="nav">
                        <li class="nav-item">
                            <a class="nav-link" href="#step-1">
                                <strong>Question 1</strong><br>Age range
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#step-2">
                                <strong>Question 2</strong> <br>Movie genre
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#step-3">
                                <strong>Question 3</strong> <br>Supporting cast
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="#step-4">
                                <strong>Question 4</strong> <br>Movie Ending
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="#step-5">
                                <strong>Question 5</strong> <br>Sequel
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="#step-6">
                                <strong>Question 6</strong> <br>Family or Friend
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="#step-7">
                                <strong>Question 7</strong> <br>Rating
                            </a>
                        </li>
                    </ul>

                    <div class="tab-content">

                        <div id="step-1" class="tab-pane" role="tabpanel" aria-labelledby="step-1">
                            <h4 class="font-weight-bold text-center mt-4">What age range do you fall into?</h4>
                            <select name="age" id="" class="form-control w-50 d-block bg-light mx-auto">
                                <option value="" selected disabled>Choose an option</option>
                                <option value="10-20">10-20</option>
                                <option value="20-30">20-30</option>
                                <option value="30-40">30-40</option>
                                <option value="40-50">40-50</option>
                                <option value="50-60">50-60</option>
                                <option value="60-70">60-70</option>
                                <option value="70+">70+</option>
                            </select>
                        </div>
                        <div id="step-2" class="tab-pane" role="tabpanel" aria-labelledby="step-2">
                            <h4 class="font-weight-bold text-center mt-4">What genre would you classify this movie?</h4>
                            <select name="genre" id="" class="form-control w-50 d-block bg-light mx-auto">
                                <option value="" selected disabled>Choose an option</option>
                                <option value="Action/Adventure">Action/Adventure</option>
                                <option value="Comedy">Comedy</option>
                                <option value="Sci-fi">Sci-fi</option>
                                <option value="Horror">Horror</option>
                                <option value="Crime">Crime</option>
                                <option value="Family">Family</option>
                                <option value="Drama">Drama</option>
                            </select>
                        </div>
                        <div id="step-3" class="tab-pane" role="tabpanel" aria-labelledby="step-3">
                            <h4 class="font-weight-bold text-center mt-4">Did you prefer the male or female supporting
                                cast? </h4>
                            <div class="frb-group w-25 mx-auto">


                                <div class="frb frb-success">
                                    <input type="radio" id="radio-button-2" name="gender" value="Male">
                                    <label for="radio-button-2">
                                        <span class="frb-title">Male</span>

                                    </label>
                                </div>
                                <div class="frb frb-success">
                                    <input type="radio" id="radio-button-3" name="gender" value="Female">
                                    <label for="radio-button-3">
                                        <span class="frb-title">Female</span>

                                    </label>
                                </div>
                                <div class="frb frb-success">
                                    <input type="radio" id="radio-button-4" name="gender" value="Equal">
                                    <label for="radio-button-4">
                                        <span class="frb-title">Equal</span>

                                    </label>
                                </div>

                            </div>

                        </div>
                        <div id="step-4" class="tab-pane" role="tabpanel" aria-labelledby="step-4">
                            <h4 class="font-weight-bold text-center mt-4">Did you think the ending of the movie was
                                fitting? </h4>
                            <div class="frb-group w-25 mx-auto">


                                <div class="frb frb-success">
                                    <input type="radio" id="radio-button-fit1" name="ending" value="Yes">
                                    <label for="radio-button-fit1">
                                        <span class="frb-title">Yes</span>

                                    </label>
                                </div>
                                <div class="frb frb-danger">
                                    <input type="radio" id="radio-button-fit2" name="ending" value="No">
                                    <label for="radio-button-fit2">
                                        <span class="frb-title">No</span>

                                    </label>
                                </div>


                            </div>
                        </div>
                        <div id="step-5" class="tab-pane" role="tabpanel" aria-labelledby="step-5">

                            <h4 class="font-weight-bold text-center mt-4">Would you like to see a sequel?</h4>
                            <div class="frb-group w-25 mx-auto">


                                <div class="frb frb-success">
                                    <input type="radio" id="radio-button-fit7" name="sequel" value="Yes">
                                    <label for="radio-button-fit7">
                                        <span class="frb-title">Yes</span>

                                    </label>
                                </div>
                                <div class="frb frb-danger">
                                    <input type="radio" id="radio-button-fit8" name="sequel" value="No">
                                    <label for="radio-button-fit8">
                                        <span class="frb-title">No</span>

                                    </label>
                                </div>
                            </div>


                        </div>
                        <div id="step-6" class="tab-pane" role="tabpanel" aria-labelledby="step-6">
                            <h4 class="font-weight-bold text-center mt-4">Would you recommend this movie to a family
                                member or friend?</h4>
                            <div class="frb-group w-25 mx-auto">


                                <div class="frb frb-success">
                                    <input type="radio" id="radio-button-fit5" name="fof" value="Yes">
                                    <label for="radio-button-fit5">
                                        <span class="frb-title">Yes</span>

                                    </label>
                                </div>
                                <div class="frb frb-danger">
                                    <input type="radio" id="radio-button-fit6" name="fof" value="No">
                                    <label for="radio-button-fit6">
                                        <span class="frb-title">No</span>

                                    </label>
                                </div>
                            </div>
                        </div>
                        <div id="step-7" class="tab-pane" role="tabpanel" aria-labelledby="step-7">
                            <h4 class="font-weight-bold text-center mt-4">What rating would you give this movie out of
                                10?</h4>
                            <!-- <button onclick="not1()">NotifIt! 1 (Default position, Success)</button> -->
                            <div id="basic" class="text-center" style="font-size: 40px;"></div>
                            <input type="hidden" id="rate" name="rating">
                            <!-- <select name="rating" id="" class="form-control w-50 d-block bg-light mx-auto">
                                <option value="" selected disabled>Choose an option</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                            </select> -->
                            <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
                            <div class="text-center">
                                <input type="submit"
                                    class="btn text-center mt-4 font-weight-bold mx-auto btn-lg btn-secondary">
                            </div>
                        </div>

                    </div>


                </div>
            </form>


        </div>
    </div>




    <?php include('layout/footer.php'); ?>

    <?php include('layout/script.php') ?>
    <script src="js/jquery.smartWizard.min.js"></script>
    <script src="js/jquery.star-rating-svg.js"></script>
    <script src="js/rating.js"></script>
    <script src="js/notifIt.min.js"></script>
    <script>
    function not1() {
        notif({
            msg: "<b>Thank you for sharing review </b>",
            type: "success",
            timeout: 5000,
            position: "center",
            bgcolor: "#4BB543"

        });
    }

    function not5() {
        notif({
            type: "error",
            msg: "<b>Fields can't be Empty </b>",
            timeout: 5000,

            position: "center",
            // width: 500,
            // height: 60,
            // autohide: false
        });
    }
    </script>

    <script type="text/javascript">
    $(document).ready(function() {


        $("#basic").rating({
            "stars": 10,

            "click": function(e) {
                console.log(e); // {stars: 3, event: E.Event}
                $('#rate').val(e.stars);
            }
        });




        // Toolbar extra buttons
        var btnFinish = $('<button></button>').text('Finish')
            .addClass('btn btn-info')
            .on('click', function() {
                alert('Finish Clicked');
            });
        var btnCancel = $('<button></button>').text('Reset')
            .addClass('btn btn-danger')
            .on('click', function() {
                $('#smartwizard').smartWizard("reset");
            });

        // Step show event
        $("#smartwizard").on("showStep", function(e, anchorObject, stepNumber, stepDirection, stepPosition) {
            $("#prev-btn").removeClass('disabled');
            $("#next-btn").removeClass('disabled');
            if (stepPosition === 'first') {
                $("#prev-btn").addClass('disabled');
            } else if (stepPosition === 'last') {
                $("#next-btn").addClass('disabled');
            } else {
                $("#prev-btn").removeClass('disabled');
                $("#next-btn").removeClass('disabled');
            }
        });

        // Smart Wizard
        $('#smartwizard').smartWizard({
            selected: 0,
            theme: 'arrows', // default, arrows, dots, progress
            // darkMode: true,
            transition: {
                animation: 'slide-horizontal', // Effect on navigation, none/fade/slide-horizontal/slide-vertical/slide-swing
            },
            toolbarSettings: {
                toolbarPosition: 'bottom', // both bottom
                toolbarExtraButtons: [],
                showNextButton: true, // show/hide a Next button
                showPreviousButton: true, // show/hide a Previous button
            },
            // anchor options
            anchorSettings: {
                anchorClickable: true, // Enable/Disable anchor navigation
                enableAllAnchors: true, // Activates all anchors clickable all times
                markDoneStep: true, // add done css
                markAllPreviousStepsAsDone: true, // When a step selected by url hash, all previous steps are marked done
                removeDoneStepOnNavigateBack: false, // While navigate back done step after active step will be cleared
                enableAnchorOnDoneStep: true // Enable/Disable the done steps navigation
            },
        });

        // External Button Events
        $("#reset-btn").on("click", function() {
            // Reset wizard
            $('#smartwizard').smartWizard("reset");
            return true;
        });

        $("#prev-btn").on("click", function() {
            // Navigate previous
            $('#smartwizard').smartWizard("prev");
            return true;
        });

        $("#next-btn").on("click", function() {
            // Navigate next
            $('#smartwizard').smartWizard("next");
            return true;
        });


        // Demo Button Events
        $("#got_to_step").on("change", function() {
            // Go to step
            var step_index = $(this).val() - 1;
            $('#smartwizard').smartWizard("goToStep", step_index);
            return true;
        });


        $("#dark_mode").on("click", function() {
            // Change dark mode
            var options = {
                darkMode: $(this).prop("checked")
            };

            $('#smartwizard').smartWizard("setOptions", options);
            return true;
        });

        $("#is_justified").on("click", function() {
            // Change Justify
            var options = {
                justified: $(this).prop("checked")
            };

            $('#smartwizard').smartWizard("setOptions", options);
            return true;
        });

        $("#animation").on("change", function() {
            // Change theme
            var options = {
                transition: {
                    animation: $(this).val()
                },
            };
            $('#smartwizard').smartWizard("setOptions", options);
            return true;
        });

        $("#theme_selector").on("change", function() {
            // Change theme
            var options = {
                theme: $(this).val()
            };
            $('#smartwizard').smartWizard("setOptions", options);
            return true;
        });

    });
    </script>



    <script>
    $(document).ready(function() {


        $('#myForm').submit(function(e) {
            e.preventDefault();
            let formData = new FormData(this);
            $.ajax({
                type: "POST",
                url: "show.php",
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    console.log(response);
                    // $('#output').fadeIn().html(response);
                    if (response === 'Added') {
                        not1();
                    } else {
                        not5();
                    }

                    // setTimeout(() => {
                    //     $('#output').fadeOut('slow');
                    // }, 2000);
                }
            });
        });


    })
    </script>

</body>

</html>