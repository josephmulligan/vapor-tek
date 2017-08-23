<!--

Navbar

- The navbar will be loaded on most pages and form the main method of user navigation through the site
- this will include the user area, which will be a dropdown menu from the navigation bar
- this page will include the code for separating site functions into groups depending on the type of user that is logged in
- this file finishes with the login and contact modal forms, which both link to other files through the POST method.

-->

<!-- Navigation * * * * * * * * * * * * * * * * * * * * -->
<div class="container">

    <!-- Static navbar -->
    <nav class="navbar navbar-default" id="on-scroll-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <i class="navbar-brand">The Anti-Corrosion Specialists</i>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="index.php">Home</a></li>
                    <li class="dropdown">
                        <a href="products.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Products <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="products.php">All</a></li>
                            <li><a href="steelgard.php">Steelgard</a></li>
                            <li><a href="cablegard.php">Cablegard</a></li>
                            <li><a href="vaporol.php">Vaporol</a></li>
                            <li role="separator" class="divider"></li>
                            <li class="dropdown-header">Product data-sheets</li>
                            <li><a href="data-sheets/Vaportek_steelguard.pdf" target="_blank">Steelgard &#58; Regular</a></li>
                            <li><a href="data-sheets/vaporteksteelguardexport.pdf" target="_blank">Steelgard &#58; Export</a></li>
                            <li><a href="data-sheets/cablegard.pdf" target="_blank">Cablegard</a></li>
                            <li><a href="data-sheets/vaporol.pdf" target="_blank">Vaporol</a></li>
                        </ul>
                    </li>
                    <li><a href="#contact" data-toggle="modal">Contact</a></li>
                    <li><a href="faq.php">FAQ</a></li>
                </ul>
                <!-- Login details -->
                <ul class="nav navbar-nav navbar-right">

                    <?php 
                    if(isset($_COOKIE[$cookie_name])) {
                        //work out number of unread messages
                        include('includes/dbconnect.php');
                        $query = "select * from messages where is_read = '0' and user_to = '$_COOKIE[$cookie_name]';";
                        $result = mysqli_query($conn, $query);
                        $count = mysqli_num_rows($result);

                        /*

               *  BEGIN PERSONAL PAGE CREATION

               *  COMMON ELEMENTS TO APPEAR HERE AND AFTER SWITCH STATEMENT -
               *    initial code (creating the dropdown menu for each user goes here).

              */

                        echo "
                <li class='dropdown'>
                  <a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false'>
                    <span class='caret'></span> ".$_COOKIE[$cookie_name]. "
                  </a>
                  <ul class='dropdown-menu'>";

                        //create strings for each page to put in the user's personal area.
                        $user_search = "<li><a href='user_search.php'>Search Users</a></li>";
                        $create_user = "<li><a href='create.php'>Create User</a></li>";
                        $prod_search = "<li><a href='product_search.php'>Search Products</a></li>";
                        $create_prod = "<li><a href='create_product.php'>Create Product</a></li>";
                        $view_orders = "<li><a href='view_orders.php'>View Orders</a></li>";
                        $view_invoices = "<li><a href='view_invoices.php'>View Invoices</a></li>";
                        //check if user is admin
                        $ad_type = check_admin_status($_COOKIE[$cookie_name]);

                        switch($ad_type) {
                            case 0:
                                //regular user - view personal orders, view invoices, messages, place orders, see products
                                echo $prod_search.$view_orders.$view_invoices;
                                break;
                            case 1:
                                //administrator - access all areas
                                echo $user_search.$create_user.$prod_search.$create_prod.$view_orders.$view_invoices;
                                break;
                            case 2:
                                //account admin - create users, view users
                                echo $user_search.$create_user;
                                break;
                            case 3: 
                                //product manager - confirm dispatch, create product, view orders, alter stock information
                                echo $prod_search.$create_prod.$view_orders.$view_invoices;
                                break;
                        }

                        echo "<li role='separator' class='divider' </li>
                    <li><a href='logout.php'>Logout ".$_COOKIE[$cookie_name]. "</a></li>
                  </ul>
                </li>
                <li><a href='compose.php'><i class='fa fa-pencil fa-lg'></i></a></li>
                <li><a href='view_messages.php'><i class='fa fa-envelope-open fa-lg'></i> $count</a></li>";
                    } else {
                        echo "<li><a href='#login' data-toggle='modal'>Login</a></li>";
                    }

                    /*

               *  END PERSONAL PAGE CREATION

               *  COMMON ELEMENTS WHICH APPEAR AT THE END:
               *    logout
               *    compose messages
               *    view messages
               *    if not logged in, offer login link

              */



                    ?>
                    <li>
                        <a href="#"><i class="fa fa-facebook-official fa-lg"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-twitter fa-lg"></i></a>
                    </li>
                    <!--a href="#"><img src="res/instagram.png" height="40" width="40" class="social-media-icons"></a-->
                </ul>
            </div>
            <!--/.nav-collapse -->
        </div>
        <!--/.container-fluid -->
    </nav>
</div>


<!-- CONTACT MODAL ===================================================================================================================================================== -->

<div class="modal fade" id="contact" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form class="form" action="contact.php" method="POST" onsubmit="return check()">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4>Contact</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="name" class="col-xs-2 control-label">Name</label>
                        <div class="col-xs-10">
                            <input type="text" name="name" id="name" class="form-control" placeholder="Enter your name here..." />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-xs-2 control-label">Email</label>
                        <div class="col-xs-10">
                            <input type="email" name="email" id="email" class="form-control" placeholder="Enter your email address..." />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="message" class="col-xs-2 control-label">Message</label>
                        <div class="col-xs-10">
                            <textarea name="message" id="message" class="form-control" rows="4" maxlength="100" placeholder="Your message.."></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="callback" class="col-xs-2">Request callback</label>
                        <div class="col-xs-2">
                            <input type="checkbox" name="callback" id="callback" value="yes" class="col-xs-10 form-control" />
                        </div>
                    </div>
                    <div class='form-group row' id="add-on" style="display:none;">
                        <label for="number" class="col-xs-2 control-label">Contact No.</label>
                        <div class="col-xs-10">
                            <input type="number" name="number" id="number" class="form-control" placeholder="Please enter a contact number..." />
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary" style='display: block; width: 100%;'>Send</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- LOGIN MODAL ===================================================================================================================================================== -->

<div class="modal fade" id="login" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form class="form-inline" action="login.php" method="POST" onsubmit="return check1()">
                <div class="modal-header row">
                    <div class="col-xs-10">
                        <h4>Login</h4></div>
                    <div class="col-xs-2">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                </div>
                <div class="modal-body container">
                    <div class="form-group row">
                        <label for="name" class="col-xs-2 control-label">User ID</label>
                        <div class="col-xs-8">
                            <input type="text" class="form-control" name="userId" id="userId" placeholder="User ID" maxlength="40" />
                        </div>
                        <div class="col-xs-2"></div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="password" class="col-xs-2 control-label">Password</label>
                    <div class="col-xs-8">
                        <input type="password" class="form-control" name="userPw" id="userPw" placeholder="Your password" />
                    </div>
                    <div class="col-xs-2"></div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Login</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

<script>
    $(document).ready(function () {
        $('input[type="checkbox"]').click(function () {
            if ($(this).attr("value") == "yes") {
                $("#add-on").toggle();
            }
        });
    });

    $(".nav a").on("click", function () {
        $(".nav").find(".active").removeClass("active");
        $(this).parent().addClass("active");
    });
</script>