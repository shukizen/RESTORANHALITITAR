<!DOCTYPE html>
<html>
<head>
    <title>Tambah Pemesanan</title>
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/pemesanan.css'); ?>">
</head>
<body>
    <div class="container">
        <h1>Tambah Pemesanan</h1>
        <a class="back-link" href="<?= site_url('pemesanan'); ?>">Kembali</a>
        <form method="post">
            <label>Nama Pelanggan</label>
            <input type="text" name="nama_pelanggan">
            <label>Status</label>
            <select name="status">
                <option value="menunggu">Menunggu</option>
                <option value="lunas">Lunas</option>
                <option value="batal">Batal</option>
            </select>
            <label>Kasir ID</label>
            <input type="number" name="kasir_id">
            <button type="submit">Simpan</button>
        </form>
    </div>
</body>
</html>
