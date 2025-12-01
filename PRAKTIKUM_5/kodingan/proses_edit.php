<?php
include "koneksi.php";

$id = $_POST['id'];
$nama = $_POST['nama'];
$email = $_POST['email'];
$telepon = $_POST['telepon'];
$jenjang = $_POST['jenjang'];
$mapel = $_POST['mapel'];
$jadwal = $_POST['jadwal'];
$catatan = $_POST['catatan'];

mysqli_query($koneksi, "UPDATE pendaftaran SET 
    nama='$nama',
    email='$email',
    telepon='$telepon',
    jenjang='$jenjang',
    mapel='$mapel',
    jadwal='$jadwal',
    catatan='$catatan'
    WHERE id=$id");

echo "<script>
alert('Data berhasil diperbarui!');
window.location='data.php';
</script>";
?>
