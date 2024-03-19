<?php

	include "koneksi.php";

	if (isset($_POST["submit"])) {
		if (simpan ($_POST) > 0){
			echo "
				<script>
					alert('Login Berhasil !!!');
					document.location.href = 'login.php';
				</script>
			";
		} else {
			echo "
				<script>
					alert('Login Gagal !!!');
					document.location.href = 'login.php';
				</script>
			";
		}
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
	<link rel="stylesheet" type="text/css" href="css/stylelogin.css">
</head>
<body>
	<div class="container">
		<form action="aksi.php" method="POST">
			<table>
				<tr>
					<th class="judul2">Silahkan Login</th>
				</tr>
				<tr>
					<td class="textuser">Username</td>
				</tr>
				<tr>
					<td>
						<input style="text-align:center" type="text" name="Username" class="inputanusername"required="">
					</td>
				</tr>
				<tr>
					<td class="textpass">Password</td>
				</tr>
				<tr>
					<td>
						<input style="text-align:center"  type="text" name="Password" class="inputanpassword"required="">
					</td>
				</tr>
				<tr>
					<td class="textjabatan">Pilih Jabatan</td>
				</tr>
				<tr>
					<td>
						<select style="text-align:center"  name="Jabatan" class="selectjabatan"  required="">
							<option></option>
							<option value="Stockist">Stockist</option>
							<option value="Stockist_Regional">Stockist Regional</option>
						</select>
					</td>
				</tr>
					<td>
						<input type="submit" name="submit" class="loginbutton" value="Login">
					</td>
				</tr>		
			</table>
		</form>
	</div>
</body>
</html>