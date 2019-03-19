<?php include('include/header.php') ?>
<?php include('global/db.php'); ?>
<?php
$db = new db();
$msj="";
$record=array();
$table='users';

if(isset($_GET['delete']))
{
    $where="id=".$_GET['delete'];
    $db->delete($table,$where);
    $msj.="User successfully deleted";
}

//update the user
if(isset($_POST['email']))
{
    $record["email"] = $db->Safe($_POST['email']);
    $record["status"] = $db->Safe($_POST['status']);
    $record["password"] = $db->Safe($_POST['password']);
    $record["name"] = $db->Safe($_POST['name']);
    $record["phone"] = $db->Safe($_POST['phone']);

    if(!empty($_POST['update']))
    {
        $where="id=".$_POST['update'];
        if($db->update($table,$record,$where))
            $msj.="User successfully updated";
    }
    if(empty($_POST['update'])){
        if($db->insert($table,$record))
        {
            $msj.= "User successfully added";
        }
    }
}

// select the data form user table
$query="select * from $table WHERE status=1";
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
                            Active Users
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="home.php">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i>  Active Users
                            </li>
                        </ol>
                        <?php

                        if(!empty($msj)){ ?>

                        <div class="alert alert-success" >
                            <strong> <?php echo $msj; ?></strong>
                            </div>

                        <?php } ?>

                        <div class="row pull-right">
                            <div class="col-lg-12">
                                <a class="btn btn-info" href="modify_user.php" >Add New User</a>
                            </div>
                        </div>
                        <br/>
                        <br/>
                    </div>




                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-money fa-fw"></i>Active Users List</h3>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Created at</th>
                                            <th>Status</th>
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
                                            <td><?php echo $results[$i]['email'];?></td>
                                            <td><?php echo $results[$i]['phone'];?></td>
                                            <td><?php echo $results[$i]['created_at'];?></td>
                                            <td><?php echo $stat[$results[$i]['status']];?></td>
                                            <td>
                                                <a href="view_user.php?view=<?php echo $results[$i]['id'];?>" >  <span class="glyphicon glyphicon-eye-open"></span> </a>
                                                <a href="modify_user.php?update=<?php echo $results[$i]['id'];?>" > <span class="glyphicon glyphicon-pencil"></span> </a>
                                                <a href="manage_users.php?delete=<?php echo $results[$i]['id'];?>" > <span class="glyphicon glyphicon-trash"></span> </a>
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
