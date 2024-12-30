<!DOCTYPE html>
<html>
<head>
    <title>Daftar Pemesanan</title>
    <link rel="stylesheet" type="text/css" href="assets/css/pemesanan.css">
</head>
<body>
    <h1>Daftar Pemesanan</h1>
    <a href="<?= site_url('pemesanan/create'); ?>">Tambah Pemesanan</a>
    <a href="<?= site_url('pemesanan/laporan'); ?>">Lihat Laporan</a>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Pelanggan</th>
                <th>Menu</th>
                <th>Jumlah</th>
                <th>Total Harga</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pemesanan as $row): ?>
            <tr>
                <td><?= $row['id']; ?></td>
                <td><?= $row['nama_pelanggan']; ?></td>
                <td><?= $row['menu']; ?></td>
                <td><?= $row['jumlah']; ?></td>
                <td><?= $row['total_harga']; ?></td>
                <td>
                    <a href="<?= site_url('pemesanan/edit/' . $row['id']); ?>">Edit</a>
                    <a href="<?= site_url('pemesanan/delete/' . $row['id']); ?>" onclick="return confirm('Hapus data?')">Hapus</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
