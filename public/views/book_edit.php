<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Buku</title>
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
            background: #007bff;
            color: #fff;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background: #0056b3;
        }

        a.back {
            display: inline-block;
            margin-top: 15px;
            text-decoration: none;
            color: #555;
        }

        img.cover {
            width: 150px;
            margin: 10px 0;
            border-radius: 6px;
            border: 1px solid #ddd;
        }
    </style>
</head>

<body>

    <div class="container">
        <h2>Edit Buku</h2>

        <form action="index.php?page=update" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $book['id']; ?>">

            <!-- TITLE -->
            <label style="float:left;">Judul Buku:</label>
            <input type="text" name="title" value="<?= $book['title']; ?>" required>

            <!-- AUTHOR -->
            <label style="float:left;">Penulis:</label>
            <input type="text" name="author" value="<?= $book['author']; ?>" required>

            <!-- CATEGORY -->
            <label style="float:left;">Kategori:</label>
            <select name="category" required>
                <option value="">-- Pilih Kategori --</option>
                <option value="Fiksi" <?= ($book['category'] == 'Fiksi' ? 'selected' : '') ?>>Fiksi</option>
                <option value="Non-Fiksi" <?= ($book['category'] == 'Non-Fiksi' ? 'selected' : '') ?>>Non-Fiksi</option>
                <option value="Novel" <?= ($book['category'] == 'Novel' ? 'selected' : '') ?>>Novel</option>
                <option value="Komik" <?= ($book['category'] == 'Komik' ? 'selected' : '') ?>>Komik</option>
                <option value="Pendidikan" <?= ($book['category'] == 'Pendidikan' ? 'selected' : '') ?>>Pendidikan</option>
            </select>

            <!-- CURRENT COVER -->
            <label style="float:left;">Cover Saat Ini:</label><br>
            <?php if ($book['image']): ?>
                <img class="cover" src="public/<?= $book['image']; ?>" alt="cover">
            <?php else: ?>
                <p>- Tidak ada cover -</p>
            <?php endif; ?>

            <!-- NEW COVER -->
            <label style="float:left;">Ganti Cover (Opsional):</label>
            <input type="file" name="cover" accept="image/*">

            <button type="submit">Update</button>

            <a href="index.php" class="back">← Kembali</a>
        </form>
    </div>

</body>

</html>