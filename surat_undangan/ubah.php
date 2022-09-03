<?php 
require 'functions.php';
// ambil data di url
$id = $_GET["id"];
// query data
$file = query("SELECT * FROM undangan WHERE id = $id")[0];
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
    <input type="hidden" name="fileLama"  value="<?= $file['surat']; ?>">
    <div class="mb-3">
      <label for="arsip" class="form-label">Arsip</label>
      <input type="text" class="form-control" id="arsip" aria-describedby="emailHelp" name="arsip" value="<?= $file['arsip']; ?>">
    </div>
    <div class="mb-3">
      <label for="tanggal" class="form-label">Tanggal</label>
      <input type="date" class="form-control" id="tanggal" name="tgl" value="<?= $file['tgl']; ?>">
    </div>
    <div class="mb-3">
      <label for="hari" class="col-form-label">Hari/Tanggal</label>
      <input type="text" class="form-control" id="hari" name="hari" value="<?= $file['hari']; ?>">
    </div>
    <div class="mb-3">
      <label for="no" class="col-form-label">Nomor Surat</label>
      <input type="text" class="form-control" id="no" name="no" value="<?= $file['no']; ?>">
    </div>    
    <div class="mb-3">
      <label for="asal" class="col-form-label">Asal Surat</label>
      <input type="text" class="form-control" id="asal" name="dari" required="harus di isi" value="<?= $file['dari'] ?>">
    </div>
    <div class="mb-3">
      <label for="jadwal" class="col-form-label">Waktu</label>
      <input type="text" class="form-control" id="jadwal" name="jadwal" value="<?= $file['jadwal'] ?>">
    </div>
    <div class="mb-3">
      <label for="tempat" class="col-form-label">Tempat</label>
      <input type="text" class="form-control" id="tempat" name="tempat" value="<?= $file['tempat'] ?>" required="harus di isi">
    </div>
    <div class="mb-3">
      <label for="perihal" class="col-form-label">Perihal</label>
      <input type="text" class="form-control" id="perihal" name="perihal" value="<?= $file['perihal'] ?>">
    </div>
    <div class="mb-3">
      <label for="filefile" class="form-label">Berkas</label>
      <a href="suratm.php?id=<?php echo $file['id'];?>"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-up-right" viewBox="0 0 16 16">
        <path fill-rule="evenodd" d="M8.636 3.5a.5.5 0 0 0-.5-.5H1.5A1.5 1.5 0 0 0 0 4.5v10A1.5 1.5 0 0 0 1.5 16h10a1.5 1.5 0 0 0 1.5-1.5V7.864a.5.5 0 0 0-1 0V14.5a.5.5 0 0 1-.5.5h-10a.5.5 0 0 1-.5-.5v-10a.5.5 0 0 1 .5-.5h6.636a.5.5 0 0 0 .5-.5z"/>
        <path fill-rule="evenodd" d="M16 .5a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0 0 1h3.793L6.146 9.146a.5.5 0 1 0 .708.708L15 1.707V5.5a.5.5 0 0 0 1 0v-5z"/>
      </svg></a>
      <input type="file" class="form-control" id="filefile" name="surat">
    </div>
    <div class="d-grid gap-2 col-12 mx-auto">
      <button class="btn btn-primary" type="submit" name="submit">Button</button>
    </div>
  </form>
</body>
</html>