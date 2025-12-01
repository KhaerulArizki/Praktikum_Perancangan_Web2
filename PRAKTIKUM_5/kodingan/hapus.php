<?php
include "koneksi.php";
$id = $_GET['id'];

mysqli_query($koneksi, "DELETE FROM pendaftaran WHERE id=$id");

echo "<script>
alert('Data berhasil dihapus!');
window.location='data.php';
</script>";
?>
