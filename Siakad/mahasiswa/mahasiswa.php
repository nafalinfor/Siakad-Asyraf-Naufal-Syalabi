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
                        <li class="breadcrumb-item active" aria-current="page">Data Mahasiswa</li>
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
                            <h3 class="card-title">Data Mahasiswa</h3>
                        </div>

                        <div class="card-body">
                            <table class="table table-bordered table-striped">
                                <thead>
                                <a href="?p=tambah-mahasiswa" class="btn btn-info btn-sm">Tambah Mahasiswa</a>
                                    <br></br>
                                    <tr>
                                        <th>No</th>
                                        <th>NIM</th>
                                        <th>Nama Mahasiswa</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Prodi</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
<?php
$no = 1;
while ($d = $data->fetch_assoc()) {
    // Konversi kode prodi ke nama
    if ($d['prodi'] == 1) {
        $prodi = "INF";
    } elseif ($d['prodi'] == 2) {
        $prodi = "ARS";
    } else {
        $prodi = "Tidak diketahui";
    }
?>
    <tr>
        <td><?= $no++; ?></td>
        <td><?= htmlspecialchars($d['nim']); ?></td>
        <td><?= htmlspecialchars($d['nama']); ?></td>
        <td><?= htmlspecialchars($d['gender']); ?></td>
        <td><?= $prodi; ?></td>
        <td>
            <a href="#" class="btn btn-info btn-sm">Detail</a>
            <button 
                class="btn btn-warning btn-sm" 
                data-bs-toggle="modal" 
                data-bs-target="#editModal<?= $d['id']; ?>">Edit</button>
            <a href="hapus.php?id=<?= $d['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
        </td>
    </tr>

    <!-- Modal Edit -->
    <div class="modal fade" id="editModal<?= $d['id']; ?>" tabindex="-1" aria-labelledby="editModalLabel<?= $d['id']; ?>" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="update.php" method="POST">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel<?= $d['id']; ?>">Edit Data Mahasiswa</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <input type="hidden" name="id" value="<?= $d['id']; ?>">

                        <div class="mb-3">
                            <label for="nim<?= $d['id']; ?>" class="form-label">NIM</label>
                            <input type="text" class="form-control" id="nim<?= $d['id']; ?>" name="nim" value="<?= htmlspecialchars($d['nim']); ?>" required>
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

                        <div class="mb-3">
                            <label for="prodi<?= $d['id']; ?>" class="form-label">Prodi</label>
                            <select class="form-select" id="prodi<?= $d['id']; ?>" name="prodi" required>
                                <option value="1" <?= $d['prodi'] == 1 ? 'selected' : ''; ?>>INF</option>
                                <option value="2" <?= $d['prodi'] == 2 ? 'selected' : ''; ?>>ARS</option>
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
    </div> <!-- end app-content -->
</main>