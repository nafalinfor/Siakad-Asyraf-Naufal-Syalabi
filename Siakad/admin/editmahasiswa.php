<?php
require_once "../config.php";

$idx = isset($_GET['id']) ? intval($_GET['id']) : 0;

// ambil data dosen
$sql = "SELECT * FROM mhs WHERE id=$idx";
$data = $db->query($sql)->fetch_assoc();

// simpan edit
if (isset($_POST['simpanEdit'])) {
    $nim    = $_POST['nim'];
    $prodi  = $_POST['prodi'];
    $nama   = $_POST['nama'];
    $gender = $_POST['gender'];
    $alamat = $_POST['alamat'];

    $update = "UPDATE mhs 
               SET nim='$nim',
                   prodi='$prodi',
                   nama='$nama',
                   gender='$gender',
                   alamat='$alamat'
               WHERE id=$idx";

    if ($db->query($update)) {
        echo "<script>
                alert('Data berhasil diperbarui');
                window.location.href='index.php?p=mahasiswa';
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
              <h3 class="card-title">Edit Mahasiswa</h3>
            </div>

            <div class="card-body">
              <form method="post">

                <div class="mb-3">
                  <label>NIM</label>
                  <input type="number" name="nim" value="<?= $data['nim'] ?>" class="form-control" required>
                </div>

                <div class="mb-3">
                  <label>Program Studi</label>
                  <select name="prodi" class="form-control" required>
                    <option value="1" <?= ($data['prodi']=='1')?'selected':'' ?>>Arsitektur</option>
                    <option value="2" <?= ($data['prodi']=='2')?'selected':'' ?>>Informatika</option>
                    <option value="3" <?= ($data['prodi']=='3')?'selected':'' ?>>Ilmu Lingkungan</option>
                    <option value="4" <?= ($data['prodi']=='4')?'selected':'' ?>>Perpustakaan dan sains</option>
                  </select>
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
                  <label>Alamat</label>
                  <input type="text" name="alamat" value="<?= $data['alamat'] ?>" class="form-control" required>
                </div>

                

                <button type="submit" name="simpanEdit" class="btn btn-primary">
                  Simpan Perubahan
                </button>

                <a href="index.php?p=mahasiswa" class="btn btn-secondary ms-2">
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
