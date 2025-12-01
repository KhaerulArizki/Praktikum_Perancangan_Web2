<?php include "koneksi.php"; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Data Pendaftar</title>
    <style>
        table {
            width: 95%;
            margin: 20px auto;
            border-collapse: collapse;
        }
        th {
            background: #4f46e5;
            color: white;
            padding: 10px;
        }
        td {
            padding: 10px;
            border: 1px solid #aaa;
            text-align: center;
        }
        a {
            padding: 6px 12px;
            background: #4f46e5;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
        .hapus { background: #e11d48; }
    </style>
</head>
<body>

<h2 style="text-align:center;">Data Pendaftar Bimbel</h2>

<table>
<tr>
    <th>ID</th>
    <th>Nama</th>
    <th>Email</th>
    <th>Telp</th>
    <th>Jenjang</th>
    <th>Mapel</th>
    <th>Jadwal</th>
    <th>Aksi</th>
</tr>

<?php
$data = mysqli_query($koneksi, "SELECT * FROM pendaftaran ORDER BY id DESC");
while($d = mysqli_fetch_assoc($data)) {
?>

<tr>
    <td><?= $d['id'] ?></td>
    <td><?= $d['nama'] ?></td>
    <td><?= $d['email'] ?></td>
    <td><?= $d['telepon'] ?></td>
    <td><?= $d['jenjang'] ?></td>
    <td><?= $d['mapel'] ?></td>
    <td><?= $d['jadwal'] ?></td>
    <td>
        <a href="edit.php?id=<?= $d['id'] ?>">Edit</a>
        <a href="hapus.php?id=<?= $d['id'] ?>" class="hapus"
           onclick="return confirm('Yakin hapus data?')">Hapus</a>
    </td>
</tr>

<?php } ?>

</table>

</body>
</html>
