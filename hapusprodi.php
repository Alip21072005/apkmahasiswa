<?php include "header.php";
$hapus_data = mysqli_query($conn, "DELETE FROM prodi WHERE id='$_GET[id]'");
if ($hapus_data) {
    header('location:tampilprodi.php');
} else {
    echo "<div class='alert alert-danger'>Proses gagal...</div>";
}
