<?php include 'koneksi.php'; ?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Tambah Siswa</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
  <div class="card shadow p-4">
    <h3 class="mb-3">Tambah Siswa</h3>

    <form action="store.php" method="post" enctype="multipart/form-data">
      <div class="mb-3">
        <label class="form-label">Nama</label>
        <input type="text" name="nama" class="form-control" required maxlength="100">
      </div>

      <div class="mb-3">
        <label class="form-label">Alamat</label>
        <textarea name="alamat" class="form-control" rows="3"></textarea>
      </div>

      <div class="mb-3">
        <label class="form-label">Foto (jpg/jpeg/png/gif, max 2MB)</label>
        <input type="file" name="foto" class="form-control" accept=".jpg,.jpeg,.png,.gif">
      </div>

      <button type="submit" class="btn btn-success">Simpan</button>
      <a href="index.php" class="btn btn-secondary">Kembali</a>
    </form>
  </div>
</div>
</body>
</html>
