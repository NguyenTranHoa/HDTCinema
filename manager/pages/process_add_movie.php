<?php
    session_start();
    include('../../config.php');
    extract($_POST);
    
    $target_dir = "../../images/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    
    $flname="images/".basename($_FILES["image"]["name"]);
    
    mysqli_query($con,"insert into  tbl_movie values(NULL,'".$_SESSION['theatre']."','$name','$cast','$desc','$rdate','$flname','$video','0','$director', '$type', '$time')");
    
    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
    
    $_SESSION['success']="Đã thêm phim vào hệ thống";
    header('location:add_movie.php');
?>  