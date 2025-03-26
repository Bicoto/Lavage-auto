<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    $_SESSION['cart'] = $data;
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false]);
}
?>
