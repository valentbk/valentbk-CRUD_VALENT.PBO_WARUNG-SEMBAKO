<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>BERKAH JAYA</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f0f0f0; margin: 0; padding: 20px; }
        h1 { text-align: center; color: #333; }
        .container { width: 80%; margin: 0 auto; padding: 20px; background-color: #fff; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); border-radius: 8px; }
        button { padding: 10px 15px; border: none; border-radius: 5px; background-color: #4285f4; color: white; font-size: 16px; cursor: pointer; margin: 10px 5px; transition: background-color 0.3s; }
        button:hover { background-color: #357ae8; }
        .form-container { margin-top: 20px; }
        .close-btn { background-color: #f44336; }
        .close-btn:hover { background-color: #d32f2f; }
    </style>
</head>
<body>
    <div class="container">
        <h1>TOKO BERKAH JAYA SEMBAKO</h1>
        <h4>Note:Untuk setiap perubahan diperlukan refresh halaman untuk memunculkan perubahan</h4>
        
        <button onclick="showSection('addData')">Tambah Barang</button>
        <button onclick="showSection('viewData')">Lihat Stok</button>

        <div id="addData" class="form-container" style="display:none;">
            <button class="close-btn" onclick="hideSection('addData')">Sembunyikan</button>
            <?php include 'add_data.php'; ?>
        </div>

        <div id="viewData" class="form-container" style="display:none;">
            <button class="close-btn" onclick="hideSection('viewData')">Sembunyikan</button>
            <?php include 'view.php'; ?>
        </div>

        <div id="prosesData" class="form-container" style="display:none;">
            <button class="close-btn" onclick="hideSection('prosesData')">Sembunyikan</button>
            <?php include 'proses_data.php'; ?> <!-- Include the delete functionality -->
        </div>

        <div id="editData" class="form-container" style="display:none;">
            <button class="close-btn" onclick="hideSection('editData')">Sembunyikan</button>
            <iframe id="editDataFrame" style="width:100%; height:300px; border:none;"></iframe>
        </div>
    </div>

    <script>
        function showSection(section) {
            document.getElementById('addData').style.display = 'none';
            document.getElementById('viewData').style.display = 'none';
            document.getElementById('prosesData').style.display = 'none'; // Hide delete section
            document.getElementById('editData').style.display = 'none';
            document.getElementById(section).style.display = 'block';
        }

        function hideSection(section) {
            document.getElementById(section).style.display = 'none';
        }
    </script>
</body>
</html>
