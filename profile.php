<?php include('header.php');
if (!isset($_SESSION['user'])) {
	header('location:login.php');
}
// $qry2=mysqli_query($con,"select * from tbl_movie where movie_id='".$_SESSION['movie']."'");
// $movie=mysqli_fetch_array($qry2);
?>
<div class="content">
	<div class="wrap">
		<div class="content-top">
			<div class="section group">
				<div class="about" style="width: 100%">
					<h3>Lịch sử giao dịch</h3>
					<!-- <?php echo date('d-m-Y') ?> -->
					<?php include('msgbox.php'); ?>
					<?php
					$bk = mysqli_query($con, "select * from tbl_bookings where user_id='" . $_SESSION['user'] . "'");
					if (mysqli_num_rows($bk)) {
					?>
						<table class="table table-bordered">
							<thead>
								<th>Mã hóa đơn</th>
								<th>Tên phim</th>
								<th>Rạp</th>
								<th>Phòng chiếu</th>
								<th>Ngày chiếu</th>
								<th>Giờ chiếu</th>
								<th>Số lượng ghế</th>
								<th>Tổng tiền</th>
							</thead>
							<tbody>
								<?php
								while ($bkg = mysqli_fetch_array($bk)) {
									$m = mysqli_query($con, "select * from tbl_movie where movie_id=(select movie_id from tbl_shows where s_id='" . $bkg['show_id'] . "')");
									$mov = mysqli_fetch_array($m);
									$s = mysqli_query($con, "select * from tbl_screens where screen_id='" . $bkg['screen_id'] . "'");
									$srn = mysqli_fetch_array($s);
									$tt = mysqli_query($con, "select * from tbl_theatre");
									$thr = mysqli_fetch_array($tt);
									$st = mysqli_query($con, "select * from tbl_show_time where st_id=(select st_id from tbl_shows where s_id='" . $bkg['show_id'] . "')");
									$stm = mysqli_fetch_array($st);
									$newDate = date("d-m-Y", strtotime($bkg['ticket_date']));
								?>
									<tr>
										<td>
											<?php echo $bkg['ticket_id']; ?>
										</td>
										<td>
											<?php echo $mov['movie_name']; ?>
										</td>
										<td>
											<!-- <?php echo $thr['name']; ?> -->
											HDT Cinema
										</td>
										<td>
											<?php echo $srn['screen_name']; ?>
										</td>
										<td>
											<?php echo $newDate; ?>
										</td>
										<td>
											<?php echo $stm['start_time']; ?>
										</td>
										<td>
											<?php echo $bkg['no_seats']; ?>
										</td>
										<td>
											<?php echo $bkg['amount']; ?>.000 Đ
										</td>
										
									</tr>
								<?php
								}
								?></tbody>
						</table>
					<?php
					} else {
					?>
						<h3>Không có giao dịch nào</h3>
					<?php
					}
					?>
				</div>


			</div>
			<div class="clear"></div>
		</div>
	</div>
</div>
<?php include('footer.php'); ?>
<script type="text/javascript">
	$('#seats').change(function() {
		var charge = <?php echo $screen['charge']; ?>;
		amount = charge * $(this).val();
		$('#amount').html("Rs " + amount);
		$('#hm').val(amount);
	});
</script>