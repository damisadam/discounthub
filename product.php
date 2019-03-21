<?php include('include/header.php') ?>
<?php include('admin/global/db.php'); ?>
<?php
$db = new db();
$results=[];
if(isset($_GET['id'])){
    $id=$_GET['id'];
    $query = "select * from products  where id=$id ORDER BY id DESC";
    $results = $db->select($query);
}


if(count($results)>0) {
    $id=$results[0]['store_id'];
    $query = "select * from stores where id=$id  ";
    $stores = $db->select($query);
}

?>
<style>
    /* Set the size of the div element that contains the map */
    #map {
        height: 400px;  /* The height is 400 pixels */
        width: 100%;  /* The width is the width of the web page */
    }
</style>
<body>

<div class="super_container">
	
	<!-- Header -->
    <?php include('include/top-nav.php') ?>

	<!-- Single Product -->
    <?php if(count($results)>0){ ?>
	<div class="single_product">
		<div class="container">
			<div class="row">

				<!-- Images -->
				<div class="col-lg-2 order-lg-1 order-2">
					<ul class="image_list">
						<li ><img src="admin/uploads/product/<?php echo $results[0]['product_image'];?>" alt=""></li>
						<li ><img src="admin/uploads/product/<?php echo $results[0]['product_image2'];?>" alt=""></li>
						<li ><img src="admin/uploads/product/<?php echo $results[0]['product_image3'];?>" alt=""></li>
					</ul>
				</div>

				<!-- Selected Image -->
				<div class="col-lg-5 order-lg-2 order-1">
					<div class="image_selected"><img src="admin/uploads/product/<?php echo $results[0]['product_image'];?>" alt=""></div>
				</div>

				<!-- Description -->
				<div class="col-lg-5 order-3">
					<div class="product_description">
						<div class="product_category"><?php echo $results[0]['name'];?></div>
						<div class="product_name"><?php echo $results[0]['sku'];?></div>
						<div class="product_text"><p><?php echo $results[0]['description'];?></p></div>
						<div class="order_info d-flex flex-row">
							<form action="#">
								<div class="clearfix" style="z-index: 1000;">

                                    <div class="banner_price"><span>Rs <?php echo $results[0]['was_price']?></span>Rs <?php echo $results[0]['now_price']?></div>

							</form>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
        <div style="height: 20px"></div>
        <div id="map"></div>
    <?php } ?>


    <?php include('include/footer.php') ?>
</body>
<?php if (isset($stores[0])){ ?>

<script>
    // Initialize and add the map
    var lat=<?php echo $stores[0]['latitude'] ?>;
    var lng=<?php echo $stores[0]['longitude'] ?>;
    function initMap() {
        // The location of Uluru
        var uluru = {lat: lat, lng: lng};
        // The map, centered at Uluru
        var map = new google.maps.Map(
            document.getElementById('map'), {zoom: 16, center: uluru});
        // The marker, positioned at Uluru
        var marker = new google.maps.Marker({position: uluru, map: map});
    }
</script>
<!--Load the API from the specified URL
* The async attribute allows the browser to render the page while the API loads
* The key parameter will contain your own API key (which is not needed for this tutorial)
* The callback parameter executes the initMap() function
-->
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCIwF204lFZg1y4kPSIhKaHEXMLYxxuMhA&callback=initMap">
</script>
<?php } ?>
</html>