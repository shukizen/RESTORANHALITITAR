<link rel="stylesheet" href="<?php echo base_url('assets/css/stokbahanmakanan.css'); ?>">
<div class="container">
    <div class="tabs">
        <button class="tab active" onclick="switchTab('stock')">Stok Bahan</button>
        <button class="tab" onclick="switchTab('menu')">Menu Bahan</button>
    </div>

    <div id="stockPanel" class="tab-panel active">
        <div class="tab-content">
            <div class="header">
                <h1 class="title">Stok Bahan</h1>
                <div class="search-container">
                    <div class="search-box">
                        <span class="search-icon">🔍</span>
                        <input type="text" placeholder="Cari bahan...">
                    </div>
                    <a href="#" id="tambahButton" class="btn btn-primary"
                        data-bs-toggle="modal"
                        data-bs-target="#tambahModal">
                        <i class="fas fa-plus"></i> Tambah Stok</a>
                </div>
            </div>
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama Bahan</th>
                            <th>Stok Awal</th>
                            <th>Terpakai</th>
                            <th>Tersedia</th>
                            <th>Harga</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($stok_bahan as $stok): ?>
                            <tr>
                                <td><?= $stok['stok_id']; ?></td>
                                <td><?= $stok['nama_bahan']; ?></td>
                                <td><?= $stok['stok_awal']; ?></td>
                                <td><?= $stok['stok_terpakai']; ?></td>
                                <td><?= $stok['stok_tersedia']; ?></td>
                                <td><?= $stok['harga_bahan']; ?></td>
                                <td><?= $stok['created_at']; ?></td>
                                <td>
                                    <div class="action">
                                        <a href="<?= site_url('Stokbahanmakanan/edit_stok_bahan/' . $stok['stok_id']); ?>"><button class="edit-button btn btn-warning"><i class="fas fa-edit"></i> Edit</button></a>
                                        <a href="<?= site_url('Stokbahanmakanan/delete_stok_bahan/' . $stok['stok_id']); ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus stok ini?');">
                                            <button class="delete-button btn btn-danger">
                                                <i class="fa fa-trash"></i> Hapus
                                            </button>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal Tambah Stok -->
    <div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="tambahModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="<?= site_url('Stokbahanmakanan/tambah') ?>" method="post">
                    <div class="modal-header">
                        <h5 class="modal-title" id="tambahModalLabel">Tambah Stok Bahan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nama_bahan">Nama Bahan:</label>
                            <input type="text" class="form-control" id="nama_bahan" name="nama_bahan" required>
                        </div>
                        <div class="form-group">
                            <label for="stok_awal">Stok Awal:</label>
                            <input type="number" class="form-control" id="stok_awal" name="stok_awal" required>
                        </div>
                        <div class="form-group">
                            <label for="stok_tersedia">Stok Tersedia:</label>
                            <input type="number" class="form-control" id="stok_tersedia" name="stok_tersedia" required>
                        </div>
                        <div class="form-group">
                            <label for="harga_bahan">Harga:</label>
                            <input type="number" class="form-control" id="harga_bahan" name="harga_bahan" required>
                        </div>
                        <div class="form-group">    
                            <label for="harga_bahan">Tanggal:</label>
                            <input type="date" class="form-control" id="harga_bahan" name="harga_bahan" required>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div id="menuPanel" class="tab-panel">
        <div class="tab-content">
            <div class="header">
                <h1 class="title">Menu Bahan</h1>
                <div class="search-container">
                    <div class="search-box">
                        <span class="search-icon">🔍</span>
                        <input type="text" placeholder="Cari menu...">
                    </div>
                    <button class="add-button">
                        <span>+</span>
                        Tambah Menu Bahan
                    </button>
                </div>
            </div>
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>ID Stok</th>
                            <th>ID Menu</th>
                            <th>Nama Menu</th>
                            <th>Nama Bahan</th>
                            <th>Jumlah Bahan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($menu_bahan as $menubahan): ?>
                            <tr>
                                <td><?= $menubahan['stok_id']; ?></td>
                                <td><?= $menubahan['menu_id']; ?></td>
                                <td><?= $menubahan['nama_menu']; ?></td>
                                <td><?= $menubahan['nama_bahan']; ?></td>
                                <td><?= $menubahan['jumlah_bahan']; ?></td>
                                <td>
                                    <div class="action">
                                        <a href="<?= $menubahan['stok_id']; ?>"><button class="edit-button btn btn-warning"><i
                                                    class="fas fa-edit"></i> Edit</button></a>
                                        <a href="<?= $menubahan['stok_id']; ?>"><button class="delete-button btn btn-danger"><i
                                                    class="fas fa-trash-alt"></i> Hapus</button></a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    function switchTab(tabName) {
        // Remove active class from all tabs and panels
        document.querySelectorAll('.tab').forEach(tab => tab.classList.remove('active'));
        document.querySelectorAll('.tab-panel').forEach(panel => panel.classList.remove('active'));

        // Add active class to selected tab and panel
        const selectedTab = document.querySelector(`.tab:nth-child(${tabName === 'stock' ? '1' : '2'})`);
        const selectedPanel = document.getElementById(`${tabName}Panel`);

        selectedTab.classList.add('active');
        selectedPanel.classList.add('active');
    }

    $('#editModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget);
        var id = button.data('id');
        var nama = button.data('nama');
        var stok_awal = button.data('stok_awal');
        var stok_terpakai = button.data('stok_terpakai');
        var stok_tersedia = button.data('stok_tersedia');
        var harga = button.data('harga');

        var modal = $(this);
        modal.find('#stok_id').val(id);
        modal.find('#nama_bahan').val(nama);
        modal.find('#stok_awal').val(stok_awal);
        modal.find('#stok_terpakai').val(stok_terpakai);
        modal.find('#stok_tersedia').val(stok_tersedia);
        modal.find('#harga_bahan').val(harga);
    });
</script>