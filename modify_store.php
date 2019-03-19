<?php include('include/header.php') ?>
<?php include('admin/global/db.php'); ?>
<?php
$db = new db();
$msj = "";
$record = array();
$results = false;
$table = 'stores';
if (isset($_GET['update'])) {
    $id = $_GET['update'];
//update the setting
// select the data form setting table
    $query = "select * from $table where id=$id ";
    $results = $db->select($query);
}

$query="select * from users WHERE status=1";
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
                        Modify Store
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
                <div class="col-lg-4"> </div>
                <div class="col-lg-4">

                    <form role="form" id="setting" action="manage_stores.php" method="post" enctype = "multipart/form-data">


                        <div class="form-group">
                            <label>Store Name</label>
                            <input id="store_name" value="<?php echo $results[0]['store_name']; ?>" name="store_name"
                                   type="text" class="form-control">

                        </div>

                        <div class="form-group">
                            <label>Store image</label>
                            <input id="image" name="image" type="file" class="form-control"/>

                        </div>

                        <div class="form-group">
                            <label>Address</label>
                            <input type="text" id="address" name="address" value="<?php echo $results[0]['address']; ?>"
                                   class="form-control">

                        </div>

                        <div class="form-group">
                            <label>Location</label>
                            <input id="location" name="location" value="<?php echo $results[0]['location']; ?>"
                                   class="form-control">

                        </div>

                        <div class="form-group">
                            <label>State</label>
                            <input id="state" name="state" value="<?php echo $results[0]['state']; ?>"
                                   class="form-control">

                        </div>

                        <div class="form-group">
                            <label>Phone</label>
                            <input id="phone" name="phone" value="<?php echo $results[0]['phone']; ?>"
                                   class="form-control">

                        </div>

                        <div class="form-group">
                            <label>cell</label>
                            <input id="cell" name="cell" value="<?php echo $results[0]['cell']; ?>"
                                   class="form-control">

                        </div>

                        <div class="form-group">
                            <label>Fex</label>
                            <input id="fex" name="fex" value="<?php echo $results[0]['fex']; ?>"
                                   class="form-control">

                        </div>

                        <div class="form-group">
                            <label>Opening days</label>
                            <textarea id="opening_day" name="opening_day"
                                      class="form-control"><?php echo $results[0]['opening_day']; ?></textarea>

                        </div>

                        <div class="form-group">
                            <label>Opening hours</label>
                            <textarea id="opening_hours" name="opening_hours"
                                      class="form-control"><?php echo $results[0]['opening_hours']; ?></textarea>

                        </div>

                        <div class="form-group">
                            <label>Remdan days</label>
                            <textarea id="remdan_day" name="remdan_day"
                                      class="form-control"><?php echo $results[0]['remdan_day']; ?></textarea>

                        </div>

                        <div class="form-group">
                            <label>Remdan hours</label>
                            <textarea id="remdan_hours" name="remdan_hours"
                                      class="form-control"><?php echo $results[0]['remdan_hours']; ?></textarea>

                        </div>

                        <div class="form-group">
                            <label>Eid day</label>
                            <textarea id="eid_day" name="eid_day"
                                      class="form-control"><?php echo $results[0]['eid_day']; ?></textarea>

                        </div>

                        <div class="form-group">
                            <label>Eid hours</label>
                            <textarea id="eid_hours" name="eid_hours"
                                      class="form-control"><?php echo $results[0]['eid_hours']; ?></textarea>

                        </div>

                        <div class="form-group">
                            <label>Christmas day</label>
                            <textarea id="christmas_day" name="christmas_day"
                                      class="form-control"><?php echo $results[0]['christmas_day']; ?></textarea>

                        </div>

                        <div class="form-group">
                            <label>Christmas hours</label>
                            <textarea id="christmas_hours" name="christmas_hours"
                                      class="form-control"><?php echo $results[0]['christmas_hours']; ?></textarea>

                        </div>

                        <div class="form-group">
                            <label>Latitude</label>
                            <input id="latitude" name="latitude" value="<?php echo $results[0]['latitude']; ?>"
                                   class="form-control">

                        </div>

                        <div class="form-group">
                            <label>Longitude</label>
                            <input id="longitude" name="longitude" value="<?php echo $results[0]['longitude']; ?>"
                                   class="form-control">
                            <input id="update" name="update" type="hidden"  value="<?php  echo $results[0]['id']; ?>"class="form-control">
                        </div>



                        <button type="submit" class="btn btn-info">Add/update Store</button>

                    </form>

                </div>

            </div>

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->
<script src="admin/js/jquery-1.11.0.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="admin/js/bootstrap.min.js"></script>
<script src="admin/js/jquery.validate.min.js"></script>

<script type="text/javascript">

    $(document).ready(function () {
        $("#setting").validate({
            rules: {

                store_name: {
                    required: true
                },
                address: {
                    required: true
                },
                phone: "required",
                user_id: "required",
                opening_day: "required",
                opening_hours: "required",
                latitude: "required",
                longitude: "required"
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
