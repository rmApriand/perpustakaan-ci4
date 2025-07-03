<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Kelola Stok</h1>
      </div>

      <div class="table-responsive small">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Gambar Buku</th>
              <th scope="col">Judul</th>
              <th scope="col">Stok</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
          <?php $count=1;?>
          <?php foreach($buku as $aBuku){?>
            <tr>
              <td><?=$count?></td>
              <td><img src="<?= base_url('./asset/'.$aBuku->gambar_buku) ?>" alt="Gambar Buku" style="max-width: 100px; max-height: 100px;"></td>
              <td><?=$aBuku->judul?></td>
              <td><?=$aBuku->stok_buku?></td>
              <td>
                <a href="<?php echo base_url("edit-stok/".$aBuku->kode_buku)?>" class="btn btn-sm btn-info">Edit</a>
                <a href="<?php echo base_url("delete-stok/".$aBuku->kode_buku)?>" class="btn btn-sm btn-danger">delete</a>
              </td>
            </tr>
          <?php $count++;?>
          <?php }?>
          </tbody>
        </table>
      </div>
    </main>

            
