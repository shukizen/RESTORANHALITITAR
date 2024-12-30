<!DOCTYPE html>
<html>
<head>
    <title>Edit Pemesanan</title>
</head>
<body>
    <h1>Edit Pemesanan</h1>
    <form method="POST">
        <label>Nama Pelanggan</label><br>
        <input type="text" name="nama_pelanggan" value="<?= $pemesanan['nama_pelanggan']; ?>" required><br>
        <label>Menu</label><br>
        <input type="text" name="menu" value="<?= $pemesanan['menu']; ?>" required><br>
        <label>Jumlah</label><br>
        <input type="number" name="jumlah" value="<?= $pemesanan['jumlah']; ?>" required><br>
        <label>Total Harga</label><br>
        <input type="number" name="total_harga" value="<?= $pemesanan['total_harga']; ?>" required><br><br>
        <button type="submit">Simpan</button>
    </form>
</body>
</html>
