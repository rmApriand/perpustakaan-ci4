    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4"  style="margin-top: 20px; margin-bottom:10px;">
    <div class="col-md-7 col-lg-8">
      <div class="judul" style="display: flex;" style="margin-bottom:10px">
        <a href="<?=base_url('stok')?>" class="btn btn-sm" >
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-square-fill" viewBox="0 0 16 16">
            <path d="M16 14a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2zm-4.5-6.5H5.707l2.147-2.146a.5.5 0 1 0-.708-.708l-3 3a.5.5 0 0 0 0 .708l3 3a.5.5 0 0 0 .708-.708L5.707 8.5H11.5a.5.5 0 0 0 0-1"/>
          </svg>
        </a>
        <h4 class="mb-3">Edit Stok</h4>
      </div>
        <form class="needs-validation" method="post" action="<?php echo base_url().urI_string()?>" novalidate>
        <div class="col-sm-12">
            <label for="stokbuku" class="form-label">Stok</label>
            <input type="number" class="form-control" id="stokbuku" placeholder="<?=$buku->stok_buku?>" value="<?= isset($stok->stok_buku) ? $stok->stok_buku : '' ?>" name="stok_buku" min="0" required>
            <div class="invalid-feedback">
                Jumlah stok harus diisi.
            </div>
        </div>
            
          <hr class="my-4">

          <button class="w-100 btn btn-primary btn-lg" type="submit">Simpan</button>
        </form>
      </div>
    </main>