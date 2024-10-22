<?php
include 'database.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_POST['action'] == 'delete_employee') {
        $stmt = $conn->prepare("DELETE FROM employees WHERE id = ?");
        $stmt->bind_param("i", $_POST['id']);
        $stmt->execute();
    } elseif ($_POST['action'] == 'delete_user') {
        $stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
        $stmt->bind_param("i", $_POST['id']);
        $stmt->execute();
    }
    header('Location: ' . ($_POST['action'] == 'delete_user' ? 'users_page.php' : 'emp_page.php'));
}
?>
