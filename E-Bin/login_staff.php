<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign in</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="assets/fonts1/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="assets/css1/style.css">
</head>
<body>

    <div class="main">


        <!-- Sign in  Form -->
        <section class="sign-in">
            <div class="container">
                <?php
include "include/db.php";

if (isset($_POST["login"]))
{
$ic= $_POST["your_ic"];
$pwd= $_POST["your_pass"];


//periksa sama ada pengguna telah wujud
$pwd=md5($pwd);
$loginSQL=mysqli_query($con,"SELECT PBT_ID,PBT_Ic,PBT_Pass from pbt where PBT_Ic='$ic' and PBT_Pass='$pwd'") or die (mysqli_error($con));  
$bil_rekod_login=mysqli_num_rows($loginSQL);
$papar_rekod_login=mysqli_fetch_array($loginSQL);

    

    if ($bil_rekod_login==0)
    {
    //secure the password
        echo '<script type="text/javascript">';
                            echo ' alert("Wrong username or password !")';  //not showing an alert box.
                            echo '</script>';
    
    
    }
    else
    {
        //sekiranya rekod telah wujud
    session_start();
    $_SESSION["pbt_userid"]=$papar_rekod_login['PBT_ID'];
    
    header ("location: pages/tables/staff_profile.php");    
        
        echo '
                          <strong>Status!</strong> Login accepted. Redirecting....
                        ';
        
        
        
        
    }
    
    
}
?>
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="assets/images/signin-image.jpg" alt="sing up image"></figure>
                    </div>

                    <div class="signin-form">
                        <h2 class="form-title">Staff sign in</h2>
                        <form method="POST" class="register-form" id="login-form">
                            <div class="form-group">
                                <label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="your_ic" id="your_ic" placeholder="Your IC"/>
                            </div>
                            <div class="form-group">
                                <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="your_pass" id="your_pass" placeholder="Password"/>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="remember-me" id="remember-me" class="agree-term" />
                                <label for="remember-me" class="label-agree-term"><span><span></span></span>Remember me</label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="login" id="login" class="form-submit" value="Log in"/>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/js1/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>


