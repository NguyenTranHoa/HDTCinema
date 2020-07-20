
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<title>HDT Cinema</title>
  <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon"> 
</head>
<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('location:login.php');
}
include('config.php');
extract($_POST);
if ($otp == "123456") {
    $bookid = "BKID" . rand(1000000, 9999999);
    mysqli_query($con, "insert into tbl_bookings values(NULL,'$bookid','" . $_SESSION['theatre'] . "','" . $_SESSION['user'] . "','" . $_SESSION['show'] . "','" . $_SESSION['screen'] . "','" . $_SESSION['seats'] . "','" . $_SESSION['amount'] . "','" . $_SESSION['date'] . "',CURDATE(),'1')");
    $_SESSION['success'] = "Giao dịch thành công";
} else {
    $_SESSION['error'] = "Giao dịch thất bại";
}
?>
<table align='center'>
    <tr>
        <td><STRONG>Giao dịch đang tiến hành</STRONG></td>
    </tr>
    <tr>
        <td>
            <font color='blue'>Chờ xíu xiu nhaaa<i class="fa fa-spinner fa-pulse fa-fw"></i>
                <span class="sr-only"></font>
        </td>
    </tr>
    <tr>
        <td>(Vui lòng chờ trong giây lát)</td>
    </tr>
</table>

<script>
    setTimeout(function() {
        window.location = "profile.php";
    }, 5000);
</script>