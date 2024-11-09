<?php
// Koneksi ke database
$conn = new mysqli("localhost", "root", "", "valent.pbo");

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Mendapatkan ID barang dari URL
$id_barang = $_GET['id_barang'] ?? '';

// Mengambil data barang berdasarkan ID
$sql = "SELECT * FROM tbl_valentstock WHERE id_barang = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $id_barang);
$stmt->execute();
$result = $stmt->get_result();
$barang = $result->fetch_assoc();

if (!$barang) {
    die("Data barang tidak ditemukan.");
}

$stmt->close();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Data Barang</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 20px;
        }

        .form-container {
            width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin: 5px 0;
            font-size: 14px;
        }

        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 8px;
            margin-top: 4px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 14px;
        }

        input[type="submit"] {
            padding: 10px 15px;
            border: none;
            background-color: #4285f4;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
            border-radius: 4px;
            width: 100%;
        }

        input[type="submit"]:hover {
            background-color: #357ae8;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Edit Data Barang</h2>
        <form method="POST" action="proses_data.php">
            <input type="hidden" name="id_barang" value="<?php echo $barang['id_barang']; ?>">

            <label for="nama_barang">Nama Barang:</label>
            <input type="text" name="nama_barang" value="<?php echo $barang['nama_barang']; ?>" required>

            <label for="stok">Stok:</label>
            <input type="number" name="stok" value="<?php echo $barang['stok']; ?>" required>

            <label for="harga_beli">Harga Beli:</label>
            <input type="number" name="harga_beli" value="<?php echo $barang['harga_beli']; ?>" required>

            <label for="harga_jual">Harga Jual:</label>
            <input type="number" name="harga_jual" value="<?php echo $barang['harga_jual']; ?>" required>

            <input type="submit" name="update" value="Update Barang">
        </form>
    </div>
</body>
</html>

<?php
// Tutup koneksi database
$conn->close();
?>
