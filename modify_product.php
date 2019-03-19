<?php include('include/header.php') ?>
<?php include('admin/global/db.php'); ?>
<?php
$db = new db();
$msj = "";
$record = array();
$results = false;
$table = 'products';
if (isset($_GET['update'])) {
    $id = $_GET['update'];
//update the setting
// select the data form setting table
    $query = "select * from $table where id=$id ";
    $results = $db->select($query);
}

$query="select * from stores WHERE user_id=".$_SESSION['user_id'];
$users = $db->select($query);
//print_r($users); die;
?>

<body>

<div id="wrapper">
    <?php include('include/top-nav.php') ?>


    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-4"></div>
                <div class="col-lg-4">
                    <h1 class="page-header">
                        Modify Product
                    </h1>
                    <?php

                    if (!empty($msj)) { ?>

                        <div class="alert alert-success">
                            <strong> <?php echo $msj; ?></strong>
                        </div>

                    <?php } ?>
                </div>
            </div>
            <!-- /.row -->

            <div class="row">
                <div class="col-lg-4"></div>
                <div class="col-lg-4">

                    <form role="form" id="setting" action="manage_products.php" method="post" enctype = "multipart/form-data">


                        <div class="form-group">
                            <label>Store</label>

                            <select class="form-control" name="store_id" id="store_id">
                                <option value="">--Select Store--</option>
                                <?php foreach ($users as $user){ ?>
                                    <option value="<?=$user['id']?>" <?php if ($results[0]['store_id'] == $user['id']) { ?> selected <?php } ?> ><?= $user['store_name'] ?></option>
                                <?php } ?>
                            </select>

                        </div>

                        <div class="form-group">
                            <label>Name</label>
                            <input id="name" value="<?php echo $results[0]['name']; ?>" name="name"
                                   type="text" class="form-control">

                        </div>

                        <div class="form-group">
                            <label>Urdu Name</label>
                            <input id="urdu_name" value="<?php echo $results[0]['urdu_name']; ?>" name="urdu_name"
                                   type="text" class="form-control">

                        </div>

                        <div class="form-group">
                            <label>Was Price</label>
                            <input id="was_price" value="<?php echo $results[0]['was_price']; ?>" name="was_price"
                                   type="number" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Now Price</label>
                            <input id="now_price" value="<?php echo $results[0]['now_price']; ?>" name="now_price"
                                   type="number" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Image</label>
                            <input id="product_image" name="product_image" type="file" class="form-control"/>

                        </div>

                        <div class="form-group">
                            <label>Image 2</label>
                            <input id="product_image2" name="product_image2" type="file" class="form-control"/>

                        </div>

                        <div class="form-group">
                            <label>Image 3</label>
                            <input id="product_image3" name="product_image3" type="file" class="form-control"/>

                        </div>

                        <div class="form-group">
                            <label>Sku</label>
                            <input type="text" id="sku" name="sku" value="<?php echo $results[0]['sku']; ?>"
                                   class="form-control">

                        </div>

                        <div class="form-group">
                            <label>Keyword</label>
                            <input id="keyword" name="keyword" value="<?php echo $results[0]['keyword']; ?>"
                                   class="form-control">

                        </div>

                        <div class="form-group">
                            <label>Extra Link Text</label>
                            <input id="extra_link_text" name="extra_link_text" value="<?php echo $results[0]['extra_link_text']; ?>"
                                   class="form-control">

                        </div>

                        <div class="form-group">
                            <label>Comparative text</label>
                            <input id="comparative_text" name="comparative_text" value="<?php echo $results[0]['comparative_text']; ?>"
                                   class="form-control">

                        </div>

                        <div class="form-group">
                            <label>Hot deal</label>
                            <select class="form-control" name="hot_deal" id="hot_deal">
                                <option value="1" <?php if ($results[0]['hot_deal'] == 1) { ?> selected <?php } ?> >Yes
                                </option>
                                <option value="2" <?php if ($results[0]['hot_deal'] == 2) { ?> selected <?php } ?> >No
                                </option>
                            </select>

                        </div>

                        <div class="form-group">
                            <label>video_id</label>
                            <input id="video_id" name="video_id" value="<?php echo $results[0]['video_id']; ?>"
                                   class="form-control">

                        </div>

                        <div class="form-group">
                            <label>Description</label>
                            <textarea id="description" name="description"
                                      class="form-control"><?php echo $results[0]['description']; ?></textarea>

                        </div>


                        <div class="form-group">
                            <label>Status</label>
                            <select class="form-control" name="status" id="status">
                                <option value="1" <?php if ($results[0]['status'] == 1) { ?> selected <?php } ?> >Yes
                                </option>
                                <option value="2" <?php if ($results[0]['status'] == 2) { ?> selected <?php } ?> >No
                                </option>
                            </select>
                            <input id="update" name="update" type="hidden"  value="<?php  echo $results[0]['id']; ?>"class="form-control">
                        </div>

                        <button type="submit" class="btn btn-info">Add/update Product</button>

                    </form>

                </div>

            </div>

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->
<!-- /#wrapper -->
<script src="admin/js/jquery-1.11.0.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="admin/js/bootstrap.min.js"></script>
<script src="admin/js/jquery.validate.min.js"></script>
<script type="text/javascript">

    $(document).ready(function () {
        $("#setting").validate({
            rules: {

                store_id: {
                    required: true
                },
                name: {
                    required: true
                },
                sku: "required",
                description: "required",
                keyword: "required",
                was_price: "required",
                now_price: "required",
            },


            messages: {},
            errorClass: "help-inline",
            errorElement: "span",
            highlight: function (element, errorClass, validClass) {
                $(element).parents('.form-group').addClass('has-error');
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).parents('.form-group').removeClass('has-error');
                $(element).parents('.form-group').addClass('has-success');
            }
        });
    });


</script>

</body>

</html>
