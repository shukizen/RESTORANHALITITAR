<!DOCTYPE html>
<html>
<head>
    <title>Tambah Pemesanan</title>
</head>
<body>
    <h1>Tambah Pemesanan</h1>
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
</body>
</html>
