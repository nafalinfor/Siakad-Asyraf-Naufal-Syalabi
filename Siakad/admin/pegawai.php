<?php
require_once "../config.php";

// ambil data pegawai
$data = $db->query("SELECT * FROM pegawai");
?>

<main class="app-main">
    <!-- Header -->
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Data Pegawai</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Data Pegawai</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <!-- Konten -->
    <div class="app-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card mt-4">
                        <div class="card-header">
                            <h3 class="card-title">Data Pegawai</h3>
                        </div>

                        <div class="card-body">
                            <a href="?p=tambah_pegawai" class="btn btn-info btn-sm mb-3">
                                Tambah Pegawai
                            </a>

                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>NIK</th>
                                        <th>Nama Pegawai</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>

                                <?php
                                $no = 1;
                                while ($d = $data->fetch_assoc()):
                                    $gender = ($d['gender'] === 'L')
                                        ? 'Laki-laki'
                                        : 'Perempuan';
                                ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= htmlspecialchars($d['nik']); ?></td>
                                        <td><?= htmlspecialchars($d['nama']); ?></td>
                                        <td><?= $gender; ?></td>
                                        <td>
                                            <a href="./?p=detail pegawai&id=<?= $d['id']; ?>"
                                               class="btn btn-info btn-sm">
                                               Detail
                                            </a>

                                            <a href="./?p=edit pegawai&id=<?= $d['id']; ?>"
                                               class="btn btn-warning btn-sm">
                                               Edit
                                            </a>

                                            <a href="hapuspegawai.php?id=<?= $d['id']; ?>"
                                               class="btn btn-danger btn-sm"
                                               onclick="return confirm('Yakin ingin menghapus data ini?')">
                                               Hapus
                                            </a>
                                        </td>
                                    </tr>
                                <?php endwhile; ?>

                                </tbody>
                            </table>
                        </div> <!-- card-body -->
                    </div> <!-- card -->
                </div> <!-- col -->
            </div> <!-- row -->
        </div> <!-- container -->
    </div> <!-- app-content -->
</main>
