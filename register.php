<?php include('include/header.php') ?>
<?php include('admin/global/db.php'); ?>
<?php
$db = new db();
$msj="";
$record=array();
$table='users';

//update the user
if(isset($_POST['email']) && $_POST['password'])
{
    $record["email"] = $db->Safe($_POST['email']);
    $record["status"] = $db->Safe(1);
    $record["password"] = $db->Safe($_POST['password']);
    $record["name"] = $db->Safe($_POST['name']);
    $record["phone"] = $db->Safe($_POST['phone']);

    if($db->insert($table,$record))
        $msj.= "User successfully register.Please login now";

}
?>

<body>


<div class="super_container">

    <?php include('include/top-nav.php') ?>

    <div id="wrapper">


        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-4"></div>
                    <div class="col-lg-4">
                        <h1 class="page-header -align-center">
                           SignUp
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

                        <form role="form" id="setting" action="register.php" method="post">


                            <div class="form-group">
                                <label>Name</label>
                                <input id="name"  name="name" type="text" class="form-control">

                            </div>
                            <div class="form-group">
                                <label>E-mail</label>
                                <input type="email" id="email" name="email"  class="form-control">

                            </div>

                            <div class="form-group">
                                <label>Phone</label>
                                <input id="phone" name="phone"  class="form-control">

                            </div>

                            <div class="form-group">
                                <label>Password</label>
                                <input id="password" type="password" name="password"  class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Re-Password</label>
                                <input id="repassword" name="repassword" type="password"   class="form-control">

                            </div>


                            <button type="submit" class="btn btn-info">Register</button>

                        </form>

                    </div>

                </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- jQuery Version 1.11.0 -->
    <script src="admin/js/jquery-1.11.0.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="admin/js/bootstrap.min.js"></script>
    <script src="admin/js/jquery.validate.min.js"></script>
    <!-- /#wrapper -->
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

                    password:"required",
                    repassword:{
                        required:true,
                        equalTo: "#password"
                    }
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