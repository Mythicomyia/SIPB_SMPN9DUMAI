<?php
// Ambil data dari form login
$user = $_POST['user'];
$pwd = $_POST['pwd'];

// Baca data dari database dengan label user
include 'config/koneksi.php';

// Gunakan prepared statement untuk menghindari SQL injection
$sql = "SELECT * FROM tbl_user WHERE username=?";
$stmt = $koneksi->prepare($sql);
$stmt->bind_param("s", $user);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $data = $result->fetch_array(); // Ambil data dan konversi menjadi array
    // Verifikasi password (plaintext)
    if ($pwd === $data['paswd']) {
        session_start(); // Aktifkan session
        $_SESSION['username'] = $user;
        $_SESSION['idsesi'] = session_id();
        $_SESSION['level'] = $data['level'];
        $_SESSION['nama'] = $data['nama'];
        $_SESSION['ket'] = $data['ket'];
        $_SESSION['email'] = $data['email'];
        // Pindahkan ke halaman index
        header("Location: index_admin.php", true, 302);
        exit();
    } else {
        echo "<script>window.location.assign('index.php?error=yes');</script>";
    }
} else {
    echo "<script>window.location.assign('index.php?error=yes');</script>";
}

$stmt->close();
$koneksi->close();
?>
