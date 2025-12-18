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
                        <li class="breadcrumb-item active" aria-current="page">Data Pegawai</li>
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
                            <a href="?p=tambah-pegawai" class="btn btn-info btn-sm">Tambah Pegawai</a>
                            <br><br>

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
while ($d = $data->fetch_assoc()) {
?>
    <tr>
        <td><?= $no++; ?></td>
        <td><?= htmlspecialchars($d['nik']); ?></td>
        <td><?= htmlspecialchars($d['nama']); ?></td>
        <td><?= htmlspecialchars($d['gender']); ?></td>
        <td>
            <a href="#" class="btn btn-info btn-sm">Detail</a>

            <button 
                class="btn btn-warning btn-sm" 
                data-bs-toggle="modal" 
                data-bs-target="#editModal<?= $d['id']; ?>">
                Edit
            </button>

            <a href="hapus.php?id=<?= $d['id']; ?>" 
               class="btn btn-danger btn-sm" 
               onclick="return confirm('Yakin ingin menghapus data ini?')">
               Hapus
            </a>
        </td>
    </tr>

    <!-- Modal Edit -->
    <div class="modal fade" id="editModal<?= $d['id']; ?>" tabindex="-1" aria-labelledby="editModalLabel<?= $d['id']; ?>" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="update.php" method="POST">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel<?= $d['id']; ?>">Edit Data Pegawai</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <input type="hidden" name="id" value="<?= $d['id']; ?>">

                        <div class="mb-3">
                            <label for="nik<?= $d['id']; ?>" class="form-label">NIK</label>
                            <input type="text" class="form-control" id="nik<?= $d['id']; ?>" name="nik" value="<?= htmlspecialchars($d['nik']); ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="nama<?= $d['id']; ?>" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="nama<?= $d['id']; ?>" name="nama" value="<?= htmlspecialchars($d['nama']); ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="gender<?= $d['id']; ?>" class="form-label">Gender</label>
                            <select class="form-select" id="gender<?= $d['id']; ?>" name="gender" required>
                                <option value="Laki-laki" <?= $d['gender'] == 'Laki-laki' ? 'selected' : ''; ?>>Laki-laki</option>
                                <option value="Perempuan" <?= $d['gender'] == 'Perempuan' ? 'selected' : ''; ?>>Perempuan</option>
                            </select>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-success">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php } ?>

                                </tbody>
                            </table>
                        </div> <!-- end card-body -->

                    </div> <!-- end card -->
                </div> <!-- end col -->
            </div> <!-- end row -->
        </div> <!-- end container-fluid -->
    </div> <!-- end app-content -->
</main>
