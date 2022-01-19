<?php
session_start();

//masukkan semua include yang penting disini terutama connection kepada database
include "include/db.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registration form</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="assets/fonts2/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="assets/css2/style.css">
</head>
<body>

    <div class="main">
        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Sign up</h2>
                        <form method="POST" class="register-form" id="register-form">
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="name" id="name" placeholder="Your Name"/>
                            </div>
                            <div class="form-group">
                                <label for="Location"><i class="zmdi zmdi-my-location"></i></label>
                                <input type="text" name="Location" id="Location" placeholder="Your Location"/>
                            </div>
                            <div class="form-group">
                                <label for="IC"><i class="zmdi zmdi-card"></i></label>
                                <input type="number" name="IC" id="IC" placeholder="Your IC Number"/>
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" id="email" placeholder="Your Email"/>
                            </div>
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="pass" id="pass" placeholder="Password"/>
                            </div>
                            <div class="form-group">
                                <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="password" name="re_pass" id="re_pass" placeholder="Repeat your password"/>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signup" id="signup" class="form-submit" value="Register"/>
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="assets/images1/signup-image.jpg" alt="sing up image"></figure>
                    </div>
                </div>
                <?php

                        if (isset($_POST["signup"]))
                        {

                                $name=$_POST["name"];
                                $location=$_POST["Location"];
                                $ic=$_POST["IC"];
                                $email=$_POST["email"];
                                $pass1=$_POST["pass"];
                                $pass2=$_POST["re_pass"];
                                
                            //periksa sama ada pengguna telah wujud
                            $daftarSQL=mysqli_query($con,"SELECT ic from tbl_user where ic='$ic'") or die (mysqli_error($con));   
                            $bil_rekod_daftar=mysqli_num_rows($daftarSQL);

                            
    
                            if ($bil_rekod_daftar==0&&$pass1==$pass2)
                            {
                            //secure the password
                            $pwd=md5($pass1);
                                
                                
    
                            mysqli_query($con,"INSERT INTO tbl_user (name,address,ic,email,pwd) values ('$name','$location','$ic','$email','$pwd')") or die (mysqli_error($con));
                            
                            echo '<script type="text/javascript">';
                            echo ' alert("Register Success !")';  //not showing an alert box.
                            echo '</script>';
                            echo ' Click <a href="login.php">here</a> to login.';
    
                            //echo '<strong>Status!</strong> New user account created. Click <a href="index.php">here</a> to login';
    
    
                            }
                            else
                            {
                            //sekiranya rekod telah wujud
        
        
                            echo '<strong>Status!</strong> Username already exists. Click <a href="register.php">here</a> to try again.';   
        
                            }
                        }
                        
                        ?>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="assets/vendor2/jquery/jquery.min.js"></script>
    <script src="assets/js2/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>

