<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Management - Laporan Penjualan</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/laporan.css'); ?>">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body>
    <div class="container">
        <div class="heading">
            <h1>Laporan Penjualan</h1>
        </div>

        <div class="mb-4">
            <a href="<?php echo base_url('laporan/tambah'); ?>" class="btn btn-add">
                <i class="fas fa-plus"></i> Tambah Laporan
            </a>
        </div>

        <table class="table-laporan">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal Laporan</th>
                    <th>Total Pesanan</th>
                    <th>Total Menu Terjual</th>
                    <th>Total Pendapatan</th>
                    <th>Created At</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($laporan)) : ?>
                    <?php $no = 1; foreach ($laporan as $item) : ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $item->tanggal_laporan; ?></td>
                            <td><?php echo $item->total_pesanan; ?></td>
                            <td><?php echo $item->total_menu_terjual; ?></td>
                            <td>Rp <?php echo number_format($item->total_pendapatan, 0, ',', '.'); ?></td>
                            <td><?php echo date('d-m-Y H:i:s', strtotime($item->created_at)); ?></td>
                            <td>
                                <a href="<?php echo base_url('laporan/edit/' . $item->laporan_id); ?>" class="btn btn-edit">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <a href="<?php echo base_url('laporan/hapus/' . $item->laporan_id); ?>" class="btn btn-delete" onclick="return confirm('Apakah Anda yakin ingin menghapus laporan ini?')">
                                    <i class="fas fa-trash"></i> Hapus
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="7" class="text-center">Tidak ada data laporan penjualan.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
