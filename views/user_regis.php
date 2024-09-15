<?php
// Konfigurasi database
$servername = "localhost";
$db_username = "root";
$db_password = "";
$dbname = "dbperpus";

$conn = new mysqli($servername, $db_username, $db_password, $dbname);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$message = ""; // Initialize message variable
$alertType = ""; // Initialize alert type variable
$redirectUrl = ""; // Initialize redirect URL variable

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST['username'];
    $pass = $_POST['password'];
    $email = $_POST['email'];
    $nama = $_POST['nama'];
    $level = intval($_POST['level']);
    $ket = $_POST['ket'];

    $sql = "INSERT INTO tbl_user (username, paswd, email, nama, level, ket) VALUES (?, ?, ?, ?, ?, ?)";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("ssssss", $user, $pass, $email, $nama, $level, $ket);

        if ($stmt->execute()) {
            $message = "User berhasil ditambahkan!";
            $alertType = "success"; // Type of alert
            $redirectUrl = "index_admin.php?page=user&actions=tampil";
        } else {
            $message = "Terjadi kesalahan: " . $stmt->error;
            $alertType = "danger"; // Type of alert
            $redirectUrl = "index_admin.php?page=user&actions=regis";
        }

        $stmt->close();
    } else {
        $message = "Terjadi kesalahan: " . $conn->error;
        $alertType = "danger"; // Type of alert
        $redirectUrl = "index_admin.php?page=user&actions=regis";
    }

    $conn->close();
}
?>

<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title"><span class="fa fa-user-plus"></span> Tambah User</h3>
                </div>
                <div class="panel-body">
                    <?php
                    if (!empty($message)) {
                        // Display the alert message
                        echo '<div class="alert alert-' . $alertType . ' alert-dismissible fade show" role="alert">';
                        echo '<i class="fa fa-check-circle"></i> ' . $message;
                        echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
                        echo '<span aria-hidden="true">&times;</span>';
                        echo '</button>';
                        echo '</div>';
                        
                        // Redirect to another page after 3 seconds
                        echo '<script type="text/javascript">';
                        echo 'setTimeout(function() {';
                        echo 'window.location.href = "' . $redirectUrl . '";';
                        echo '}, 3000);'; // Adjust delay time as needed
                        echo '</script>';
                    }
                    ?>
                    
                    <!-- Form for adding user -->
                    <form class="form-horizontal" action="" method="post">
                        <div class="form-group">
                            <label for="username" class="col-sm-3 control-label">Username:</label>
                            <div class="col-sm-9">
                                <input type="text" id="username" name="username" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password" class="col-sm-3 control-label">Password:</label>
                            <div class="col-sm-9">
                                <input type="password" id="password" name="password" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="col-sm-3 control-label">Email:</label>
                            <div class="col-sm-9">
                                <input type="email" id="email" name="email" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="nama" class="col-sm-3 control-label">Nama:</label>
                            <div class="col-sm-9">
                                <input type="text" id="nama" name="nama" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="level" class="col-sm-3 control-label">Level:</label>
                            <div class="col-sm-9">
                                <select id="level" name="level" class="form-control">
                                    <option value="0">User</option>
                                    <option value="1">Admin</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="ket" class="col-sm-3 control-label">Keterangan:</label>
                            <div class="col-sm-9">
                                <textarea id="ket" name="ket" class="form-control"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-9">
                                <input type="submit" class="btn btn-primary" value="Tambah User">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
