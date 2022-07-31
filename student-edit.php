<?php
session_start();
require 'dbcon.php';
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- jquery ui.css -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">

    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>


    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Student Edit</title>
    <link rel="icon" type="image/x-icon" href="assects/logo.ico">

    <style>
        body {
            background: -webkit-linear-gradient(left, #3931af, #00c6ff);
            color: white;
        }
        #loading {
            position: fixed;
            width: 100%;
            height: 100vh;
            background: #101111 url("assects/loading.gif") no-repeat  center;
            z-index: 99999;
        }
        .container1 {
            color: white;
            text-align: center;
        }
        .container1 h1 {
            font-weight: bold;
            font-size: 50px; 
            margin-top: 20px;
        }
        #card {
            border-top-left-radius: 10% 50%;
            border-bottom-left-radius: 10% 50%;
            border-top-right-radius: 5px;
            box-shadow: 5px 5px 12px 5px gray;
            color: black;
            font-weight: bold;
            background: white;
        }
        .row {
            margin-left: 80px;
            margin-right: 20px;
        }
        .col-md-12 { 
            margin-top: 10px;
        }
        #stuadd {
            text-align: center;
            text-decoration: underline;
        }
        .col-4 {
            float: left;
            padding-right: 5px;
        }
        .col input[type="text"] {
            color: red;
            font-weight: bold;
            text-align: center;
            font-size: 30px;
        }
        #btn {
            text-align: center;;
        }
        .btn-primary:hover {
            background: blue;
            color: white;
            font-weight: bold;
            box-shadow: 5px 5px gray;
        }
        .btn-warning {
            margin-top: -7%;
            margin-left: 90%;
        }
        #home {
            padding: 0 12px;
            background: initial;
            border: none;
            font-size: 30px;
            color: white;
        }
        #home:hover {
            background:  #B6FFCE;
            font-weight: bold;
            color: black;
            box-shadow: 5px 5px #00FFAB;
        }
        .waves {
            position:relative;
            width: 100%;
            height:15vh;
            margin-bottom:-7px; /*Fix for safari gap*/
            min-height:100px;
            max-height:150px;
        }

        .content {
            position:relative;
            height:20vh;
            padding-top: 50px;
            text-align:center;
            background-color: white;
            color: black;
        }
        .parallax > use {
            animation: move-forever 25s cubic-bezier(.55,.5,.45,.5)     infinite;
        }
        .parallax > use:nth-child(1) {
            animation-delay: -2s;
            animation-duration: 7s;
        }
        .parallax > use:nth-child(2) {
            animation-delay: -3s;
            animation-duration: 10s;
        }
        .parallax > use:nth-child(3) {
            animation-delay: -4s;
            animation-duration: 13s;
        }
        .parallax > use:nth-child(4) {
            animation-delay: -5s;
            animation-duration: 20s;
        }
        @keyframes move-forever {
            0% {
                transform: translate3d(-90px,0,0);
            }
            100% { 
                transform: translate3d(85px,0,0);
            }
        }
    </style>

    <script>
        $(function() {
            $("#twopaid").datepicker();
        });
        $(function() {
            $("#threepaid").datepicker();
        });
        $(function() {
            $("#fourpaid").datepicker();
        });
    </script>
