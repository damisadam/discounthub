<?php include('include/header.php') ?>
<?php include('global/db.php'); ?>
<?php
$db = new db(); ?>

<body>

<div id="wrapper">

<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <?php include('include/top-nav.php') ?>

    <?php include('include/side-bar.php') ?>
    <!-- /.navbar-collapse -->
</nav>

<div id="page-wrapper">

<div class="container-fluid">

<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Dashboard <small>Statistics Overview</small>
        </h1>
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i> Dashboard
            </li>
        </ol>
    </div>
</div>
<!-- /.row -->

<!-- /.row -->

<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-user fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><?php  echo  $db->numrows('select  * from stores WHERE status=1'); ?></div>
                        <div>Active Stores</div>
                    </div>
                </div>
            </div>
            <a href="manage_stores.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-success">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-users fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><?php  echo  $db->numrows('select  * from products WHERE status=2'); ?></div>
                        <div>Active Products</div>
                    </div>
                </div>
            </div>
            <a href="manage_products.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-user fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><?php echo  $db->numrows('select  * from stores WHERE status=3');  ?></div>
                        <div>Inactive Stores</div>
                    </div>
                </div>
            </div>
            <a href="manage_stores_in.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-users fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><?php echo  $db->numrows('select  * from products WHERE status=4');  ?></div>
                        <div>Inactive Products</div>
                    </div>
                </div>
            </div>
            <a href="manage_products_in.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
</div>
<!-- /.row -->



<!-- /.row -->

</div>
<!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<?php include('include/footer.php') ?>

</body>

</html>
