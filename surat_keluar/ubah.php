<?php 
require 'functions.php';
// ambil data di url
$id = $_GET["id"];
// query data
$file = query("SELECT * FROM keluar WHERE id = $id")[0];
if (isset($_POST['submit'])) {
  if (ubah($_POST) > 0) {
    echo "<script>
    alert('berhasil mengubah Data');
    document.location.href = 'index.php';
    </script>";
  }else {
    echo "<script>
    alert('gagal mengubah Data');
    document.location.href = 'index.php';
    </script>";
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ubah Data Surat Keluar</title>
  <link rel="stylesheet" href="../css/bootstrap.css">
</head>
<body>
  <h1 class="text-center">Ubah Data</h1>
  <form action="" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $file['id']; ?>">
    <input type="hidden" name="fileLama"  value="<?= $file['file']; ?>">
    <div class="mb-3">
      <label for="arsip" class="form-label">Arsip</label>
      <input type="text" class="form-control" id="arsip" aria-describedby="emailHelp" name="arsip" value="<?= $file['arsip']; ?>">
    </div>
    <div class="mb-3">
      <label for="tanggal" class="form-label">Tanggal</label>
      <input type="date" class="form-control" id="tanggal" name="tgl" value="<?= $file['tgl']; ?>">
    </div>
    <div class="mb-3">
      <label for="nomor" class="col-form-label">Nomor Surat</label>
      <input type="text" class="form-control" id="nomor" name="nosurat" value="<?= $file['nosurat'] ?>">
    </div>
    <div class="mb-3">
      <label for="asal" class="col-form-label">Asal Surat</label>
      <input type="text" class="form-control" id="asal" name="dari" required="harus di isi" value="<?= $file['dari'] ?>">
    </div>
    <div class="d-grid gap-2 col-12 mx-auto">
      <button class="btn btn-primary" type="submit" name="submit">Button</button>
    </div>
  </form>
</body>
</html>