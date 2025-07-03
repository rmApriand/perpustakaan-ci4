    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Kelola Peminjaman</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group me-2">
            <a href="<?php echo base_url("tambah-peminjaman")?>" type="button" class="btn btn-primary ">Tambah</a>
          </div>
        </div>
      </div>

      <div class="table-responsive small">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">NPM Peminjam</th>
              <th scope="col">Gambar Buku</th>
              <th scope="col">Nama Buku</th>
              <th scope="col">Tanggal Peminjaman</th>
              <th scope="col">Tanggal Dikembalikan</th>
              <th scope="col">Status</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
          <?php $count=1;?>
          <?php foreach($peminjaman as $aPeminjaman){?>
            <tr>
                <td><?=$count?></td>
                <td><?=$aPeminjaman->NPM?></td>
                <td><img src="<?= base_url('./asset/'.$aPeminjaman->gambar_buku) ?>" alt="Gambar Buku" style="max-width: 100px; max-height: 100px;"></td>
                <td><?=$aPeminjaman->judul?></td>
                <td><?=$aPeminjaman->tanggal_peminjaman?></td>
                <td><?=$aPeminjaman->tanggal_dikembalikan?></td>
                <td style="font-weight:bold;" class="<?= ($aPeminjaman->status_peminjaman === 'Dipinjam') ? 'text-danger' : 'text-success' ?>"><?=$aPeminjaman->status_peminjaman?></td>
                <td>
                <a href="<?php echo base_url("edit-peminjaman/".$aPeminjaman->kode_peminjaman)?>" class="btn btn-sm btn-info">Edit</a>
                <a href="<?php echo base_url("delete-peminjaman/".$aPeminjaman->kode_peminjaman)?>" class="btn btn-sm btn-danger">delete</a>
                </td>
            </tr>
          <?php $count++;?>
          <?php }?>
          </tbody>
        </table>
      </div>
    </main>

            
