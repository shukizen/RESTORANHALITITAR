<!DOCTYPE html>
<html>
<head>
    <title>Edit Pemesanan</title>
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/pemesanan.css'); ?>">
</head>
<body>
    <div class="container">
    <a class="back-link" href="<?= site_url('pemesanan'); ?>">Kembali</a>
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
    </div>
</body>
</html>
