<?php
if (!isset($_SESSION['idsesi'])) {
    echo "<script>window.location.assign('../index.php');</script>";
}
?>

<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-6">
                            <h3 class="panel-title"><span class="fa fa-user-plus"></span> Kelola User</h3>
                        </div>
                        <div class="col-xs-6 text-right">
                        <a href="index_admin.php?page=user&actions=regis" class="btn btn-primary btn-sm">
    <span class="fa fa-plus"></span> Tambah User
</a>




                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    <table id="dtskripsi" class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama User</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Keterangan</th>
                                <th>AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Ambil data dari database dan tampilkan ke dalam tabel -->
                            <?php
                            // Buat SQL untuk tampilan data, gunakan kata kunci SELECT
                            $sql = "SELECT * FROM tbl_user";
                            $query = mysqli_query($koneksi, $sql) or die("SQL Anda Salah");
                            // Baca hasil query dari database, gunakan perulangan untuk menampilkan data lebih dari satu
                            // Di sini akan digunakan while dan fungsi mysqli_fetch_array
                            // Membuat variabel untuk menampilkan nomor urut
                            $nomor = 0;
                            // Melakukan perulangan untuk menampilkan data
                            while ($data = mysqli_fetch_array($query)) {
                                $nomor++; // Penambahan satu untuk nilai var nomor
                                ?>
                                <tr>
                                    <td><?= $nomor ?></td>
                                    <td><?= htmlspecialchars($data['nama']) ?></td>
                                    <td><?= htmlspecialchars($data['username']) ?></td>
                                    <td><?= htmlspecialchars($data['email']) ?></td>
                                    <td><?= htmlspecialchars($data['ket']) ?> </td>
                                    <td>
    <a href="?page=user&actions=edit&uid=<?= htmlspecialchars($data['username']) ?>" class="btn btn-warning btn-xs">
        <span class="fa fa-edit"></span>
    </a>
    <a href="views/proses_hapus_user.php?username=<?= htmlspecialchars($data['username']) ?>" class="btn btn-danger btn-xs" onclick="return confirm('Apakah Anda yakin ingin menghapus user ini?');">
        <span class="fa fa-trash"></span>
    </a>
</td>

                                </tr>
                                <!-- Tutup Perulangan data -->
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
