<?php
session_start();
require_once '../includes/db.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

$user_id = $_SESSION['user_id'];
$book_id = $_GET['id'];

$stmt = $mysqli->prepare('SELECT * FROM cart WHERE user_id = ? AND book_id = ?');
$stmt->bind_param('ii', $user_id, $book_id);
$stmt->execute();
$result = $stmt->get_result();
$cart_item = $result->fetch_assoc();

if ($cart_item) {
    $stmt = $mysqli->prepare('UPDATE cart SET quantity = quantity + 1 WHERE user_id = ? AND book_id = ?');
    $stmt->bind_param('ii', $user_id, $book_id);
    $stmt->execute();
} else {
    $stmt = $mysqli->prepare('INSERT INTO cart (user_id, book_id, quantity) VALUES (?, ?, 1)');
    $stmt->bind_param('ii', $user_id, $book_id);
    $stmt->execute();
}

header('Location: cart.php');
exit;
?>
