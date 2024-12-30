<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Laporan Penjualan</title>
    <link rel="stylesheet" type="text/css" href="assets/css/laporan_penjualan.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        .container {
            width: 90%;
            max-width: 120px;
            margin: 20px auto;
            background: #fff;
            padding: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        table th, table td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }
        table th {
            background-color: #f4f4f4;
        }
        a {
            color: #007bff;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Daftar Laporan Penjualan</h1>
        <a href="<?= site_url('laporan_penjualan/create') ?>">Tambah Laporan</a>

        <!-- Tabel Laporan Penjualan -->
        <table>
            <tr>
                <th>Tanggal Laporan</th>
                <th>Total Pesanan</th>
                <th>Total Menu Terjual</th>
                <th>Total Pendapatan</th>
                <th>Created At</th>
                <th>Aksi</th>
            </tr>
            <?php if (!empty($laporan_penjualan)) : ?>
                <?php foreach ($laporan_penjualan as $row) : ?>
                    <tr>
                        <td><?= $row->tanggal_laporan ?></td>
                        <td><?= $row->total_pesanan ?></td>
                        <td><?= $row->total_menu_terjual ?></td>
                        <td><?= $row->total_pendapatan ?></td>
                        <td><?= $row->created_at ?></td>
                        <td>
                            <a href="<?= site_url('laporan_penjualan/edit/' . $row->laporan_id) ?>">Edit</a>
                            <a href="<?= site_url('laporan_penjualan/delete/' . $row->laporan_id) ?>">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <tr>
                    <td colspan="6">Tidak ada data laporan penjualan.</td>
                </tr>
            <?php endif; ?>
        </table>

        <!-- Grafik Penjualan -->
        <canvas id="penjualanChart" width="500" height="100"></canvas>
    </div>

    <script>
        var laporanPenjualan = <?php echo json_encode($laporan_penjualan); ?>;
        
        if (laporanPenjualan.length > 0) {
            var ctx = document.getElementById('penjualanChart').getContext('2d');
            var penjualanChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: laporanPenjualan.map(function(item) {
                        return item.tanggal_laporan;
                    }),
                    datasets: [{
                        label: 'Total Pendapatan',
                        data: laporanPenjualan.map(function(item) {
                            return item.total_pendapatan;
                        }),
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
        } else {
            console.log('Tidak ada data untuk grafik');
        }
    </script>
</body>
</html>
