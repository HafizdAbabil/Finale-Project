<?php 

	session_start();

	include 'koneksi.php';
	 
	$Username 	= $_POST['Username'];
	$Password 	= $_POST['Password'];
	 
	$login = mysqli_query($koneksi,"SELECT * FROM tb_login WHERE Username = '$Username' AND Password = '$Password'");

	$cek = mysqli_num_rows($login);

	if($cek > 0){
		$data = mysqli_fetch_assoc($login);

		if($data['Jabatan']=="Stockist"){
			$_SESSION['Username'] =  $Username;
			$_SESSION['Jabatan'] = "Stockist";
			echo "
				<script>
					alert('Login Berhasil !!! Anda adalah Stockist');
					document.location.href = './beranda_Stockist.php';
				</script>
			";
			
		}else if($data['Jabatan']=="Stockist_Regional"){
			$_SESSION['Username'] = $Username;
			$_SESSION['Jabatan'] = "Stockist_Regional";
			echo "
				<script>
					alert('Login Berhasil !!! Anda adalah Stockist_Regional');
					document.location.href = './StockistRegional.php';
				</script>
			";

		}else{
			echo "
				<script>
					alert('Login Tidak Berhasil !!!');
					document.location.href = 'index.php';
				</script>
			";
		}	
	}else{
		echo "
			<script>
				alert('Login Tidak Berhasil !!!');
				document.location.href = 'index.php';
			</script>
		";
	}

?>