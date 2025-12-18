<?php
require_once "../config.php";

$nama = "";
$nik  = "";
$jk   = "";

if (isset($_POST['simpan'])) {
    $nama = $_POST['nama'];
    $nik  = $_POST['nik'];
    $jk   = $_POST['gender'];

    $sql = "INSERT INTO pegawai (nik, nama, gender)
            VALUES ('$nik', '$nama', '$jk')";

    if ($db->query($sql)) {
        echo "<div class='alert alert-success'>
                Data berhasil disimpan.
                <a href='./?p=pegawai'>Lihat Data</a>
              </div>";
    }
}
?>

<main class="app-main">
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Tambah Pegawai</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Tambah Pegawai</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="app-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card mt-4">
                        <div class="card-body">

                            <form method="post">
                                <div class="mb-3">
                                    <label class="form-label">NIK</label>
                                    <input type="number" name="nik" class="form-control" required value="<?= $nik ?>">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Nama Lengkap</label>
                                    <input type="text" name="nama" class="form-control" required value="<?= $nama ?>">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Jenis Kelamin</label><br>
                                    <input type="radio" name="gender" value="L" <?= $jk=='L'?'checked':'' ?>> Laki-laki
                                    &nbsp;&nbsp;
                                    <input type="radio" name="gender" value="P" <?= $jk=='P'?'checked':'' ?>> Perempuan
                                </div>

                                <button type="submit" name="simpan" class="btn btn-primary">
                                    Simpan
                                </button>
                                <a href="./?p=pegawai" class="btn btn-secondary">
                                    Kembali
                                </a>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
