<?php include('include/header.php') ?>
<?php include('admin/global/db.php'); ?>
<?php
$db = new db();
$table="products";
// select the data form user
$id=$_GET['id'];
if(isset($_GET['status'])){
    $results['status']=2;
    if($db->update($table,$results,'id='.$id)){
        $msj="successfully updated";
    }
}

$query="select * from $table where id=$id";
$results = $db->select($query);
?>

<body>

    <div id="wrapper">
        <?php include('include/top-nav.php') ?>


        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                              Product Detail
                        </h1>

                        <?php

                        if(!empty($msj)){ ?>

                        <div class="alert alert-success" >
                            <strong> <?php echo $msj; ?></strong>
                            </div>

                        <?php } ?>
                    </div>
                </div>
                <!-- /.row -->
                <div class="row">

                    <div class="col-lg-12">
                        <a class="btn btn-default pull-right" href="view_product.php?id=<?php echo $id; ?>&status=3" >Status Update</a>
                    </div>
                </div>
                <br>
                <div class="row">

                    <div class="col-lg-12">
                        <div class="panel panel-default" style="margin-top: 20px">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-money fa-fw"></i>Product detail</h3>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped">
                                        <thead>

                                        </thead>
                                        <tbody>
                                        <?php
                                        if ($results == true) {
                                        for ($i=0; $i<count($results); $i++){ ?>
                                            <tr>
                                                <td><strong>Name</strong></td>
                                                <td><?php echo $results[$i]['name'];?></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Urdu Name</strong></td>
                                                <td><?php echo $results[$i]['urdu_name'];?></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Store Name</strong></td>
                                                <td><?php echo $results[$i]['store_id'];?></td>
                                            </tr>
                                            <tr>
                                                <td><strong>SKU</strong></td>
                                                <td><?php echo $results[$i]['sku'];?></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Now Price</strong></td>
                                                <td><?php echo $results[$i]['Now_price'];?></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Hot Deal</strong></td>
                                                <td><?php echo $results[$i]['hot_deal'];?></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Status</strong></td>
                                                <td><?php echo $results[$i]['status'];?></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Created at</strong></td>
                                                <td><?php echo $results[$i]['created_at'];?></td>
                                            </tr>
                                           <tr>
                                                <td><strong>Description</strong></td>
                                                <td><?php echo $results[$i]['description'];?></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Keyword</strong></td>
                                                <td><?php echo $results[$i]['keyword'];?></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Extra link text</strong></td>
                                                <td><?php echo $results[$i]['extra_link_text'];?></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Comparative text</strong></td>
                                                <td><?php echo $results[$i]['comparative_text'];?></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Extra link text</strong></td>
                                                <td><?php echo $results[$i]['extra_link_text'];?></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Extra link text</strong></td>
                                                <td><?php echo $results[$i]['extra_link_text'];?></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Extra link text</strong></td>
                                                <td><?php echo $results[$i]['extra_link_text'];?></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Extra link text</strong></td>
                                                <td><?php echo $results[$i]['extra_link_text'];?></td>
                                            </tr>
                                            <tr>
                                                <td><img src="admin/uploads/product/<?php echo $results[$i]['product_image'];?>" width="200" height="200" /></td>
                                                <td><img src="admin/uploads/product/<?php echo $results[$i]['product_image2'];?>" width="200" height="200" /></td>
                                            </tr>
                                            <tr>
                                                <td><img src="uploads/product/<?php echo $results[$i]['product_image3'];?>" width="200" height="200" /></td>
                                            </tr>

                                    <?php } } else {

                                            echo "<tr><td>No record found</td></tr>";
                                        } ?>

                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->


</body>

</html>
