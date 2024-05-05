<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Resep Obat</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
        }

        .modal {
            font-size: 16px;
            width: 400px;
            max-width: 80%;
            margin: 100px auto;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        .modal h2 {
            font-size: 24px;
            margin-bottom: 20px;
            color: #333;
            text-align: center;
        }

        .modal p {
            margin-bottom: 10px;
        }

        .modal strong {
            font-weight: bold;
            color: #555;
        }

        .modal span {
            color: #777;
        }

        .close-btn {
            background-color: #ddd;
            color: #333;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s;
            margin-top: 20px;
            display: block;
            margin-left: auto;
            margin-right: auto;
        }

        .close-btn:hover {
            background-color: #ccc;
        }
    </style>
</head>
<body>
    <div class="modal">
        <h2>Detail Resep Obat</h2>
        <div class="modal-body">
            <p><strong>No Periksa:</strong> <span id="noPeriksa">{{ $resep->no_periksa }}</span></p>
            <p><strong>Nama Pasien:</strong> <span id="namaPasien">{{ $resep->pasien->nama_pasien }}</span></p>
            <p><strong>Nama Obat:</strong> <span id="namaObat">{{ $resep->obat->nama_obat }}</span></p>
            <p><strong>Aturan Pakai:</strong> <span id="aturanPakai">{{ $resep->aturan_pakai }}</span></p>
            <p><strong>Deskripsi:</strong> <span id="deskripsi">{{ $resep->deskripsi }}</span></p>
        </div>
        <button class="close-btn" onclick="closeModal()">Close</button>
    </div>

    <script>
        function closeModal() {
            var modal = document.querySelector('.modal');
            modal.style.display = 'none';
        }
    </script>
</body>
</html>
