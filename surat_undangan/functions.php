<?php 
$conn = mysqli_connect("localhost", "root", "", "psda");
function query($query){
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while ($row = mysqli_fetch_assoc($result)) {
		$rows[] = $row;
	}
	return $rows;
}

// tambah
function tambah($data){
	global $conn;
	$arsip =htmlspecialchars($data['arsip']);
	$tgl = htmlspecialchars($data['tgl']);
	$hari = htmlspecialchars($data['hari']);
	$no = htmlspecialchars($data['no']);
	$dari = htmlspecialchars($data['dari']);
	$jadwal = htmlspecialchars($data['jadwal']);
	$tempat = htmlspecialchars($data['tempat']);
	$perihal = htmlspecialchars($data['perihal']);

	// $message = htmlspecialchars($data['file']);
	// upload
	$message = upload();
	if (!$message) {
		return false;
	}

	$query = "INSERT INTO undangan VALUES ('','$arsip','$tgl','$hari','$no','$dari','$jadwal','$tempat','$perihal','$message')";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}
function upload(){
	$namaFile = $_FILES['surat']['name'];
	$ukuranFile = $_FILES['surat']['size'];
	$error = $_FILES['surat']['error'];
	$tmpName = $_FILES['surat']['tmp_name'];
	// cek apakah tidak ada file yang diupload
	// if ($error === 4) {
	// 	echo "<script>
	// 	alert('upload file terlebih dahulu');
	// 	</script>";
	// 	return false;
	// }
	// cek file apakah data file atau bukan
	$ekstensiFileValid = ['pdf','docx','doc','xls','xlsx','xlsb','xlsm','csv','jpg','jpeg','png'];
	$ekstensiFile = explode('.', $namaFile);
	$ekstensiFile = strtolower(end($ekstensiFile));
	if (!in_array($ekstensiFile, $ekstensiFileValid)) {
		echo "<script>
		alert('file tidak diizinkan atau kosong');
		</script>";
	}
	if ($ukuranFile > 1000000000) {
		echo "<script>
		alert('file terlalu besar');
		</script>";
	}
	// generate nama file baru
	$namaFileBaru = uniqid();
	$namaFileBaru .= '.';
	$namaFileBaru .= $ekstensiFile;
	// lolos pengecekan
	move_uploaded_file($tmpName, 'file/' . $namaFileBaru);
	return $namaFileBaru;
}
// hapus
function hapus($id){
	global $conn;
	mysqli_query($conn, "DELETE FROM undangan WHERE id = $id");
	unlink('file/'.$_GET['surat']);
	return mysqli_affected_rows($conn);
}
// ubah data
function ubah($data){
	global $conn;
	$id = $data['id'];
	$arsip =htmlspecialchars($data['arsip']);
	$tgl = htmlspecialchars($data['tgl']);
	$hari = htmlspecialchars($data['hari']);
	$no = htmlspecialchars($data['no']);
	$dari = htmlspecialchars($data['dari']);
	$jadwal = htmlspecialchars($data['jadwal']);
	$tempat = htmlspecialchars($data['tempat']);
	$perihal = htmlspecialchars($data['perihal']);
	$messageLama = htmlspecialchars($data['fileLama']);
	// cek apakah user upload file baru?
	if ($_FILES['surat']['error'] === 4) {
		$message = $messageLama;
	}else {
		$message = upload();
	}
	

	$query = "UPDATE undangan SET 
	arsip = '$arsip',
	tgl = '$tgl',
	hari = '$hari',
	no = '$no',
	dari = '$dari',
	jadwal = '$jadwal',
	tempat = '$tempat',
	perihal = '$perihal',
	surat = '$message'
	WHERE id = $id
	";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}
// cari
function search($keyword){
	$query = "SELECT * FROM undangan 
	WHERE arsip LIKE '%$keyword%' OR 
	tgl = '%$keyword%' OR
	hari LIKE '%$keyword%' OR
	no LIKE '%$keyword%' OR
	dari LIKE '%$keyword%' OR
	jadwal LIKE '%$keyword%' OR
	tempat LIKE '%$keyword%' OR
	perihal LIKE '%$keyword%' OR
	surat LIKE '%$keyword%'
	";
	return query($query);
}

?>