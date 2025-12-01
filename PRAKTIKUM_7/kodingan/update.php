<?php
include 'koneksi.php';

function redirect($msg='',$to='index.php') {
    header('Location: '.$to.($msg? '?msg='.urlencode($msg):''));
    exit;
}

$id = isset($_POST['id']) ? (int)$_POST['id'] : 0;
$nama = isset($_POST['nama']) ? trim($_POST['nama']) : '';
$alamat = isset($_POST['alamat']) ? trim($_POST['alamat']) : '';

if ($id <= 0 || $nama === '') {
    redirect('Data tidak valid', 'index.php');
}


$stmt = $koneksi->prepare("SELECT foto FROM namasiswa WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$res = $stmt->get_result();
$old = $res->fetch_assoc();
$oldFoto = $old ? $old['foto'] : null;


$newUploadedName = $oldFoto;
if (isset($_FILES['foto']) && $_FILES['foto']['error'] !== UPLOAD_ERR_NO_FILE) {
    $file = $_FILES['foto'];

    if ($file['error'] !== UPLOAD_ERR_OK) {
        redirect('Error saat mengunggah file', 'edit.php?id='.$id);
    }

    if ($file['size'] > 2 * 1024 * 1024) {
        redirect('Ukuran file maksimal 2MB', 'edit.php?id='.$id);
    }

    $allowed = ['jpg','jpeg','png','gif'];
    $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
    if (!in_array($ext, $allowed)) {
        redirect('Jenis file tidak diperbolehkan', 'edit.php?id='.$id);
    }

    $newUploadedName = uniqid('img_', true) . '.' . $ext;
    $target = __DIR__ . '/gambar/' . $newUploadedName;

    if (!move_uploaded_file($file['tmp_name'], $target)) {
        redirect('Gagal memindahkan file', 'edit.php?id='.$id);
    }

    if ($oldFoto && file_exists(__DIR__ . '/gambar/' . $oldFoto)) {
        @unlink(__DIR__ . '/gambar/' . $oldFoto);
    }
}

$stmt2 = $koneksi->prepare("UPDATE namasiswa SET nama = ?, alamat = ?, foto = ? WHERE id = ?");
$stmt2->bind_param("sssi", $nama, $alamat, $newUploadedName, $id);
$ok = $stmt2->execute();

if ($ok) {
    redirect('Data berhasil diperbarui', 'index.php');
} else {
  
    if ($newUploadedName && $newUploadedName !== $oldFoto && file_exists('gambar/'.$newUploadedName)) {
        @unlink('gambar/'.$newUploadedName);
    }
    redirect('Gagal memperbarui data: '.$koneksi->error, 'edit.php?id='.$id);
}
