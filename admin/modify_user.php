<?php include('include/header.php') ?>
<?php include('global/db.php'); ?>
<?php
$db = new db();
$msj="";
$record=array();
$results=false;
$table='users';
if(isset($_GET['update']))
{
    $id=$_GET['update'];
//update the setting
// select the data form setting table
    $query="select * from $table where id=$id ";
    $results = $db->select($query);
}
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
                        Modify  User
                    </h1>
                    <ol class="breadcrumb">
                        <li>
                            <i class="fa fa-dashboard"></i>  <a href="home.php">Dashboard</a>
                        </li>
                        <li class="active">
                            <i class="fa fa-file"></i> modify User
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
                <div class="col-lg-6">

                    <form role="form" id="setting" action="manage_users.php" method="post">


                        <div class="form-group">
                            <label>Name</label>
                            <input id="name" value="<?php echo $results[0]['name'];?>" name="name" type="text" class="form-control">

                        </div>
                        <div class="form-group">
                            <label>E-mail</label>
                            <input type="email" id="email" name="email" value="<?php echo $results[0]['email'];?>" class="form-control">

                        </div>

                        <div class="form-group">
                            <label>Phone</label>
                            <input id="phone" name="phone" value="<?php echo $results[0]['phone'];?>" class="form-control">

                        </div>

                        <div class="form-group">
                            <label>Password</label>
                            <input id="password" type="password" name="password" value="<?php echo $results[0]['password'];?>" class="form-control">
                            <input id="update" name="update" type="hidden"  value="<?php  echo $results[0]['id']; ?>"class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Re-Password</label>
                            <input id="repassword" name="repassword" type="password"  value="<?php echo $results[0]['password'];?>" class="form-control">

                        </div>

                        <div class="form-group">
                            <label>Status</label>
                            <select class="form-control" name="status" id="status" >
                                <option value="1" <?php if($results[0]['status']==1){ ?> selected <?php } ?> >Yes</option>
                                <option value="2" <?php if($results[0]['status']==2){ ?> selected <?php } ?> >No</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-info">Add User</button>

                    </form>

                </div>

            </div>

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->
<?php include('include/footer.php') ?>
<script type="text/javascript">

    $(document).ready(function(){
        $("#setting").validate({
            rules:{

                email:{
                    required:true,
                    email: true
                },
                name:{
                    required:true

                },

                password:"required"
            },

            repassword:{
                required:true,
                equalTo: "#password"
            },
            messages:{

                repassword:{
                    required:"Enter confirm password",
                    equalTo:"Password and Confirm Password must match"
                },

                email:{
                    required:"Enter your email address",
                    email:"Enter valid email address"
                }



            },
            errorClass: "help-inline",
            errorElement: "span",
            highlight:function(element, errorClass, validClass) {
                $(element).parents('.form-group').addClass('has-error');
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).parents('.form-group').removeClass('has-error');
                $(element).parents('.form-group').addClass('has-success');
            }
        });
    });


</script>

</body>

</html>
