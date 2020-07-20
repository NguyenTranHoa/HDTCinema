<?php include('header.php');
extract($_POST);
?>
</div>
<div class="content">
	<div class="wrap">
		<div class="content-top">
			<h3 style="font-size: 22px">
				Kết quả tìm theo
				'<?php echo$search ?>'
			</h3>
			
			<?php
			$today = date("Y-m-d");
			$qry2 = mysqli_query($con, "select DISTINCT movie_name,movie_id,image,type,time,release_date from tbl_movie where movie_name='" . $search . "'");

			if ($m = mysqli_fetch_array($qry2)) {
			?>

				<div class="col_1_of_4 span_1_of_4">
					<div class="imageRow">
						<div class="single">

							<a href="about.php?id=<?php echo $m['movie_id']; ?>" rel="lightbox"><img src="<?php echo $m['image']; ?>" alt="" /></a>
						</div>
						<div class="movie-text">
							<h4 class="h-text"><a href="about.php?id=<?php echo $m['movie_id']; ?>"><?php echo $m['movie_name']; ?></a></h4>
							<div style="font-weight: bold;">Thể loại: <Span style="font-weight: normal;"><?php echo $m['type']; ?></Span></div>
							<div style="font-weight: bold;">Thời lượng: <Span style="font-weight: normal;"><?php echo $m['time']; ?> phút</Span></div>
							<div style="font-weight: bold;">Khởi chiếu: <Span style="font-weight: normal;"><?php echo $m['release_date']; ?></Span></div>
						</div>
					</div>
				</div>

			<?php
			} else {
			?>
			
				<div>Chúng tôi không tìm thấy sản phẩm theo từ khóa của bạn.</div>
			<?php }?>

			

		</div>
		<div class="clear"></div>
	</div>
	<?php include('footer.php'); ?>