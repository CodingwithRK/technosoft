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

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap icons v1.8.3 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css" />
    <title>Technosoft</title>
    <link rel="icon" type="image/x-icon" href="assects/logo.ico">
    <style>
        body {
            color: black;
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
            margin-top: -100px;
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
        #card {
            background: white;
            border-top-left-radius: 10% 50%;
            border-bottom-left-radius: 10% 50%;
            border-top-right-radius: 5px;
            box-shadow: 5px 5px 12px 5px gray;
        }
        .row {
            margin-top: 20px;
            margin-left: 50px;
            margin-right: 20px;
        }
        #stuadd {
            color: black;
            margin-top: 20px;
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
        table {
            margin-top: 20px;
        }
        ::placeholder {
            text-align: center;
        }
        .search {
            margin-left: 100px;
            height: 30px;
            border: 2px solid black;
            border-radius: 10px;
        }
        #add {
            padding: 0 12px;
            background: initial;
            border: none;
            font-size: 30px;
            color: white;
        }
        #add:hover {
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
    <script>
        function autoRefresh() {
            window.location = window.location.href;
        }
        setInterval('autoRefresh()', 50000);
    </script>
</head>
<body id="body" onload="loadFun()">
    <div id="loading"></div>

    <div class="container1">
        <h1>Technosoft</h1>
        <a href="student-create.php" class="btn" id="add">Add Students</a>
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
    <div class="container mt-4">
        <div id="card">
            <?php include('message.php'); ?>
                <div class="row">
                    <div class="col">
                        <h4  id="stuadd">Student Details
                            <input type="text" name="search" id="search" placeholder="Search for Student" class="search" autocomplete="off">
                        </h4>
                    </div>
                    <div class="col">
                        <table class="table" id="myTable">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Student Name</th>
                                    <th>Course</th>
                                    <th>Date of Join<br>(MM/DD/YY)</th>
                                    <th>Class time</th>
                                    <th>Staff</th>
                                    <th>Course Fee</th>
                                    <th>Balance</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $query = "SELECT * FROM students";
                                    $query_run = mysqli_query($con, $query);
                                    
                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $student)
                                        {
                                ?>
                                            <tr>
                                                <td><?= $student['id']; ?></td>
                                                <td><?= $student['name']; ?></td>
                                                <td><?= $student['course']; ?></td>
                                                <td><?= $student['doj']; ?></td>
                                                <td><?= $student['ctime']; ?></td>
                                                <td><?= $student['staff']; ?></td>
                                                <td><?= $student['cfee']; ?></td>
                                                <td><?=$student['balance']; ?></td>
                                                <td>
                                                    <a href="student-view.php?id=<?= $student['id']; ?>" class="btn btn-info btn-sm"><i class="bi bi-eye"></i>View</a>
                                                    <a href="student-edit.php?id=<?= $student['id']; ?>" class="btn btn-success btn-sm">Edit <i class="bi bi-pencil-square"></i></a>
                                                    <form action="code.php" method="POST" class="d-inline">
                                                        <button type="submit" name="delete_student" value="<?=$student['id'];?>" class="btn btn-danger btn-sm">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    else
                                    {
                                        echo "<h5> No Record Found </h5>";
                                    }
                                ?>
                                
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>

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


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="jquery/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.js"></script>

    <script>
        var preload = document.getElementById('loading');
        function loadFun() {
            preload.style.display = 'none';
        }

        $(document).ready(function() {
            $('#search').keyup(function(){
                search_table($(this).val());
            });
            function search_table(value) {
                $('#myTable tr').each(function() {
                    var found='false';
                    $(this).each(function() {
                        if($(this).text().toLowerCase().indexOf(value.toLowerCase())>=0)
                        {
                            found='true';
                        }
                    });
                    if(found=='true') {
                        $(this).show();
                    }
                    else {
                        $(this).hide();
                    }
                })
            }
        });

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