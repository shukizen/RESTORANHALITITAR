<link rel="stylesheet" type="text/css" href="assets/css/laporan.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <header>
        <h1>Daftar Laporan Penjualan</h1>
        <p>Selamat datang! Di sini Anda bisa melihat daftar laporan penjualan dan menambahkan laporan baru.</p>
        <a href="<?= site_url('laporan/create') ?>" class="tambah-laporan">Tambah Laporan Baru</a>
    </header>

    <section class="laporan-section">
        <h2>Daftar Laporan</h2>
        <table class="laporan-table">
            <thead>
                <tr>
                    <th>Tanggal Laporan</th>
                    <th>Total Pesanan</th>
                    <th>Total Menu Terjual</th>
                    <th>Total Pendapatan</th>
                    <th>Waktu Dibuat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($laporan as $row) : ?>
                    <tr>
                        <td><?= htmlspecialchars($row->tanggal_laporan) ?></td>
                        <td><?= htmlspecialchars($row->total_pesanan) ?></td>
                        <td><?= htmlspecialchars($row->total_menu_terjual) ?></td>
                        <td><?= htmlspecialchars($row->total_pendapatan) ?></td>
                        <td><?= htmlspecialchars($row->created_at) ?></td>
                        <td>
                            <a href="<?= site_url('laporan/edit/' . $row->laporan_id) ?>" class="edit-laporan">Edit</a>
                            <a href="<?= site_url('laporan/delete/' . $row->laporan_id) ?>" 
                               class="hapus-laporan" 
                               onclick="return confirm('Apakah Anda yakin ingin menghapus laporan ini?')">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </section>

    <section class="grafik-section">
        <h2>Grafik Total Pendapatan Penjualan</h2>
        <canvas id="penjualanChart" width="400" height="200"></canvas>
    </section>

    <script>
        var ctx = document.getElementById('penjualanChart').getContext('2d');
        var penjualanChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: [
                    <?php 
                    foreach ($laporan as $row) {
                        echo '"' . htmlspecialchars($row->tanggal_laporan) . '",';
                    }
                    ?>
                ].slice(0, -1),
                datasets: [{
                    label: 'Total Pendapatan',
                    data: [
                        <?php 
                        foreach ($laporan as $row) {
                            echo $row->total_pendapatan . ',';
                        }
                        ?>
                    ].slice(0, -1),
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