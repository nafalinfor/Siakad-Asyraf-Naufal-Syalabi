<?php
require_once "../config.php";

$id = $_GET['id'];

$sql = "DELETE FROM dosen WHERE id='$id'";
$result = $db->query($sql);

if ($result) {
    echo "<script>
        alert('Data berhasil dihapus');
        window.location.href='index.php?p=dosen';
    </script>";
} else {
    echo "<script>
        alert('Data gagal dihapus');
        window.location.href='index.php?p=dosen';
    </script>";
}
?>
