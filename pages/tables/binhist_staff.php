<?php
session_start();

include "../../include/db.php";


?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Bin Approval History</title>
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
                <a class="navbar-brand" href="../../index.php">Staff - Bin Approval History</a>
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
                    $pbtid = $_SESSION["pbt_userid"];
                    $pbt = "SELECT PBT_Name, PBT_Ic FROM pbt WHERE PBT_ID = $pbtid";

                    $result_pbt = mysqli_query($con, $pbt);
                    $row = mysqli_fetch_array($result_pbt);


                    ?>
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $row['PBT_Name'];?></div>
                    <div class="email"><?php echo $row['PBT_Ic'];?></div>
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
                        <a href="staff_profile.php">
                            <i class="material-icons">home</i>
                            <span>Home</span>
                        </a>
                    </li> 
                    <li class="active">
                        <a href="bookview_staff.php">
                            <i class="material-icons">assignment_turned_in</i>
                            <span>Bin booking view</span>
                        </a>
                    </li>
                    <li class="active">
                        <a href="binapp_staff.php">
                            <i class="material-icons">assignment_turned_in</i>
                            <span>Bin request approval</span>
                        </a>
                    </li>
                    <li class="active">
                        <a href="binhist_staff.php">
                            <i class="material-icons">assignment_turned_in</i>
                            <span>Bin approval history</span>
                        </a>
                    </li>
                   <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">insert_chart</i>
                            <span>Reports</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="graph_staff.php">Service rate graph</a>
                            </li>
                            <li>
                                <a href="graph2_staff.php">Bin rate graph</a>
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
                                Bin approval list
                                <small>This list show all the records that had been already approved by the staff</small>
                            </h2>
                        </div>
                        <div class="body table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Customer Name</th>
                                        <th>Booking Date</th>
                                        <th>Area</th>
                                        <th>Address</th>
                                        <th>Trash Collector Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <!-- <th scope="row">1</th>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                        <td>@mdo</td> -->
                                        <?php
                                        $pbtid = $_SESSION["pbt_userid"];
                                        $i = 0;

                                         $bookingid = array();
                                         $servicesdate = array();

                                         $history_service = "SELECT services_date, booking_id FROM service";
                                         $result_history_service = mysqli_query($con, $history_service);
                                         
                                             if($result_history_service)
                                             {
                                                while($row = mysqli_fetch_array($result_history_service))
                                                {
                                                    $bookingid[] = $row["booking_id"];
                                                    $servicesdate[] = $row["services_date"];
                                                    // echo "<td>" . $row["booking_id"] . "</td>";
                                                    // echo "<td>" . $row["services_date"] . "</td>";
                                                    // echo "</tr></tbody><br>";
                                                    $i++;
                                                }
                                            }

                                            // for($j = 0; $j < $i; $j++)
                                            // {
                                            //     echo "<script>alert('$bookingid[$j]')</script>";

                                            // }

                                            $ids = implode(',', $bookingid); //WHERE name = 'safwan' AND name = 'mohd' AND name = 'kucing'
                                                                                //WHERE name IN ('safwan','mohd','kucing')

                                            $location = $_SESSION["location"];


                                        $count = 0;

                                        $history = "SELECT booking_date, booking_location, booking_address,booking_id, name FROM booking INNER JOIN tbl_user ON booking.userid = tbl_user.userid WHERE booking_id IN ($ids) AND booking_location = '$location'";

                                        $result_history = mysqli_query($con, $history);
                                        $i = 0;


                                        if($result_history)
                                        {
                                            while($row = mysqli_fetch_array($result_history))
                                            {
                                                
                                                // if($bookingid[$i] == $row["booking_id"]) 
                                                // {
                                                    echo "<td>" . ++$count . "</td>";
                                                    echo "<td>" . $row["name"] . "</td>";
                                                    echo "<td>" . $row["booking_date"] . "</td>";
                                                    echo "<td>" . $row["booking_location"] . "</td>";
                                                    echo "<td>" . $row["booking_address"] . "</td>";
                                                //     // echo "<td>" . $bookingid[$i] . "</td>";
                                                    echo "<td>" . $servicesdate[$i] . "</td>";
                                                    echo "</tr></tbody><br>";
                                                 
                                                // }

                                    
                                             }
                                              //echo $history;

                                        }

                                        else
                                        {
                                            mysqli_error($result_history);
                                            echo $history;
                                        }
                                        ?>
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
<?php

if(!empty($_GET["action"]))
{
    switch($_GET["action"]) {
    case "accept":
        $bid = $_GET["bid"];
        echo "<script>alert('$bid');</script>";
        $d = time();
        $date = date("Y-m-d",$d);
        
        $req_status = "accepted";
        $sql_req = "UPDATE booking SET Request = '$req_status' WHERE booking_id = '$bid'";
        $result_req = mysqli_query($con,$sql_req);

        if($result_req)
        {
            //echo "<script>alert('request successfull');</script>";
            //header('location: bin');


            $insert_service = "INSERT INTO service (booking_id, services_date) VALUES ('$bid', '$date')";
            $result_insert_service = mysqli_query($con, $insert_service);

            if($result_insert_service)
            {
                echo "<script>alert('Request accepted');</script>";
            }
            else
            {
                mysqli_error($result_insert_service);
                echo $insert_service;
            }
        }
        break;
    
   
    }
}

 // if ($_GET["action"] == "accept") {
       
 //        $bid = $_GET["bid"];
        
 //        $req_status = "accepted";
 //        $sql_req = "UPDATE booking SET Request = '$req_status' WHERE booking_id = '$bid'";
 //        $result_req = mysqli_query($con,$sql_req);

 //        if($result_req)
 //        {
 //            echo "<script>alert('request successfull');</script>";
 //            //header('location: bin');
 //        }

           
 //    } 


?>