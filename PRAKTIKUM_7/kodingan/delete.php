<?php
include 'koneksi.php';

if (!isset($_GET['id'])) {
    header('Location: index.php');
    exit;
}

$id = (int)$_GET['id'];

$stmt = $koneksi->prepare("SELECT foto FROM namasiswa WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$res = $stmt->get_result();
$row = $res->fetch_assoc();

if ($row && $row['foto']) {
    $file = __DIR__ . '/gambar/' . $row['foto'];
    if (file_exists($file)) @unlink($file);
}

$stmt2 = $koneksi->prepare("DELETE FROM namasiswa WHERE id = ?");
$stmt2->bind_param("i", $id);
$ok = $stmt2->execute();

if ($ok) {
    header('Location: index.php?msg=' . urlencode('Data berhasil dihapus'));
} else {
    header('Location: index.php?msg=' . urlencode('Gagal menghapus: '.$koneksi->error));
}
