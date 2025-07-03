    <main class="container py-5" style="margin-top: 20px;">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 style="font-weight: bold; text-align: center; width: 100%; font-family: 'Playfair Display', serif;">Daftar Peminjaman</h1>
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
            </tr>
          </thead>
          <tbody>
          <?php $count=1;?>
          <?php foreach($peminjaman as $aPeminjaman){?>
            <tr>
                <td><?=$count ?></td>
                <td><?=$aPeminjaman->NPM?></td>
                <td><img src="<?= base_url('./asset/'.$aPeminjaman->gambar_buku) ?>" alt="Gambar Buku" style="max-width: 100px; max-height: 100px;"></td>
                <td><?=$aPeminjaman->judul?></td>
                <td><?=$aPeminjaman->tanggal_peminjaman?></td>
                <td><?=$aPeminjaman->tanggal_dikembalikan?></td>
                <td style="font-weight:bold;" class="<?= ($aPeminjaman->status_peminjaman === 'Dipinjam') ? 'text-danger' : 'text-success' ?>"><?=$aPeminjaman->status_peminjaman?></td>
            </tr>
            <?php $count++;?>
            <?php }?>
          </tbody>
        </table>
      </div>
    </main>