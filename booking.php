<?php include('header.php');
if (!isset($_SESSION['user'])) {
	header('location:login.php');
}
$qry2 = mysqli_query($con, "select * from tbl_movie where movie_id='" . $_SESSION['movie'] . "'");
$movie = mysqli_fetch_array($qry2);
?>
<div class="content">
	<div class="wrap">
		<div class="content-top">
			<h3 style="border: 1px solid #fcac03; width: 150px; margin: 2rem 0 7rem 4rem"><?php echo $movie['movie_name']; ?></h3>
			<div style="display: flex">
				<img src="./images/seatdiagram.png" width="600px" height="330px">
				<table class="table table-hover table-bordered text-center">
					<?php
					$s = mysqli_query($con, "select * from tbl_shows where s_id='" . $_SESSION['show'] . "'");
					$shw = mysqli_fetch_array($s);

					$t = mysqli_query($con, "select * from tbl_theatre");
					$theatre = mysqli_fetch_array($t);
					?>
					<tr>
						<td class="col-md-6">
							Rạp
						</td>
						<td>
							<!-- <?php echo $theatre['name'] ?> -->
							HDT Cinema
						</td>
					</tr>
					<tr>
						<td>
							Phòng chiếu
						</td>
						<td>
							<?php
							$ttm = mysqli_query($con, "select  * from tbl_show_time where st_id='" . $shw['st_id'] . "'");

							$ttme = mysqli_fetch_array($ttm);

							$sn = mysqli_query($con, "select  * from tbl_screens where screen_id='" . $ttme['screen_id'] . "'");

							$screen = mysqli_fetch_array($sn);
							echo $screen['screen_name'];

							?>
						</td>
					</tr>
					<tr>
						<td>
							Ngày
						</td>
						<td>
							<?php
							if (isset($_GET['date'])) {
								$date = $_GET['date'];
							} else {
								$date = date('Y-m-d');
								$_SESSION['dd'] = $date;
							}
							?>
							<!-- <div class="col-md-12 text-center" style="padding-bottom:20px">
								<?php if ($date > $_SESSION['dd']) { ?><a href="booking.php?date=<?php echo date('Y-m-d', strtotime($date . "-1 days")); ?>">
										<button class="btn btn-default"><i class="glyphicon glyphicon-chevron-left"></i></button>
									</a><?php } ?>
								<span style="cursor:default" class="btn btn-default">
									<?php echo date('d-m-Y', strtotime($date)); ?></span>
								<?php if ($date != date('Y-m-d', strtotime($_SESSION['dd'] . "+5 days"))) { ?>
									<a href="booking.php?date=<?php echo date('Y-m-d', strtotime($date . "+1 days")); ?>">
										<button class="btn btn-default"><i class="glyphicon glyphicon-chevron-right"></i><button>
									</a>
								<?php }
								$av = mysqli_query($con, "select sum(no_seats) from tbl_bookings where show_id='" . $_SESSION['show'] . "' and ticket_date='$date'");
								$avl = mysqli_fetch_array($av);
								?>
							</div> -->
							<div class="col-md-12 text-center" style="padding-bottom:20px">
									<?php if ($date > $_SESSION['dd']) { ?>
										<a href="booking.php?date=<?php echo date('Y-m-d', strtotime($date . "-1 days")); ?>">
										<button class="btn btn-default"><i class="glyphicon glyphicon-chevron-left"></i></button>
									</a> <?php } ?>
									<span style="cursor:default" class="btn btn-default"><?php echo date('d-m-Y', strtotime($date)); ?></span>
									<?php if ($date != date('Y-m-d', strtotime($_SESSION['dd'] . "+5 days"))) { ?>
										<a href="booking.php?date=<?php echo date('Y-m-d', strtotime($date . "+1 days")); ?>">
										<button class="btn btn-default"><i class="glyphicon glyphicon-chevron-right"></i></button>
									</a>
									<?php }
									$av = mysqli_query($con, "select sum(no_seats) from tbl_bookings where show_id='" . $_SESSION['show'] . "' and ticket_date='$date'");
									$avl = mysqli_fetch_array($av);
									?>
								</div>
						</td>
					</tr>
					<tr>
						<td>
							Giờ chiếu
						</td>
						<td>
							<?php echo date('h:i A', strtotime($ttme['start_time'])); ?>
						</td>
					</tr>
					<tr>
						<td>
							Số lượng ghế
						</td>
						<td>
							<form action="process_booking.php" method="post">
								<input type="hidden" name="screen" value="<?php echo $screen['screen_id']; ?>" />
								<input type="number" required tile="Number of Seats" max="<?php echo $screen['seats'] - $avl[0]; ?>" min="1" name="seats" class="form-control" value="1" style="text-align:center" id="seats" />
								<input type="hidden" name="amount" id="hm" value="<?php echo $screen['charge']; ?>" />
								<input type="hidden" name="date" value="<?php echo $date; ?>" />
						</td>
					</tr>
					<tr>
						<td>
							Tổng
						</td>
						<td id="amount" style="font-weight:bold;font-size:18px">
							<?php echo $screen['charge']; ?>.000 Đ
						</td>
					</tr>
					<tr>
						<td colspan="2"><?php if ($avl[0] == $screen['seats']) { ?><button type="button" class="btn btn-danger" style="width:100%">House Full</button><?php } else { ?>
								<button class="btn btn-info" style="width:100%">Đặt vé</button>
							<?php } ?>
							</form>
						</td>
					</tr>
				</table>
			</div>
		</div>
	</div>
</div>
<?php include('footer.php'); ?>
<script type="text/javascript">
	$('#seats').change(function() {
		var charge = <?php echo $screen['charge']; ?>;
		amount = charge * $(this).val();
		$('#amount').html(amount + ".000Đ");
		$('#hm').val(amount);
	});
</script>