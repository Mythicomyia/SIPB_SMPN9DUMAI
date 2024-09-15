<?php
$page = isset($_GET['page']) ? $_GET['page'] : '';
$actions = isset($_GET['actions']) ? $_GET['actions'] : '';

// Menentukan file yang akan dimuat
$file = "views/" . $page . "_" . $actions . ".php";

// Memeriksa apakah file ada
if (file_exists($file)) {
    require $file;
} else {
    // Jika file tidak ada, tampilkan halaman default
    require 'views/beranda_adm.php'; // Ganti dengan halaman default yang sesuai
}
?>
