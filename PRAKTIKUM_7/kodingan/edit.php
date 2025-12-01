<?php
include 'koneksi.php';

if (!isset($_GET['id'])) {
    header('Location: index.php');
    exit;
}

$id = (int)$_GET['id'];
$stmt = $koneksi->prepare("SELECT * FROM namasiswa WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$res = $stmt->get_result();
$row = $res->fetch_assoc();

if (!$row) {
    header('Location: index.php');
    exit;
}
?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Edit Siswa</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
  <div class="card shadow p-4">
    <h3 class="mb-3">Edit Siswa</h3>

    <form action="update.php" method="post" enctype="multipart/form-data">
      <input type="hidden" name="id" value="<?= $row['id'] ?>">

      <div class="mb-3">
        <label class="form-label">Nama</label>
        <input type="text" name="nama" class="form-control" value="<?= htmlspecialchars($row['nama']) ?>" required maxlength="100">
      </div>

      <div class="mb-3">
        <label class="form-label">Alamat</label>
        <textarea name="alamat" class="form-control" rows="3"><?= htmlspecialchars($row['alamat']) ?></textarea>
      </div>

      <div class="mb-3">
        <label class="form-label">Foto saat ini</label><br>
        <?php if($row['foto'] && file_exists('gambar/'.$row['foto'])): ?>
          <img src="gambar/<?= htmlspecialchars($row['foto']) ?>" alt="foto" style="height:100px;">
        <?php else: ?>
          <div class="text-muted">No Image</div>
        <?php endif; ?>
      </div>

      <div class="mb-3">
        <label class="form-label">Ganti Foto (opsional)</label>
        <input type="file" name="foto" class="form-control" accept=".jpg,.jpeg,.png,.gif">
      </div>

      <button type="submit" class="btn btn-primary">Update</button>
      <a href="index.php" class="btn btn-secondary">Kembali</a>
    </form>
  </div>
</div>
</body>
</html>
