<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Tambah Buku</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f9;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background: white;
            padding: 25px 30px;
            border-radius: 8px;
            width: 420px;
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        h2 {
            margin-bottom: 20px;
        }

        input[type=text],
        select,
        input[type=file] {
            width: 100%;
            padding: 10px;
            margin: 6px 0 14px 0;
            border: 1px solid #ccc;
            border-radius: 6px;
        }

        button {
            width: 100%;
            padding: 10px;
            background: #28a745;
            color: #fff;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background: #1e7e34;
        }

        a.back {
            display: inline-block;
            margin-top: 15px;
            text-decoration: none;
            color: #555;
        }
    </style>
</head>

<body>

    <div class="container">
        <h2>Tambah Buku</h2>

        <form action="index.php?page=store" method="POST" enctype="multipart/form-data">

            <!-- TITLE -->
            <label style="float:left;">Judul Buku:</label>
            <input type="text" name="title" required>

            <!-- AUTHOR -->
            <label style="float:left;">Penulis:</label>
            <input type="text" name="author" required>

            <!-- CATEGORY -->
            <label style="float:left;">Kategori:</label>
            <select name="category" required>
                <option value="">-- Pilih Kategori --</option>
                <option value="Fiksi">Fiksi</option>
                <option value="Non-Fiksi">Non-Fiksi</option>
                <option value="Novel">Novel</option>
                <option value="Komik">Komik</option>
                <option value="Pendidikan">Pendidikan</option>
            </select>

            <!-- FILE UPLOAD -->
            <label style="float:left;">Cover Buku:</label>
            <input type="file" name="cover" accept="image/*" required>

            <button type="submit">Simpan</button>
            <a href="index.php" class="back">← Kembali</a>
        </form>
    </div>

</body>

</html>