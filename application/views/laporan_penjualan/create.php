<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Laporan Penjualan</title>
    <link rel="stylesheet" type="text/css" href="assets/css/laporan_penjualan.css">
    <style>
        .container {
            width: 90%;
            max-width: 600px;
            margin: 20px auto;
            background: #fff;
            padding: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }
        label {
            font-weight: bold;
            margin-bottom: 5px;
        }
        input[type="date"],
        input[type="number"],
        button {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
        }
        input[type="date"]:focus,
        input[type="number"]:focus,
        button:focus {
            border-color: #007bff;
            outline: none;
        }
        button {
            background-color: #007bff;
            color: white;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
    <a class="back-link" href="<?= site_url('laporan_penjualan'); ?>">Kembali</a>
        <h1>Tambah Laporan Penjualan</h1>
        <form action="" method="post">
            <label for="tanggal_laporan">Tanggal Laporan:</label>
            <input type="date" id="tanggal_laporan" name="tanggal_laporan" required>
            
            <label for="total_pesanan">Total Pesanan:</label>
            <input type="number" id="total_pesanan" name="total_pesanan" required>
            
            <label for="total_menu_terjual">Total Menu Terjual:</label>
            <input type="number" id="total_menu_terjual" name="total_menu_terjual" required>
            
            <label for="total_pendapatan">Total Pendapatan:</label>
            <input type="number" id="total_pendapatan" name="total_pendapatan" required>
            
            <button type="submit">Simpan</button>
        </form>
    </div>
</body>
</html>
