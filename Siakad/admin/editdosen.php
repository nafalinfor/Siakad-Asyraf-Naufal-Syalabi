<?php
require_once "../config.php";

$idx = isset($_GET['id']) ? intval($_GET['id']) : 0;

// ambil data dosen
$sql = "SELECT * FROM dosen WHERE id=$idx";
$data = $db->query($sql)->fetch_assoc();

// simpan edit
if (isset($_POST['simpanEdit'])) {
    $nidn   = $_POST['nidn'];
    $nama   = $_POST['nama'];
    $jk     = $_POST['jk'];
    $matkul = $_POST['matakuliah'];

    $update = "UPDATE dosen 
               SET nidn='$nidn',
                   nama='$nama',
                   gender='$jk',
                   matakuliah='$matkul'
               WHERE id=$idx";

    if ($db->query($update)) {
        echo "<script>
                alert('Data berhasil diperbarui');
                window.location.href='index.php?p=dosen';
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
              <h3 class="card-title">Edit Dosen</h3>
            </div>

            <div class="card-body">
              <form method="post">

                <div class="mb-3">
                  <label>NIDN</label>
                  <input type="number" name="nidn" value="<?= $data['nidn'] ?>" class="form-control" required>
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

                <div class="mb-3">
                  <label>Mata Kuliah</label>
                  <select name="matakuliah" class="form-control" required>
                    <option value="1" <?= ($data['matakuliah']=='1')?'selected':'' ?>>Pemograman Berbasis Objek</option>
                    <option value="2" <?= ($data['matakuliah']=='2')?'selected':'' ?>>Pemograman Berbasis Platform</option>
                    <option value="3" <?= ($data['matakuliah']=='3')?'selected':'' ?>>Sistem Informasi</option>
                    <option value="4" <?= ($data['matakuliah']=='4')?'selected':'' ?>>Sistem Basis Data</option>
                  </select>
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
