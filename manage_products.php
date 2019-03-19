<?php include('include/header.php') ?>
<?php include('admin/global/db.php'); ?>
<?php
$db = new db();
$msj="";
$record=array();
$table='products';

if(isset($_GET['delete']))
{
    $where="id=".$_GET['delete'];
    $db->delete($table,$where);
    $msj.="Product successfully deleted";
}

if(isset($_POST['store_id']) && isset($_POST['name']))
{
    $record["store_id"] = $db->Safe($_POST['store_id']);
    $record["name"] = $db->Safe($_POST['name']);
    $record["sku"] = $db->Safe($_POST['sku']);
    $record["description"] = $db->Safe($_POST['description']);
    $record["keyword"] = $db->Safe($_POST['keyword']);
    $record["extra_link_text"] = $db->Safe($_POST['extra_link_text']);
    $record["comparative_text"] = $db->Safe($_POST['comparative_text']);
    $record["hot_deal"] = $db->Safe($_POST['hot_deal']);
    $record["video_id"] = $db->Safe($_POST['video_id']);
    $record["urdu_name"] = $db->Safe($_POST['urdu_name']);
    $record["was_price"] = $db->Safe($_POST['was_price']);
    $record["now_price"] = $db->Safe($_POST['now_price']);
    $record["status"] = $db->Safe($_POST['status']);

    /*print_r($_FILES);
    die;*/
    if(isset($_FILES['product_image'])){
        if($_FILES['product_image']['size']>0){

            $file_ext=strtolower(end(explode('.',$_FILES['product_image']['name'])));

            $expensions= array("jpeg","jpg","png");
            $file_tmp = $_FILES['product_image']['tmp_name'];
            $file_name = $_FILES['product_image']['name'];

            if(in_array($file_ext,$expensions)=== false){
                $msj.="extension not allowed, please choose a JPEG or PNG file.";
            }else{
                $record["product_image"] = $db->Safe($file_name);
                $check= move_uploaded_file($file_tmp,"uploads/product/".$file_name);
            }
        }
    }

    if(isset($_FILES['product_image2'])){
        if($_FILES['product_image2']['size']>0){

            $file_ext=strtolower(end(explode('.',$_FILES['product_image2']['name'])));

            $expensions= array("jpeg","jpg","png");
            $file_tmp = $_FILES['product_image2']['tmp_name'];
            $file_name = $_FILES['product_image2']['name'];

            if(in_array($file_ext,$expensions)=== false){
                $msj.="extension not allowed, please choose a JPEG or PNG file.";
            }else{
                $record["product_image2"] = $db->Safe($file_name);
                $check= move_uploaded_file($file_tmp,"uploads/product/".$file_name);
            }
        }
    }

    if(isset($_FILES['product_image3'])){
        if($_FILES['product_image3']['size']>0){

            $file_ext=strtolower(end(explode('.',$_FILES['product_image3']['name'])));

            $expensions= array("jpeg","jpg","png");
            $file_tmp = $_FILES['product_image3']['tmp_name'];
            $file_name = $_FILES['product_image3']['name'];

            if(in_array($file_ext,$expensions)=== false){
                $msj.="extension not allowed, please choose a JPEG or PNG file.";
            }else{
                $record["product_image3"] = $db->Safe($file_name);
                $check= move_uploaded_file($file_tmp,"uploads/product/".$file_name);
            }
        }
    }

    if(!empty($_POST['update']))
    {
        $where="id=".$_POST['update'];
        if($db->update($table,$record,$where))
            $msj.="Product successfully updated";
    }
    if(empty($_POST['update'])){
        if($db->insert($table,$record))
        {
            $msj.= "Product successfully added";
        }
    }
}

// select the data form user table
$query="select * from $table";
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
                            Active Products
                        </h1>
                        <?php

                        if(!empty($msj)){ ?>

                        <div class="alert alert-success" >
                            <strong> <?php echo $msj; ?></strong>
                            </div>

                        <?php } ?>

                        <div class="row pull-right">
                            <div class="col-lg-12">
                                <a class="btn btn-info" href="modify_product.php" >Add New Product</a>
                            </div>
                        </div>
                        <br/>
                        <br/>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default" style="margin-top: 20px">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-money fa-fw"></i>Active Products List</h3>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Urdu Name</th>
                                            <th>SKU</th>
                                            <th>Created at</th>
                                            <th>Now Price</th>
                                            <th>Status</th>
                                            <th>Image</th>
                                            <th>Action</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        if ($results == true) {
                                        for ($i=0; $i<count($results); $i++){ ?>
                                        <tr>
                                            <td><?php echo $i+1;?></td>
                                            <td><?php echo $results[$i]['name'];?></td>
                                            <td><?php echo $results[$i]['urdu_name'];?></td>
                                            <td><?php echo $results[$i]['sku'];?></td>
                                            <td><?php echo $results[$i]['created_at'];?></td>
                                            <td><?php echo $results[$i]['now_price'];?></td>
                                            <td><?php echo $stat[$results[$i]['status']];?></td>
                                            <td><img src="admin/uploads/product/<?php echo $results[$i]['product_image'];?>" width="50" height="50" /></td>
                                            <td>
                                                <a href="view_product.php?id=<?php echo $results[$i]['id'];?>" >View</a> |
                                                <a href="modify_product.php?update=<?php echo $results[$i]['id'];?>" > Edit </a> |
                                                <a href="manage_products.php?delete=<?php echo $results[$i]['id'];?>" >Delete</a>
                                            </td>

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
