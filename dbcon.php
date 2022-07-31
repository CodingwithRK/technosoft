<?php

    $con = mysqli_connect("localhost","root","","technosoft");

    if(!$con){
        die('Connection Failed'. mysqli_connect_error());
    }

?>