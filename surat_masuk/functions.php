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
	$nodisposisi =htmlspecialchars($data['nodisposisi']);
	$tgl = htmlspecialchars($data['tgl']);
	$jenis = htmlspecialchars($data['jenis']);
	$sifat = htmlspecialchars($data['sifat']);
	$nosurat = htmlspecialchars($data['nosurat']);
	$tglsurat = htmlspecialchars($data['tglsurat']);
	$dari = htmlspecialchars($data['dari']);
	$hal = htmlspecialchars($data['hal']);
	$kasie = htmlspecialchars($data['kasie']);
	$ket = htmlspecialchars($data['ket']);

	// $message = htmlspecialchars($data['surat']);
	// upload
	$message = upload();
	if (!$message) {
		return false;
	}
	// disposisi
	$disposisi = udisposisi();
	if (!$message) {
		return false;
	}

	$query = "INSERT INTO suratm VALUES ('','$arsip','$nodisposisi','$tgl','$jenis','$sifat','$nosurat','$tglsurat','$dari','$hal','$kasie','$ket','$message','$disposisi')";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}
function upload(){
	$namaFile = $_FILES['surat']['name'];
	$ukuranFile = $_FILES['surat']['size'];
	$error = $_FILES['surat']['error'];
	$tmpName = $_FILES['surat']['tmp_name'];
	// cek file apakah data surat atau bukan
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
function udisposisi(){
	$namaFile = $_FILES['disposisi']['name'];
	$ukuranFile = $_FILES['disposisi']['size'];
	$error = $_FILES['disposisi']['error'];
	$tmpName = $_FILES['disposisi']['tmp_name'];
	// cek file apakah data disposisi atau bukan
	$ekstensiFileValid = ['pdf','docx','doc','xls','xlsx','xlsb','xlsm','csv','jpg','jpeg','png'];
	$ekstensiFile = explode('.', $namaFile);
	$ekstensiFile = strtolower(end($ekstensiFile));
	if (!in_array($ekstensiFile, $ekstensiFileValid)) {
		echo "<script>
		alert('disposisi masih kosong');
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
	move_uploaded_file($tmpName, 'disposisi/' . $namaFileBaru);
	return $namaFileBaru;
}
// hapus
function hapus($id){
	global $conn;
	mysqli_query($conn, "DELETE FROM suratm WHERE id = $id");
	unlink('file/'.$_GET['surat']);
	unlink('disposisi/'.$_GET['disposisi']);
	return mysqli_affected_rows($conn);
}
// ubah data
function ubah($data){
	global $conn;
	$id = $data['id'];
	$arsip =htmlspecialchars($data['arsip']);
	$nodisposisi =htmlspecialchars($data['nodisposisi']);
	$tgl = htmlspecialchars($data['tgl']);
	$jenis = htmlspecialchars($data['jenis']);
	$sifat = htmlspecialchars($data['sifat']);
	$nosurat = htmlspecialchars($data['nosurat']);
	$tglsurat = htmlspecialchars($data['tglsurat']);
	$dari = htmlspecialchars($data['dari']);
	$hal = htmlspecialchars($data['hal']);
	$kasie = htmlspecialchars($data['kasie']);
	$ket = htmlspecialchars($data['ket']);
	$messageLama = htmlspecialchars($data['fileLama']);
	$disposisiLama = htmlspecialchars($data['disposisiLama']);
	// cek apakah user upload file baru?
	if ($_FILES['surat']['error'] === 4) {
		$message = $messageLama;
	}else {
		$message = upload();
	}
	// cek apakah user upload disposisi baru
	if ($_FILES['disposisi']['error'] === 4) {
		$disposisi = $disposisiLama;
	}else {
		$disposisi = udisposisi();
	}
	

	$query = "UPDATE suratm SET 
	arsip = '$arsip',
	nodisposisi = '$nodisposisi',
	tgl = '$tgl',
	jenis = '$jenis',
	sifat = '$sifat',
	nosurat = '$nosurat',
	tglsurat = '$tglsurat',
	dari = '$dari',
	hal = '$hal',
	kasie = '$kasie',
	ket = '$ket',
	surat = '$message',
	disposisi = '$disposisi'
	WHERE id = $id
	";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}
// cari
function search($keyword){
	$query = "SELECT * FROM suratm 
	WHERE arsip LIKE '%$keyword%' OR 
	nodisposisi = '%$keyword%' OR
	tgl = '%$keyword%' OR
	jenis LIKE '%$keyword%' OR
	sifat LIKE '%$keyword%' OR
	nosurat LIKE '%$keyword%' OR
	tglsurat LIKE '%$keyword%' OR
	dari LIKE '%$keyword%' OR
	hal LIKE '%$keyword%' OR
	kasie LIKE '%$keyword%' OR
	ket LIKE '%$keyword%' OR
	surat LIKE '%$keyword%' OR
	disposisi LIKE '%$keyword%'
	";
	return query($query);
}

?>