<?php
session_start();
require_once '../includes/db.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $mysqli->real_escape_string($_POST['title']);
    $author = $mysqli->real_escape_string($_POST['author']);
    $price = $_POST['price'];
    $description = $mysqli->real_escape_string($_POST['description']);

    $stmt = $mysqli->prepare('INSERT INTO books (title, author, price, description) VALUES (?, ?, ?, ?)');
    $stmt->bind_param('ssds', $title, $author, $price, $description);
    $stmt->execute();

    header('Location: home.php');
    exit;
}
?>

<?php include '../includes/header.php'; ?>

<h2>Share a Book</h2>
<form method="post">
    <label for="title">Title:</label>
    <input type="text" id="title" name="title" required>
    <label for="author">Author:</label>
    <input type="text" id="author" name="author" required>
    <label for="price">Price:</label>
    <input type="number" step="0.01" id="price" name="price" required>
    <label for="description">Description:</label>
    <textarea id="description" name="description" required></textarea>
    <button type="submit">Share Book</button>
</form>

<?php include '../includes/footer.php'; ?>
