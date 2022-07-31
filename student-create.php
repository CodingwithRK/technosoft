<?php
session_start();
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
        
    <!-- jquery ui.css -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">

    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>

    <!-- Bootstrap CSS v5.2.0-beta1 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous" />

    <!-- Bootstrap icons v1.8.3 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css" />

    <!-- time_picker.css -->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">

    <title>Student Create</title>
    <link rel="icon" type="image/x-icon" href="assects/logo.ico">

    <style>
        body {
            background: -webkit-linear-gradient(left, #3931af, #00c6ff);
        }
        #loading {
            position: fixed;
            width: 100%;
            height: 100vh;
            background: #101111 url("assects/loading.gif") no-repeat  center;
            z-index: 99999;
        } 
        .clock {
            margin-top: -100px;
            margin-left: -55px;
            position: absolute;
            width: 200px;
            height: 100px;
            border:10px solid #e5e5e5;
            background-color:#14213d;
            top:130px;
            left:65px;
            z-index:2;
        }

        .clock:before {
            content:"";
            position: absolute;
            width:20px;
            height:10px;
            background-color: #333;
            top:90px;
            left:20px;
            border-radius:0 0 10px 10px;
            box-shadow: 135px 0 #333;
        }

        .clock:after {
            content:"";
            position: absolute;
            width:150px;
            height:10px;
            background-color: #fca311;
            top:-20px;
            left:25px;
            border-radius:20px 20px 0 0;
        }

        .time {
            margin-top: -100px;
            margin-left: -65px;
            position: absolute;
            transform: translateX(-50%) translateY(-50%);
            font-family: 'ZCOOL QingKe HuangYou', cursive;
            font-size: 55px;
            z-index: 3;
            color: #d9ed92;
            top:177px;
            left:174px;
        }
        .calendar{
            margin-left: 76%;
            margin-top: -140px;
            width: 200px;
        }
        .calendar .calendar-body{
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(15px);
            border-bottom: 6px solid #4285F4;
            border-right: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 8px;
            box-shadow: 0 5px 25px rgb(1 1 1 / 15%);
        }

        .calendar .calendar-body .month-name{
            color: #fff;
            background: #4285F4;
            width: 100%;
            font-size: 1.6em;
            text-align: center;
            font-weight: 400;
            border-top-left-radius: 8px;
            border-top-right-radius: 8px;
        }

        .calendar .calendar-body .day-name{
            color: #fff;
            font-size: 1.2em;
            font-weight: 400;
            margin-top: 5px;
        }

        .calendar .calendar-body .date-number{
            color: #fff;
            font-size: 3em;
            font-weight: 600;
            line-height: 1em;
        }

        .calendar .calendar-body .year{
            color: #fff;
            font-size: 1em;
            font-weight: 400;
            margin-bottom: 1px;
        }
        .container1 {
            color: white;
            text-align: center;
        }
        .container1 h1 {
            font-weight: bold;
            font-size: 80px; 
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
            margin-top: 10px;
            padding-right: 5px;
        }
        .input-group {
            border: none;
        }
        input[type="text"] {
            border: none;
        }
        input[type="text"]:focus {
            background: #4d4dff;
            font-weight: bold;
            color: white;
        }
        .input-group-text {
            background: white;
            border: none;
            color: black;
            font-weight: bold;
        }
        ::placeholder {
            font-weight: 600;
        }
        label {
            color: black;
        }
        .btn-primary {
            margin-left: 320px; 
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
        .bi-star-fill {
            color: red;
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
    <!-- date & time Js -->
    <script>
        $(function() {
            $("#doj").datepicker();
        });

        $(function() {
            $("#onepaid").datepicker();
        });

        $(document).ready (function() {
            $('.timepicker').timepicker({
                timeFormat: 'h:mm p',
                interval: 15,
                minTime: '7:00am',
                maxTime: '9:00pm',
                defaultTime: '7',
                startTime: '07:00',
                dynamic: true,
                dropdown: true,
                scrollbar: true
            });
        });
    </script>
</head>
<body id="body" onload="loadFun()">
    <div id="loading"></div>
  
    <div class="container1">
        <h1>Technosoft</h1>
        <a href="index.php" class="btn" id="home">HOME</a>
    </div>

    <div class="digital-clock">
        <div class="clock"></div>
        <div id="DigitalClock" class="time" onload="showTime()"></div>
    </div>

    <div class="calendar">
        <div class="calendar-body">
            <span class="month-name">Month</span>
            <span class="day-name">Day</span>
            <span class="date-number">00</span>
            <span class="year">0000</span>
        </div>
    </div>



    <div class="container mt-5">

        <?php include('message.php'); ?>
        <div id="card">
                <div class="row">
                        <div class="col-md-12">    
                            <h4 id="stuadd">Student Registration Form</h4>
                        </div>
                        <form action="code.php" method="POST">

                            <div class="col-4 mb-3">
                                <label for="admin" class="form-label">Admission Number <sup><i class="bi bi-star-fill"></i></sup></label>
                                <div class="input-group">
                                    <div class="input-group-text"><i class="bi bi-123"></i></div>
                                    <input type="text" class="form-control" id="admin" name="admin" placeholder="1" autocomplete="off" required>
                                </div>
                            </div>

                            <div class="col-4 mb-3">
                                <label for="name" class="form-label">Student Name <sup><i class="bi bi-star-fill"></i></sup></label>
                                <div class="input-group">
                                    <div class="input-group-text"><i class="bi bi-person"></i></div>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Student name" autocomplete="off" required>
                                 </div>
                            </div>

                            <div class="col-4 mb-3">
                                <label for="Fname" class="form-label">Father Name <sup><i class="bi bi-star-fill"></i></sup></label>
                                <div class="input-group">
                                    <div class="input-group-text"><i class="bi bi-person"></i></div>
                                    <input type="text" class="form-control" id="fname" name="fname" placeholder="Father name" autocomplete="off" required>
                                 </div>
                            </div>

                            <div class="col-4 mb-3">
                                <label for="phonenumber" class="form-label">Phone Number <sup><i class="bi bi-star-fill"></i></sup></label>
                                <div class="input-group">
                                    <div class="input-group-text"><i class="bi bi-telephone"></i></div>
                                    <input type="text" class="form-control" id="phn" name="phn" maxlength="10" placeholder="1234567890" autocomplete="off" required>
                                 </div>
                            </div>

                            <div class="col-4 mb-3">
                                <label for="add" class="form-label">Address <sup><i class="bi bi-star-fill"></i></sup></label>
                                <div class="input-group">
                                    <div class="input-group-text"><i class="bi bi-geo-alt"></i></div>
                                    <input  type="text" class="form-control"  id="add" name="add" placeholder="Tenali" autocomplete="off" required>
                                </div>
                            </div>

                            <div class="col-4 mb-3">
                                <label for="course" class="form-label">Enter Course <sup><i class="bi bi-star-fill"></i></sup></label>
                                <div class="input-group">
                                    <div class="input-group-text"><i class="bi bi-journal-code"></i></div>
                                    <input type="text" class="form-control" id="course" name="course" placeholder="Course" required>
                                </div>
                            </div>

                            <div class="col-4 mb-3">
                                <label for="doj" class="form-label">Date of Joining <sup><i class="bi bi-star-fill"></i></sup></label>
                                <div class="input-group">
                                    <input type="text" id="doj" name="doj" class="form-control" placeholder="Select Date" autocomplete="off" required>
                                    <div class="input-group-text"><i class="bi bi-calendar3"></i></div>
                                </div>
                            </div>

                            <div class="col-4 mb-3">
                                <label for="clstime" class="form-label">Class time <sup><i class="bi bi-star-fill"></i></sup></label>
                                <div class="input-group">
                                    <input type="text" id="clstime" name="clstime" class="form-control timepicker" placeholder="Select Time" autocomplete="off" required>
                                    <div class="input-group-text"><i class="bi bi-alarm"></i></div>
                                </div>
                            </div>

                            <div class="col-4 mb-3">
                                <label for="tech" class="form-label">Enter staff name <sup><i class="bi bi-star-fill"></i></sup></label>
                                <div class="input-group">
                                    <div class="input-group-text"><i class="bi bi-person"></i></div>
                                    <input type="text" id="tech" name="tech" class="form-control" placeholder="Staff name" required>
                                </div>
                            </div>

                            <div class="col-4 mb-3">
                                <label for="fee" class="form-label">Total fee <sup><i class="bi bi-star-fill"></i></sup></label>
                                <div class="input-group">
                                    <div class="input-group-text"><i class="bi bi-cash-stack"></i></div>
                                    <input type="text" id="fee" name="fee" class="form-control" placeholder="Course Fee" autocomplete="off" required>
                                </div>
                            </div>

                            <div class="col-4 mb-3">
                                <label for="paidfee" class="form-label">Paid Fee</label>
                                <div class="input-group">
                                    <div class="input-group-text"><i class="bi bi-cash"></i></div>
                                    <input type="text" id="paidfee" name="paidfee" class="form-control" placeholder="Fee paid" autocomplete="off">
                                </div>
                            </div>

                            <div class="col-4 mb-3">
                                <label for="onepaid" class="form-label">Date of Fee pay</label>
                                <div class="input-group">
                                    <div class="input-group-text"><i class="bi bi-calendar3"></i></div>
                                    <input type="text" id="onepaid" name="onepaid" class="form-control" placeholder="Select Date of pay" autocomplete="off">
                                </div>
                            </div>

                            <div class="col mb-3">
                                <button type="submit" name="save_student" class="btn btn-primary">Save Student</button>
                                <button type="reset" name="reset_form" class="btn btn-warning">Reset</button>
                            </div>

                        </form>

            </div>
        </div>
    </div><br>

    <div>
        <svg class="waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 28" preserveAspectRatio="none" shape-rendering="auto">
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


    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- time_picker.js -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>

    <!-- main js -->
    <script src="js/script.js"></script>

    <script>
        var preload = document.getElementById('loading');
        function loadFun() {
            preload.style.display = 'none';
        }

        function showTime(){
            var date = new Date();
            var h = date.getHours(); 
            var m = date.getMinutes(); 
       
            if(h == 0){
                h = 12;
            }
    
            if(h > 12){
                h = h - 12;   
            }
    
            h = (h < 10) ? "0" + h : h;
            m = (m < 10) ? "0" + m : m;
    
    
            var time = h + ":" + m;
            document.getElementById("DigitalClock").innerText = time;
            document.getElementById("DigitalClock").textContent = time;
    
            setTimeout(showTime, 1000);    
        }
        showTime();


        const dayNumber = new Date().getDate();
        const year = new Date().getFullYear();
        const dayName = new Date().toLocaleString("default", {weekday: "long"});
        const monthName = new Date().toLocaleString("default", {month: "long"});

        document.querySelector(".month-name").innerHTML = monthName;
        document.querySelector(".day-name").innerHTML = dayName;
        document.querySelector(".date-number").innerHTML = dayNumber;
        document.querySelector(".year").innerHTML = year;
    </script>
</body>
</html>