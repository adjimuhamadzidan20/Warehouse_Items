<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Warehouse Items</title>
	<!-- bootstrap -->
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

	<style>
		.container-sm {
			width: 40%;
			border: 1px solid lightgrey;
		}

		#notif {
			display: none;
		}

	</style>
</head>
<body>
	<div class="title mb-3 mt-3">
		<h1 class="text-center display-6">Penginputan Suplai Barang</h1>
	</div>

	<div class="container-sm p-4">
		<div class="alert alert-primary fade show" role="alert" id="notif">
		  Form tidak boleh ada yang kosong.
		</div>
		<form method="post">
			<div class="mb-3 input-group-sm">
			  <label for="exampleFormControlInput1" class="form-label">Nama Barang</label>
			  <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Nama Barang" name="nama_barang" autocomplete="off">
			</div>
			<div class="mb-3 input-group-sm">
				<label for="exampleFormControlInput1" class="form-label">Jenis Barang</label>
				<select class="form-select" aria-label="Default select example" name="jenis_barang">
				  <option value="PC Desktop">PC Desktop</option>
				  <option value="Laptop">Laptop</option>
				  <option value="Aksesoris">Aksesoris</option>
				  <option value="Sparepart">Sparepart</option> 
				</select>
			</div>
			<div class="mb-3 input-group-sm">
			  <label for="exampleFormControlInput1" class="form-label">Jumlah Barang</label>
			  <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Jumlah Barang" name="jumlah_barang" autocomplete="off">
			</div>
			<div class="mb-3 input-group-sm">
			  <label for="exampleFormControlInput1" class="form-label">Hari & Tanggal Masuk</label>
			  <input type="date" class="form-control" id="exampleFormControlInput1" name="tanggal_masuk" autocomplete="off">
			</div>
			<div class="mb-3 input-group-sm">
			  <label for="exampleFormControlInput1" class="form-label">Jam Masuk</label>
			  <input type="time" class="form-control" id="exampleFormControlInput1" name="jam_masuk">
			</div>
			<button type="submit" class="btn btn-primary btn-sm" name="simpan" id="simpan">Simpan</button>
		</form>
	</div>

	<div class="kembali d-flex justify-content-center">
		<a href="main.php"><button type="button" class="btn btn-primary mt-3">Kembali Ke Menu</button></a>
	</div>
	<br><br>

	<script type="text/javascript" src="bootstrap/js/bootstrap.bundle.min.js"></script>

	<!-- validasi -->
	<script type="text/javascript">
		function validasi1() {
			let notif = document.getElementById('notif');
			notif.style.display = 'block';

			setTimeout(function(event) {
				notif.style.display = 'none';
			}, 1500);

		}

		function validasi2() {
			let notif = document.getElementById('notif');
			notif.style.display = 'block';
			notif.innerHTML = 'Data tersimpan';

			setTimeout(function() {
				notif.style.display = 'none';
			}, 3000);
		}
		
	</script>

</body>
</html>

<?php 
	// koneksi
	require 'koneksi.php';

	if ( isset($_POST['simpan']) > 0) {
		global $sambungan_db;

		$nama_barang = htmlspecialchars($_POST['nama_barang']);
		$jenis_barang = htmlspecialchars($_POST['jenis_barang']);
		$jumlah_barang = htmlspecialchars($_POST['jumlah_barang']);
		$tanggal_masuk = htmlspecialchars($_POST['tanggal_masuk']);
		$jam_masuk = htmlspecialchars($_POST['jam_masuk']);

		// jika kolom form belum terisi
		if (empty($nama_barang) || empty($jenis_barang) || empty($jumlah_barang) || empty($tanggal_masuk) || empty($jam_masuk)) {
			// informasi
			echo "
				<script>
					validasi1();
				</script>
			";
		}

		// jika kolom form suaah terisi
		else if (isset($nama_barang) || isset($jenis_barang) || isset($jumlah_barang) || isset($tanggal_masuk) || isset($jam_masuk)) {
			// menambahkan data baru
			$tambah = "INSERT INTO data_barang VALUES 
			('', '$nama_barang' , '$jenis_barang', '$jumlah_barang', '$tanggal_masuk', '$jam_masuk')";

			// koneksi & query
			mysqli_query($sambungan_db, $tambah);

			// informasi
			echo "
				<script>
					validasi2();
				</script>
			";
		}
	}

?>