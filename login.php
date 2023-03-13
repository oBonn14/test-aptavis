<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>.:: Login App SPP::.</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
	<meta name="description" content="Admin, Dashboard, Bootstrap" />
	<link rel="shortcut icon" sizes="196x196" href="len.png">
	
	<link rel="stylesheet" href="libs/bower/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="libs/bower/material-design-iconic-font/dist/css/material-design-iconic-font.min.css">
	<link rel="stylesheet" href="libs/bower/animate.css/animate.min.css">
	<link rel="stylesheet" href="assets/css/bootstrap.css">
	<link rel="stylesheet" href="assets/css/core.css">
	<link rel="stylesheet" href="assets/css/misc-pages.css">
	<link rel="stylesheet" href="assets/css/fonts.css">
</head>
<body class="simple-page">
	
	<div class="simple-page-wrap">
		<div class="simple-page-logo animated swing">
			<a href="?hal=main">
				<span><i class="fa fa-graduation-cap"></i></span>
				<span>SI SPP</span>
			</a>
		</div><!-- logo -->
		<div class="simple-page-form animated flipInY" id="login-form">
        <img src = "len.png" height="30px" width="50px" style="display: block; margin: auto;">
			<h4 class="form-title m-b-xl text-center">login aplikasi  </h4>
			<form action="" method="post">
				<div class="form-group">
					<input id="username" type="text" class="form-control" placeholder="Username" name="un" required="" autofocus="">
				</div>

				<div class="form-group">
					<input id="password" type="password" class="form-control" placeholder="Password" name="pwd" required="">
				</div>

				<input type="submit" class="btn btn-danger" name="login" value="Login">
			</form>

			<?php
			
				if (isset($_POST['login'])) 
				{
					$un = mysqli_real_escape_string($kon, $_POST['un']);
					$ps = mysqli_real_escape_string($kon, $_POST['pwd']);

					$sql = "SELECT * FROM `petugas` WHERE `username` = '$un' AND `password` = MD5('$ps') AND `status` = '1'";
					$que = mysqli_query($kon, $sql);
					$cek = mysqli_num_rows($que);
					//echo $cek;
					if ($cek == 1) 
					{
						
						$data = mysqli_fetch_array($que);
						$_SESSION['uname'] = $data['username'];
						$_SESSION['id'] = $data['id_petugas'];
						$_SESSION['nama'] = $data['nm_petugas'];
						$_SESSION['level'] = $data['level'];
						
						echo '<center><blockquote>
								<p style="color : green;"><b>Login Berhasil</b>, Segera Reload Halaman.</p>
							</blockquote></center>';	
						echo "<script>window.location = '?hal=main';</script>";
					}/*else
					{
						$sql2 = "SELECT * FROM `siswa` WHERE `nisn` = '$un' AND `password` = MD5('$ps') AND `status` = '1'";
						$que2 = mysqli_query($kon, $sql2);
						$cek2 = mysqli_num_rows($que2);
						if ($cek2 == 1) 
						{
							$data = mysqli_fetch_array($que2);
						$_SESSION['uname'] = $data['nisn'];
						$_SESSION['id'] = $data['id_siswa'];
						$_SESSION['nama'] = $data['nama_siswa'];
			
							echo '<center><blockquote>
									<p style="color : green;"><b>Login Berhasil</b>, Segera Reload Halaman.</p>
								</blockquote></center>';	
					  		echo "<script>window.location = '?hal=main';</script>";
						}*/
						else
						{
							echo '<center><blockquote>
								<p style="color : red;">Maaf, Ada Kesalahan.</p>
							</blockquote></center>';
						}				
					//}
				}	
			?>
		</div><!-- #login-form -->
	</div><!-- .simple-page-wrap -->
</body>
</html>