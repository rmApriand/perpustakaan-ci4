    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4"  style="margin-top: 20px; margin-bottom:10px;">
    <div class="col-md-7 col-lg-8">
      <div class="judul" style="display: flex;" style="margin-bottom:10px">
        <a href="<?=base_url('peminjaman')?>" class="btn btn-sm" >
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-square-fill" viewBox="0 0 16 16">
            <path d="M16 14a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2zm-4.5-6.5H5.707l2.147-2.146a.5.5 0 1 0-.708-.708l-3 3a.5.5 0 0 0 0 .708l3 3a.5.5 0 0 0 .708-.708L5.707 8.5H11.5a.5.5 0 0 0 0-1"/>
          </svg>
        </a>
        <h4 class="mb-3">Edit Peminjaman</h4>
      </div>
      <form class="needs-validation" method="post" action="<?php echo base_url().urI_string() ?>" novalidate>
          <div class="row g-3">
              <div class="col-sm-12">
                  <label for="kode_peminjaman" class="form-label">Kode Peminjaman</label>
                  <input type="text" class="form-control" id="kode_peminjaman" name="kode_peminjaman" value="<?= $peminjaman->kode_peminjaman ?>" readonly>
              </div>
              <div class="col-sm-12">
                  <label for="id_user" class="form-label">ID User</label>
                  <input type="text" class="form-control" id="id_user" name="id_user" value="<?= $peminjaman->id_user ?>" required>
              </div>
              <div class="col-sm-12">
                  <label for="kode_buku" class="form-label">Kode Buku</label>
                  <input type="text" class="form-control" id="kode_buku" name="kode_buku" value="<?= $peminjaman->kode_buku ?>" required>
              </div>
              <div class="col-sm-12">
                  <label for="tanggal_peminjaman" class="form-label">Tanggal Peminjaman</label>
                  <input type="date" class="form-control" id="tanggal_peminjaman" name="tanggal_peminjaman" value="<?= $peminjaman->tanggal_peminjaman ?>" required>
              </div>
              <div class="col-sm-12">
                  <label for="tanggal_dikembalikan" class="form-label">Tanggal Dikembalikan</label>
                  <input type="date" class="form-control" id="tanggal_dikembalikan" name="tanggal_dikembalikan" value="<?= $peminjaman->tanggal_dikembalikan ?>" required>
              </div>
              <div class="col-sm-12">
                  <label for="statuspeminjaman" class="form-label">Status Peminjaman</label>
                  <select class="form-control" id="statuspeminjaman" name="status_peminjaman" required>
                      <option value="">Pilih Status</option>
                      <option value="Dipinjam" <?= ($peminjaman->status_peminjaman == 'Dipinjam') ? 'selected' : '' ?>>Dipinjam</option>
                      <option value="Dikembalikan" <?= ($peminjaman->status_peminjaman == 'Dikembalikan') ? 'selected' : '' ?>>Dikembalikan</option>
                  </select>
                  <div class="invalid-feedback">
                      Status Peminjaman required.
                  </div>
              </div>
              <hr class="my-4">
              <button class="w-100 btn btn-primary btn-lg" type="submit">Simpan</button>
          </div>
      </form>

      </div>
    </main>