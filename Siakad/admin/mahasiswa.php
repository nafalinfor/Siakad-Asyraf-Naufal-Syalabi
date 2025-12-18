<?php
require_once "../config.php";

// ambil data mahasiswa
$data = $db->query("SELECT * FROM mhs");
?>

<main class="app-main">

    <!-- Header -->
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Data Mahasiswa</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Data Mahasiswa</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <!-- Content -->
    <div class="app-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <div class="card mt-4">
                        <div class="card-header">
                            <h3 class="card-title">Data Mahasiswa</h3>
                        </div>

                        <div class="card-body">

                            <a href="?p=tambah mahasiswa" class="btn btn-info btn-sm mb-3">
                                Tambah Mahasiswa
                            </a>

                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th width="40">No</th>
                                        <th>NIM</th>
                                        <th>Prodi</th>
                                        <th>Nama</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Alamat</th>
                                        <th width="180">Opsi</th>
                                    </tr>
                                </thead>

                                <tbody>
                                <?php
                                $no = 1;
                                while ($d = $data->fetch_assoc()) {

                                    // prodi
                                    if ($d['prodi'] == 1) {
                                        $prodi = "INF";
                                    } elseif ($d['prodi'] == 2) {
                                        $prodi = "ARS";
                                    } else {
                                        $prodi = "-";
                                    }

                                    // gender (FINAL & AMAN)
                                    $gender = ($d['gender'] === 'L') ? 'Laki-laki' : 'Perempuan';
                                ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= htmlspecialchars($d['nim']); ?></td>
                                        <td><?= $prodi; ?></td>
                                        <td><?= htmlspecialchars($d['nama']); ?></td>
                                        <td><?= $gender; ?></td>
                                        <td><?= htmlspecialchars($d['alamat']); ?></td>
                                        <td>
                                            <a href="./?p=detail mahasiswa&id=<?= $d['id']; ?>" 
                                               class="btn btn-info btn-sm">Detail</a>

                                            <a href="./?p=edit mahasiswa&id=<?= $d['id']; ?>" 
                                               class="btn btn-warning btn-sm">Edit</a>

                                            <a href="hapusmahasiswa.php?id=<?= $d['id']; ?>" 
                                               class="btn btn-danger btn-sm"
                                               onclick="return confirm('Yakin ingin menghapus data ini?')">
                                               Hapus
                                            </a>
                                        </td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</main>
