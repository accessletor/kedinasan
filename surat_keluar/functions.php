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
	$nosurat = htmlspecialchars($data['nosurat']);
	$dari = htmlspecialchars($data['dari']);

	$query = "INSERT INTO keluar VALUES ('','$arsip','$tgl','$nosurat','$dari')";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

// hapus
function hapus($id){
	global $conn;
	mysqli_query($conn, "DELETE FROM keluar WHERE id = $id");
	return mysqli_affected_rows($conn);
}
// ubah data
function ubah($data){
	global $conn;
	$id = $data['id'];
	$arsip =htmlspecialchars($data['arsip']);
	$tgl = htmlspecialchars($data['tgl']);
	$nosurat = htmlspecialchars($data['nosurat']);
	$dari = htmlspecialchars($data['dari']);

	$query = "UPDATE keluar SET 
	arsip = '$arsip',
	tgl = '$tgl',
	nosurat = '$nosurat',
	dari = '$dari'
	WHERE id = $id
	";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}
// cari
function search($keyword){
	$query = "SELECT * FROM keluar 
	WHERE arsip LIKE '%$keyword%' OR 
	tgl = '%$keyword%' OR
	nosurat LIKE '%$keyword%' OR
	dari LIKE '%$keyword%' 
	";
	return query($query);
}

?>