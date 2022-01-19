<?php
session_start();
include "../../include/db.php";


?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Booking services</title>
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
                <a class="navbar-brand" href="user_profile.php">User - Booking Services</a>
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
            <div class="block-header">
            </div>
            <!-- Basic Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Book your bin here !
                                <small>You can use this feature to book a bin from staff</small>
                            </h2>
                        </div>
                        <form method="post">
                        <div class="body table-responsive">
                        <label for="area">Choose your area:</label>
                        <select id="area" name="area">
                        <option value="Kota Bharu">Kota Bharu</option>
                        <option value="Ketereh">Ketereh</option>
                        <option value="Gua Musang">Gua Musang</option>
                        <option value="Pasir Mas">Pasir Mas</option>
                        <option value="Tanah Merah">Tanah Merah</option>
                        <option value="Kuala Krai">Kuala Krai</option>
                        <option value="Pasir Puteh">Pasir Puteh</option>
                        <option value="Machang">Machang</option>
                        <option value="Tumpat">Tumpat</option>
                        <option value="Bachok">Bachok</option>
                        <option value="Jeli">Jeli</option>
                        <option value="Dabong">Dabong</option>
                        </select>
                        <br>
                        <label for="date">Date:</label>
                       <input type="date" name="date" min="<?= date('Y-m-d'); ?>">
                        <br><br>
                        <label for="pbt_address">Your Address:</label>
                        <input type="text" name="pbt_address" style="height: 40px; width:580px; ">
                        <br>
                        <input type="submit" name="submit" value="Book"/></form>
                        
                        </div>
                        
                    </div>
            <!-- Basic Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Trash Collection Function !
                                <small>You can send a request to the staff to booking for the trash collection service</small>
                            </h2>
                        </div>
                        <div class="body table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Booking ID</th>
                                        <th>Booking Date</th>
                                        <th>Booking Location</th>
                                        <th>Booking Address</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <!-- <th scope="row">1</th>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                        <td>@mdo</td> -->

                                        <?php
                                        $id = $_SESSION["userid"];
                                        $display = "SELECT * FROM booking WHERE userid = '$id' ORDER BY booking_id";
                                        $result_display = mysqli_query($con,$display);
                                        $count = 0;

                                        if($result_display)
                                        {
                                            while($row=$result_display->fetch_assoc())
                                            {
                                                echo "<td>" . ++$count . "</td>";
                                                echo "<td>" . $row["booking_id"] . "</td>";
                                                echo "<td>" . $row["booking_date"] . "</td>";
                                                echo "<td>" . $row["booking_location"] . "</td>";
                                                echo "<td>" . $row["booking_address"] . "</td>"; 


                                                if($row["Request"] == "pending")
                                                {
                                                    echo "<td>" . "Pending" . "</td>";

                                                }
                                                else if($row["Request"] == "accepted")
                                                {
                                                    echo "<td>" . "Accepted" . "</td>";

                                                }
                                                else
                                                { ?>
                                                <form method="post" action="bmb_user.php?action=s_req&bid=<?php echo 
                                                $row["booking_id"]; ?>"> 

                                                    <td><input type="submit" value="request"></td>
                                                </form>

                                               <?php }
                                                
                                                  echo "</tr></tbody><br>";
                                            }
                                        }




                                         ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Basic Table -->

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

<?php
    if(isset($_POST["submit"]))
    {
        //echo "<script>alert('button pressed');</script>";
        $area=$_POST["area"];
        $date=$_POST["date"];
        $address = $_POST["pbt_address"];
        $book = rand(1,999);
        $id = $_SESSION["userid"];
        $req = "no";

        // echo "<script>alert('$id');</script>";
        // echo "<script>alert('$area');</script>";
        $sql = "INSERT INTO booking (booking_id, userid, booking_date, booking_location, booking_address, Request) VALUES ('$book','$id', '$date', '$area', '$address', '$req')";
        $result_sql = mysqli_query($con,$sql);

        if($result_sql)
        {
            echo "<script>alert('input success');</script>";
            //echo "<script>alert('$id');</script>";
        }


    }
    if(!empty($_GET["action"]))
    {
        if($_GET["action"] == "s_req") {
           
            $bid = $_GET["bid"];
            
            $req_status = "pending";
            $sql_req = "UPDATE booking SET Request = '$req_status' WHERE booking_id = '$bid'";
            $result_req = mysqli_query($con,$sql_req);

            if($result_req)
            {
                echo "<script>alert('request successfull');</script>";
                //header('location: bmb_user.php');
            }

        }

           
    }
        
        

?>
