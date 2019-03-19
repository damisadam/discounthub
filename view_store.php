<?php include('include/header.php') ?>
<?php include('admin/global/db.php'); ?>
<?php
$db = new db();
$table="stores";
// select the data form user table
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
        <!-- Navigation -->

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                              Store Detail
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
                        <a class="btn btn-default pull-right" href="view_store.php?id=<?php echo $id; ?>&status=3" >Status Update</a>
                        </div>
                    </div>
                <br>
                        <div class="row">

                    <div class="col-lg-12">
                        <div class="panel panel-default" style="margin-top: 20px">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-money fa-fw"></i>Store Detail</h3>
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
                                                <td><strong>Store Name</strong></td>
                                                <td><?php echo $results[$i]['store_name'];?></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Address</strong></td>
                                                <td><?php echo $results[$i]['address'];?></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Location</strong></td>
                                                <td><?php echo $results[$i]['location'];?></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Location</strong></td>
                                                <td><?php echo $results[$i]['location'];?></td>
                                            </tr>
                                            <tr>
                                                <td><strong>State</strong></td>
                                                <td><?php echo $results[$i]['state'];?></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Phone</strong></td>
                                                <td><?php echo $results[$i]['phone'];?></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Cell</strong></td>
                                                <td><?php echo $results[$i]['cell'];?></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Fex</strong></td>
                                                <td><?php echo $results[$i]['fex'];?></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Opening Day</strong></td>
                                                <td><?php echo $results[$i]['opening_day'];?></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Opening Hours</strong></td>
                                                <td><?php echo $results[$i]['opening_hours'];?></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Remdan Day</strong></td>
                                                <td><?php echo $results[$i]['remdan_day'];?></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Remdan Hours</strong></td>
                                                <td><?php echo $results[$i]['remdan_hours'];?></td>
                                            </tr>
                                            <tr>
                                                <td><strong>=Eid Day</strong></td>
                                                <td><?php echo $results[$i]['eid_day'];?></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Eid Hours</strong></td>
                                                <td><?php echo $results[$i]['eid_hours'];?></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Christmas Day</strong></td>
                                                <td><?php echo $results[$i]['christmas_day'];?></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Christmas hours</strong></td>
                                                <td><?php echo $results[$i]['christmas_hours'];?></td>
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
                                                <td><script
                                                        src="http://maps.googleapis.com/maps/api/js">
                                                    </script>

                                                    <script>
                                                        function initialize() {
                                                            var mapProp = {
                                                                center:new google.maps.LatLng(<?php echo $results[$i]['latitude'];?>,<?php echo $results[$i]['longitude'];?>),
                                                                zoom:15,
                                                                mapTypeId:google.maps.MapTypeId.ROADMAP
                                                            };
                                                            var map=new google.maps.Map(document.getElementById("googleMap"), mapProp);
                                                        }
                                                        google.maps.event.addDomListener(window, 'load', initialize);
                                                    </script>
                                                    </head>

                                                    <body>
                                                    <div id="googleMap" style="width:600px;height:600px;"></div></td>
                                                <td><img src="admin/uploads/store/<?php echo $results[$i]['image'];?>" width="200" height="200" /></td>
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