</head>
<body id="body" onload="loadFun()">
    <div id="loading"></div>

    <div class="container1">
        <h1>Technosoft</h1>
        <a href="index.php" class="btn" id="home">HOME</a>
    </div>  
    <div class="container mt-5">

        <?php include('message.php'); ?>
        <div id="card">
        <div class="row">
            <div class="col-md-12">
                <h4 id="stuadd">Student Edit </h4>
           </div>

            <?php
                if(isset($_GET['id']))
                {
                    $student_id = mysqli_real_escape_string($con, $_GET['id']);
                    $query = "SELECT * FROM students WHERE id='$student_id' ";
                    $query_run = mysqli_query($con, $query);

                    if(mysqli_num_rows($query_run) > 0)
                    {
                        $student = mysqli_fetch_array($query_run);
            ?>
                        <form action="code.php" method="POST">
                            <div class="col-4 mb-3">
                                <label for="form-control">Admission number</label>
                                <input type="text" class="form-control" name="student_id" value="<?= $student['id']; ?>" readonly>
                            </div>
                            <div class="col-4 mb-3">
                                <label>Student Name</label>
                                <input type="text" name="name" value="<?=$student['name'];?>" class="form-control" readonly>
                            </div>
                            <div class="col-4 mb-3">
                                <label>Student Course</label>
                                <input type="text" name="course" value="<?=$student['course'];?>" class="form-control" readonly>
                            </div>
                            <div class="col-4 mb-3">
                                <label>Staff</label>
                                <input type="text" name="staff" value="<?=$student['staff'];?>" class="form-control" readonly>
                            </div>
                            <div class="col-4 mb-3">
                                <label>Total fee amount</label>
                                <input type="text" name="fee" value="<?=$student['cfee'];?>" class="form-control" readonly>
                            </div>
                            <div class="col-4 mb-3">
                                <label>Last paid</label>
                                <input type="text" name="paidone" value="<?=$student['paidone'];?>" class="form-control" readonly>
                            </div>
                            <div class="col mb-3">
                                <label>Balance</label>
                                <input type="text" name="balance" value="<?=$student['balance'];?>" class="form-control" readonly>
                            </div>
                            <div class="col-4 mb-3">
                                <label>Enter 2<sup>nd</sup> fee amount</label>
                                <input type="text" name="paidtwo" value="<?=$student['paidtwo'];?>" class="form-control" autocomplete="off">
                            </div>
                            <div class="col-4 mb-3">
                                <label>Enter 3<sup>rd</sup> fee amount</label>
                                <input type="text" name="paidthree" value="<?=$student['paidthree'];?>" class="form-control" autocomplete="off">
                            </div>
                            <div class="col-4 mb-3">
                                <label>Enter 4<sup>th</sup> fee amount</label>
                                <input type="text" name="paidfour" value="<?=$student['paidfour'];?>" class="form-control" autocomplete="off">
                            </div>
                            <div class="col-4 mb-3">
                                <label for="twopaid" class="form-label">Date of 2<sup>nd</sup> Tearm fee</label>
                                <input type="text" id="twopaid" name="twopaid" class="form-control" placeholder="Select Date" autocomplete="off">
                            </div>
                            <div class="col-4 mb-3">
                                <label for="threepaid" class="form-label">Date of 3<sup>rd</sup> Tearm fee</label>
                                <input type="text" id="threepaid" name="threepaid" class="form-control" placeholder="Select Date" autocomplete="off">
                            </div>
                            <div class="col-4 mb-3">
                                <label for="fourpaid" class="form-label">Date of 4<sup>th</sup> Tearm fee</label>
                                <input type="text" id="fourpaid" name="fourpaid" class="form-control" placeholder="Select Date" autocomplete="off">
                            </div>
                            <div class="mb-3" id="btn">
                                <button type="submit" name="update_student" class="btn btn-primary">Update Student</button>
                            </div>
                        </form>
                        <?php
                    }
                    else
                    {
                        echo "<h4>No Such Id Found</h4>";
                    }
                }
                        ?>
        </div>
    </div>
    </div>

<div>
<svg class="waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
viewBox="0 24 150 28" preserveAspectRatio="none" shape-rendering="auto">
<defs>
<path id="gentle-wave" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z" />
</defs>
<g class="parallax">
<use xlink:href="#gentle-wave" x="48" y="0" fill="rgba(255,255,255,0.7" />
<use xlink:href="#gentle-wave" x="48" y="3" fill="rgba(255,255,255,0.5)" />
<use xlink:href="#gentle-wave" x="48" y="5" fill="rgba(255,255,255,0.3)" />
<use xlink:href="#gentle-wave" x="48" y="7" fill="#fff" />
</g>
</svg>
</div>


<div class="content flex">
  <p>By.Raj Kumar </p>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        var preload = document.getElementById('loading');
        function loadFun() {
            preload.style.display = 'none';
        }
    </script>
</body>
</html>