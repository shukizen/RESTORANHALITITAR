<link rel="stylesheet" href="<?php echo base_url('assets/css/menu.css'); ?>">
<div class="container mt-2">
    <h1 class="mb-4"><?php echo $title; ?></h1>
    <div class="row">
        <?php foreach ($menu as $item): ?>
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <img src="<?php echo base_url('assets/gambar/' . $item->gambar); ?>" class="card-img-top" alt="<?php echo $item->nama_menu; ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $item->nama_menu; ?></h5>
                        <h6 class="card-subtitle mb-2 text-muted">Rp <?php echo number_format($item->harga, 2, ',', '.'); ?></h6>
                        <p class="card-text"><?php echo $item->deskripsi; ?></p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>