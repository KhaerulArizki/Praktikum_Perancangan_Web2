<?php
include "koneksi.php";

$nama = $_POST['nama'];
$email = $_POST['email'];
$telepon = $_POST['telepon'];
$jenjang = $_POST['jenjang'];
$mapel = $_POST['mapel'];
$jadwal = $_POST['jadwal'];
$catatan = $_POST['catatan'];

mysqli_query($koneksi, "INSERT INTO pendaftaran (nama,email,telepon,jenjang,mapel,jadwal,catatan)
VALUES ('$nama','$email','$telepon','$jenjang','$mapel','$jadwal','$catatan')");

echo "<script>
alert('Data berhasil ditambahkan!');
window.location='data.php';
</script>";
?>
