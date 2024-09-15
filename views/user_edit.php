<?php
$id = $_GET['uid'];
$ambil = mysqli_query($koneksi, "SELECT * FROM tbl_user WHERE username='$id'") or die("SQL Edit error");
$data = mysqli_fetch_array($ambil);
?>

<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Update Data User</h3>
                </div>
                <div class="panel-body">
                    <!-- Membuat form untuk update data -->
                    <form class="form-horizontal" action="" method="post">
                        <div class="form-group">
                            <label for="nama" class="col-sm-3 control-label">Nama Lengkap</label>
                            <div class="col-sm-9">
                                <input type="text" name="nama" value="<?= htmlspecialchars($data['nama']) ?>" class="form-control" id="inputEmail3" placeholder="Input Nama Lengkap">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="username" class="col-sm-3 control-label">Username</label>
                            <div class="col-sm-9">
                                <input type="text" name="username" value="<?= htmlspecialchars($data['username']) ?>" class="form-control" id="inputEmail3" placeholder="Input Username">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-sm-3 control-label">Email</label>
                            <div class="col-sm-9">
                                <input type="text" name="email" value="<?= htmlspecialchars($data['email']) ?>" class="form-control" id="inputPassword3" placeholder="Input Email">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="ket" class="col-sm-3 control-label">Keterangan</label>
                            <div class="col-sm-9">
                                <input type="text" name="ket" value="<?= htmlspecialchars($data['ket']) ?>" class="form-control" id="inputPassword3" placeholder="Input Keterangan">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password" class="col-sm-3 control-label">Password</label>
                            <div class="col-sm-9">
                                <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Input Password (kosongkan jika tidak diubah)">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-9">
                                <button type="submit" class="btn btn-success">
                                    <span class="fa fa-edit"></span> Update Data User
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="panel-footer">
                    <a href="?page=user&actions=tampil" class="btn btn-danger btn-sm">
                        Kembali Ke Data User
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
if ($_POST) {
    // Ambil data dari form
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $ket = $_POST['ket'];
    $password = $_POST['password']; // Password dari form

    // Periksa apakah password baru diinputkan
    if (!empty($password)) {
        // Jika password baru diinputkan, update password dalam bentuk plaintext
        $sql = "UPDATE tbl_user SET nama = ?, username = ?, email = ?, ket = ?, paswd = ? WHERE username = ?";
        $stmt = $koneksi->prepare($sql);
        $stmt->bind_param("ssssss", $nama, $username, $email, $ket, $password, $id);
    } else {
        // Jika password tidak diubah
        $sql = "UPDATE tbl_user SET nama = ?, username = ?, email = ?, ket = ? WHERE username = ?";
        $stmt = $koneksi->prepare($sql);
        $stmt->bind_param("sssss", $nama, $username, $email, $ket, $id);
    }

    // Eksekusi query
    if ($stmt->execute()) {
        echo "<script>window.location.assign('?page=user&actions=tampil');</script>";
    } else {
        echo "<script>alert('Edit Data Gagal');</script>";
    }

    $stmt->close();
}
$koneksi->close();
?>
