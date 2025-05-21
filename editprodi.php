<?php include "header.php" ?>
<div class="container">
    <h2 class="mb-4">Form Edit Data Prodi</h2>
    <?php
    include "koneksi.php";
    $id = $_GET['id'];
    $data = mysqli_query($conn, "SELECT * FROM prodi WHERE id='$id'");
    while ($d = mysqli_fetch_array($data)) {
    ?>
        <form action="" method="post">
            <div class="mb-3">
                <label for="" class="form-label">Kode Program Studi</label>
                <input type="text" class="form-control" name="kdprodi" value="<?= $d['kdprodi']; ?>">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Nama Program Studi</label>
                <input type="text" class="form-control" name="prodi" value="<?= $d['prodi']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="jenjang" class="form-label">Jenjang</label>
                <select name="jenjang" id="" class="form-select">
                    <option value="<?= $d['jenjang']; ?>"><?= $d['jenjang']; ?></option>
                    <option value="">-- Pilih Jenjang --</option>
                    <option value="D3">D3</option>
                    <option value="S1">S1</option>
                    <option value="S2">S2</option>
                    <option value="S3">S3</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="akreditasi" class="form-label">Akreditasi</label>
                <select name="akreditasi" id="" class="form-select">
                    <option value="<?= $d['akreditasi']; ?>"><?= $d['akreditasi']; ?></option>
                    <option value="">-- Pilih Akreditasi --</option>
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="C">C</option>
                    <option value="Belum Terakreditasi">Belum Terakreditasi</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="tampilprodi.php" class="btn btn-danger">Batal</a>
        </form>
    <?php
    }
