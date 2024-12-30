<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Laporan Penjualan</title>
    <link rel="stylesheet" type="text/css" href="assets/css/laporan.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <h1>Daftar Laporan Penjualan</h1>
    <a href="<?= site_url('laporan/create') ?>">Tambah Laporan</a>
    <table>
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

    <!-- Elemen untuk grafik -->
    <canvas id="penjualanChart" width="400" height="200"></canvas>

    <script>
        var ctx = document.getElementById('penjualanChart').getContext('2d');
        var penjualanChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: [<?php foreach ($laporan as $row) { echo '"' . $row->tanggal_laporan . '",'; } ?>],
                datasets: [{
                    label: 'Total Pendapatan',
                    data: [<?php foreach ($laporan as $row) { echo $row->total_pendapatan . ','; } ?>],
                    borderColor: 'rgba(75, 192, 192, 1)',
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    title: {
                        display: true,
                        text: 'Grafik Total Pendapatan Penjualan'
                    }
                }
            }
        });
    </script>
</body>
</html>
