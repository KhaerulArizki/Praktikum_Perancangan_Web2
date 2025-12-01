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
            width: 430px;
            margin: 70px auto;
            background: #ffffff;
            padding: 25px;
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
        }

        h2 {
            text-align: center;
            color: #4f46e5;
            margin-bottom: 10px;
        }

        p {
            text-align: center;
            margin-bottom: 20px;
            color: #555;
        }

        label {
            font-weight: bold;
            margin-top: 10px;
            display: block;
            color: #333;
        }

        input, select, textarea {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border-radius: 8px;
            border: 1px solid #ccc;
            font-size: 14px;
        }

        textarea {
            resize: none;
        }

        button {
            width: 100%;
            background: #4f46e5;
            color: white;
            padding: 12px;
            margin-top: 15px;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background: #4338ca;
        }
    </style>

</head>
<body>

<div class="container">
    <h2>Pendaftaran Bimbel Rumah Belajar</h2>
    <p>Silakan isi formulir di bawah ini</p>

    <form action="proses_daftar.php" method="POST">

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
        <input type="text" name="mapel" placeholder="Contoh: Matematika, IPA">

        <label>Jadwal</label>
        <input type="text" name="jadwal" placeholder="Contoh: Senin & Rabu, 16:00–18:00">

        <label>Catatan Tambahan</label>
        <textarea name="catatan" rows="3"></textarea>

        <button type="submit">Daftar</button>
    </form>
</div>

</body>
</html>
