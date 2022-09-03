<?php 
session_start();
if (!isset($_SESSION["login"])) {
	header("Location: ../login.php");
	exit;
}
require 'functions.php';
$surat = query("SELECT * FROM suratm");

date_default_timezone_set("Asia/jakarta");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Disposisi Surat Masuk</title>
	<link rel="stylesheet" href="../css/bootstrap.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
	<link rel="stylesheet" href="../css/style.css">
	<style>
		table {
			margin: auto;
			font-size: 16px;
		}
		h3 {
			text-align: center;
		}
		table span {
			word-spacing: 20px;
		}
		.kurang {
			word-spacing: 55px;
		}
		.dikit {
			word-spacing: 25px;
		}
		.setengah {
			word-spacing: 37px;
		}
		.bi-printer-fill {
			font-size: 40px;
			cursor: pointer;
			color: #0581ed;
		}
		@media print {
			.filter, .navbar{
				display: none;
			} 
			/*@page {
				size: auto;
				margin: 0;
				}*/
				a[href]:after {
					content: none !important;
				}
				@page {
					margin-top: .1px;
					margin-bottom: .1px;
				}
			}
		</style>
	</head>
	<body id="body">
		<nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
			<div class="container">
				<a class="navbar-brand" href="../index.php">PSDA (UMUM)</a>
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
								<li><a class="dropdown-item" href="index.php">Input Surat Masuk</a></li>
								<li><hr class="dropdown-divider"></li>
								<li><a class="dropdown-item" href="">Disposisi Surat Masuk</a></li>
							</ul>
						</li>
						<li class="nav-item">
							<a class="nav-link active" aria-current="page" href="../surat_undangan/index.php"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16">
								<path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555ZM0 4.697v7.104l5.803-3.558L0 4.697ZM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757Zm3.436-.586L16 11.801V4.697l-5.803 3.546Z"/>
							</svg> Surat Undangan</a>
						</li>
						<li class="nav-item">
							<a class="nav-link active" aria-current="page" href="../surat_keluar/index.php"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16">
								<path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555ZM0 4.697v7.104l5.803-3.558L0 4.697ZM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757Zm3.436-.586L16 11.801V4.697l-5.803 3.546Z"/>
							</svg> Surat Keluar</a>
						</li>
						<li class="nav-item">
							<a href="../logout.php"><button type="button" class="btn btn-danger">Logout</button></a>
						</li>
					</ul>
				</div>
			</div>
		</nav>
		<br>
		<h4 class="text-center">Disposisi Surat Masuk</h4>
		<br>
		<form method="post" class="filter">
			<table>
				<tr>
					<td>Dari Tanggal</td>
					<td><input type="date" name="dari_tgl"></td>
					<td>Sampai Tanggal</td>
					<td><input type="date" name="sampai_tgl"></td>
					<td><input type="submit" class="btn btn-primary" name="filter" value="filter"></td>
					<td>&nbsp;&nbsp;<i class="bi bi-printer-fill" id="print"></i></td>
				</tr>
			</table>
		</form>
		<br>
		<table class="table-bordered" cellpadding="10">
			<tr class="text-center">
				<th>NO</th>
				<th>TGL.DITERIMA SURAT</th>
				<th>JENIS SURAT</th>
				<th>SIFAT SURAT</th>
				<th>ASAL SURAT</th>
				<th>ARSIP SURAT</th>
				<th>DISPOSISI SURAT</th>
				<th>KET</th>
			</tr>
			<?php $i = 1;
			if (isset($_POST['filter'])) {
				$dari_tgl = mysqli_real_escape_string($conn, $_POST['dari_tgl']);
				$sampai_tgl = mysqli_real_escape_string($conn, $_POST['sampai_tgl']);
				$surat = query("SELECT * FROM suratm WHERE tgl BETWEEN '$dari_tgl' AND '$sampai_tgl' ");
			}else {
				$surat = query("SELECT * FROM suratm");
			} 

			?>
			<?php foreach ($surat as $row) : ?>
				<tr>
					<td><?php echo $i; ?></td>
					<td><?= date('Y-m-d', strtotime($row['tgl'])); ?></td>
					<td><?= $row['jenis']; ?></td>
					<td><?= $row['sifat']; ?></td>
					<td>
						<p><span>Instansi :</span> <?= $row['dari']; ?></p>
						<p><span class="kurang">no :</span> <?= $row['nosurat']; ?></p>
						<p><span class="kurang">tgl :</span> <?= date('Y-m-d', strtotime($row['tglsurat'])); ?></p>
						<p><span class="dikit">perihal :</span> <?= $row['hal']; ?></p>
					</td>
					<td>
						<p><span>tgl :</span> <?= date('Y-m-d', strtotime($row['tgl'])); ?></p>
						<p><span>no :</span> <?= $row['arsip']; ?></p>
					</td>
					<td>
						<p><span>kasie :</span> <?= $row['kasie']; ?></p>
						<p><span class="setengah">tgl :</span> <?= date('Y-m-d', strtotime($row['tgl'])); ?></p>
						<p><span class="setengah">no :</span> <?= $row['nodisposisi']; ?></p>
					</td>
					<td>
						<p><?= $row['ket']; ?></p>
					</td>
				</tr>
				<?php $i++; ?>
			<?php endforeach; ?>
		</table>

		<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
		<script>
			const print = document.getElementById('print');
			print.addEventListener('click',function () {
				window.print();
			});
		</script>
	</body>
	</html>