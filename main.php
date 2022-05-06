<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- bootstrap -->
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<title>Warehouse Items</title>
	<style>
		.container {
			margin-top: 80px;
		}

		.img-thumbnail {
			width: 185px;
			height: 185px;
		}

	</style>
</head>
<body>
	<div class="container">
	  <h1 class="text-center mb-4">Warehouse Items</h1>
	  <div class="row">
	    <div class="col-sm border p-3">
	      <img src="img/input.png" class="img-thumbnail mx-auto d-block border-0" alt="input barang">
	      <div class="input-data d-flex justify-content-center">
	      	<a href="input_barang.php"><button type="button" class="btn btn-primary mt-3">Input Barang</button></a>
	      </div>
	    </div>
	    <div class="col-sm border p-3">
	      <img src="img/form.png" class="img-thumbnail mx-auto d-block border-0" alt="cek barang">
	      <div class="lihat-data d-flex justify-content-center">
	      	<a href="cek_barang.php"><button type="button" class="btn btn-primary mt-3">Cek Barang</button></a>
	      </div>
	    </div>
	  </div>
	</div>

	<script type="text/javascript" src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>