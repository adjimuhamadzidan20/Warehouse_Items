<?php  
	// koneksi
	require 'koneksi.php';

	// menampikan semua isi data
	function showData($query) {
		global $sambungan_db;

		$hasil = mysqli_query($sambungan_db, $query);
		$tampung = [];
		while($data = mysqli_fetch_assoc($hasil)) {
			$tampung [] = $data;
		}

		return $tampung;
	}

	// show data
	$sql = showData("SELECT * FROM data_barang");

	// hapus data
	if (isset($_GET['hapus']) > 0) {
		global $sambungan_db;

		$delete = "DELETE FROM data_barang WHERE ID = $_GET[hapus]";

		mysqli_query($sambungan_db, $delete);

		// informasi
		echo "
			<script>
				alert('Data berhasil terhapus');
			</script>
		";

		echo "<meta http-equiv=refresh content=0.3;URL=cek_barang.php>";
	}

	// cari data
	function searchData($data) {
		global $sambungan_db;
		
		$search = "SELECT * FROM data_barang WHERE nama_barang LIKE '%$data%' OR jenis_barang LIKE '%$data%'
		OR jumlah_barang LIKE '%$data%' OR tanggal_masuk LIKE '%$data%' OR jam_masuk LIKE '%$data%'";
		
		return showData($search);
	}

	if (isset($_POST['cari'])) {
		$sql = searchData($_POST['input-cari']);
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

</head>
<body>
	<div class="title mb-4 mt-3">
		<h1 class="text-center display-6">Data Suplai Barang</h1>
	</div>

	<div class="container">
		<!-- kolom search -->
		<div class="search" style="width: 350px;"> 
			<form method="post" class="d-flex mb-3 input-group-sm">
				<input class="form-control me-2" type="text" placeholder="Cari data barang" aria-label="Search" autocomplete="off"
				name="input-cari">
		        <button class="btn btn-primary" type="submit" name="cari">Cari</button>
			</form>
		</div>
		<table class="table">
		  <thead>
		    <tr>
		      <th scope="col">ID</th>
		      <th scope="col">Nama Barang</th>
		      <th scope="col">Jenis Barang</th>
		      <th scope="col">Jumlah Barang</th>
		      <th scope="col">Tanggal Masuk</th>
		      <th scope="col">Jam Masuk</th>
		      <th scope="col" colspan="2" class="text-center">Opsi</th>
		    </tr>
		  </thead>
		  <tbody>
		  	<?php $no = 1; ?>
		  	<?php foreach ($sql as $res) : ?>
			    <tr>
			      <td><?= $no; ?></td>
			      <td><?= $res['nama_barang'];?></td>
			      <td><?= $res['jenis_barang'];?></td>
			      <td><?= $res['jumlah_barang'];?></td>
			      <td><?= $res['tanggal_masuk'];?></td>
			      <td><?= $res['jam_masuk'];?></td>
			      <td class="text-center">
			      	<a href="update.php?update=<?= $res['ID'];?>">
			      		<button type="button" class="btn btn-primary btn-sm">Edit Data</button>
			      	</a>
			      </td>
			      <td class="text-center">
			      	<a href="?hapus=<?= $res['ID'];?>">
			      		<button type="button" class="btn btn-primary btn-sm" onclick="return confirm('Hapus data?');">Hapus Data</button>
			      	</a>
			      </td>
			    </tr>
			    <?php $no++; ?>
			 <?php endforeach; ?>
		  </tbody>
		</table>

		<a href="main.php"><button type="button" class="btn btn-primary mt-3">Kembali Ke Menu</button></a>
	</div>
	<br><br>

	<script type="text/javascript" src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>