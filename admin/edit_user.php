<?php
require '../db.php';
session_start();

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    die("Akses ditolak!");
}

// Ambil data user berdasarkan ID
if (isset($_GET['id'])) {
    $stmt = $conn->prepare("SELECT username, email, password, role FROM users WHERE id=?");
    $stmt->bind_param("i", $_GET['id']);
    $stmt->execute();
    $user = $stmt->get_result()->fetch_assoc();
}

// Proses update data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = !empty($_POST['password']) ? hash('sha256', $_POST['password']) : $user['password']; // Update jika diisi
    $role = $_POST['role'];

    $stmt = $conn->prepare("UPDATE users SET username=?, email=?, password=?, role=? WHERE id=?");
    $stmt->bind_param("ssssi", $username, $email, $password, $role, $_GET['id']);
    $stmt->execute();

    header("Location: dashboard.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link rel="stylesheet" href="css/edit.css">
</head>
<body>

    <div class="container">
        <h2>Edit User</h2>

        <form method="post">
            <label for="username">Username:</label>
            <input type="text" name="username" value="<?= $user['username'] ?>" required>

            <label for="email">Email:</label>
            <input type="email" name="email" value="<?= $user['email'] ?>" required>

            <label for="password">Password (biarkan kosong jika tidak ingin mengubah):</label>
            <input type="password" name="password" placeholder="Masukkan password baru">

            <label for="role">Role:</label>
            <select name="role">
                <option value="user" <?= $user['role'] == 'user' ? 'selected' : '' ?>>User</option>
                <option value="admin" <?= $user['role'] == 'admin' ? 'selected' : '' ?>>Admin</option>
            </select>

            <button type="submit">Simpan Perubahan</button>
        </form>

        <a href="dashboard.php" class="back-btn">Kembali ke Dashboard</a>
    </div>

</body>
</html>
