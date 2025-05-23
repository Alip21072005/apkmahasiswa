<?php include "header.php"; ?>
<div class="container">
    <h2 class="mb-4">Form Edit Data Prodi</h2>
    <?php
    include "koneksi.php";

    // Validasi dan sanitasi ID
    $id = isset($_GET['id']) ? intval($_GET['id']) : 0;

    // Ambil data awal
    $data = mysqli_query($conn, "SELECT * FROM prodi WHERE id='$id'");
    if (mysqli_num_rows($data) > 0) {
        $d = mysqli_fetch_array($data);
    ?>

        <form action="" method="post">
            <div class="mb-3">
                <label class="form-label">Kode Program Studi</label>
                <input type="text" class="form-control" name="kdprodi" value="<?= $d['kdprodi']; ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Nama Program Studi</label>
                <input type="text" class="form-control" name="prodi" value="<?= $d['prodi']; ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Jenjang</label>
                <select name="jenjang" class="form-select" required>
                    <option value="">-- Pilih Jenjang --</option>
                    <?php
                    $jenjang_list = ['D3', 'S1', 'S2', 'S3'];
                    foreach ($jenjang_list as $jenjang) {
                        $selected = ($d['jenjang'] == $jenjang) ? 'selected' : '';
                        echo "<option value='$jenjang' $selected>$jenjang</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Akreditasi</label>
                <select name="akreditasi" class="form-select" required>
                    <option value="">-- Pilih Akreditasi --</option>
                    <?php
                    $akreditasi_list = ['A', 'B', 'C', 'Belum Terakreditasi'];
                    foreach ($akreditasi_list as $akr) {
                        $selected = ($d['akreditasi'] == $akr) ? 'selected' : '';
                        echo "<option value='$akr' $selected>$akr</option>";
                    }
                    ?>
                </select>
            </div>
            <button type="submit" name="update" class="btn btn-primary">Simpan</button>
            <a href="tampilprodi.php" class="btn btn-danger">Batal</a>
        </form>

    <?php
        // Proses update
        if (isset($_POST['update'])) {
            $kdprodi = $_POST['kdprodi'];
            $prodi = $_POST['prodi'];
            $jenjang = $_POST['jenjang'];
            $akreditasi = $_POST['akreditasi'];

            $update = mysqli_query($conn, "UPDATE prodi SET kdprodi='$kdprodi', prodi='$prodi', jenjang='$jenjang', akreditasi='$akreditasi' WHERE id='$id'");

            if ($update) {
                echo "<script>alert('Data berhasil diupdate'); window.location='tampilprodi.php';</script>";
            } else {
                echo "<div class='alert alert-danger'>Update gagal: " . mysqli_error($conn) . "</div>";
            }
        }
    } else {
        echo "<div class='alert alert-warning'>Data tidak ditemukan</div>";
    }
    ?>
</div>