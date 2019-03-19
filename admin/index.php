<?php include('include/header.php') ?>
<?php include('global/db.php'); ?>
<?php
$db = new db();
if(isset($_GET['login']))
{
    // remove all session variables
    session_unset();

// destroy the session
    session_destroy();
}

if(isset($_POST['username']))
{

$pass = $_POST['password'];
$user = $_POST['username'];
    $results=$db->login($user,$pass);
if ($results) {
    $_SESSION["login"] = true;
    echo "<script>window.top.location='home.php'</script>";
   // header('Location:home.php');

} else
    {
        $msj="Username or password are incorrect";
    }

}
?>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
              <?php  if(!empty($msj)){ ?>

                <div class="alert alert-success" >
                    <strong> <?php echo $msj; ?></strong>
                </div>

                <?php } ?>
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign In</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" method="post" action="index.php" id="login">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="username" name="username" type="text" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                </div>

                                    <input type="submit" class="btn btn-lg btn-success btn-block" value="Login" />

                                <!-- Change this to a button or input when using this as a form -->

                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include('include/footer.php') ?>
    <script type="text/javascript">

        $(document).ready(function(){
            $("#login").validate({
                rules:{


                    username:{
                        required:true

                    },

                    password:"required"
                },


                messages:{







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
