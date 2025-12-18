

<main class="app-main">
        <!--begin::App Content Header-->
        <div class="app-content-header">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
              <!--begin::Col-->
              <div class="col-sm-6"><h1 class="mb-0">Tambah Dosen</h1></div>
              <!--end::Col-->
              <!--begin::Col-->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Tambah Dosen</li>
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
                <div class="card mt-4">
                  <!--begin::Card Header-->
                  <div class="card-header">
                    <!--begin::Card Title-->
                    <h3 class="card-title"></h3>
                    
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
                  <!--begin::Card Footer-->
                  <div class="card-body">

                  <?php
                    
                    $nidn = "";
                    $matakuliah = "";
                    $nama = "";
                    $gender = "";


                    
                    if (isset($_POST['simpan'])) {
                        $nidn = $_POST['nidn'];
                        $matakuliah = $_POST['matakuliah'];
                        $nama = $_POST['nama'];
                        $gender = $_POST['gender'];
                        require_once "../config.php";
                        $waktu = date("Y-m-d H:i:s");
                        $sql = "insert into dosen set nidn='$nidn', matakuliah='$matakuliah', nama='$nama', gender='$gender',
                                waktu='$waktu'";
                        $tes = $db->query($sql);
                        if ($tes) {
                            echo "<div class='alert alert-success'>Data berhasil disimpan.<br>
                            <a href='./?p=dosen'>Lihat Data</a></div>";
                        }
                    }
                    ?>

                    <form method="post" action="#">
                    <table>
                    <tr><td>NIDN</td><td><input type="number" name="nidn" class="form-control" value="<?= $nidn ?>"></td></tr>
                    <tr><td>Nama Lengkap</td><td><input type="text" name="nama" class="form-control" value="<?= $nama ?>"></td></tr>
                    <tr><td>Jenis Kelamin</td><td>
                        <input type="radio" name="gender" value="Laki-laki" id="genderL" <?php if($gender=="Laki-laki") echo "checked"; ?>>
                        <label for="genderL">Laki-laki</label>
                        <input type="radio" name="gender" value="Perempuan" id="genderP" <?php if($gender=="Perempuan") echo "checked"; ?>>
                        <label for="genderP">Perempuan</label>
                    </td></tr>
                    <tr><td valign="top">Alamat</td><td>
                        <textarea name="alamat" class="form-control" style="width:300px"><?= $alamat ?></textarea>
                    </td></tr>
                    <tr><td>Mata Kuliah</td><td>
                    <select class="form-control" name="matakuliah">
                        <option></option>
                        <option value="1" <?php if($matakuliah=="1") echo "selected"; ?>>Pemrograman Web</option>
                        <option value="2" <?php if($matakuliah=="2") echo "selected"; ?>>Bahasa Arab</option>
                        <option value="3" <?php if($matakuliah=="3") echo "selected"; ?>>Bahasa Inggris</option>
                        <option value="4" <?php if($matakuliah=="4") echo "selected"; ?>>Akidah Akhlak</option>
                        <option value="5" <?php if($matakuliah=="5") echo "selected"; ?>>PKN</option>
                        
                    </select>
                    </td></tr>
                    <tr><td></td><td><input type="submit" name="simpan" value="Simpan" class="btn btn-primary"></td></tr>
                    </table>
                    </form>

                  </div>
                  <!--end::Card Footer-->
                </div>
                <!--end::Card-->
              </div>
              <!--end::Col-->
            </div>
            <!--end::Row-->
          </div>
          <!--end::Container-->
        </div>
        <!--end::App Content-->
      </main>