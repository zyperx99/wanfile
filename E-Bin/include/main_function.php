<?php

function daftar ($name,$address,$ic,$email,$pwd,$pwd2,$con)
{
//check data pengguna telah wujud
$daftarSQL=mysqli_query($con,"SELECT ic from tbl_user where ic='$ic'") or die (myqsli_error($con));
$bil_rekod_daftar=mysqli_num_rows($daftarSQL);

	if ($pwd<>$pwd2)
		echo '<strong>Status!</strong> Password did not match. Click <a href="register.php">here</a> to try gain.';

	elseif ($bil_rekod_daftar==0) 
	{
		//password security
		$pwd=md5 ($pwd);

		mysqli_query($con,"INSERT INTO tbl_user (name,address,ic,email,pwd) values('$name','$address','$ic','$email','$password') ") or die (mysqli_error($con));

		echo '<strong>Status!</strong> New user account created. Click <"a href=login.php">here</a> to login';
	}
}


?>