<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Menu</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/dashboard.css'); ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
        .table-container {
            margin-top: 20px;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .table img {
            border-radius: 8px;
        }
    </style>
</head>
<body>
<div class="d-flex" id="wrapper">
    <!-- Sidebar -->
    <div class="bg-dark border-right" id="sidebar-wrapper">
        <div class="sidebar-heading text-white">Manajemen Restoran Halititar</div>
        <div class="list-group list-group-flush">
            <a href="<?php echo site_url('dashboard'); ?>" class="list-group-item list-group-item-action bg-dark text-white">
                <i class="fas fa-tachometer-alt"></i> Dashboard
            </a>
            <a href="<?php echo site_url('menumakanan'); ?>" class="list-group-item list-group-item-action bg-dark text-white">
                <i class="fas fa-utensils"></i> Menu Makanan
            </a>
            <a href="#" class="list-group-item list-group-item-action bg-dark text-white">
                <i class="fas fa-receipt"></i> Pemesanan
            </a>
            <a href="#" class="list-group-item list-group-item-action bg-dark text-white">
                <i class="fas fa-calculator"></i> Perhitungan Tagihan
            </a>
            <a href="#" class="list-group-item list-group-item-action bg-dark text-white">
                <i class="fas fa-chart-line"></i> Laporan Penjualan
            </a>
        </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">
        <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
            <button class="btn btn-light" id="menu-toggle">
                <i class="fas fa-bars"></i> Menu
            </button>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a href="<?php echo site_url('login/logout'); ?>" class="btn btn-danger">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </a>
                    </li>
                </ul>
            </div>
        </nav>

        <div class="container-fluid">
            <h1 class="mt-4">Daftar Menu</h1>
            <div class="table-container">
                <table class="table table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">Menu ID</th>
                            <th scope="col">Nama Menu</th>
                            <th scope="col">Deskripsi</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Gambar</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($menu as $item): ?>
                            <tr>
                                <td><?= $item['menu_id']; ?></td>
                                <td><?= $item['nama_menu']; ?></td>
                                <td><?= $item['deskripsi']; ?></td>
                                <td>Rp <?= number_format($item['harga'], 0, ',', '.'); ?></td>
                                <td><img src="<?= base_url('uploads/' . $item['gambar']); ?>" alt="<?= $item['nama_menu']; ?>" width="80"></td>
                                <td>
                                    <a href="<?php echo site_url('menumakanan/edit/' . $item['menu_id']); ?>" class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <a href="<?php echo site_url('menumakanan/delete/' . $item['menu_id']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus menu ini?')">
                                        <i class="fas fa-trash-alt"></i> Hapus
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- /#page-content-wrapper -->
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
