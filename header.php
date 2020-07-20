<?php
include('config.php');
session_start();
date_default_timezone_set('Asia/Bangkok');
?>

<!DOCTYPE HTML>
<html>

<head>

<title>HDT Cinema</title>
<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
	<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="all" />
	<link type="text/css" rel="stylesheet" href="http://www.dreamtemplate.com/dreamcodes/tabs/css/tsc_tabs.css" />
	<link rel="stylesheet" href="css/tsc_tabs.css" type="text/css" media="all" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src='js/jquery.color-RGBa-patch.js'></script>
	<script src='js/example.js'></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
	<div class="header">
		<div class="header-top">
			<div class="wrap">
				<div class="h-logo" style="padding-top: 10px;">
					<a href="index.php"><img src="images/branch.png" alt="" /></a>
				</div>
				<div class="nav-wrap">
					<ul class="group" id="example-one"  style="margin: -20px 0;padding: 0">
						<!-- <li><a href="index.php">Home</a></li> -->
						<li><a href="index.php">Phim đang chiếu</a></li>
						<li>
							<?php
							if (isset($_SESSION['user'])) {
								$us = mysqli_query($con, "select * from tbl_registration where user_id='" . $_SESSION['user'] . "'");

								$user = mysqli_fetch_array($us); ?>
								<a href="profile.php">Xin chào, <?php echo $user['name']; ?>!</a>
								<a href="logout.php">Đăng xuất</a>
							<?php } else { ?>
								<a href="login.php">Đăng nhập</a>
								<a href="registration.php">Đăng kí</a>
								<?php } ?>
						</li>
					</ul>
				</div>
				<div class="clear"></div>
			</div>
		</div>
		<div class="clear"></div>

		<div class="block">
			<div class="wrap">

				<form action="process_search.php" id="reservation-form" method="post" onsubmit="myFunction()">
					<fieldset>
						<div class="field">


							<input type="text" placeholder="Nhập tên phim..." required style="height: 27px;width:450px; border: none" id="search111" name="search">

							<input type="submit" value="Tìm kiếm" style="height: 29px;" id="button111">
						</div>

					</fieldset>
				</form>
				<div class="clear"></div>
			</div>
		</div>

</body>
<script>
	function myFunction() {
		if ($('#hero-demo').val() == "") {
			alert("Nhập tên phim...");
			return false;
		} else {
			return true;
		}

	}
</script>

</html>