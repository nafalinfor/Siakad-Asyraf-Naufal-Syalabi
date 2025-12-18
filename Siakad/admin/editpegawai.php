<?php
require_once "../config.php";

$idx = isset($_GET['id']) ? intval($_GET['id']) : 0;

// ambil data pegawai
$sql = "SELECT * FROM pegawai WHERE id=$idx";
$data = $db->query($sql)->fetch_assoc();

// simpan edit
if (isset($_POST['simpanEdit'])) {
    $nik    = $_POST['nik'];
    $nama   = $_POST['nama'];
    $jk     = $_POST['jk'];

    $update = "UPDATE pegawai 
               SET nik='$nik',
                   nama='$nama',
                   gender='$jk'
               WHERE id=$idx";

    if ($db->query($update)) {
        echo "<script>
                alert('Data berhasil diperbarui');
                window.location.href='index.php?p=pegawai';
              </script>";
    } else {
        echo "<div class='alert alert-danger'>Data gagal diperbarui</div>";
    }
}

// set radio button
$jkL = ($data['gender'] == 'L') ? 'checked' : '';
$jkP = ($data['gender'] == 'P') ? 'checked' : '';
?>

<main class="app-main">
  <div class="app-content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Edit Pegawai</h3>
            </div>

            <div class="card-body">
              <form method="post">

                <div class="mb-3">
                  <label>NIK</label>
                  <input type="number" name="nik" value="<?= $data['nik'] ?>" class="form-control" required>
                </div>

                <div class="mb-3">
                  <label>Nama</label>
                  <input type="text" name="nama" value="<?= $data['nama'] ?>" class="form-control" required>
                </div>

                <div class="mb-3">
                  <label>Jenis Kelamin</label><br>
                  <input type="radio" name="jk" value="L" <?= $jkL ?>> Laki-laki
                  <input type="radio" name="jk" value="P" <?= $jkP ?>> Perempuan
                </div>


                <button type="submit" name="simpanEdit" class="btn btn-primary">
                  Simpan Perubahan
                </button>

                <a href="index.php?p=dosen" class="btn btn-secondary ms-2">
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
