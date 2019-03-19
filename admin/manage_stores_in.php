<?php include('include/header.php') ?>
<?php include('global/db.php'); ?>
<?php
$db = new db();
$msj="";
$record=array();
$table='stores';

// select the data form user table
$query="select * from $table WHERE status=2";
$results = $db->select($query);
?>

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
                            Inactive Stores
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="home.php">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i>  Inactive Stores
                            </li>
                        </ol>
                        <?php

                        if(!empty($msj)){ ?>

                        <div class="alert alert-success" >
                            <strong> <?php echo $msj; ?></strong>
                            </div>

                        <?php } ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-money fa-fw"></i>Inactive Stores List</h3>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Store Name</th>
                                            <th>Address</th>
                                            <th>Phone</th>
                                            <th>Cell</th>
                                            <th>Created at</th>
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
                                                    <td><?php echo $results[$i]['store_name'];?></td>
                                                    <td><?php echo $results[$i]['address'];?></td>
                                                    <td><?php echo $results[$i]['phone'];?></td>
                                                    <td><?php echo $results[$i]['cell'];?></td>
                                                    <td><?php echo $results[$i]['created_at'];?></td>
                                                    <td><?php echo $stat[$results[$i]['status']];?></td>
                                                    <td><img src="uploads/<?php echo $results[$i]['image'];?>" width="50" height="50" /></td>
                                                    <td>
                                                        <a href="view_store.php?id=<?php echo $results[$i]['id']; ?>" ><i class="glyphicon glyphicon-eye-open"></i></a>
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
    <?php include('include/footer.php') ?>
</body>

</html>
