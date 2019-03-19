<?php include('include/header.php') ?>
<?php include('global/db.php'); ?>
<?php
$db = new db();
$table="users";
// select the data form user
if(isset($_GET['status'])){
    $results['status']=2;
    $id=$_GET['id'];
    if($db->update($table,$results,'id='.$id)){
        $msj="successfully updated";
    }
}
$id=$_GET['view'];
$query="select * from $table where id=$id";
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
                            Users Detail
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="home.php">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i>  Detail
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
                <!-- /.row -->
                <div class="row">

                    <div class="col-lg-12">
                        <a class="btn btn-default pull-right" href="view_user.php?id=<?php echo $id; ?>&status=3" >Status Update</a>
                    </div>
                </div>
                <br>
                <div class="row">

                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-money fa-fw"></i>User detail</h3>
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
                                                <td><strong>Email</strong></td>
                                                <td><?php echo $results[$i]['email'];?></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Phone</strong></td>
                                                <td><?php echo $results[$i]['phone'];?></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Status</strong></td>
                                                <td><?php echo $results[$i]['status'];?></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Created at</strong></td>
                                                <td><?php echo $results[$i]['created_at'];?></td>
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
