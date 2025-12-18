<?php
require_once "../config.php";
$keyword = $_POST['keyword'] ?? '';
$category = $_POST['category'] ?? '';

$sql = "select * from dosen";

if (isset($_POST['cari']) && !empty($keyword) && !empty($category)) {
    if ($category == "matakuliah") {
        if ($keyword == "Pemograman Berbasis Objek") {
            $matkul = 1;
        } elseif ($keyword == "Pemograman Berbasis Platform") {
            $matkul = 2;
        } elseif ($keyword == "Sistem Informasi") {
            $matkul = 3;
        } elseif ($keyword == "Sistem Basis Data") {
            $matkul = 4;
        
          
        }
        $sql = "select * from dosen where matakuliah = '$matkul'";
    } else {
        $sql = "select * from dosen where $category like '%$keyword%'";
    }
}

$data = $db->query($sql);
$nomor = 0; 
?>
<main class="app-main">
        <!--begin::App Content Header-->
        <div class="app-content-header">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
              <!--begin::Col-->
              <div class="col-sm-6"><h3 class="mb-0">Dashboard dosen</h3></div>
              <!--end::Col-->
              <!--begin::Col-->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Dashboard admin</li>
                </ol>
              </div>
              <!--end::Col-->
            </div>
            <!--end::Row-->
          </div>
          <!--end::Container-->
        </div>
        <!--end::App Content Header-->
        <!--begin::App Content-->
        <div class="app-content">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
              <!--begin::Col-->
              <div class="col-12">
                <!--begin::Card-->
                <div class="card">
                  <!--begin::Card Header-->
                  <div class="card-header">
                    <!--begin::Card Title-->
                    <h3 class="card-title">Dashboard Admin</h3>
                    <!--end::Card Title-->
                    <!--begin::Card Toolbar-->
                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-lte-toggle="card-collapse">
                        <i data-lte-icon="expand" class="bi bi-plus-lg"></i>
                        <i data-lte-icon="collapse" class="bi bi-dash-lg"></i>
                      </button>
                      <button
                        type="button"
                        class="btn btn-tool"
                        data-lte-toggle="card-remove"
                        title="Remove"
                      >
                        <i class="bi bi-x-lg"></i>
                      </button>
                    </div>
                    <!--end::Card Toolbar-->
                  </div>
                  <!--end::Card Header-->
                  <!--begin::Card Body-->
                  <div class="card-body">
                    <!--begin::Row-->
                    <div class="row">
                      <!--begin::Col-->
                      <div class="card-body">
                 <div class="d-flex align-items-center gap-3 mb-3 flex-wrap" style="gap: 12px;">
                <a href="./?p=tambah dosen" class="btn btn-primary" style="width: 150px; font-size: 14px;">Tambah Dosen</a>
                <form method="post" action="#" class="d-flex align-items-center gap-2 flex-wrap" style="gap: 8px;">
                  <div class="position-relative" style="width: 220px;">
                    <input type="text"
                           name="keyword"
                           id="searchInput"
                           class="form-control"
                           placeholder="Masukkan kata kunci"
                           value="<?= htmlspecialchars($keyword); ?>"
                           style="padding-right: 28px;">
                  </div>
                  <select name="category" class="form-select" style="width: 160px; font-size: 14px;">
                    <option value="nidn" <?php if ($category == "nidn") echo "selected"; ?>>NIDN</option>
                    <option value="nama" <?php if ($category == "nama") echo "selected"; ?>>NAMA</option>
                    <option value="gender" <?php if ($category == "gender") echo "selected"; ?>>Jenis Kelamin</option>
                    <option value="matakuliah" <?php if ($category == "matakuliah") echo "selected"; ?>>Matkul</option>
                  </select>
                  <button type="submit" name="cari" class="btn btn-default" style="font-size: 14px; background-color: #FF00FF; border-color: #FF00FF; color: white;">Search</button>
                </form>
              </div>
              <div class="row">
                <div class="col-md-12"> 
                    <?php if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['cari']) && !empty(trim($keyword))): ?>
                    <?php
                    $jumlah = 0;
                    if ($data) {
                        foreach ($data as $row) { $jumlah++; }
                    }

                    $label = match($category) {
                        'nidn' => 'Nidn',
                        'nama' => 'Nama',
                        'gender' => 'Jenis Kelamin',
                        'matakuliah' => 'Program Studi',
                        default => 'kolom'
                    };
                    $keyword_tampil = htmlspecialchars($keyword);
                    ?>
                    <div class="alert alert-info mb-3">
                      Ditemukan <strong><?= $jumlah ?></strong> data dengan <?= strtolower($label) ?> '<strong><?= $keyword_tampil ?></strong>'.
                    </div>
                  <?php endif; ?>
                  <table class="table table-striped table-hover">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Nidn</th>
                        <th>Nama Mahasiswa</th>
                        <th>Jenis Kelamin</th>
                        <th>Matkul</th>
                        <th>Opsi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($data as $d) :
                          $nomor++;
                          switch ($d['matakuliah']) {
                              case 1:
                                  $matkul = "Program Berbasis Objek";
                                  break;
                              case 2:
                                  $matkul = "Program Berbasis Platform";
                                  break;
                              case 3:
                                $matkul = "Sistem Informasi";
                              default:
                                  $matkul = "Tidak diketahui";
                          }
                      ?>
                        <tr>
                          <td><?= $nomor ?></td>
                          <td><?= htmlspecialchars($d['nidn']) ?></td>
                          <td><?= htmlspecialchars($d['nama']) ?></td>
                          <td><?= htmlspecialchars($d['gender']) ?></td>
                          <td><?= htmlspecialchars($matkul) ?></td>
                          <td>
                            <a href='./?p=detail dosen&id=<?= $d['id'] ?>' class='btn btn-xs btn-info btn-sm'>Detail</a>
                            <a href='./?p=edit dosen&id=<?= $d['id'] ?>' class='btn btn-xs btn-warning btn-sm'>Edit</a>
                            <a href='./hapus dosen.php?id=<?= $d['id'] ?>' class='btn btn-xs btn-danger btn-sm' onclick="return confirm('Yakin hapus data <?= htmlspecialchars($d['nama']) ?>?')">Hapus</a>
                          </td>
                        </tr>
                      <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
                         
                      </div>
                      <!--end::Col-->
                      <!--begin::Col-->
                    
        <!--end::App Content-->
      </main>