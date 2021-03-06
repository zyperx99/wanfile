<?php
session_start();

include "../../include/db.php";


?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Welcome to user dashboard</title>
    <!-- Favicon-->
    <link rel="icon" href="../../favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="../../plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="../../plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="../../plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="../../css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="../../css/themes/all-themes.css" rel="stylesheet" />
</head>

<body class="theme-red">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Search Bar -->
    <div class="search-bar">
        <div class="search-icon">
            <i class="material-icons">search</i>
        </div>
        <input type="text" placeholder="START TYPING...">
        <div class="close-search">
            <i class="material-icons">close</i>
        </div>
    </div>
    <!-- #END# Search Bar -->
    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="user_profile.php">User - Trash Collection Schedule</a>
            </div>
        </div>
    </nav>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="info-container">
                    <?php 
                    $userid = $_SESSION["userid"];
                    $user = "SELECT name, ic FROM tbl_user WHERE userid = $userid";

                    $result_user = mysqli_query($con, $user);
                    $row = mysqli_fetch_array($result_user);


                    ?>
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $row['name'];?></div>
                    <div class="email"><?php echo $row['ic'];?></div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="javascript:void(0);"> <a href="../../logout.php"><i class="material-icons">input</i>Sign Out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">MAIN MENU</li>
                    <li class="active">
                        <a href="user_profile.php">
                            <i class="material-icons">home</i>
                            <span>Home</span>
                        </a>
                    </li> 
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">view_list</i>
                            <span>Features</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="../../pages/tables/bmb_user.php">Trash Collector</a>
                            </li>
                            <li>
                                <a href="../../pages/tables/bs_user.php">Bin Schedule</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">rate_review</i>
                            <span>Reviews</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="../../pages/tables/rmb_user.php">Rate My Bin</a>
                            </li>
                            
                        </ul>
                    </li>
            <!-- #Menu -->
        </aside>
        <!-- #END# Left Sidebar -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <!-- Basic Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Trash Collection Schedule for each area
                                <small>This is daily trash collection from each area</small>
                            </h2>
                        </div>
                        <div class="body table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Area/Day</th>
                                        <th>Sunday</th>
                                        <th>Monday</th>
                                        <th>Tuesday</th>
                                        <th>Wednesday</th>
                                        <th>Thursday</th>
                                        <th>Friday</th>
                                        <th>Saturday</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">Kota Bharu</th>
                                        <td>8.00 a.m</td>
                                        <td>8.00 a.m</td>
                                        <td>8.00 a.m</td>
                                        <td>8.00 a.m</td>
                                        <td>Off day</td>
                                        <td>Off day</td>
                                        <td>Off day</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Ketereh</th>
                                        <td>6.00 a.m</td>
                                        <td>6.00 a.m</td>
                                        <td>6.00 a.m</td>
                                        <td>8.00 a.m</td>
                                        <td>Off day</td>
                                        <td>Off day</td>
                                        <td>Off day</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Gua Musang</th>
                                        <td>Off day</td>
                                        <td>8.00 a.m</td>
                                        <td>8.00 a.m</td>
                                        <td>8.00 a.m</td>
                                        <td>Off day</td>
                                        <td>Off day</td>
                                        <td>8.00 a.m</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Pasir Mas</th>
                                        <td>8.00 a.m</td>
                                        <td>Off Day</td>
                                        <td>8.00 a.m</td>
                                        <td>8.00 a.m</td>
                                        <td>Off day</td>
                                        <td>8.00 a.m</td>
                                        <td>Off day</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Tanah Merah</th>
                                        <td>6.00 p.m</td>
                                        <td>Off Day</td>
                                        <td>6.00 p.m</td>
                                        <td>Off day</td>
                                        <td>8.00 p.m</td>
                                        <td>Off day</td>
                                        <td>8.00 a.m</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Kuala Krai</th>
                                        <td>8.00 a.m</td>
                                        <td>8.00 a.m</td>
                                        <td>8.00 a.m</td>
                                        <td>6.00 a.m</td>
                                        <td>6.00 p.m</td>
                                        <td>Off day</td>
                                        <td>Off day</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Pasir Puteh</th>
                                        <td>8.00 a.m</td>
                                        <td>6.00 p.m</td>
                                        <td>8.00 a.m</td>
                                        <td>6.00 p.m</td>
                                        <td>Off day</td>
                                        <td>Off day</td>
                                        <td>8.00 p.m</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Machang</th>
                                        <td>8.00 a.m</td>
                                        <td>8.00 a.m</td>
                                        <td>Off day</td>
                                        <td>Off day</td>
                                        <td>6.00 p.m</td>
                                        <td>6.00 p.m</td>
                                        <td>8.00 a.m</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Tumpat</th>
                                        <td>8.00 a.m</td>
                                        <td>8.00 a.m</td>
                                        <td>8.00 a.m</td>
                                        <td>6.00 p.m</td>
                                        <td>8.00 a.m</td>
                                        <td>6.00 p.m</td>
                                        <td>8.00 a.m</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Bachok</th>
                                        <td>8.00 a.m</td>
                                        <td>8.00 a.m</td>
                                        <td>Off day</td>
                                        <td>6.00 p.m</td>
                                        <td>8.00 a.m</td>
                                        <td>6.00 p.m</td>
                                        <td>8.00 a.m</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Jeli</th>
                                        <td>8.00 a.m</td>
                                        <td>6.00 p.m</td>
                                        <td>8.00 a.m</td>
                                        <td>6.00 p.m</td>
                                        <td>8.00 a.m</td>
                                        <td>Off day</td>
                                        <td>8.00 a.m</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Dabong</th>
                                        <td>6.00 a.m</td>
                                        <td>6.00 a.m</td>
                                        <td>6.00 a.m</td>
                                        <td>6.00 a.m</td>
                                        <td>6.00 a.m</td>
                                        <td>6.00 a.m</td>
                                        <td>6.00 a.m</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Basic Table -->
        </div>
    </section>

    <!-- Jquery Core Js -->
    <script src="../../plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="../../plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="../../plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="../../plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="../../plugins/node-waves/waves.js"></script>

    <!-- Custom Js -->
    <script src="../../js/admin.js"></script>

    <!-- Demo Js -->
    <script src="../../js/demo.js"></script>
</body>

</html>
