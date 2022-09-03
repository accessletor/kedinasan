<?php 
session_start();
if (!isset($_SESSION["login"])) {
	header("Location: login.php");
	exit;
}
require 'functionL.php';
// Keluar
$get1 = mysqli_query($conn, "SELECT * from keluar");
$keluar = mysqli_num_rows($get1);
// surat_masuk
$get2 = mysqli_query($conn, "SELECT * from suratm");
$suratm = mysqli_num_rows($get2);
// Undangan
$get3 = mysqli_query($conn, "SELECT * from undangan");
$undangan = mysqli_num_rows($get3);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Input Surat PSDA</title>
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
		<div class="container">
			<a class="navbar-brand" href="">PSDA (UMUM)</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNav">
				<ul class="navbar-nav ms-auto">
					<li class="nav-item dropdown active">
						<a class="nav-link dropdown-toggle active" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16">
								<path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555ZM0 4.697v7.104l5.803-3.558L0 4.697ZM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757Zm3.436-.586L16 11.801V4.697l-5.803 3.546Z"/>
							</svg> Surat Masuk
						</a>
						<ul class="dropdown-menu">
							<li><a class="dropdown-item" href="surat_masuk/index.php">Input Surat Masuk</a></li>
							<li><hr class="dropdown-divider"></li>
							<li><a class="dropdown-item" href="surat_masuk/disposisi.php">Disposisi Surat Masuk</a></li>
						</ul>
					</li>
					<li class="nav-item">
						<a class="nav-link active" aria-current="page" href="surat_undangan/index.php"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16">
							<path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555ZM0 4.697v7.104l5.803-3.558L0 4.697ZM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757Zm3.436-.586L16 11.801V4.697l-5.803 3.546Z"/>
						</svg> Surat Undangan</a>
					</li>
					<li class="nav-item">
						<a class="nav-link active" aria-current="page" href="surat_keluar/index.php"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16">
							<path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555ZM0 4.697v7.104l5.803-3.558L0 4.697ZM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757Zm3.436-.586L16 11.801V4.697l-5.803 3.546Z"/>
						</svg> Surat Keluar</a>
					</li>
					<li class="nav-item">
						<a href="logout.php"><button type="button" class="btn btn-danger">Logout</button></a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<br>
	<main>
		<!-- mainan -->
		<div class="container">
			<div class="row">
				<div class="col-sm-4"><div class="card mb-auto">
					<img src="img/logo.jpg" class="card-img-top" alt="psda">
					<div class="card-body">
						<h5 class="card-title">UPTD PSDA</h5>
						<p class="card-text">Kantor Balai Pengelolaan Sumber Daya Air Wilayah Sungai Cimanuk-Cisanggarung</p>
						<br>
						<footer class="blockquote-footer">Kepongpongan, Kec. Talun, Kabupaten Cirebon, <cite title="Source Title">Jawa Barat 45171</cite></footer>
					</div>
				</div></div>
				<div class="col-sm-8">
					<h3><u>Surat Menyurat</u></h3>
					<div class="row">
						<div class="col-md-6">
							<div class="card border-info mb-3">
								<div class="card-header">Surat Masuk</div>
								<div class="card-body text-dark mb-3 pt-4 pb-4">
									<p class="card-text fs-1 text-info"><i class="bi bi-award-fill"></i><?=$suratm; ?> Data</p>
								</div>
							</div>
							<div class="card border-info">
								<div class="card-header">Undangan</div>
								<div class="card-body text-dark mb-3 pt-4 pb-4">
									<p class="card-text fs-1 text-info"><i class="bi bi-clipboard2-data"></i></i><?=$undangan; ?> Data</p>
								</div>
							</div>

						</div>
						<div class="col-md-6">
							<div class="card border-info mb-3">
								<div class="card-header">Surat Keluar</div>
								<div class="card-body text-dark mb-3 pt-4 pb-4">
									<p class="card-text fs-1 text-info"><i class="bi bi-file-earmark-x-fill"></i><?=$keluar; ?> Data</p>
								</div>
							</div>
							<div class="card border-info">
								<div class="card-header">Total Data</div>
								<div class="card-body text-dark mb-3 pt-4 pb-4">
									<p class="card-text fs-1 text-info"><i class="bi bi-file-earmark-x-fill"></i><?=$keluar+$suratm+$undangan; ?> Data</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>
	<!--modal tambah  -->
	<!-- modal ubah -->
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>