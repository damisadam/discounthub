<?php include('include/header.php') ?>
<?php include('admin/global/db.php'); ?>
<?php
$db = new db();
$query = "select * from products ORDER BY id DESC LIMIT 1";
$results = $db->select($query);


$query = "select * from products ORDER BY id DESC LIMIT 6";
$resultss = $db->select($query);

$query = "select * from products WHERE hot_deal = 1 ORDER BY id DESC LIMIT 6";
$deals = $db->select($query);

$query = "select * from stores ORDER BY id DESC LIMIT 8";
$stores = $db->select($query);

$query = "select * from categories ORDER BY id DESC LIMIT 8";
$categories = $db->select($query);
/*print_r($stores);
die;*/
?>
<body>

<div class="super_container">

    <?php include('include/top-nav.php') ?>
	
	<!-- Banner -->

	<div class="banner">
		<div class="banner_background" style="background-image:url(images/banner_background.jpg)"></div>
		<?php if (isset($results[0])){ ?>
        <div class="container fill_height">
			<div class="row fill_height">
				<div class="banner_product_image"><img style="width: 400px" src="admin/uploads/product/<?php echo $results[0]['product_image'];?>" alt=""></div>
				<div class="col-lg-5 offset-lg-4 fill_height">
					<div class="banner_content">
						<h1 class="banner_text"><?php echo $results[0]['comparative_text']?></h1>
						<div class="banner_price"><span>Rs <?php echo $results[0]['was_price']?></span>Rs <?php echo $results[0]['now_price']?></div>
						<div class="banner_product_name"><?php echo $results[0]['name']?></div>
						<div class="button banner_button"><a href="product.php">Detail</a></div>
					</div>
				</div>
			</div>
		</div>
        <?php } ?>
	</div>

    <div class="col-lg-12">

        <!-- Shop Content -->

        <div class="shop_content">
            <div class="shop_bar clearfix">
                <div class="shop_product_count" style="    width: 100%;height: 30px; background-color: #d0e2f1;margin-top: 15px; padding: 5px;"><span>Latest Products</div>
            </div>
            <div class="row">

                <!-- Product Item -->
                <?php foreach ($resultss as $result){ ?>
                    <div class="product_item  col-lg-2">
                        <div class="product_border"></div>
                        <div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="admin/uploads/product/<?php echo $result['product_image'];?>" alt=""></div>
                        <div class="product_content">
                            <div class="product_price">RS <?php echo $result['was_price'];?><span>RS <?php echo $result['now_price'];?></span></div>
                            <div class="product_name"><div><a href="product.php?id=<?php echo $result['id'];?>" tabindex="0"><?php echo $result['name'];?></a></div></div>
                        </div>
                    </div>
                <?php } ?>

            </div>
        </div>


	<!-- Footer -->

    <?php include('include/footer.php') ?>


        <div class="col-lg-12">

        <!-- Shop Content -->

        <div class="shop_content">
            <div class="shop_bar clearfix">
                <div class="shop_product_count" style="    width: 100%;height: 30px; background-color: #d0e2f1;margin-top: 15px; padding: 5px;"><span>Latest Hot Deals</div>
            </div>
            <div class="row">

                <!-- Product Item -->
                <?php foreach ($deals as $result){ ?>
                    <div class="product_item  col-lg-2">
                        <div class="product_border"></div>
                        <div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="admin/uploads/product/<?php echo $result['product_image'];?>" alt=""></div>
                        <div class="product_content">
                            <div class="product_price">RS <?php echo $result['was_price'];?><span>RS <?php echo $result['now_price'];?></span></div>
                            <div class="product_name"><div><a href="product.php?id=<?php echo $result['id'];?>" tabindex="0"><?php echo $result['name'];?></a></div></div>
                        </div>
                    </div>
                <?php } ?>

            </div>
        </div>


	<!-- Footer -->

    <?php include('include/footer.php') ?>
</body>

</html>