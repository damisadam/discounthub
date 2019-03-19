<?php if(!isset($_SESSION["login"])){
    echo "<script>window.top.location='index.php'</script>";
} ?></php>
<div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav  " >
                    <li>
                        <a href="home.php"><i class="fa fa-fw fa-dashboard "></i> Dashboard</a>
                    </li>

                    <li>
                        <a href="manage_users.php"><i class="fa fa-user"></i>Active Users</a>
                    </li>
                    <li>
                        <a href="manage_users_in.php"><i class="fa fa-user"></i>Inactive Users</a>
                    </li>

                    <li>
                        <a href="manage_stores.php"><i class="fa fa-user"></i>Active Stores</a>
                    </li>
                    <li>
                        <a href="manage_stores_in.php"><i class="fa fa-user"></i>Inactive Stores</a>
                    </li>
                    <li>
                        <a href="manage_products.php"><i class="fa fa-users"></i>Active Products</a>
                    </li>
                    <li>
                        <a href="manage_products_in.php"><i class="fa fa-users"></i>Inactive products</a>
                    </li>
                    <li>
                        <a href="manage_feedback.php"><i class="fa fa-pencil"></i> Feedback</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse --