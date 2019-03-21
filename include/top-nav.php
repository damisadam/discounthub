<!-- Header -->

<header class="header">

    <!-- Top Bar -->

    <div class="top_bar">
        <div class="container">
            <div class="row">
                <div class="col d-flex flex-row">
                    <div class="top_bar_contact_item"><div class="top_bar_icon"><img src="images/phone.png" alt=""></div>+304 5890802</div>
                    <div class="top_bar_contact_item"><div class="top_bar_icon"><img src="images/mail.png" alt=""></div><a href="mailto:test@gmail.com">sabamcs12@gmail.com</a></div>
                    <div class="top_bar_content ml-auto">
                        <div class="top_bar_user">

                        </div>
                        <div class="top_bar_user">
                            <div class="user_icon"><img src="images/user.svg" alt=""></div>
                            <div><a href="register.php">Register</a></div>
                            <?php if (isset($_SESSION["is_login"]) && !$_SESSION["is_login"]){ ?>
                            <div><a href="signin.php">Sign in</a></div> |
                            <?php }else{ ?>
                            <div><a href="signout.php">Sign Out</a> <a href="detail.php">(<?=$_SESSION["name"]?>)</a> </div> |
                            <div><a href="manage_stores.php">Stores</a></div> |
                            <div><a href="manage_products.php">Products</a></div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Header Main -->

    <div class="header_main">
        <div class="container">
            <div class="row">

                <!-- Logo -->
                <div class="col-lg-6 col-sm-12 col-12 order-1">
                    <div class="logo_container">
                        <div class="logo"><a href="index.php">Discount Hub</a></div>
                    </div>
                </div>

                <!-- Search -->
                <div class="col-lg-6 col-12 order-lg-2 order-3 text-lg-left text-right">
                    <div class="header_search">
                        <div class="header_search_content">
                            <div class="header_search_form_container">
                                <form action="shop.php" method="get" class="header_search_form clearfix">
                                    <input type="search" required="required" name="q" value="<?php echo (isset($_GET['q']))?$_GET['q']:'' ?>" class="header_search_input" placeholder="Search for products...">
                                    <button type="submit" class="header_search_button trans_300" value="Submit"><img src="images/search.png" alt=""></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Navigation -->

    <nav class="main_nav">
        <div class="container">
            <div class="row">
                <div class="col">

                    <div class="main_nav_content d-flex flex-row">


                        <div class="main_nav_menu ml-auto">
                            <ul class="standard_dropdown main_nav_dropdown">
                                <li><a href="index.php">Home<i class="fas fa-chevron-down"></i></a></li>
                                <li class="hassubs">
                                    <a href="deals.php">Super Deals</a>
                                </li>
                                <li class="hassubs">
                                    <a href="store.php">Store</i></a>
                                </li>
                                <li class="hassubs">
                                    <a href="shop.php">Shop</i></a>
                                </li>
                                <li><a href="contact.php">Contact<i class="fas fa-chevron-down"></i></a></li>
                            </ul>
                        </div>

                        <!-- Menu Trigger -->

                        <div class="menu_trigger_container ml-auto">
                            <div class="menu_trigger d-flex flex-row">
                                <div class="menu_burger">

                                    <div class=" ">
                                        <ul class="standard_dropdown main_nav_dropdown" style="margin-top: -9px;
    background-color: white;">
                                            <li style="    margin-right: 15px"><a href="index.php">Home<i class="fas fa-chevron-down"></i></a></li>
                                            <li class="hassubs"   style="    margin-right: 15px">
                                                <a href="deals.php">Super Deals</a>
                                            </li>
                                            <li class="hassubs"  style="    margin-right: 15px">
                                                <a href="store.php">Store</i></a>
                                            </li>
                                            <li class="hassubs"  style="    margin-right: 15px">
                                                <a href="shop.php">Shop</i></a>
                                            </li>
                                            <li  style="    margin-right: 15px"><a href="contact.php">Contact<i class="fas fa-chevron-down"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Menu -->


</header>