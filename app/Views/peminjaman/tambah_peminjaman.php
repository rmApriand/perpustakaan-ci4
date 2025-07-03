
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4" style="margin-top: 20px; margin-bottom:10px;">
    <div class="col-md-7 col-lg-8">
        <div class="judul" style="display: flex;">
            <a href="<?= base_url('peminjaman') ?>" class="btn btn-sm">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-square-fill" viewBox="0 0 16 16">
                    <path d="M16 14a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2zm-4.5-6.5H5.707l2.147-2.146a.5.5 0 1 0-.708-.708l-3 3a.5.5 0 0 0 0 .708l3 3a.5.5 0 0 0 .708-.708L5.707 8.5H11.5a.5.5 0 0 0 0-1"/>
                </svg>
            </a>
            <h4 class="mb-3">Tambah Peminjaman</h4>
        </div>
        <form class="needs-validation" method="POST" action="<?php echo base_url().urI_string()?>" enctype="multipart/form-data" novalidate>
          <div class="row g-3">

            <div class="col-sm-12">
              <label for="iduser" class="form-label">User</label>
              <select class="form-select" id="iduser" name="id_user" required>
                  <option value="">Pilih User</option>
                  <?php 
                  usort($userList, function($a, $b) {
                    return strcmp($a->nama_user, $b->nama_user);
                  });
                  foreach ($userList as $buser) : ?>
                      <option value="<?= $buser->id_user ?>"><?= $buser->nama_user ?></option>
                  <?php endforeach; ?>
              </select>
              <div class="invalid-feedback">
                  Program Studi harus dipilih.
              </div>
            </div>

            <div class="col-sm-12">
              <label for="kodebuku" class="form-label">Buku</label>
              <select class="form-select" id="kodebuku" name="kode_buku" required>
                  <option value="">Pilih Buku</option>
                  <?php 
                  usort($bukuList, function($a, $b) {
                    return strcmp($a->judul, $b->judul);
                  });
                  foreach ($bukuList as $bbuku) : ?>
                      <option value="<?= $bbuku->kode_buku ?>"><?= $bbuku->judul ?></option>
                  <?php endforeach; ?>
              </select>
              <div class="invalid-feedback">
                  Program Studi harus dipilih.
              </div>
            </div>

            <div class="col-sm-12">
              <label for="tanggalpeminjaman" class="form-label">Tanggal Peminjaman</label>
              <input type="date" class="form-control" id="tanggalpeminjaman" placeholder="" value="" name="tanggal_peminjaman" required>
              <div class="invalid-feedback">
                Nama Barang required.
              </div>
            </div>

            <div class="col-sm-12">
              <label for="tanggaldikembalikan" class="form-label">Tanggal Dikembalikan</label>
              <input type="date" class="form-control" id="tanggaldikembalikan" placeholder="" value="" name="tanggal_dikembalikan" required>
              <div class="invalid-feedback">
                Deskripsi required.
              </div>
            </div>

          <hr class="my-4">

          <button class="w-100 btn btn-primary btn-lg" type="submit">Simpan</button>
          </div>
        </form>
      </div>
    </main>

