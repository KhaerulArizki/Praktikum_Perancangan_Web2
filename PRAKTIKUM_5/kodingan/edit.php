<?php
include "koneksi.php";
$id = $_GET['id'];
$data = mysqli_query($koneksi, "SELECT * FROM pendaftaran WHERE id=$id");
$d = mysqli_fetch_assoc($data);
?>

<!DOCTYPE html>
<html>
<head><title>Edit Data</title></head>
<body>

<h2 style="text-align:center;">Edit Data Pendaftar</h2>

<form method="POST" action="proses_edit.php" style="width:400px;margin:auto;">

<input type="hidden" name="id" value="<?= $d['id'] ?>">

Nama:
<input type="text" name="nama" value="<?= $d['nama'] ?>" required><br><br>

Email:
<input type="email" name="email" value="<?= $d['email'] ?>" required><br><br>

Telepon:
<input type="text" name="telepon" value="<?= $d['telepon'] ?>"><br><br>

Jenjang:
<select name="jenjang">
    <option <?= $d['jenjang']=="SD"?"selected":"" ?>>SD</option>
    <option <?= $d['jenjang']=="SMP"?"selected":"" ?>>SMP</option>
    <option <?= $d['jenjang']=="SMA"?"selected":"" ?>>SMA</option>
</select><br><br>

Mapel:
<input type="text" name="mapel" value="<?= $d['mapel'] ?>"><br><br>

Jadwal:
<input type="text" name="jadwal" value="<?= $d['jadwal'] ?>"><br><br>

Catatan:
<textarea name="catatan"><?= $d['catatan'] ?></textarea><br><br>

<button type="submit">Update</button>

</form>

</body>
</html>
