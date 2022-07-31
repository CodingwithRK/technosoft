<?php
require 'dbcon.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Student View</title>
    <link rel="icon" type="image/x-icon" href="assects/logo.ico">


    <style>
        body {
            color: black;
            height: 650px;
            background: linear-gradient(to bottom right, #0099ff 0%, #9999ff 100%);
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
        .container {
            margin-top: 55px;
        }
        #stuadd {
            margin-top: 10px;
            margin-left: 300px;
            color: black;
        }
        .form-control {
            color: black;
            font-weight: bold;
        }
        .form-control:hover {
            color: red;
            border: 2px inset gray;
        }
        #padd {
            background-color: white;
            border-top-left-radius: 10% 50%;
            border-bottom-left-radius: 10% 50%;
            border-top-right-radius: 10px;
            box-shadow: 5px 5px 25px 3px gray;
        }
        .balance {
            color: red;
        }
        .balance:hover {
            color: white;
            background: black;
        }
        .row {
            margin-left:  50px;
            margin-right: 50px;
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
</head>
<body id="body" onload="loadFun()">
    <div id="loading"></div>

    <div class="container1">
         <h1>Technosoft</h1>
        <a href="index.php" class="btn" id="home">HOME</a>
    </div>
    <div class="container">
<div id="padd">
        <div class="row">
            <div class="col-md-12">
                    <h4  id="stuadd" style="text-decoration: underline">Student Details </h4>
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
                                

                                    <div class="col-4 mb-3">
                                        <label>Student No</label>
                                        <p class="form-control">
                                            <?=$student['id'];?>
                                        </p>
                                    </div>
                                    <div class="col-4 mb-3">
                                        <label>Student Name</label>
                                        <p class="form-control">
                                            <?=$student['name'];?>
                                        </p>
                                    </div>
                                    <div class="col-4 mb-3">
                                        <label>Father Name</label>
                                        <p class="form-control">
                                            <?=$student['fname'];?>
                                        </p>
                                    </div>
                                    <div class="col-4 mb-3">
                                        <label>Student Phone number</label>
                                        <p class="form-control">
                                            <?=$student['phone'];?>
                                        </p>
                                    </div>
                                    <div class="col-4 mb-3">
                                        <label> Student Address</label>
                                        <p class="form-control">
                                            <?=$student['address'];?>
                                        </p>
                                    </div>
                                    <div class="col-4 mb-3">
                                        <label>Student Course</label>
                                        <p class="form-control">
                                            <?=$student['course'];?>
                                        </p>
                                    </div>
                                    <div class="col-4 mb-3">
                                        <label>Date of joining</label>
                                        <p class="form-control">
                                            <?=$student['doj'];?>
                                        </p>
                                    </div>
                                    <div class="col-4 mb-3">
                                        <label>Class time</label>
                                        <p class="form-control">
                                            <?=$student['ctime'];?>
                                        </p>
                                    </div>
                                    <div class="col-4 mb-3">
                                        <label>Staff</label>
                                        <p class="form-control">
                                            <?=$student['staff'];?>
                                        </p>
                                    </div>
                                    <div class="col-4 mb-3">
                                        <label>Course Fee</label>
                                        <p class="form-control">
                                            <?=$student['cfee'];?>
                                        </p>
                                    </div>
                                    <div class="col-4 mb-3">
                                        <label>1<sup>st</sup> paid</label>
                                        <p class="form-control">
                                            <?=$student['paidone'];?><br>
                                            <?=$student['onepaid'];?>
                                        </p>
                                    </div>
                                    <div class="col-4 mb-3">
                                        <label>2<sup>nd</sup> paid</label>
                                        <p class="form-control">
                                            <?=$student['paidtwo'];?><br>
                                            <?=$student['twopaid'];?>
                                        </p>
                                    </div>
                                    <div class="col-4 mb-3">
                                        <label>3<sup>rd</sup> paid</label>
                                        <p class="form-control">
                                            <?=$student['paidthree'];?><br>
                                            <?=$student['threepaid'];?>
                                        </p>
                                    </div>
                                    <div class="col-4 mb-3">
                                        <label>4<sup>th</sup> paid</label>
                                        <p class="form-control">
                                            <?=$student['paidfour'];?><br>
                                            <?=$student['fourpaid'];?>
                                        </p>
                                    </div>
                                    <div class="col-4 mb-3">
                                        <label>Student Balance fee</label>
                                        <p class="form-control balance">
                                            <?=$student['balance'];?>
                                        </p>
                                    </div>

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