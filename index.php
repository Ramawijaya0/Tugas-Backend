<?php
require_once __DIR__ . '/core/Database.php';
require_once __DIR__ . '/models/Book.php';
require_once __DIR__ . '/controllers/BookController.php';

$page = $_GET['page'] ?? 'list';

$controller = new BookController();

switch ($page) {
    case 'add':
        $controller->create();
        break;

    case 'store':
        $controller->store($_POST);
        break;

    case 'edit':
        $controller->edit($_GET['id']);
        break;

    case 'update':
        $controller->update($_POST);
        break;

    case 'delete':
        $controller->delete($_GET['id']);
        break;

    default:
        $controller->index();
        break;
}
