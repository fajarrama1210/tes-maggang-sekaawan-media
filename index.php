<?php
// PANGGIL KONEKSI DATABASE
include "koneksi.php";

?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>CRUD Jarr</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>

  <div class="container">

    <div class="mt-3">
      <h2 class="text-center">MANAJEMEN MAHASISWA</h2>
    </div>

    <div class="card mt-3">
      <div class="card-header bg-primary text-white">
        Data Mahasiswa
      </div>
      <div class="card-body">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#modalTambah">
          Tambah Data
        </button>

        <table class="table table-bordered table-striped table-hover">
          <tr>
            <th>No.</th>
            <th>Nim</th>
            <th>Nama Lengkap</th>
            <th>Jenis Kelamin</th>
            <th>Alamat</th>
            <th>Prodi</th>
            <th>Aksi</th>
          </tr>

          <?php

          // PERSIAPAN MENAPILKAN DATA
          $no = 1;
          $tampil = mysqli_query($koneksi, "SELECT * FROM tmhs ORDER BY id_mhs DESC");
          while ($data = mysqli_fetch_array($tampil)) :

          ?>

            <tr>
              <td><?= $no++ ?></td>
              <td><?= $data['nim'] ?></td>
              <td><?= $data['nama'] ?></td>
              <td><?php if ($data['jenis_kelamin'] == 0) {
                    echo "Laki-Laki";
                  } else {
                    echo "Perempuan";
                  } ?></td>
              <td><?= $data['alamat'] ?></td>
              <td><?= $data['prodi'] ?></td>
              <td>
                <a href="#" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalUbah<?= $no ?>">Ubah</a>
                <a href="#" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalHapus<?= $no ?>">Hapus</a>
              </td>
            </tr>

            <!-- Awal Modal Ubah-->
            <div class="modal fade" id="modalUbah<?= $no ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Form Data Mahasiswa</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>

                  <form method="POST" action="aksi_crud.php">
                    <input type="hidden" name="id_mhs" value="<?= $data['id_mhs'] ?>">

                    <div class="modal-body">

                      <div class="mb-3">
                        <label class="form-label">NIM</label>
                        <input type="text" class="form-control" name="tnim" value="<?= $data['nim'] ?>" placeholder="Masukkan NIM Anda!">
                      </div>

                      <div class="mb-3">
                        <label class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" name="tnama" value="<?= $data['nama'] ?>" placeholder="Masukkan Nama Lengkap Anda!">
                      </div>
                      <div class="mb-3">
                        <label class="form-label">Jenis Kelamin</label>
                        <select class="form-select" name="tkelamin">
                          <option value="0" <?php echo ($data['jenis_kelamin'] == 0) ? 'selected' : ''; ?>>Laki - Laki</option>
                          <option value="1" <?php echo ($data['jenis_kelamin'] == 1) ? 'selected' : ''; ?>>Perempuan</option>
                        </select>

                      </div>
                      <div class="mb-3">
                        <label class="form-label">Alamat</label>
                        <textarea class="form-control" name="talamat" rows="3"><?= $data['alamat'] ?></textarea>
                      </div>

                      <div class="mb-3">
                        <label class="form-label">Prodi</label>
                        <select class="form-select" name="tprodi">
                          <option value="<?= $data['prodi'] ?>"><?= $data['prodi'] ?></option>
                          <option value="D3 - Manajemen Informatika">D3 - Manajemen Informatika</option>
                          <option value="S1 - Sistem Informasi">S1 - Sistem Informasi</option>
                          <option value="S1 - Teknik Informatika">S1 - Teknik Informatika</option>
                        </select>
                      </div>

                    </div>
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-primary" name="bubah">Ubah</button>
                      <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Keluar</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <!-- Akhir Modal Ubah-->


            <!-- Awal Modal Hapus-->
            <div class="modal fade" id="modalHapus<?= $no ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title fs-5" id="staticBackdropLabel">Konfimasi Hapus Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <form method="POST" action="aksi_crud.php">
                    <input type="hidden" name="id_mhs" value="<?= $data['id_mhs'] ?>">

                    <div class="modal-body">

                      <h5 class="text-center"> Apakah anda yakin menghapus data ini? <br>
                        <span class="text-danger"><?= $data['nim'] ?> - <?= $data['nama'] ?></span>
                      </h5>


                    </div>
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-primary" name="bhapus">Ya, Hapus Aja!</button>
                      <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Keluar</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <!-- Akhir Modal Hapus-->


          <?php endwhile; ?>
        </table>

        <!-- Awal Modal Tambah-->
        <div class="modal fade" id="modalTambah" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Form Data Mahasiswa</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>

              <form method="POST" action="aksi_crud.php">
                <div class="modal-body">

                  <div class="mb-3">
                    <label class="form-label">NIM</label>
                    <input type="text" class="form-control" name="tnim" placeholder="Masukkan NIM Anda!">
                  </div>

                  <div class="mb-3">
                    <label class="form-label">Nama Lengkap</label>
                    <input type="text" class="form-control" name="tnama" placeholder="Masukkan Nama Lengkap Anda!">
                  </div>

                  <div class="mb-3">
                    <label class="form-label">Jenis Kelamin</label>
                    <select class="form-select" name="tkelamin">
                      <option value=""></option>
                      <option value="0">Laki - Laki</option>
                      <option value="1">Perempuan</option>
                    </select>
                  </div>

                  <div class="mb-3">
                    <label class="form-label">Alamat</label>
                    <textarea class="form-control" name="talamat" rows="3"></textarea>
                  </div>

                  <div class="mb-3">
                    <label class="form-label">Prodi</label>
                    <select class="form-select" name="tprodi">
                      <option value=""></option>
                      <option value="D3 - Manajemen Informatika">D3 - Manajemen Informatika</option>
                      <option value="S1 - Sistem Informasi">S1 - Sistem Informasi</option>
                      <option value="S1 - Teknik Informatika">S1 - Teknik Informatika</option>
                    </select>
                  </div>

                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary" name="bsimpan">Simpan</button>
                  <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Keluar</button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <!-- Akhir Modal Tambah-->


      </div>
    </div>
  </div>






  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>