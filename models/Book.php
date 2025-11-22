<?php

require_once __DIR__ . '/../core/Database.php';

class Book extends Database
{
    public function all()
    {
        $stmt = $this->pdo->query('SELECT * FROM books');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function find($id)
    {
        $stmt = $this->pdo->prepare('SELECT * FROM books WHERE id = ?');
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($data)
    {
        $stmt = $this->pdo->prepare("INSERT INTO books (title, author, image, category) VALUES (?, ?, ?, ?)");
        return $stmt->execute([$data['title'], $data['author'], $data['image'], $data['category']]);
    }


    public function update($id, $title, $author, $imagePath, $category)
    {
        $stmt = $this->pdo->prepare("UPDATE books 
        SET title=?, author=?, image=?, category=?
        WHERE id=?");
        return $stmt->execute([$title, $author, $imagePath, $category, $id]);
    }



    public function delete($id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM books WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
