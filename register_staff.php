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
                        <h2 class="form-title">Staff sign up</h2>
                        <form method="POST" class="register-form" id="register-form">
                            <div class="form-group">
                                <label for="IC"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="IC" id="IC" placeholder="Your IC"/>
                            </div>
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="pass" id="pass" placeholder="Password"/>
                            </div>
                            <div class="form-group">
                                <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="password" name="re_pass" id="re_pass" placeholder="Repeat your password"/>
                            </div>
                            <div class="form-group">
                                <label for="Name"><i class="zmdi zmdi-my-location"></i></label>
                                <input type="text" name="Name" id="Location" placeholder="Your Name"/>
                            </div>
                            <div class="form-group">
                                <label for="Position"><i class="zmdi zmdi-card"></i></label>
                                <input type="text" name="Position" id="Position" placeholder="Your Position"/>
                            </div>
                            <div class="form-group form-button">
                                <p>Location</p>
                                <!-- <label for="Address">Choose your area:</label> -->
                                <select id="area" name="Address">
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
                                </select></div>
                            <div class="form-group">
                                <label for="tel_numb"><i class="zmdi zmdi-lock"></i></label>
                                <input type="text" name="tel_numb" id="tel_numb" placeholder="Your Telephone Number"/>
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
                echo ' Click <a href="login_staff.php">here</a> to login.';
                        if (isset($_POST["signup"]))
                        {

                                $pbt_ic=$_POST["IC"];
                                $pbt_pass1=$_POST["pass"];
                                $pbt_pass2=$_POST["re_pass"];
                                $pbt_name=$_POST["Name"];
                                $pbt_position=$_POST["Position"];
                                $pbt_address=$_POST["Address"];
                                $pbt_tel=$_POST["tel_numb"];
                                
                            //periksa sama ada pengguna telah wujud
                            $daftarSQL=mysqli_query($con,"SELECT PBT_Ic from pbt where PBT_Ic='$pbt_ic'") or die (mysqli_error($con));   
                            $bil_rekod_daftar=mysqli_num_rows($daftarSQL);

                            
    
                            if ($bil_rekod_daftar==0&&$pbt_pass1==$pbt_pass2)
                            {
                            //secure the password
                            $pwd=md5($pbt_pass1);
                            $sql_stat = "INSERT INTO pbt (PBT_Ic, PBT_Pass, PBT_Name, PBT_Position, PBT_Address, PBT_No) values ('$pbt_ic','$pwd','$pbt_name','$pbt_position','$pbt_address', '$pbt_tel')";
                                
    
                            $result_sql = mysqli_query($con,$sql_stat);
                            //echo $sql_stat;

                            if($result_sql)
                            {
                                echo '<script type="text/javascript">';
                                echo ' alert("Register Success !")';  //not showing an alert box.
                                echo '</script>';
                                

                            }
                            else
                            {
                                mysqli_error($result_sql);
                            }


                            
                           
    
                            //echo '<strong>Status!</strong> New user account created. Click <a href="index.php">here</a> to login';
    
    
                            }
                            else
                            {
                            //sekiranya rekod telah wujud
        
        
                            echo '<strong>Status!</strong> Username already exists. Click <a href="register_staff.php">here</a> to try again.';   
        
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

