<?php include "koneksi.php"; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Pendaftaran Bimbel Rumah Belajar</title>
    <style>
        body {
            background: linear-gradient(to bottom right, #4f46e5, #6d28d9);
            font-family: Arial, sans-serif;
        }
        .container {
            width: 450px;
            margin: 60px auto;
            background: white;
            padding: 25px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
        }
        input, select, textarea {
            width: 100%;
            padding: 10px;
            border-radius: 8px;
            border: 1px solid #bbb;
            margin-top: 5px;
        }
        button {
            width: 100%;
            background: #4f46e5;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 8px;
            margin-top: 15px;
            cursor: pointer;
        }
        button:hover { background: #4338ca; }
    </style>
</head>
<body>

<div class="container">
    <h2 style="text-align:center;color:#4f46e5;">Form Pendaftaran Bimbel</h2>
    
    <form action="proses_tambah.php" method="POST">

        <label>Nama Lengkap</label>
        <input type="text" name="nama" required>

        <label>Email</label>
        <input type="email" name="email" required>

        <label>No Telepon</label>
        <input type="text" name="telepon">

        <label>Jenjang</label>
        <select name="jenjang">
            <option>SD</option>
            <option>SMP</option>
            <option>SMA</option>
        </select>

        <label>Mata Pelajaran</label>
        <input type="text" name="mapel">

        <label>Jadwal</label>
        <input type="text" name="jadwal">

        <label>Catatan</label>
        <textarea name="catatan" rows="3"></textarea>

        <button type="submit">Daftar</button>

    </form>
</div>

</body>
</html>
