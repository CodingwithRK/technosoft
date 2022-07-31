<?php
session_start();
require 'dbcon.php';

if(isset($_POST['delete_student']))
{
    $student_id = mysqli_real_escape_string($con, $_POST['delete_student']);

    $query = "DELETE FROM students WHERE id='$student_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Student Deleted Successfully";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Student Not Deleted";
        header("Location: index.php");
        exit(0);
    }
}

if(isset($_POST['update_student']))
{
    $student_id = mysqli_real_escape_string($con, $_POST['student_id']);

    $name = mysqli_real_escape_string($con, $_POST['name']);
    $cfee = mysqli_real_escape_string($con, $_POST['fee']);
    $bal = mysqli_real_escape_string($con, $_POST['balance']);
    $paidone = mysqli_real_escape_string($con, $_POST['paidone']);
    $paidtwo = mysqli_real_escape_string($con, $_POST['paidtwo']);
    $paidthree = mysqli_real_escape_string($con, $_POST['paidthree']);
    $paidfour = mysqli_real_escape_string($con, $_POST['paidfour']);
    $twopaid = mysqli_real_escape_string($con, $_POST['twopaid']);
    $threepaid = mysqli_real_escape_string($con, $_POST['threepaid']);
    $fourpaid = mysqli_real_escape_string($con, $_POST['fourpaid']);

    if($cfee>$paidone) 
    {
        if($bal==$paidtwo) 
        {
            $bal= 0;
        }
        else 
        {
            $bal = $cfee-($paidone+$paidtwo);
            if($bal==$paidthree) 
            {
                $bal = 0;
            } 
            else 
            {
              $bal = $cfee-($paidone+$paidtwo+$paidthree);
              if($bal==$paidfour)
              {
                  $bal = 0;
              } 
              else 
              {
                $bal = $cfee-($paidone+$paidtwo+$paidthree+$paidfour);
              }
            }
        }
    } 
    else 
    {
        $bal = 0;
    }

    if($paidtwo>0) {
        $two=$twopaid;
    }

    if($paidthree>0) {
        $three=$threepaid;
    }

    if($paidfour>0) {
        $four=$fourpaid;
    }
    $query = "UPDATE students SET paidone='$paidone', paidtwo='$paidtwo', paidthree='$paidthree',paidfour='$paidfour', balance='$bal', twopaid='$two', threepaid='$three', fourpaid='$four' WHERE id='$student_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = $name." Fees is Updated Successfully";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = $name." Fees is Not Updated";
        header("Location: index.php");
        exit(0);
    }

}


if(isset($_POST['save_student']))
{
    $admin = mysqli_real_escape_string($con, $_POST['admin']);
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $phone = mysqli_real_escape_string($con, $_POST['phn']);
    $address = mysqli_real_escape_string($con, $_POST['add']);
    $course = mysqli_real_escape_string($con, $_POST['course']);
    $doj = mysqli_real_escape_string($con, $_POST['doj']);
    $ctime = mysqli_real_escape_string($con, $_POST['clstime']);
    $staff = mysqli_real_escape_string($con, $_POST['tech']);
    $cfee = mysqli_real_escape_string($con, $_POST['fee']);
    $paidone = mysqli_real_escape_string($con, $_POST['paidfee']);
    $fname = mysqli_real_escape_string($con, $_POST['fname']);
    $onepaid = mysqli_real_escape_string($con, $_POST['onepaid']);
    
    if($cfee>$paidone) {
        $bal = $cfee-$paidone;
    } else {
        $bal = 0;
    }

    if($paidone>0) {
        $one=$onepaid;
    }

    $query = "INSERT INTO students (id,name,phone,address,course,doj,ctime,staff,cfee,paidone,balance,fname,onepaid) VALUES ('$admin','$name','$phone','$address','$course','$doj','$ctime','$staff','$cfee','$paidone','$bal','$fname','$one')";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['message'] = $name." Data is Created Successfully";
        header("Location: student-create.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = $name." Data is Not Created";
        header("Location: student-create.php");
        exit(0);
    }
}

?>