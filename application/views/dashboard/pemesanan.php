<style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 90%;
            max-width: 1200px;
            margin: 20px auto;
            background: #fff;
            padding: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }
        .button-group {
            display: flex;
            justify-content: flex-start;
            gap: 10px;
            margin-bottom: 20px;
        }
        .button {
            text-decoration: none;
            background-color: #007bff; /* Blue background */
            color: #fff; /* White text */
            padding: 10px 15px;
            border-radius: 4px;
            font-weight: bold;
            border: none;
            cursor: pointer;
        }
        .button:hover, .button:focus, .button:active {
            background-color: #007bff; /* Keep blue on hover, focus, or active */
            color: #fff; /* Keep text color white */
            outline: none;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table th {
            background-color: #343a40;
            color: #fff;
            text-align: left;
            padding: 10px;
        }
        table td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }
        table tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        table tr:hover {
            background-color: #e9ecef;
        }
        table td a.button {
            background-color: #007bff;
            padding: 5px 10px;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Data Pemesanan</h1>
        <div class="button-group">
            <a class="button" href="<?= site_url('pemesanan/create'); ?>">Tambah Pemesanan</a>
        </div>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Pelanggan</th>
                    <th>Tanggal Pemesanan</th>
                    <th>Status</th>
                    <th>Kasir ID</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($pemesanan as $item): ?>
                <tr>
                    <td><?= $item['pemesanan_id']; ?></td>
                    <td><?= $item['nama_pelanggan']; ?></td>
                    <td><?= $item['tanggal_pemesanan']; ?></td>
                    <td><?= $item['status']; ?></td>
                    <td><?= $item['kasir_id']; ?></td>
                    <td>
                        <a class="button" href="<?= site_url('pemesanan/edit/' . $item['pemesanan_id']); ?>">Edit</a>
                        <a class="button" href="<?= site_url('pemesanan/delete/' . $item['pemesanan_id']); ?>">Hapus</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

