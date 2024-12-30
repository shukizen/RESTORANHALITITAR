<h1>Laporan Penjualan</h1>
<a href="<?= site_url('LaporanPenjualan/tambah') ?>">Tambah Laporan</a>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Tanggal</th>
        <th>Total Pendapatan</th>
        <th>Total Transaksi</th>
        <th>Aksi</th>
    </tr>
    <?php foreach ($laporan as $row): ?>
    <tr>
        <td><?= $row['laporan_id'] ?></td>
        <td><?= $row['tanggal'] ?></td>
        <td><?= $row['total_pendapatan'] ?></td>
        <td><?= $row['total_transaksi'] ?></td>
        <td>
            <a href="<?= site_url('LaporanPenjualan/hapus/' . $row['laporan_id']) ?>">Hapus</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
