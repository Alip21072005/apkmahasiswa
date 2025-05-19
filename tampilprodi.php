<?php include "header.php"; ?>
<div class="container">
    <h2 class="mb-4">Daftar Program Studi</h2>
    <a href="tambahprodi.php" class="btn btn-primary mb-3">Tambah</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Prodi</th>
                <th>Program Studi</th>
                <th>Jenjang</th>
                <th>Akreditasi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php include "koneksi.php";
            $data = mysqli_query($conn, "SELECT * FROM prodi ORDER BY prodi ASC");
            $no = 1;
            while ($d = mysqli_fetch_array($data)) { ?>
                <tr>
                    <td class="text-center"><?= $no; ?></td>
                    <td><?= $d['kdprodi']; ?></td>
                    <td><?= $d['prodi']; ?></td>
                    <td><?= $d['jenjang']; ?>
                    <td><?= $d['akreditasi']; ?></td>
                    <td class="text-center">
                        <a href="prodi_edit.php?id=<?= $d['id']; ?>" class="btn btn-warning">
                            Edit</a>
                        <a href="prodi_delete.php?id=<?= $d['id']; ?>" class="btn btn-danger"
                            onclick="return confirm('Yakin akan menghapus?');">Hapus</a>
                    </td>
                </tr>
            <?php
                $no++;
            }
            ?>
        </tbody>
    </table>
</div>
<?php include "footer.php"; ?>