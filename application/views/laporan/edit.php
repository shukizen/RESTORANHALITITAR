<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Laporan Penjualan</title>
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>
<body>
    <!-- Tambahkan tombol Menu -->
    <button id="menuToggle">Menu</button>
    <nav id="menu" style="display: none;">
        <ul>
            <li><a href="<?= site_url('dashboard') ?>">Dashboard</a></li>
            <li><a href="<?= site_url('menumakanan') ?>">Menu Makanan</a></li>
            <li><a href="<?= site_url('pemesanan') ?>">Pemesanan</a></li>
            <li><a href="<?= site_url('tagihan') ?>">Perhitungan Tagihan</a></li>
            <li><a href="<?= site_url('laporan') ?>">Laporan Penjualan</a></li>
        </ul>
    </nav>
    <script>
        document.getElementById('menuToggle').addEventListener('click', function () {
            var menu = document.getElementById('menu');
            menu.style.display = menu.style.display === 'none' ? 'block' : 'none';
        });
    </script>

    <h1>Edit Laporan Penjualan</h1>
    <form action="" method="post">
        <label>Tanggal Laporan:</label>
        <input type="date" name="tanggal_laporan" value="<?= $laporan->tanggal_laporan ?>" required>
        <br>
        <label>Total Pesanan:</label>
        <input type="number" name="total_pesanan" value="<?= $laporan->total_pesanan ?>" required>
        <br>
        <label>Total Menu Terjual:</label>
        <input type="number" name="total_menu_terjual" value="<?= $laporan->total_menu_terjual ?>" required>
        <br>
        <label>Total Pendapatan:</label>
        <input type="number" name="total_pendapatan" value="<?= $laporan->total_pendapatan ?>" required>
        <br>
        <button type="submit">Update</button>
    </form>
</body>
</html>
