<?php
include 'koneksi.php';

function redirect($msg='',$to='index.php') {
    header('Location: '.$to.($msg? '?msg='.urlencode($msg):''));
    exit;
}

$nama = isset($_POST['nama']) ? trim($_POST['nama']) : '';
$alamat = isset($_POST['alamat']) ? trim($_POST['alamat']) : '';

if ($nama === '') {
    redirect('Nama harus diisi', 'create.php');
}

$uploadedName = null;
if (isset($_FILES['foto']) && $_FILES['foto']['error'] !== UPLOAD_ERR_NO_FILE) {
    $file = $_FILES['foto'];

    if ($file['error'] !== UPLOAD_ERR_OK) {
        redirect('Error saat mengunggah file', 'create.php');
    }

    if ($file['size'] > 2 * 1024 * 1024) {
        redirect('Ukuran file maksimal 2MB', 'create.php');
    }

    $allowed = ['jpg','jpeg','png','gif'];
    $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
    if (!in_array($ext, $allowed)) {
        redirect('Jenis file tidak diperbolehkan', 'create.php');
    }

    $uploadedName = uniqid('img_', true) . '.' . $ext;
    $target = __DIR__ . '/gambar/' . $uploadedName;

    if (!move_uploaded_file($file['tmp_name'], $target)) {
        redirect('Gagal memindahkan file', 'create.php');
    }
}

$stmt = $koneksi->prepare("INSERT INTO namasiswa (nama, alamat, foto) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $nama, $alamat, $uploadedName);
$ok = $stmt->execute();

if ($ok) {
    redirect('Data berhasil disimpan', 'index.php');
} else {
  
    if ($uploadedName && file_exists('gambar/'.$uploadedName)) unlink('gambar/'.$uploadedName);
    redirect('Gagal menyimpan data: '.$koneksi->error, 'create.php');
}
