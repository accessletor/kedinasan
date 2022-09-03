<?php
session_start();
if (!isset($_SESSION["login"])) {
	header("Location: ../login.php");
	exit;
}
require 'functions.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>File Surat Masuk</title>
	<link rel="stylesheet" href="../css/bootstrap.css">
	<style type="text/css">
		body {
			margin-top: 5px;
			font-size: 12px;
			text-align: center;
		}
		a {
			text-decoration: none;
			color: #3050F3;
		}
		a:hover {
			color: #000F5E;
		} 
	</style>
</head>
<body>
	<?php
	$id    = mysqli_real_escape_string($conn,$_GET['id']);
	$query = mysqli_query($conn,"SELECT * FROM suratm WHERE id='$id' ");
	$data  = mysqli_fetch_array($query);
	?>
	<h1><?= $data['dari'];?></h1>
	<hr>
	<h5> <b>Nomor Surat</b> : <b><?= $data['nosurat'];?></b> | <a href='index.php'> Kembali </a></h5>
	<hr>
	<embed src="disposisi/<?php echo $data['disposisi'];?>" type="application/pdf" width="800" height="600" >
	</body>
	</html>