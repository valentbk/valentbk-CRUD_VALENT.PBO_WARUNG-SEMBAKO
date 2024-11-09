<?php
// Koneksi ke database
$conn = new mysqli("localhost", "root", "", "valent.pbo");

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Cek jika tombol update ditekan
if (isset($_POST['update'])) {
    // Ambil data dari form
    $id_barang = $_POST['id_barang'];
    $nama_barang = $_POST['nama_barang'];
    $stok = $_POST['stok'];
    $harga_beli = $_POST['harga_beli'];
    $harga_jual = $_POST['harga_jual'];

    // Siapkan query untuk memperbarui data
    $sql = "UPDATE tbl_valentstock SET 
                nama_barang = ?, 
                stok = ?, 
                harga_beli = ?, 
                harga_jual = ? 
            WHERE id_barang = ?";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("siisi", $nama_barang, $stok, $harga_beli, $harga_jual, $id_barang);
    
    // Eksekusi query
    if ($stmt->execute()) {
        echo "<script>alert('Barang berhasil diperbarui!');</script>";
    } else {
        echo "<script>alert('Gagal memperbarui barang: " . $conn->error . "');</script>";
    }
    
    // Tutup statement
    $stmt->close();
}

// Cek jika tombol hapus ditekan
if (isset($_POST['delete'])) {
    // Ambil id_barang dari form
    $id_barang = $_POST['id_barang'];

    // Siapkan query untuk menghapus data
    $sql = "DELETE FROM tbl_valentstock WHERE id_barang = ?";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id_barang);
    
    // Eksekusi query
    if ($stmt->execute()) {
        echo "<script>alert('Barang berhasil dihapus!');</script>";
    } else {
        echo "<script>alert('Gagal menghapus barang: " . $conn->error . "');</script>";
    }
    
    // Tutup statement
    $stmt->close();
}

// Tutup koneksi
$conn->close();
?>
