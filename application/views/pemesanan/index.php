<!DOCTYPE html>
<html>
<head>
    <title>Data Pemesanan</title>
    <!-- Link CSS -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/pemesanan.css'); ?>">
</head>
<body>
    <h1>Data Pemesanan</h1>
    <a href="<?= site_url('pemesanan/create'); ?>">Tambah Pemesanan</a>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Pelanggan</th>
                <th>Tanggal Pemesanan</th>
                <th>Status</th>
                <th>Kasir ID</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pemesanan as $item): ?>
            <tr>
                <td><?= $item['pemesanan_id']; ?></td>
                <td><?= $item['nama_pelanggan']; ?></td>
                <td><?= $item['tanggal_pemesanan']; ?></td>
                <td><?= $item['status']; ?></td>
                <td><?= $item['kasir_id']; ?></td>
                <td>
                    <a href="<?= site_url('pemesanan/edit/' . $item['pemesanan_id']); ?>">Edit</a>
                    <a href="<?= site_url('pemesanan/delete/' . $item['pemesanan_id']); ?>">Hapus</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
