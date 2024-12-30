<!DOCTYPE html>
<html>
<head>
    <title>Tambah Pemesanan</title>
</head>
<body>
    <h1>Tambah Pemesanan</h1>
    <form method="POST">
        <label>Nama Pelanggan</label><br>
        <input type="text" name="nama_pelanggan" required><br>
        <label>Menu</label><br>
        <input type="text" name="menu" required><br>
        <label>Jumlah</label><br>
        <input type="number" name="jumlah" required><br>
        <label>Total Harga</label><br>
        <input type="number" name="total_harga" required><br><br>
        <button type="submit">Simpan</button>
    </form>
</body>
</html>
