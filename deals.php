<?php include('include/header.php') ?>
<?php include('admin/global/db.php'); ?>
<?php
$db = new db();
if(isset($_GET['store_id'])){
    $id=$_GET['store_id'];
    $query = "select * from products  where id=$id ORDER BY id DESC";
}else if (isset($_GET['q'])){
    $q=$_GET['q'];
    $query = "select * from products  where name LIKE '%$q%' OR sku LIKE '%$q%' OR description LIKE '%$q%' OR keyword LIKE '%$q%' OR comparative_text LIKE '%$q%' OR urdu_name LIKE '%$q%'   ORDER BY id DESC";
} else{
    $query = "select * from products WHERE hot_deal = 1  ORDER BY id DESC";

}

$results = $db->select($query);

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
			<h2 class="home_title">Deals Products</h2>
		</div>
	</div>

	<!-- Shop -->

	<div class="shop">
		<div class="container">
			<div class="row">
				<div class="col-lg-3">

					<!-- Shop Sidebar -->
					<div class="shop_sidebar">
						<div class="sidebar_section">
							<div class="sidebar_subtitle brands_subtitle">Stores</div>
							<ul class="brands_list">
                                <?php foreach ($stores as $store){ ?>
								<li class="brand"><a href="shop.php?store_id=<?php echo $store['id'] ?>"><?php  echo $store['store_name'] ?></a></li>
                                <?php } ?>
							</ul>
						</div>
					</div>

				</div>

				<div class="col-lg-9">
					
					<!-- Shop Content -->

					<div class="shop_content">
						<div class="shop_bar clearfix">
							<div class="shop_product_count"><span><?php echo count($results) ?></span> products found</div>
						</div>

						<div class="row">

							<!-- Product Item -->
                            <?php foreach ($results as $result){ ?>
							<div class="product_item  col-lg-3">
								<div class="product_border"></div>
								<div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="admin/uploads/product/<?php echo $result['product_image'];?>" alt=""></div>
								<div class="product_content">
                                    <div class="product_price">RS <?php echo $result['was_price'];?><span>RS <?php echo $result['now_price'];?></span></div>
									<div class="product_name"><div><a href="product.php?id=<?php echo $result['id'];?>" tabindex="0"><?php echo $result['name'];?></a></div></div>
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