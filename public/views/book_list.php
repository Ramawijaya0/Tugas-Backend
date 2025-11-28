<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Daftar Buku</title>
    <style>
        .contain {
            text-align: center;
            margin-top: 20px;
            margin-bottom: 50px;
        }

        .contain h2 {
            font-size: 2.3rem;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table,
        th,
        td {
            border: 1px solid #999;
        }

        th,
        td {
            padding: 10px;
            text-align: center;
        }

        img.cover {
            width: 80px;
            height: 110px;
            object-fit: cover;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        a.btn {
            padding: 6px 10px;
            background: #3498db;
            color: white;
            text-decoration: none;
            border-radius: 4px;
        }

        a.delete {
            background: #e74c3c;
        }

        a.add {
            background: #2ecc71;
        }
    </style>
</head>

<body>
    <div class="contain">
        <h2>Daftar Buku</h2>
        <a href="index.php?page=add" class="btn add">+ Tambah Buku</a>
    </div>

    <table>
        <thead>
            <tr>
                <th>Cover</th>
                <th>Judul</th>
                <th>Penulis</th>
                <th>Kategori</th> <!-- Tambahan -->
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>

            <?php if (!empty($books)): ?>
                <?php foreach ($books as $book): ?>
                    <tr>

                        <td>
                            <?php if ($book['image']): ?>
                                <img class="cover" src="public/<?= $book['image']; ?>" alt="cover">
                            <?php else: ?>
                                <span>-</span>
                            <?php endif; ?>
                        </td>

                        <td><?= htmlspecialchars($book['title']); ?></td>
                        <td><?= htmlspecialchars($book['author']); ?></td>

                        <td>
                            <?= htmlspecialchars($book['category'] ?? '-'); ?>
                        </td>

                        <td>
                            <a class="btn" href="index.php?page=edit&id=<?= $book['id']; ?>">Edit</a>
                            <a class="btn delete" href="index.php?page=delete&id=<?= $book['id']; ?>"
                                onclick="return confirm('Yakin ingin menghapus buku ini?')">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>

            <?php else: ?>
                <tr>
                    <td colspan="6">Belum ada data buku.</td>
                </tr>
            <?php endif; ?>

        </tbody>
    </table>

</body>

</html>