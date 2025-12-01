<?php
include 'koneksi.php';
?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Daftar Siswa</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
  <div class="card shadow">
    <div class="card-body">
      <h3 class="mb-3">Daftar Siswa</h3>

      <?php if(isset($_GET['msg'])): ?>
        <div class="alert alert-success"><?= htmlspecialchars($_GET['msg']) ?></div>
      <?php endif; ?>

      <a href="create.php" class="btn btn-primary mb-3">Tambah Siswa</a>

      <table class="table table-bordered table-striped">
        <thead class="table-dark">
          <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Foto</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
        <?php
          $no = 1;
          $sql = "SELECT * FROM namasiswa ORDER BY id DESC";
          $res = $koneksi->query($sql);
          while($row = $res->fetch_assoc()):
        ?>
          <tr>
            <td><?= $no++ ?></td>
            <td><?= htmlspecialchars($row['nama']) ?></td>
            <td style="max-width:300px; white-space:pre-wrap;"><?= nl2br(htmlspecialchars($row['alamat'])) ?></td>
            <td>
              <?php if($row['foto'] && file_exists('gambar/'.$row['foto'])): ?>
                <img src="gambar/<?= htmlspecialchars($row['foto']) ?>" alt="foto" style="height:80px;">
              <?php else: ?>
                <span class="text-muted">No Image</span>
              <?php endif; ?>
            </td>
            <td>
              <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
              <a href="delete.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
            </td>
          </tr>
        <?php endwhile; ?>
        </tbody>
      </table>

    </div>
  </div>
</div>
</body>
</html>
