<?php include('include/header.php') ?>
<?php include('admin/global/db.php'); ?>
<?php
$db = new db();
$msj="";
$record=array();
$table='stores';

if(isset($_GET['delete']))
{
    $where="id=".$_GET['delete'];
    $db->delete($table,$where);
    $msj.="Store successfully deleted";
}

//update the user

if(isset($_SESSION['user_id']) && isset($_POST['store_name']) && !empty($_POST['store_name']))
{
    $record["user_id"] = $db->Safe($_SESSION["user_id"]);
    $record["store_name"] = $db->Safe($_POST['store_name']);
    $record["address"] = $db->Safe($_POST['address']);
    $record["location"] = $db->Safe($_POST['location']);
    $record["state"] = $db->Safe($_POST['state']);
    $record["phone"] = $db->Safe($_POST['phone']);
    $record["cell"] = $db->Safe($_POST['cell']);
    $record["fex"] = $db->Safe($_POST['fex']);
    $record["opening_day"] = $db->Safe($_POST['opening_day']);
    $record["opening_hours"] = $db->Safe($_POST['opening_hours']);
    $record["remdan_day"] = $db->Safe($_POST['remdan_day']);
    $record["remdan_hours"] = $db->Safe($_POST['remdan_hours']);
    $record["eid_day"] = $db->Safe($_POST['eid_day']);
    $record["eid_hours"] = $db->Safe($_POST['eid_hours']);
    $record["christmas_day"] = $db->Safe($_POST['christmas_day']);
    $record["christmas_hours"] = $db->Safe($_POST['christmas_hours']);
    $record["latitude"] = $db->Safe($_POST['latitude']);
    $record["longitude"] = $db->Safe($_POST['longitude']);
    $record["status"] = $db->Safe(1);

    /*print_r($_FILES);
    die;*/
    if(isset($_FILES['image'])){
    if($_FILES['image']['size']>0){

        $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));

        $expensions= array("jpeg","jpg","png");
        $file_tmp = $_FILES['image']['tmp_name'];
        $file_name = $_FILES['image']['name'];

        if(in_array($file_ext,$expensions)=== false){
            $msj.="extension not allowed, please choose a JPEG or PNG file.";
        }else{
            $record["image"] = $db->Safe($file_name);
           $check= move_uploaded_file($file_tmp,"admin/uploads/store/".$file_name);
        }
    }
    }

    if(!empty($_POST['update']))
    {
        $where="id=".$_POST['update'];
        if($db->update($table,$record,$where))
            $msj.="Store successfully updated";
    }
    if(empty($_POST['update'])){
        if($db->insert($table,$record))
        {
            $msj.= "Store successfully added";
        }
    }
}

// select the data form user table
$query="select * from $table WHERE user_id=".$_SESSION['user_id'];
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
                            All Stores
                        </h1>
                        <?php

                        if(!empty($msj)){ ?>

                        <div class="alert alert-success" >
                            <strong> <?php echo $msj; ?></strong>
                            </div>

                        <?php } ?>

                        <div class="row pull-right">
                            <div class="col-lg-12">
                                <a class="btn btn-info" href="modify_store.php" >Add New Store</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default" style="margin-top: 20px !important;">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-money fa-fw"></i>Active Stores list</h3>
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
                                            <td><img src="admin/uploads/store/<?php echo $results[$i]['image'];?>" width="50" height="50" /></td>
                                            <td>
                                                <a href="view_store.php?id=<?php echo $results[$i]['id'];?>" > View</a> |
                                                <a href="modify_store.php?update=<?php echo $results[$i]['id'];?>" >Edit</a> |
                                                <a href="manage_stores.php?delete=<?php echo $results[$i]['id'];?>" >Delete</a>
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
