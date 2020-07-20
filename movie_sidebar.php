<div class="listview_1_of_3 images_1_of_3">
	<h3>Phim mới</h3>
	<hr/>
	<?php
	$today = date("Y-m-d");
	$qry2 = mysqli_query($con, "select * from  tbl_movie where status='0' order by rand() limit 3");
	
	while ($m = mysqli_fetch_array($qry2)) {
	?>
		<div class="content-left">
			<div class="listimg listimg_1_of_2">
				<?php?>
				<a href="about.php?id=<?php echo $m['movie_id']; ?>"><img src="<?php echo $m['image']; ?>"></a>
			</div>
			<div class="text list_1_of_2">
				<div class="extra-wrap1">
					<a href="about.php?id=<?php echo $m['movie_id']; ?>" class="link4" style="text-decoration: none; margin: 10px 0 20px"><h4><?php echo $m['movie_name']; ?></h4></a><br>
					<div style="font-weight: bold;">Thể loại: <Span style="font-weight: normal;"><?php echo $m['type']; ?></Span></div>
					<div style="font-weight: bold;">Thời lượng: <Span style="font-weight: normal;"><?php echo $m['time']; ?> phút</Span></div>
					<div style="font-weight: bold;">Khởi chiếu: <Span style="font-weight: normal;"><?php echo $m['release_date']; ?></Span></div>
				</div>
			</div>
			<div class="clear"></div>
		</div>
		<hr/>
	<?php
	}
	?>
</div>
<div class="clear"></div>