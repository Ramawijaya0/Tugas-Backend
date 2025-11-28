<?php

require_once __DIR__ . '/../models/Book.php';

class BookController
{
    private $book;

    public function __construct()
    {
        $this->book = new Book;
    }
    public function index()
    {
        $books = $this->book->all();
        require_once __DIR__ . '/../public/views/book_list.php';
    }

    public function create()
    {
        require_once __DIR__ . '/../public/views/book_add.php';
    }

    public function store($data)
    {
        $title = $data['title'];
        $author = $data['author'];
        $category = $data['category'];

        $image = null;
        if (!empty($_FILES['cover']['name'])) {
            $image = $this->uploadFile($_FILES['cover']);
        }

        $this->book->create([
            'title' => $title,
            'author' => $author,
            'image' => $image,
            'category' => $category
        ]);

        header('Location: /index.php');
    }

    public function edit($id)
    {
        $book = $this->book->find($id);
        require_once __DIR__ . '/../public/views/book_edit.php';
    }

    public function update($post)
    {
        $id = $post['id'];
        $title = $post['title'];
        $author = $post['author'];
        $category = $post['category'];

        if (!empty($_FILES['cover']['name'])) {
            $newCover = $this->uploadFile($_FILES['cover']);
        } else {
            $book = $this->book->find($id);
            $newCover = $book['image'];
        }

        $this->book->update($id, $title, $author, $newCover, $category);


        header("Location: index.php");
    }


    public function delete($id)
    {
        $books = $this->book->find($id);

        if (!$books) {
            die("Data tidak ditemukan");
        }

        if ($books['image'] && file_exists('uploads/' . $books['image'])) {
            unlink('uploads/' . $books['image']);
        }

        $this->book->delete($id);

        header("Location: /?page=books");
        exit;
    }


    public function uploadFile($file)
    {
        $uploadDir = __DIR__ . '/../public/uploads/';
        $fileName = time() . '-' . basename($file['name']);
        $targetPath = $uploadDir . $fileName;

        $allowedTypes = ['image/jpeg', 'image/png'];

        if (!in_array($file['type'], $allowedTypes)) {
            return null;
        }

        if ($file['size'] > 2 * 1024 * 1024) {
            return null;
        }

        if (move_uploaded_file($file['tmp_name'], $targetPath)) {
            return "uploads/" . $fileName;
        }

        return null;
    }
}
