<?php include('header.php');
$qry2 = mysqli_query($con, "select * from tbl_movie where movie_id='" . $_GET['id'] . "'");
$movie = mysqli_fetch_array($qry2);
?>
<div class="content">
	<div class="wrap">
		<div class="content-top">
			<div class="section group">
				<div class="about span_1_of_2">
					<h3>Nội dung phim</h3>

					<div class="about-top">
						<div class="grid images_3_of_2">
							<img src="<?php echo $movie['image']; ?>" alt="" />
							<div style="display: flex; justify-content: center">
								<a style="margin-top: 50px" href="<?php echo $movie['video_url']; ?>" target="_blank" class="watch_but">Watch Trailer</a>
							</div>
						</div>
						<div class="desc span_3_of_2">
							<h2><?php echo $movie['movie_name']; ?></h2>
							<hr />
							<p class="p-link" style="font-weight: bold;font-size:15px; color: #444">Đạo diễn: <span style="font-weight: normal;"><?php echo $movie['director']; ?></span></p>
							<p class="p-link" style="font-weight: bold;font-size:15px; color: #444">Diễn viên : <span style="font-weight: normal;"><?php echo $movie['cast']; ?></span></p>
							<p class="p-link" style="font-weight: bold;font-size:15px; color: #444">Thể loại : <span style="font-weight: normal;"><?php echo $movie['type']; ?></span></p>
							<p class="p-link" style="font-weight: bold;font-size:15px; color: #444">Khởi chiếu : <span style="font-weight: normal;"><?php echo date('d-m-Y', strtotime($movie['release_date'])); ?></span></p>
							<p style="font-size:15px"><?php echo $movie['desc']; ?></p>

						</div>
						<div class="clear"></div>
					</div>
					<?php $s = mysqli_query($con, "select DISTINCT theatre_id from tbl_shows where `movie_id`='" . $movie['movie_id'] . "'");
					if (mysqli_num_rows($s)) { ?>
						<table class="table table-hover table-bordered text-center">
							<?php

							while ($shw = mysqli_fetch_array($s)) {
								$t = mysqli_query($con, "select * from tbl_theatre where id='" . $shw['theatre_id'] . "'");
								$theatre = mysqli_fetch_array($t);
							?>
								<tr>
									<td>
										Rạp
									</td>
									<td>
										Giờ chiếu
									</td>
								</tr>
								<tr>
									<td>
										HDT Cinema
									</td>
									<td>
										<?php $tr = mysqli_query($con, "select * from tbl_shows where movie_id='" . $movie['movie_id'] . "' and theatre_id='" . $shw['theatre_id'] . "'");
										while ($shh = mysqli_fetch_array($tr)) {
											$ttm = mysqli_query($con, "select  * from tbl_show_time where st_id='" . $shh['st_id'] . "'");
											$ttme = mysqli_fetch_array($ttm);

										?>

											<a href="check_login.php?show=<?php echo $shh['s_id']; ?>&movie=<?php echo $shh['movie_id']; ?>&theatre=<?php echo $shw['theatre_id']; ?>">
												<button class="btn btn-default"><?php echo date('H:i', strtotime($ttme['start_time'])); ?></button>
											</a>
										<?php
										}
										?>
									</td>
								</tr>
							<?php
							}
							?>
						</table>
					<?php
					} else {
					?>
						<h3>No Show Available</h3>
					<?php
					}
					?>

				</div>
				<?php include('movie_sidebar.php'); ?>
			</div>
			<div class="clear"></div>
		</div>
	</div>
</div>
<?php include('footer.php'); ?>