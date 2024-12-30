<h1>Daftar Laporan Penjualan</h1>
<a href="<?= site_url('laporan/create') ?>">Tambah Laporan</a>
<table border="1">
    <tr>
        <th>Tanggal Laporan</th>
        <th>Total Pesanan</th>
        <th>Total Menu Terjual</th>
        <th>Total Pendapatan</th>
        <th>Created At</th>
        <th>Aksi</th>
    </tr>
    <?php foreach ($laporan as $row) : ?>
        <tr>
            <td><?= $row->tanggal_laporan ?></td>
            <td><?= $row->total_pesanan ?></td>
            <td><?= $row->total_menu_terjual ?></td>
            <td><?= $row->total_pendapatan ?></td>
            <td><?= $row->created_at ?></td>
            <td>
                <a href="<?= site_url('laporan/edit/' . $row->laporan_id) ?>">Edit</a>
                <a href="<?= site_url('laporan/delete/' . $row->laporan_id) ?>">Hapus</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
