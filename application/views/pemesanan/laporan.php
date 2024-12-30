<!DOCTYPE html>
<html>
<head>
    <title>Laporan Pemesanan</title>
</head>
<body>
    <h1>Laporan Pemesanan</h1>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Pelanggan</th>
                <th>Menu</th>
                <th>Jumlah</th>
                <th>Total Harga</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pemesanan as $row): ?>
            <tr>
                <td><?= $row['id']; ?></td>
                <td><?= $row['nama_pelanggan']; ?></td>
                <td><?= $row['menu']; ?></td>
                <td><?= $row['jumlah']; ?></td>
                <td><?= $row['total_harga']; ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
