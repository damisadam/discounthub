<?php include('include/header.php') ?>
<?php include('admin/global/db.php'); ?>
<?php
$db = new db();
$query = "select * from stores ORDER BY id";
$stores = $db->select($query);

?>
<body>

<div class="super_container">
	
	<!-- Header -->

    <?php include('include/top-nav.php') ?>
	
	<!-- Home -->

	<div class="home">
		<div class="home_background parallax-window" data-parallax="scroll" data-image-src="images/shop_background.jpg"></div>
		<div class="home_overlay"></div>
		<div class="home_content d-flex flex-column align-items-center justify-content-center">
			<h2 class="home_title">All Stores</h2>
		</div>
	</div>

	<!-- Shop -->

	<div class="shop">
		<div class="container">
			<div class="row">

				<div class="col-lg-12">
					
					<!-- Shop Content -->

					<div class="shop_content">
						<div class="shop_bar clearfix">
							<div class="shop_product_count"><span><?php echo count($stores) ?></span> stores found</div>
						</div>

						<div class="row">

							<!-- Product Item -->
                            <?php foreach ($stores as $store){ ?>
							<div class="product_item  col-lg-3">
								<div class="product_border"></div>
								<div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="admin/uploads/store/<?php echo $store['image'];?>" alt=""></div>
								<div class="product_content">
									<div class="product_name"><div><a href="shop.php?store_id=<?php echo $store['id'];?>" tabindex="0"><?php echo $store['store_name'];?></a></div></div>
								</div>
							</div>
                            <?php } ?>

						</div>

						<!-- Shop Page Navigation -->

						<!--<div class="shop_page_nav d-flex flex-row">
							<div class="page_prev d-flex flex-column align-items-center justify-content-center"><i class="fas fa-chevron-left"></i></div>
							<ul class="page_nav d-flex flex-row">
								<li><a href="#">1</a></li>
								<li><a href="#">2</a></li>
								<li><a href="#">3</a></li>
								<li><a href="#">...</a></li>
								<li><a href="#">21</a></li>
							</ul>
							<div class="page_next d-flex flex-column align-items-center justify-content-center"><i class="fas fa-chevron-right"></i></div>
						</div>-->

					</div>

				</div>
			</div>
		</div>
	</div>

	<!-- Footer -->

    <?php include('include/footer.php') ?>
</body>

</html>