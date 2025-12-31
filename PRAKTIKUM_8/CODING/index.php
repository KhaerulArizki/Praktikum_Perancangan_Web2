<?php include('pagination.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Daftar Film</title>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(120deg, #121212, #0a0a0a);
            color: #fff;
            font-family: 'Poppins', sans-serif;
        }

        .header-title {
            text-align: center;
            margin: 30px 0;
            font-size: 34px;
            font-weight: 700;
            color: #ff3b3b;
            text-shadow: 0 0 20px rgba(255, 50, 50, 0.7);
            letter-spacing: 1px;
        }

        .movie-card {
            position: relative;
            border-radius: 14px;
            overflow: hidden;
            transition: all 0.35s ease;
            background: rgba(255,255,255,0.06);
            backdrop-filter: blur(6px);
            border: 1px solid rgba(255,255,255,0.09);
            box-shadow: 0 4px 18px rgba(0,0,0,0.6);
        }

        .movie-card:hover {
            transform: translateY(-8px) scale(1.03);
            box-shadow: 0 8px 25px rgba(255,0,0,0.35);
        }

        .movie-img {
            width: 100%;
            height: 330px;
            object-fit: cover;
        }

        .movie-info {
            padding: 16px;
        }

        .movie-title {
            font-size: 20px;
            font-weight: 600;
            margin-bottom: 6px;
            color: #fff;
        }

        .movie-meta {
            font-size: 14px;
            color: #ccc;
        }

        /* Pagination Styling */
        .pagination-controls a,
        .pagination-controls span {
            border-radius: 10px;
            padding: 8px 14px;
            margin: 0 4px;
            font-weight: 600;
            transition: 0.3s;
        }

        .pagination-controls a:hover {
            background: #ff3b3b;
            color: white !important;
            transform: scale(1.1);
        }

        .pagination-controls span {
            background: #ff3b3b !important;
            color: white !important;
            box-shadow: 0 0 10px rgba(255,40,40,0.7);
        }

        /* Grid spacing */
        .movie-row {
            margin-top: 20px;
        }
    </style>
</head>
<body>

<div class="container">

    <div class="header-title">DAFTAR FILM</div>

    <div class="row g-4 movie-row">
        <?php while ($film = mysqli_fetch_array($nquery)) { ?>
            <div class="col-md-4">
                <div class="movie-card">
                    <img src="<?= $film['poster']; ?>" class="movie-img">

                    <div class="movie-info">
                        <div class="movie-title"><?= $film['title']; ?></div>
                        <div class="movie-meta">
                            <?= $film['genre']; ?> • <?= $film['year']; ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>

    <div class="pagination-controls mt-4 text-center">
        <?= $paginationCtrls; ?>
    </div>

</div>

</body>
</html>