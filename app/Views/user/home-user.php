<main>
    <section class="py-5 text-center container" style="margin-bottom:-100px;">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1 class="fw-light" style="margin-bottom:20px; font-family: 'Playfair Display', serif;">PERPUSTAKAAN</h1>
                <hr>
                <p class="lead text-body-secondary" style="font-size:18px;">Here is a list of books that we provide in our library, please have a look. And before borrowing, make sure you have registered by pressing the gray button below.</p>
                <p class="lead text-body-secondary" style="font-size:18px;">
                    <a style="color:red;">Note</a>: Jika sudah registrasi, silahkan melihat-lihat buku dan pantau stoknya ya &#128521;
                </p>
                <hr>
                <p>
                    <a href="<?= base_url("login") ?>" class="btn btn-secondary my-2">Tambahkan Datamu</a>
                    <a href="<?= base_url("peminjaman-user") ?>" class="btn btn-primary my-2">Lihat daftar peminjaman teman-temanmu</a>
                </p>
            </div>
        </div>
    </section>

    <!-- Navigation for categories -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary" style="border-bottom: 2px solid #ddd;">
        <div class="container">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                <ul class="navbar-nav">
                    <?php foreach ($buku as $kategori => $items): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="#<?= str_replace(' ', '-', strtolower($kategori)) ?>" style="font-size: 18px; color:white;"><?= $kategori ?></a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Looping through categories -->
    <?php foreach ($buku as $kategori => $items): ?>
        <?php
            usort($items, function($a, $b) {
                return strcmp($a->judul, $b->judul);
            });
        ?>
        <section class="py-5 bg-body-tertiary" id="<?= str_replace(' ', '-', strtolower($kategori)) ?>">
            <div class="container">
                <h2 class="text-center" style="margin-bottom: 20px;"><?= $kategori ?></h2>
                <hr>
                <div class="row row-cols-1 row-cols-md-3 g-4">
                    <?php foreach ($items as $item): ?>
                        <?php if ($item->stok_buku > 0): ?>
                            <div class="col">
                                <div class="card h-100 shadow-sm">
                                    <img class="card-img-top" src="<?= base_url('asset/' . $item->gambar_buku) ?>" alt="<?= $item->judul ?>" style="border: 1px solid #ccc; cursor: pointer;" onclick="showDetail(<?= htmlspecialchars(json_encode($item)) ?>)">
                                    <div class="card-body">
                                        <h5 class="card-title"><?= $item->judul ?></h5>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
    <?php endforeach; ?>

    <!-- Modal -->
    <div class="modal fade" id="bookDetailModal" tabindex="-1" aria-labelledby="bookDetailModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="bookDetailModalLabel">Detail Buku</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-4 text-center">
                            <img id="modal-gambar" src="" alt="" class="img-fluid">
                        </div>
                        <div class="col-md-8">
                            <h5 id="modal-judul"></h5>
                            <hr>
                            <p><b>ISBN:</b> <span id="modal-isbn"></span></p>
                            <p><b>Penulis:</b> <span id="modal-penulis"></span></p>
                            <p><b>Penerbit:</b> <span id="modal-penerbit"></span></p>
                            <p><b>Tahun Terbit:</b> <span id="modal-tahun-terbit"></span></p>
                            <p><b>Stok:</b> <span id="modal-stok"></span> buku</p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</main>

<script src="<?= base_url('public/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<script>
    function showDetail(item) {
        console.log(item);

        document.getElementById('modal-gambar').src = "<?= base_url('asset') ?>/" + item.gambar_buku;
        document.getElementById('modal-judul').textContent = item.judul;
        document.getElementById('modal-penulis').textContent = item.penulis;
        document.getElementById('modal-penerbit').textContent = item.penerbit;
        document.getElementById('modal-tahun-terbit').textContent = item.tahun_terbit;
        document.getElementById('modal-stok').textContent = item.stok_buku;
        document.getElementById('modal-isbn').textContent = item.ISBN;

        var modal = new bootstrap.Modal(document.getElementById('bookDetailModal'));
        modal.show();
    }
</script>
