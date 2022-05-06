<?php 
	// koneksi
	require 'koneksi.php';

	// mengambil data barang berdasarkan ID
	$sql = "SELECT * FROM data_barang WHERE ID = $_GET[update]";
	$query = mysqli_query($sambungan_db, $sql);
	$hasil = mysqli_fetch_assoc($query);

	// edit data
	if ( isset($_POST['edit']) > 0) {
		global $sambungan_db;

		$id = $_GET['update'];
		$nama_barang = htmlspecialchars($_POST['nama_barang']);
		$jenis_barang = htmlspecialchars($_POST['jenis_barang']);
		$jumlah_barang = htmlspecialchars($_POST['jumlah_barang']);
		$tanggal_masuk = htmlspecialchars($_POST['tanggal_masuk']);
		$jam_masuk = htmlspecialchars($_POST['jam_masuk']);

		// menambahkan data baru
		$update = "UPDATE data_barang SET nama_barang = '$nama_barang', jenis_barang = '$jenis_barang', 
		jumlah_barang = '$jumlah_barang', tanggal_masuk = '$tanggal_masuk', jam_masuk = '$jam_masuk'
		WHERE ID = $id";

		// koneksi & query
		$result = mysqli_query($sambungan_db, $update);

		// informasi
		echo "
			<script>
				alert('Data berhasil di edit');
				document.location.href = 'cek_barang.php';
			</script>
		";
	}

?>

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

	</style>
</head>
<body>
	<div class="title mb-3 mt-3">
		<h1 class="text-center display-6">Edit Data Barang</h1>
	</div>
	
	<div class="container-sm p-4">
		<input type="hidden" name="id" value="<?php echo $hasil['ID']; ?>">

		<form method="post">
			<div class="mb-3 input-group-sm">
			  <label for="exampleFormControlInput1" class="form-label">Nama Barang</label>
			  <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Nama Barang" name="nama_barang" 
			  value="<?php echo $hasil['nama_barang']; ?>" autocomplete="off">
			</div>
			<div class="mb-3 input-group-sm">
				<label for="exampleFormControlInput1" class="form-label">Jenis Barang</label>
				<select class="form-select" aria-label="Default select example" name="jenis_barang" 
				value="<?php echo $hasil['jenis_barang']; ?>">
				  <option value="PC Desktop">PC Desktop</option>
				  <option value="Laptop">Laptop</option>
				  <option value="Aksesoris">Aksesoris</option>
				  <option value="Sparepart">Sparepart</option> 
				</select>
			</div>
			<div class="mb-3 input-group-sm">
			  <label for="exampleFormControlInput1" class="form-label">Jumlah Barang</label>
			  <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Jumlah Barang" name="jumlah_barang" 
			  value="<?php echo $hasil['jumlah_barang']; ?>" autocomplete="off">
			</div>
			<div class="mb-3 input-group-sm">
			  <label for="exampleFormControlInput1" class="form-label">Hari & Tanggal Masuk</label>
			  <input type="date" class="form-control" id="exampleFormControlInput1" name="tanggal_masuk" 
			  value="<?php echo $hasil['tanggal_masuk']; ?>">
			</div>
			<div class="mb-3 input-group-sm">
			  <label for="exampleFormControlInput1" class="form-label">Jam Masuk</label>
			  <input type="time" class="form-control" id="exampleFormControlInput1" name="jam_masuk" 
			  value="<?php echo $hasil['jam_masuk']; ?>">
			</div>
			<button type="submit" class="btn btn-primary btn-sm" name="edit" onclick="return confirm('Edit data?')">Edit Data</button>
		</form>
	</div>

	<div class="kembali d-flex justify-content-center">
		<a href="cek_barang.php"><button type="button" class="btn btn-primary mt-3">Kembali</button></a>
	</div>
	<br><br>

	<script type="text/javascript" src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>