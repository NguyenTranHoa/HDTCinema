<?php include('header.php'); ?>
</div>
<div class="content" style="margin-bottom: 4rem">
	<div class="wrap">
		<div class="content-top">
			<h3>Phim đang chiếu</h3>

			<?php
			$today = date("Y-m-d");
			$qry2 = mysqli_query($con, "select * from  tbl_movie ");

			while ($m = mysqli_fetch_array($qry2)) {
			?>

				<div class="col_1_of_4 span_1_of_4" style="height: 620px">
					<div class="imageRow"> 
						<div class="single" style="height: 440px">
							<a href="about.php?id=<?php echo $m['movie_id']; ?>"><img src="<?php echo $m['image']; ?>" alt="" /></a>
						</div>
						<div class="movie-text">
							<h4 class="h-text"><a href="about.php?id=<?php echo $m['movie_id']; ?>"><?php echo $m['movie_name']; ?></a></h4>
							<div style="font-weight: bold;">Thể loại: <Span style="font-weight: normal;"><?php echo $m['type']; ?></Span></div>
							<div style="font-weight: bold;">Thời lượng: <Span style="font-weight: normal;"><?php echo $m['time']; ?> phút</Span></div>
							<div style="font-weight: bold;">Khởi chiếu: <Span style="font-weight: normal;"><?php echo date("d-m-Y", strtotime($m['release_date'])); ?></Span></div>
						</div>
					</div>
				</div>

			<?php
			}
			?>

		</div>
		<div class="clear"></div>
	</div>
	<?php include('footer.php'); ?>