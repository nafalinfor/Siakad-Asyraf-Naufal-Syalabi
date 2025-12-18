<?php
require_once "../config.php";

$keyword  = $_POST['keyword'] ?? '';
$category = $_POST['category'] ?? '';

$sql = "SELECT * FROM dosen";

// PROSES SEARCH
if (isset($_POST['cari']) && $keyword !== '' && $category !== '') {

    if ($category === 'matakuliah') {

        $mapMatkul = [
            'program berbasis objek'     => 1,
            'program berbasis platform'  => 2,
            'sistem informasi'           => 3,
            'sistem basis data'          => 4
        ];

        $key = strtolower(trim($keyword));

        if (isset($mapMatkul[$key])) {
            $idMatkul = $mapMatkul[$key];
            $sql = "SELECT * FROM dosen WHERE matakuliah = $idMatkul";
        } else {
            $sql = "SELECT * FROM dosen WHERE 1=0";
        }

    } else {
        $sql = "SELECT * FROM dosen WHERE $category LIKE '%$keyword%'";
    }
}

$data  = $db->query($sql);
$no = 1;
?>

<main class="app-main">

<!-- HEADER -->
<div class="app-content-header">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-6">
        <h3 class="mb-0">Dashboard Dosen</h3>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-end">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Dashboard Dosen</li>
        </ol>
      </div>
    </div>
  </div>
</div>

<!-- CONTENT -->
<div class="app-content">
  <div class="container-fluid">
    <div class="card">

      <div class="card-header">
        <h3 class="card-title">Data Dosen</h3>
      </div>

      <div class="card-body">

        <!-- TOOLBAR -->
        <div class="d-flex gap-2 mb-3 flex-wrap">
          <a href="./?p=tambah dosen" class="btn btn-primary">Tambah Dosen</a>

          <form method="post" class="d-flex gap-2">
            <input type="text"
                   name="keyword"
                   class="form-control"
                   placeholder="Masukkan kata kunci"
                   value="<?= htmlspecialchars($keyword) ?>">

            <select name="category" class="form-select">
              <option value="nidn" <?= $category=='nidn'?'selected':'' ?>>NIDN</option>
              <option value="nama" <?= $category=='nama'?'selected':'' ?>>Nama</option>
              <option value="gender" <?= $category=='gender'?'selected':'' ?>>Jenis Kelamin</option>
              <option value="matakuliah" <?= $category=='matakuliah'?'selected':'' ?>>Matkul</option>
            </select>

            <button type="submit" name="cari" class="btn btn-success">Search</button>
          </form>
        </div>

        <!-- TABLE -->
        <table class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>No</th>
              <th>NIDN</th>
              <th>Nama</th>
              <th>Jenis Kelamin</th>
              <th>Matkul</th>
              <th>Opsi</th>
            </tr>
          </thead>
          <tbody>

          <?php while ($d = $data->fetch_assoc()): 

            $matkul = match ((int)$d['matakuliah']) {
                1 => 'Program Berbasis Objek',
                2 => 'Program Berbasis Platform',
                3 => 'Sistem Informasi',
                4 => 'Sistem Basis Data',
                default => '-'
            };

            $gender = ($d['gender'] === 'L') ? 'Laki-laki' : 'Perempuan';
          ?>

            <tr>
              <td><?= $no++ ?></td>
              <td><?= htmlspecialchars($d['nidn']) ?></td>
              <td><?= htmlspecialchars($d['nama']) ?></td>
              <td><?= $gender ?></td>
              <td><?= $matkul ?></td>
              <td>
                <a href="./?p=detail dosen&id=<?= $d['id'] ?>" class="btn btn-info btn-sm">Detail</a>
                <a href="./?p=edit dosen&id=<?= $d['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                <a href="hapusdosen.php?id=<?= $d['id'] ?>"
                   class="btn btn-danger btn-sm"
                   onclick="return confirm('Yakin hapus data ini?')">
                   Hapus
                </a>
              </td>
            </tr>

          <?php endwhile; ?>

          </tbody>
        </table>

      </div>
    </div>
  </div>
</div>

</main>
