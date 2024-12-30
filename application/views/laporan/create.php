<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Laporan Penjualan</title>
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>
<body>
    <h1>Tambah Laporan Penjualan</h1>
    <form action="" method="post">
        <label>Tanggal Laporan:</label>
        <input type="date" name="tanggal_laporan" required>
        <br>
        <label>Total Pesanan:</label>
        <input type="number" name="total_pesanan" required>
        <br>
        <label>Total Menu Terjual:</label>
        <input type="number" name="total_menu_terjual" required>
        <br>
        <label>Total Pendapatan:</label>
        <input type="number" name="total_pendapatan" required>
        <br>
        <button type="submit">Simpan</button>
    </form>
</body>
</html>
