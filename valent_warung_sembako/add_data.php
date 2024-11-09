<?php
// Database connection
$conn = new mysqli("localhost", "root", "", "valent.pbo");

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Proses penambahan data
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_data'])) {
    $id_barang = $_POST['id_barang'];
    $nama_barang = $_POST['nama_barang'];
    $stok = $_POST['stok'];
    $harga_beli = $_POST['harga_beli'];
    $harga_jual = $_POST['harga_jual'];

    // Insert data ke tabel
    $sql = "INSERT INTO tbl_valentstock (id_barang, nama_barang, stok, harga_beli, harga_jual)
            VALUES ('$id_barang', '$nama_barang', '$stok', '$harga_beli', '$harga_jual')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Barang berhasil ditambahkan.');</script>";
    } else {
        echo "<script>alert('Error: " . $conn->error . "');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Data Barang</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 20px;
        }

        .form-container {
            display: inline-block;
            width: 900px;
            padding: 4px;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        h2 {
            color: #333;
            font-size: 20px;
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
            padding: 8px 12px;
            border: none;
            background-color: #4285f4;
            color: #fff;
            font-size: 14px;
            cursor: pointer;
            border-radius: 4px;
        }

        input[type="submit"]:hover {
            background-color: #357ae8;
        }
    </style>
    <script>
        // Fungsi untuk menambahkan data tanpa refresh halaman
        function addData(event) {
            event.preventDefault(); // Mencegah pengiriman form secara default

            const formData = new FormData(event.target);
            formData.append('add_data', true);

            fetch('', { method: 'POST', body: formData })
                .then(() => {
                    event.target.reset(); // Mereset form setelah submit
                    alert('Barang berhasil ditambahkan.'); // Alert success
                })
                .catch(error => console.error('Error:', error));
        }
    </script>
</head>
<body>
    <div class="form-container">
        <h2>Tambah Data Barang</h2>
        <form onsubmit="addData(event)">
            <label for="id_barang">ID Barang:</label>
            <input type="text" name="id_barang" required>

            <label for="nama_barang">Nama Barang:</label>
            <input type="text" name="nama_barang" required>

            <label for="stok">Stok:</label>
            <input type="number" name="stok" required>

            <label for="harga_beli">Harga Beli:</label>
            <input type="number" name="harga_beli" required>

            <label for="harga_jual">Harga Jual:</label>
            <input type="number" name="harga_jual" required>

            <input type="submit" value="Tambah Barang">
        </form>
    </div>
</body>
</html>

<?php
// Tutup koneksi database
$conn->close();
?>
