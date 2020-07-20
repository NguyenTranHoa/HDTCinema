<?php
    session_start();
    include('../../config.php');
    extract($_POST);
    mysqli_query($con,"insert into  tbl_theatre values(NULL,'$name')");
    $id=mysqli_insert_id($con);
    mysqli_query($con,"insert into  tbl_login values(NULL,'$id','$username','$password','1')");
    $_SESSION['success']="Đã thêm tài khoản quản lý vào hệ thống";
    header('location:add_manager.php');
?>