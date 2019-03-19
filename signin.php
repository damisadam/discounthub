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
    $email=$db->Safe($_POST['email']);
    $password=$db->Safe($_POST['password']);

    $query="select * from $table where email=$email AND password=$password AND status=1";
    $results = $db->select($query);
    if ($results){
        $_SESSION["user_id"] = $results[0]['id'];
        $_SESSION["name"] = $results[0]['name'];
        $_SESSION["is_login"] = true;
        echo "<script>window.top.location='index.php'</script>";
        // header('Location:home.php');

    } else
    {
        $msj="Username or password is incorrect";
    }
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
                           Sign In
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

                        <form role="form" id="setting" action="signin.php" method="post">


                            <div class="form-group">
                                <label>E-mail</label>
                                <input type="email" id="email" name="email"  class="form-control">

                            </div>

                            <div class="form-group">
                                <label>Password</label>
                                <input id="password" type="password" name="password"  class="form-control">
                            </div>



                            <button type="submit" class="btn btn-info">Login</button>

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


                    password:"required"

                },


                messages:{

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