
<?php
if(!isset($_SESSION ['idsesi'])) {
    echo "<script> window.location.assign('../index.php'); </script>";
}
?>

<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title"><span class="fa fa-user-plus"></span> Riwayat Peminjaman</h3>
                </div>
                <div class="panel-body">
                    <table id="dtskripsi" class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th>No</th><th>Nama Peminjam</th><th>Jenis Kelamin</th><th>No_Hp</th><th>Nama_Barang</th><th>Tanggal Pinjam</th><th>Tanggal Kembali</th><th>Lama Pinjam</th><th>actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!--ambil data dari database, dan tampilkan kedalam tabel-->
                            <?php
                            //buat sql untuk tampilan data, gunakan kata kunci select
                            $sql = "SELECT * FROM tbl_peminjaman";
                            $query = mysqli_query($koneksi, $sql) or die("SQL Anda Salah");
                            //Baca hasil query dari databse, gunakan perulangan untuk
                            //Menampilkan data lebh dari satu. disini akan digunakan
                            //while dan fungdi mysqli_fecth_array
                            //Membuat variabel untuk menampilkan nomor urut
                            $nomor = 0;
                            //Melakukan perulangan u/menampilkan data
                            while ($data = mysqli_fetch_array($query)) {
                                $nomor++; //Penambahan satu untuk nilai var nomor
                                ?>
                                <tr>
                                    <td><?= $nomor ?></td>
                                    <td><?= $data['nama_peminjam'] ?></td>
									<td><?= $data['jenis_kelamin'] ?></td>
                                    <td><?= $data['no_hp'] ?></td>
                                    <td><?= $data['judul_buku'] ?></td>
									<td><?= $data['tanggal_pinjam'] ?></td>
                                    
                                    <td><?= $data['tanggal_kembali'] ?> &nbsp <a href="?page=peminjaman&actions=kembali&nope=<?= $data['id'] ?>" class="btn btn-info btn-xs">
											<span class="fa fa-forward"></span></a>
									</td>
									<td><?= $data['lama_pinjam'] ?> hari</td>
                                    <td>
                                        <a href="?page=peminjaman&actions=detail&id=<?= $data['id'] ?>" class="btn btn-info btn-xs">
                                            <span class="fa fa-eye"></span>
                                        </a>
                                        <a href="?page=peminjaman&actions=edit&id=<?= $data['id'] ?>" class="btn btn-warning btn-xs">
                                            <span class="fa fa-edit"></span>
                                        </a>
                                        <a href="?page=peminjaman&actions=delete&id=<?= $data['id'] ?>" class="btn btn-danger btn-xs">
                                            <span class="fa fa-remove"></span>
                                        </a>
                                    </td>
                                </tr>
                                <!--Tutup Perulangan data-->
                            <?php } ?>
                        </tbody>

                        <tfoot>
                            <tr>
                                <td colspan="7">
                                    <a href="?page=peminjaman&actions=tambah" class="btn btn-info btn-sm">
                                        Tambah Peminjaman

                                    </a>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>
