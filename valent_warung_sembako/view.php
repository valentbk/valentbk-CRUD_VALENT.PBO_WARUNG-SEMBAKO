<?php
// Koneksi ke database
$conn = new mysqli("localhost", "root", "", "valent.pbo");

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil data stok barang dari database
$sql = "SELECT * FROM tbl_valentstock";
$result = $conn->query($sql);
?>

<div>
    <h2>Data Stok Barang</h2>
    <table id="stockTable" style="width: 100%; border-collapse: collapse; margin-top: 20px;">
        <thead>
            <tr>
                <th style="border: 1px solid #ddd; padding: 8px; background-color: #f2f2f2;">ID Barang</th>
                <th style="border: 1px solid #ddd; padding: 8px; background-color: #f2f2f2;">Nama Barang</th>
                <th style="border: 1px solid #ddd; padding: 8px; background-color: #f2f2f2;">Stok</th>
                <th style="border: 1px solid #ddd; padding: 8px; background-color: #f2f2f2;">Harga Beli</th>
                <th style="border: 1px solid #ddd; padding: 8px; background-color: #f2f2f2;">Harga Jual</th>
                <th style="border: 1px solid #ddd; padding: 8px; background-color: #f2f2f2;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($result->num_rows > 0): ?>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td style="border: 1px solid #ddd; padding: 8px;"><?php echo $row['id_barang']; ?></td>
                        <td style="border: 1px solid #ddd; padding: 8px;"><?php echo $row['nama_barang']; ?></td>
                        <td style="border: 1px solid #ddd; padding: 8px;"><?php echo $row['stok']; ?></td>
                        <td style="border: 1px solid #ddd; padding: 8px;"><?php echo $row['harga_beli']; ?></td>
                        <td style="border: 1px solid #ddd; padding: 8px;"><?php echo $row['harga_jual']; ?></td>
                        <td style="border: 1px solid #ddd; padding: 8px;">
                            <button onclick="editItem('<?php echo $row['id_barang']; ?>')">Edit</button>
                            <button onclick="deleteItem('<?php echo $row['id_barang']; ?>')">Hapus</button>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="6" style="text-align: center; padding: 8px;">Tidak ada data barang.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<script>
function deleteItem(id_barang) {
    if (confirm("Apakah Anda yakin ingin menghapus barang ini?")) {
        const formData = new FormData();
        formData.append('delete', true);
        formData.append('id_barang', id_barang);

        fetch('proses_data.php', {
            method: 'POST',
            body: formData,
        })
        .then(response => response.json())
        .then(data => {
            alert(data.message); // Tampilkan pesan dari server
            if (data.status === 'success') {
                // Hapus baris dari tabel setelah berhasil dihapus
                const row = document.querySelector(`tr td:first-child:contains("${id_barang}")`).parentNode;
                row.parentNode.removeChild(row);
            }
        })
        .catch(error => console.error('Error:', error));
    }
}

function editItem(id_barang) {
    // Menampilkan form edit barang
    const editDataFrame = document.getElementById('editDataFrame');
    editDataFrame.src = `edit.php?id_barang=${id_barang}`; // Pastikan ini adalah URL yang benar
    showSection('editData'); // Fungsi ini harus sudah ada di index.php
}
</script>

<?php
// Tutup koneksi database
$conn->close();
?>
