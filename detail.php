<?php include('include/header.php') ?>
<?php include('admin/global/db.php'); ?>
<?php
$db = new db();
$msj="";
$record=array();
$results=false;
$table='users';
if(isset($_SESSION['user_id']))
{
    $id=$_SESSION['user_id'];
//update the setting
// select the data form setting table
    $query="select * from $table where id=$id ";
    $results = $db->select($query);
}

//update the user
if(isset($_POST['email']))
{
    $record["email"] = $db->Safe($_POST['email']);
    $record["password"] = $db->Safe($_POST['password']);
    $record["name"] = $db->Safe($_POST['name']);
    $record["phone"] = $db->Safe($_POST['phone']);

    if(!empty($_SESSION['user_id']))
    {
        $where="id=".$_SESSION['user_id'];
        if($db->update($table,$record,$where))
            $msj.="User successfully updated";

        echo "<script>window.top.location='detail.php'</script>";
    }

}
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
                        User Detail
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
                <div class="col-lg-4"></div>
                <div class="col-lg-4">

                    <form role="form" id="setting" action="detail.php" method="post">


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


                        <button type="submit" class="btn btn-info">Update</button>

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
