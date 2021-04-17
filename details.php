<?php
session_start();
error_reporting(0);
require_once('class/database.php');
//This session variable will check if the user is admin then let will let him enter this place
if (isset($_SESSION['admin'])) {
} else {
    header('location:login.php');
}
//This session id variable will go all the quesOne.php, quesTwo.php pages and activate the functionality
$_SESSION['id'] = $_GET['id'];



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
                <div class="col-md-12 mt-4">
                    <h5 class="text-right font-weight-bold text-muted">Total response for this movie:
                        <span id="Q1"></span>
                    </h5>
                    <canvas id="myBar"></canvas>
                </div>

            </div>
            <div class="row">
                <div class="col-md-12 mt-5">
                    <canvas id="myChart"></canvas>

                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mt-5">
                    <canvas id="myChart1"></canvas>

                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mt-5">
                    <canvas id="myChart2"></canvas>

                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mt-5">
                    <canvas id="myChart3"></canvas>

                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mt-5">
                    <canvas id="myChart4"></canvas>

                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mt-5">
                    <canvas id="myChart5"></canvas>

                </div>
            </div>
        </div>
    </div>




    <?php include('layout/footer.php'); ?>

    <?php include('layout/script.php') ?>

    <script>
    $(document).ready(function() {

        $.ajax({
            type: "GET",
            url: "quesOne.php",
            dataType: 'json',
            success: function(data) {
                let type = [];
                let amount = [];
                let total = 0;
                console.log(data);
                $.each(data, function(i, item) {
                    total += parseInt(item.answer);
                });
                $('#Q1').html(total);

                $.each(data, function(i, item) {
                    console.log(item);
                    type.push(item.ques1);
                    amount.push(item.answer);
                });
                console.log(total);
                console.log(amount, type);
                var chartPie = {
                    labels: type,
                    datasets: [{
                        label: 'Age Range',
                        data: amount,
                        hoverBorderWidth: 10,

                        borderColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)',
                            'rgba(83, 92, 104, 0.2)',
                            'rgba(48, 51, 107, 0.2)',

                            'rgba(255, 159, 243, 0.2)'
                        ],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.8)',
                            'rgba(54, 162, 235, 0.8)',
                            'rgba(255, 206, 86, 0.8)',
                            'rgba(75, 192, 192, 0.8)',
                            'rgba(153, 102, 255, 0.8)',
                            'rgba(255, 159, 64, 0.8)',
                            'rgba(83, 92, 104, 0.8)',
                            'rgba(48, 51, 107, 0.8)',
                            'rgba(255, 159, 243, 0.8)'
                        ],
                        hoverBorderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)',
                            'rgba(83, 92, 104, 1)',
                            'rgba(48, 51, 107, 1)',

                            'rgba(255, 159, 243, 1)'
                        ],
                        hoverBackgroundColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)',
                            'rgba(83, 92, 104, 1)',
                            'rgba(48, 51, 107, 1)',

                            'rgba(255, 159, 243, 1)'
                        ],
                        borderWidth: 2,
                        hoverOffset: 4,
                        offset: 6

                    }]
                };

                var ctx = document.getElementById('myBar').getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: chartPie,
                    options: {
                        title: {
                            display: true,
                            text: 'Q1: What age range do you fall into?',
                            fontSize: 25
                        },
                        legend: {
                            display: false,
                            position: 'bottom',
                        },
                        animation: {
                            animateScale: true
                        },
                        tooltips: {
                            callbacks: {
                                label: function(tooltipItems, data) {
                                    return "Total People: " +

                                        data.datasets[tooltipItems.datasetIndex].data[
                                            tooltipItems.index];
                                }
                            }
                        },
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true,
                                    precision: 0
                                }
                            }]
                        },
                        plugins: {
                            datalabels: {
                                color: '#fff',
                                padding: 6,
                                anchor: 'end',
                                fillColor: '#000',
                                align: 'start',
                                offset: -10,
                                borderWidth: 2,
                                borderColor: '#fff',
                                borderRadius: 25,
                                backgroundColor: (context) => {
                                    return context.dataset.backgroundColor;
                                },
                                font: {
                                    weight: 'bold',

                                    size: '12'
                                },
                                formatter: (value) => {
                                    return value;
                                },

                            }
                        }




                    }
                });
            }
        });
        $.ajax({
            type: "GET",
            url: "quesTwo.php",
            dataType: 'json',
            success: function(data) {
                let type = [];
                let amount = [];
                let total = 0;
                console.log(data);

                $.each(data, function(i, item) {
                    total += parseInt(item.answer);
                });
                $.each(data, function(i, item) {
                    console.log(item);
                    type.push(item.ques2);
                    amount.push((parseInt(item.answer) / total * 100).toFixed(2));
                });
                console.log(total);
                console.log(amount, type);
                var chartPie = {
                    labels: type,
                    datasets: [{
                        label: 'Movie Genre',
                        data: amount,
                        hoverBorderWidth: 10,

                        borderColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)',
                            'rgba(83, 92, 104, 0.2)',
                            'rgba(48, 51, 107, 0.2)',

                            'rgba(255, 159, 243, 0.2)'
                        ],
                        backgroundColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)',
                            'rgba(83, 92, 104, 1)',
                            'rgba(48, 51, 107, 1)',
                            'rgba(255, 159, 243, 1)'
                        ],
                        hoverBorderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)',
                            'rgba(83, 92, 104, 1)',
                            'rgba(48, 51, 107, 1)',

                            'rgba(255, 159, 243, 1)'
                        ],
                        hoverBackgroundColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)',
                            'rgba(83, 92, 104, 1)',
                            'rgba(48, 51, 107, 1)',

                            'rgba(255, 159, 243, 1)'
                        ],
                        borderWidth: 2,
                        hoverOffset: 4,
                        offset: 6
                    }]
                };
                var ctx = document.getElementById('myChart').getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'pie',
                    data: chartPie,
                    options: {
                        title: {
                            display: true,
                            text: 'Q2: What genre would you classify this movie?',
                            fontSize: 25
                        },
                        legend: {
                            display: true,
                            position: 'bottom',
                        },
                        animation: {
                            animateScale: true
                        },
                        tooltips: {
                            callbacks: {
                                label: function(tooltipItems, data) {
                                    return data.labels[tooltipItems.index] +
                                        " : " +
                                        data.datasets[tooltipItems.datasetIndex].data[
                                            tooltipItems.index] +
                                        '%';
                                }
                            }
                        },
                        plugins: {
                            datalabels: {
                                color: '#fff',
                                padding: 6,
                                anchor: 'end',
                                fillColor: '#000',
                                align: 'start',
                                offset: -10,
                                borderWidth: 2,
                                borderColor: '#fff',
                                borderRadius: 25,
                                backgroundColor: (context) => {
                                    return context.dataset.backgroundColor;
                                },
                                font: {
                                    weight: 'bold',

                                    size: '12'
                                },
                                formatter: (value) => {
                                    return value + '%';
                                },

                            }
                        }

                    }
                });
            }
        });
        $.ajax({
            type: "GET",
            url: "quesThree.php",
            dataType: 'json',
            success: function(data) {
                let type = [];
                let amount = [];
                let total = 0;
                console.log(data);

                $.each(data, function(i, item) {
                    total += parseInt(item.answer);
                });
                $.each(data, function(i, item) {
                    console.log(item);
                    type.push(item.ques3);
                    amount.push((parseInt(item.answer) / total * 100).toFixed(2));
                });
                console.log(total);
                console.log(amount, type);
                var chartPie = {
                    labels: type,
                    datasets: [{
                        label: 'Movie Genre',
                        data: amount,
                        hoverBorderWidth: 10,

                        borderColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)',
                            'rgba(83, 92, 104, 0.2)',
                            'rgba(48, 51, 107, 0.2)',

                            'rgba(255, 159, 243, 0.2)'
                        ],
                        backgroundColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)',
                            'rgba(83, 92, 104, 1)',
                            'rgba(48, 51, 107, 1)',
                            'rgba(255, 159, 243, 1)'
                        ],
                        hoverBorderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)',
                            'rgba(83, 92, 104, 1)',
                            'rgba(48, 51, 107, 1)',

                            'rgba(255, 159, 243, 1)'
                        ],
                        hoverBackgroundColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)',
                            'rgba(83, 92, 104, 1)',
                            'rgba(48, 51, 107, 1)',

                            'rgba(255, 159, 243, 1)'
                        ],
                        borderWidth: 2,
                        hoverOffset: 4,
                        offset: 6
                    }]
                };
                var ctx = document.getElementById('myChart1').getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'pie',
                    data: chartPie,
                    options: {
                        title: {
                            display: true,
                            text: 'Q3: Did you prefer the male or female supporting cast?',
                            fontSize: 25
                        },
                        legend: {
                            display: true,
                            position: 'bottom',
                        },
                        animation: {
                            animateScale: true
                        },
                        tooltips: {
                            callbacks: {
                                label: function(tooltipItems, data) {
                                    return data.labels[tooltipItems.index] +
                                        " : " +
                                        data.datasets[tooltipItems.datasetIndex].data[
                                            tooltipItems.index] +
                                        '%';
                                }
                            }
                        },
                        plugins: {
                            datalabels: {
                                color: '#fff',
                                padding: 6,
                                anchor: 'end',
                                fillColor: '#000',
                                align: 'start',
                                offset: -10,
                                borderWidth: 2,
                                borderColor: '#fff',
                                borderRadius: 25,
                                backgroundColor: (context) => {
                                    return context.dataset.backgroundColor;
                                },
                                font: {
                                    weight: 'bold',

                                    size: '12'
                                },
                                formatter: (value) => {
                                    return value + '%';
                                },

                            }
                        }

                    }
                });
            }
        });
        $.ajax({
            type: "GET",
            url: "quesFour.php",
            dataType: 'json',
            success: function(data) {
                let type = [];
                let amount = [];
                let total = 0;
                console.log(data);
                $.each(data, function(i, item) {
                    total += parseInt(item.answer);
                });

                $.each(data, function(i, item) {
                    console.log(item);
                    type.push(item.ques4);
                    amount.push(item.answer);
                });
                console.log(total);
                console.log(amount, type);
                var chartPie = {
                    labels: type,
                    datasets: [{
                        label: 'Age Range',
                        data: amount,
                        hoverBorderWidth: 10,

                        borderColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)',
                            'rgba(83, 92, 104, 0.2)',
                            'rgba(48, 51, 107, 0.2)',

                            'rgba(255, 159, 243, 0.2)'
                        ],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.8)',
                            'rgba(54, 162, 235, 0.8)',
                            'rgba(255, 206, 86, 0.8)',
                            'rgba(75, 192, 192, 0.8)',
                            'rgba(153, 102, 255, 0.8)',
                            'rgba(255, 159, 64, 0.8)',
                            'rgba(83, 92, 104, 0.8)',
                            'rgba(48, 51, 107, 0.8)',
                            'rgba(255, 159, 243, 0.8)'
                        ],
                        hoverBorderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)',
                            'rgba(83, 92, 104, 1)',
                            'rgba(48, 51, 107, 1)',

                            'rgba(255, 159, 243, 1)'
                        ],
                        hoverBackgroundColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)',
                            'rgba(83, 92, 104, 1)',
                            'rgba(48, 51, 107, 1)',

                            'rgba(255, 159, 243, 1)'
                        ],
                        borderWidth: 2,
                        hoverOffset: 4,
                        offset: 6

                    }]
                };

                var ctx = document.getElementById('myChart2').getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: chartPie,
                    options: {
                        title: {
                            display: true,
                            text: 'Q4: Did you think the ending of the movie was fitting?',
                            fontSize: 25
                        },
                        legend: {
                            display: false,
                            position: 'bottom',
                        },
                        animation: {
                            animateScale: true
                        },
                        tooltips: {
                            callbacks: {
                                label: function(tooltipItems, data) {
                                    return "Total People: " +

                                        data.datasets[tooltipItems.datasetIndex].data[
                                            tooltipItems.index];
                                }
                            }
                        },
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true,
                                    precision: 0
                                }
                            }]
                        },
                        plugins: {
                            datalabels: {
                                color: '#fff',
                                padding: 6,
                                anchor: 'end',
                                fillColor: '#000',
                                align: 'start',
                                offset: -10,
                                borderWidth: 2,
                                borderColor: '#fff',
                                borderRadius: 25,
                                backgroundColor: (context) => {
                                    return context.dataset.backgroundColor;
                                },
                                font: {
                                    weight: 'bold',

                                    size: '12'
                                },
                                formatter: (value) => {
                                    return value;
                                },

                            }
                        }




                    }
                });
            }
        });
        $.ajax({
            type: "GET",
            url: "quesFive.php",
            dataType: 'json',
            success: function(data) {
                let type = [];
                let amount = [];
                let total = 0;
                console.log(data);
                $.each(data, function(i, item) {
                    total += parseInt(item.answer);
                });

                $.each(data, function(i, item) {
                    console.log(item);
                    type.push(item.ques5);
                    amount.push(item.answer);
                });
                console.log(total);
                console.log(amount, type);
                var chartPie = {
                    labels: type,
                    datasets: [{
                        label: 'Age Range',
                        data: amount,
                        hoverBorderWidth: 10,

                        borderColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)',
                            'rgba(83, 92, 104, 0.2)',
                            'rgba(48, 51, 107, 0.2)',

                            'rgba(255, 159, 243, 0.2)'
                        ],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.8)',
                            'rgba(54, 162, 235, 0.8)',
                            'rgba(255, 206, 86, 0.8)',
                            'rgba(75, 192, 192, 0.8)',
                            'rgba(153, 102, 255, 0.8)',
                            'rgba(255, 159, 64, 0.8)',
                            'rgba(83, 92, 104, 0.8)',
                            'rgba(48, 51, 107, 0.8)',
                            'rgba(255, 159, 243, 0.8)'
                        ],
                        hoverBorderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)',
                            'rgba(83, 92, 104, 1)',
                            'rgba(48, 51, 107, 1)',

                            'rgba(255, 159, 243, 1)'
                        ],
                        hoverBackgroundColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)',
                            'rgba(83, 92, 104, 1)',
                            'rgba(48, 51, 107, 1)',

                            'rgba(255, 159, 243, 1)'
                        ],
                        borderWidth: 2,
                        hoverOffset: 4,
                        offset: 6

                    }]
                };

                var ctx = document.getElementById('myChart3').getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: chartPie,
                    options: {
                        title: {
                            display: true,
                            text: 'Q5: Would you like to see a sequel?',
                            fontSize: 25
                        },
                        legend: {
                            display: false,
                            position: 'bottom',
                        },
                        animation: {
                            animateScale: true
                        },
                        tooltips: {
                            callbacks: {
                                label: function(tooltipItems, data) {
                                    return "Total People: " +

                                        data.datasets[tooltipItems.datasetIndex].data[
                                            tooltipItems.index];
                                }
                            }
                        },
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true,
                                    precision: 0
                                }
                            }]
                        },
                        plugins: {
                            datalabels: {
                                color: '#fff',
                                padding: 6,
                                anchor: 'end',
                                fillColor: '#000',
                                align: 'start',
                                offset: -10,
                                borderWidth: 2,
                                borderColor: '#fff',
                                borderRadius: 25,
                                backgroundColor: (context) => {
                                    return context.dataset.backgroundColor;
                                },
                                font: {
                                    weight: 'bold',

                                    size: '12'
                                },
                                formatter: (value) => {
                                    return value;
                                },

                            }
                        }




                    }
                });
            }
        });
        $.ajax({
            type: "GET",
            url: "quesSix.php",
            dataType: 'json',
            success: function(data) {
                let type = [];
                let amount = [];
                let total = 0;
                console.log(data);
                $.each(data, function(i, item) {
                    total += parseInt(item.answer);
                });

                $.each(data, function(i, item) {
                    console.log(item);
                    type.push(item.ques6);
                    amount.push(item.answer);
                });
                console.log(total);
                console.log(amount, type);
                var chartPie = {
                    labels: type,
                    datasets: [{
                        label: 'Age Range',
                        data: amount,
                        hoverBorderWidth: 10,

                        borderColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)',
                            'rgba(83, 92, 104, 0.2)',
                            'rgba(48, 51, 107, 0.2)',

                            'rgba(255, 159, 243, 0.2)'
                        ],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.8)',
                            'rgba(54, 162, 235, 0.8)',
                            'rgba(255, 206, 86, 0.8)',
                            'rgba(75, 192, 192, 0.8)',
                            'rgba(153, 102, 255, 0.8)',
                            'rgba(255, 159, 64, 0.8)',
                            'rgba(83, 92, 104, 0.8)',
                            'rgba(48, 51, 107, 0.8)',
                            'rgba(255, 159, 243, 0.8)'
                        ],
                        hoverBorderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)',
                            'rgba(83, 92, 104, 1)',
                            'rgba(48, 51, 107, 1)',

                            'rgba(255, 159, 243, 1)'
                        ],
                        hoverBackgroundColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)',
                            'rgba(83, 92, 104, 1)',
                            'rgba(48, 51, 107, 1)',

                            'rgba(255, 159, 243, 1)'
                        ],
                        borderWidth: 2,
                        hoverOffset: 4,
                        offset: 6

                    }]
                };

                var ctx = document.getElementById('myChart4').getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: chartPie,
                    options: {
                        title: {
                            display: true,
                            text: 'Q6: Would you recommend this movie to a family member or friend?',
                            fontSize: 25
                        },
                        legend: {
                            display: false,
                            position: 'bottom',
                        },
                        animation: {
                            animateScale: true
                        },
                        tooltips: {
                            callbacks: {
                                label: function(tooltipItems, data) {
                                    return "Total People: " +

                                        data.datasets[tooltipItems.datasetIndex].data[
                                            tooltipItems.index];
                                }
                            }
                        },
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true,
                                    precision: 0
                                }
                            }]
                        },
                        plugins: {
                            datalabels: {
                                color: '#fff',
                                padding: 6,
                                anchor: 'end',
                                fillColor: '#000',
                                align: 'start',
                                offset: -10,
                                borderWidth: 2,
                                borderColor: '#fff',
                                borderRadius: 25,
                                backgroundColor: (context) => {
                                    return context.dataset.backgroundColor;
                                },
                                font: {
                                    weight: 'bold',

                                    size: '12'
                                },
                                formatter: (value) => {
                                    return value;
                                },

                            }
                        }




                    }
                });
            }
        });
        $.ajax({
            type: "GET",
            url: "quesSeven.php",
            dataType: 'json',
            success: function(data) {
                let type = [];
                let amount = [];
                let total = 0;
                console.log(data);
                $.each(data, function(i, item) {
                    total += parseInt(item.answer);
                });

                $.each(data, function(i, item) {
                    console.log(item);
                    type.push(item.ques7 + ' 🌟');
                    amount.push(item.answer);
                });
                console.log(total);
                console.log(amount, type);
                var chartPie = {
                    labels: type,
                    datasets: [{
                        label: 'Age Range',
                        data: amount,
                        hoverBorderWidth: 10,

                        borderColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)',
                            'rgba(83, 92, 104, 0.2)',
                            'rgba(48, 51, 107, 0.2)',

                            'rgba(255, 159, 243, 0.2)'
                        ],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.8)',
                            'rgba(54, 162, 235, 0.8)',
                            'rgba(255, 206, 86, 0.8)',
                            'rgba(75, 192, 192, 0.8)',
                            'rgba(153, 102, 255, 0.8)',
                            'rgba(255, 159, 64, 0.8)',
                            'rgba(83, 92, 104, 0.8)',
                            'rgba(48, 51, 107, 0.8)',
                            'rgba(255, 159, 243, 0.8)'
                        ],
                        hoverBorderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)',
                            'rgba(83, 92, 104, 1)',
                            'rgba(48, 51, 107, 1)',

                            'rgba(255, 159, 243, 1)'
                        ],
                        hoverBackgroundColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)',
                            'rgba(83, 92, 104, 1)',
                            'rgba(48, 51, 107, 1)',

                            'rgba(255, 159, 243, 1)'
                        ],
                        borderWidth: 2,
                        hoverOffset: 4,
                        offset: 6

                    }]
                };

                var ctx = document.getElementById('myChart5').getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: chartPie,
                    options: {
                        title: {
                            display: true,
                            text: 'Q7: What rating would you give this movie out of 10?',
                            fontSize: 25
                        },
                        legend: {
                            display: false,
                            position: 'bottom',
                        },
                        animation: {
                            animateScale: true
                        },
                        tooltips: {
                            callbacks: {
                                label: function(tooltipItems, data) {
                                    return "Total People: " +

                                        data.datasets[tooltipItems.datasetIndex].data[
                                            tooltipItems.index];
                                }
                            }
                        },
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true,
                                    precision: 0
                                }
                            }]
                        },
                        plugins: {
                            datalabels: {
                                color: '#fff',
                                padding: 6,
                                anchor: 'end',
                                fillColor: '#000',
                                align: 'start',
                                offset: -10,
                                borderWidth: 2,
                                borderColor: '#fff',
                                borderRadius: 25,
                                backgroundColor: (context) => {
                                    return context.dataset.backgroundColor;
                                },
                                font: {
                                    weight: 'bold',

                                    size: '12'
                                },
                                formatter: (value) => {
                                    return value;
                                },

                            }
                        }




                    }
                });
            }
        });

    })
    </script>


</body>

</html>