<?php
session_start();
require '../config/koneksi.php'; // Sesuaikan path jika perlu

if (!isset($_SESSION['idsesi'])) {
    echo "<script>window.location.assign('../index.php');</script>";
    exit();
}

if (isset($_GET['username'])) {
    $username = $_GET['username'];

    // Buat koneksi database
    $conn = new mysqli("localhost", "root", "", "dbperpus");

    // Periksa koneksi
    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }

    // Hapus user berdasarkan username
    $sql = "DELETE FROM tbl_user WHERE username = ?";
    
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("s", $username);

        if ($stmt->execute()) {
            // Redirect ke halaman user dengan pesan sukses
            echo "<script>
                alert('User berhasil dihapus!');
                window.location.href = '../index_admin.php?page=user&actions=tampil';
            </script>";
        } else {
            echo "<script>
                alert('Terjadi kesalahan: " . $stmt->error . "');
                window.location.href = '../index_admin.php?page=user&actions=tampil';
            </script>";
        }

        $stmt->close();
    } else {
        echo "<script>
            alert('Terjadi kesalahan: " . $conn->error . "');
            window.location.href = '../index_admin.php?page=user&actions=tampil';
        </script>";
    }

    $conn->close();
} else {
    echo "<script>
        alert('User tidak ditemukan!');
        window.location.href = '../index_admin.php?page=user&actions=tampil';
    </script>";
}
?>
