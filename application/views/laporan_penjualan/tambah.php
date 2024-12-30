<h1>Tambah Laporan Penjualan</h1>
<form method="post" action="">
    <label>Tanggal</label><br>
    <input type="date" name="tanggal"><br>

    <label>Total Transaksi</label><br>
    <input type="number" name="total_transaksi"><br>

    <h3>Detail Laporan</h3>
    <div id="details">
        <div>
            <label>Menu ID</label>
            <input type="number" name="details[0][menu_id]">
            <label>Jumlah Terjual</label>
            <input type="number" name="details[0][jumlah_terjual]">
            <label>Subtotal</label>
            <input type="number" name="details[0][subtotal]">
        </div>
    </div>
    <button type="button" id="addDetail">Tambah Detail</button>
    <button type="submit">Simpan</button>
</form>

<script>
    let detailIndex = 1;
    document.getElementById('addDetail').addEventListener('click', function() {
        const detailsDiv = document.getElementById('details');
        const newDetail = `
            <div>
                <label>Menu ID</label>
                <input type="number" name="details[${detailIndex}][menu_id]">
                <label>Jumlah Terjual</label>
                <input type="number" name="details[${detailIndex}][jumlah_terjual]">
                <label>Subtotal</label>
                <input type="number" name="details[${detailIndex}][subtotal]">
            </div>
        `;
        detailsDiv.insertAdjacentHTML('beforeend', newDetail);
        detailIndex++;
    });
</script>
