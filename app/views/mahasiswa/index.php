<div class="jumbotron container mt-4 col-lg-6">
  <h1 class="display-4">Halo, ini adalah halaman mahasiswa index</h1>
  <hr class="my-4">

  <div class="row">
    <div class="col-lg-6">
      <?php Flasher::flash() ?>
    </div>
  </div>

  <button type="button" class="btn btn-primary mb-3 modalTambah" data-toggle="modal" data-target="#formModal">
    Tambah Data Mahasiswa
  </button>

  <div class="d-lg-flex justify-content-between mb-3">
    <h3>Daftar mahasiswa : </h3>
    <form class="form-inline my-2 my-lg-0 searchForm">
      <input class="form-control mr-sm-2" type="search" placeholder="Cari Mahasiswa" aria-label="srcMhs" autocomplete="off">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
  <ul class="list-group">
    <?php foreach ($data["mahasiswa"] as $mahasiswa): ?>
      <li class="list-group-item">
        <p class="d-inline"><?=$mahasiswa["nama"]?></p>
        <div class="d-flex justify-content-between float-right">

          <a href="<?=BASEURL?>/mahasiswa/detail/<?=$mahasiswa["id"]?>"
          class="btn btn-success btn-sm mr-2">
            Detail
          </a>
          <a href="<?=BASEURL?>/mahasiswa/ubah/<?=$mahasiswa["id"]?>"
          class="btn btn-primary btn-sm mr-2 modalUbah" data-toggle="modal" data-target="#formModal" data-id="<?=$mahasiswa["id"]?>" >
            Edit
          </a>
          <a href="<?=BASEURL?>/mahasiswa/hapus/<?=$mahasiswa["id"]?>"
          class="btn btn-danger btn-sm">
            Hapus
          </a>

        </div>
      </li>
    <?php endforeach;?>
  </ul>

      <!-- Modal -->
      <div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="modalLabel">Form Mahasiswa</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

              <form action="<?=BASEURL?>/mahasiswa/tambah" method="post">
                <input type="hidden" name="id" id="id">
                <div class="form-group">
                  <label for="nama">Nama Mahasiswa</label>
                  <input type="text" class="form-control" id="nama" placeholder="Nama mahasiswa" name="nama" required autofocus>
                </div>

                <div class="form-group">
                  <label for="nrp">NRP Mahasiswa</label>
                  <input type="number" class="form-control" id="nrp" placeholder="NRP mahasiswa" name="nrp" required>
                </div>

                <div class="form-group">
                  <label for="email">Email Mahasiswa</label>
                  <input type="email" class="form-control" id="email" placeholder="Email mahasiswa" name="email" required>
                </div>

                <div class="form-group">
                  <label for="jurusan">Jurusan</label>
                  <select class="form-control" id="jurusan" name="jurusan">
                    <option value="Teknik Informatika">Teknik Informatika</option>
                    <option value="Teknik Pangan">Teknik Pangan</option>
                    <option value="Teknik Elektro">Teknik Elektro</option>
                    <option value="Teknik Lingkungan">Teknik Lingkungan</option>
                    <option value="Teknik Mesin">Teknik Mesin</option>
                    <option value="Teknik Industri">Teknik Industri</option>
                  </select>
                </div>

              </div>

              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                <button type="submit" class="btn btn-outline-primary">Tambah</button>
              </div>

            </form>
            <!-- Close Tag Form -->

          </div>
        </div>
      </div>
</div>

