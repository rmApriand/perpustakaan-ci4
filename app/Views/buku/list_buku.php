<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Kelola Buku</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group me-2">
            <a href="<?php echo base_url("tambah-buku")?>" type="button" class="btn btn-primary ">Tambah</a>
          </div>
        </div>
      </div>

      <?php foreach ($kategoriList as $kategori): ?>
        <section class="py-4">
            <h2 class="h4" style="color:#07b;"><?= $kategori->nama_kategori ?></h2>
            <div class="table-responsive small">
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                            <th scope="col">Gambar Buku</th>
                            <th scope="col">ISBN</th>
                            <th scope="col">Judul</th>
                            <th scope="col">Penulis</th>
                            <th scope="col">Penerbit</th>
                            <th scope="col">Tahun Terbit</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach($buku as $aBuku): ?>
                        <?php if ($aBuku->kode_kategori == $kategori->kode_kategori): ?>
                            <tr>
                                <td><img src="<?= base_url('./asset/'.$aBuku->gambar_buku) ?>" alt="Gambar Buku" style="max-width: 100px; max-height: 100px;"></td>
                                <td><?= $aBuku->ISBN ?></td>
                                <td><?= $aBuku->judul ?></td>
                                <td><?= $aBuku->penulis ?></td>
                                <td><?= $aBuku->penerbit ?></td>
                                <td><?= $aBuku->tahun_terbit ?></td>
                                <td>
                                    <a href="<?php echo base_url("edit-buku/".$aBuku->kode_buku)?>" class="btn btn-sm btn-info">Edit</a>
                                    <a href="<?php echo base_url("delete-buku/".$aBuku->kode_buku)?>" class="btn btn-sm btn-danger">Delete</a>
                                </td>
                            </tr>
                        <?php endif; ?>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </section>
    <?php endforeach; ?>
</main>

            
