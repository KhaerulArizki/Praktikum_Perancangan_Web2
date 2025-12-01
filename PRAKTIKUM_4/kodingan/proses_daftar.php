<?php
include "koneksi.php";

$nama     = $_POST['nama'];
$email    = $_POST['email'];
$telepon  = $_POST['telepon'];
$jenjang  = $_POST['jenjang'];
$mapel    = $_POST['mapel'];
$jadwal   = $_POST['jadwal'];
$catatan  = $_POST['catatan'];

$query = "INSERT INTO pendaftaran (nama,email,telepon,jenjang,mapel,jadwal,catatan)
          VALUES ('$nama', '$email', '$telepon', '$jenjang', '$mapel', '$jadwal', '$catatan')";

if (mysqli_query($koneksi, $query)) {
    echo "<h2>Pendaftaran Berhasil!</h2>";
    echo "<p>Nama: $nama</p>";
    echo "<p>Email: $email</p>";
    echo "<p>Telepon: $telepon</p>";
    echo "<p>Jenjang: $jenjang</p>";
    echo "<p>Mapel: $mapel</p>";
    echo "<p>Jadwal: $jadwal</p>";
    echo "<p>Catatan: $catatan</p>";
    echo "<br><a href='daftar_bimbel.php'>Kembali</a>";
} else {
    echo "Error: " . mysqli_error($koneksi);
}
?>
