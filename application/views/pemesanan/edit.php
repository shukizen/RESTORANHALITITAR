<!DOCTYPE html>
<html>
<head>
    <title>Edit Pemesanan</title>
</head>
<body>
    <h1>Edit Pemesanan</h1>
    <form method="post">
        <label>Nama Pelanggan</label>
        <input type="text" name="nama_pelanggan" value="<?= $pemesanan['nama_pelanggan']; ?>">
        <label>Status</label>
        <select name="status">
            <option value="menunggu" <?= $pemesanan['status'] == 'menunggu' ? 'selected' : ''; ?>>Menunggu</option>
            <option value="lunas" <?= $pemesanan['status'] == 'lunas' ? 'selected' : ''; ?>>Lunas</option>
            <option value="batal" <?= $pemesanan['status'] == 'batal' ? 'selected' : ''; ?>>Batal</option>
        </select>
        <label>Kasir ID</label>
        <input type="number" name="kasir_id" value="<?= $pemesanan['kasir_id']; ?>">
        <button type="submit">Simpan</button>
    </form>
</body>
</html>
