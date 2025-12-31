<?php
include("conn.php");

$query = mysqli_query($conn, "SELECT COUNT(id) FROM movies");
$row = mysqli_fetch_row($query);
$rows = $row[0];

$page_rows = 6;
$last = ceil($rows / $page_rows);
if ($last < 1) $last = 1;

$pagenum = 1;

if (isset($_GET['pn'])) {
    $pagenum = preg_replace('#[^0-9]#', '', $_GET['pn']);
}

if ($pagenum < 1) $pagenum = 1;
else if ($pagenum > $last) $pagenum = $last;

$limit = 'LIMIT ' . ($pagenum - 1) * $page_rows . ',' . $page_rows;

$nquery = mysqli_query($conn, "SELECT * FROM movies ORDER BY year DESC $limit");

$paginationCtrls = '';

if ($last != 1) {

    if ($pagenum > 1) {
        $previous = $pagenum - 1;
        $paginationCtrls .= '<a href="' . $_SERVER['PHP_SELF'] . '?pn=' . $previous . '" class="btn btn-outline-primary mx-1">Previous</a>';
    }

    for ($i = $pagenum - 2; $i < $pagenum; $i++) {
        if ($i > 0) {
            $paginationCtrls .= '<a href="' . $_SERVER['PHP_SELF'] . '?pn=' . $i . '" class="btn btn-outline-primary mx-1">' . $i . '</a>';
        }
    }

    $paginationCtrls .= '<span class="btn btn-primary mx-1">' . $pagenum . '</span>';

    for ($i = $pagenum + 1; $i <= $last; $i++) {
        $paginationCtrls .= '<a href="' . $_SERVER['PHP_SELF'] . '?pn=' . $i . '" class="btn btn-outline-primary mx-1">' . $i . '</a>';
        if ($i >= $pagenum + 2) break;
    }

    if ($pagenum != $last) {
        $next = $pagenum + 1;
        $paginationCtrls .= '<a href="' . $_SERVER['PHP_SELF'] . '?pn=' . $next . '" class="btn btn-outline-primary mx-1">Next</a>';
    }
}
?>