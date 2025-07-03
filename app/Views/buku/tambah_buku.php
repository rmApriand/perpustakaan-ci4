
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4" style="margin-top: 20px; margin-bottom:10px;">
    <div class="col-md-7 col-lg-8">
        <div class="judul" style="display: flex;">
            <a href="<?= base_url('buku') ?>" class="btn btn-sm">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-square-fill" viewBox="0 0 16 16">
                    <path d="M16 14a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2zm-4.5-6.5H5.707l2.147-2.146a.5.5 0 1 0-.708-.708l-3 3a.5.5 0 0 0 0 .708l3 3a.5.5 0 0 0 .708-.708L5.707 8.5H11.5a.5.5 0 0 0 0-1"/>
                </svg>
            </a>
            <h4 class="mb-3">Tambah Buku</h4>
        </div>
        <form class="needs-validation" method="POST" action="<?php echo base_url().urI_string()?>" enctype="multipart/form-data" novalidate>
          <div class="row g-3">
            <div class="col-sm-12">
              <label for="ganbarBuku" class="form-label">Gambar Buku</label>
              <input type="file" class="form-control" id="ganbarBuku" name="gambar_buku" required>
              <div class="invalid-feedback">
                Gambar required.
              </div>
            </div>

            <div class="col-sm-12">
              <label for="ISBN" class="form-label">ISBN</label>
              <input type="text" class="form-control" id="ISBN" placeholder="" value="" name="ISBN" required>
              <div class="invalid-feedback">
                Nama Barang required.
              </div>
            </div>

            <div class="col-sm-12">
              <label for="judul" class="form-label">Judul</label>
              <input type="text" class="form-control" id="judul" placeholder="" value="" name="judul" required>
              <div class="invalid-feedback">
                Nama Barang required.
              </div>
            </div>

            <div class="col-sm-12">
              <label for="penulis" class="form-label">Penulis</label>
              <input type="text" class="form-control" id="penulis" placeholder="" value="" name="penulis" required>
              <div class="invalid-feedback">
                Deskripsi required.
              </div>
            </div>

            <div class="col-sm-12">
              <label for="penerbit" class="form-label">Penerbit</label>
              <input type="text" class="form-control" id="penerbit" placeholder="" value="" name="penerbit" required>
              <div class="invalid-feedback">
                Stok required.
              </div>
            </div>

            <div class="col-sm-12">
                <label for="tahun_terbit" class="form-label">Tahun Terbit</label>
                <input type="date" class="form-control" id="tahun_terbit" placeholder="" value="" name="tahun_terbit" required>
                <div class="invalid-feedback">
                    Tahun terbit harus diisi.
                </div>
            </div>
            
            <div class="col-sm-12">
            <label for="kategori" class="form-label">Kategori</label>
            <select class="form-select" id="kategori" name="kode_kategori" required>
                <option value="">Pilih Kategori</option>
                <?php foreach ($kategoriList as $bkategori) : ?>
                    <option value="<?= $bkategori->kode_kategori ?>"><?= $bkategori->nama_kategori ?></option>
                <?php endforeach; ?>
            </select>
            <div class="invalid-feedback">
                Program Studi harus dipilih.
            </div>
        </div>

          <hr class="my-4">

          <button class="w-100 btn btn-primary btn-lg" type="submit">Simpan</button>
        </form>
      </div>
    </main>

