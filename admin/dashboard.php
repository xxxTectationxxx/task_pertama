<?php
require '../db.php';
session_start();

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    die("Akses ditolak!");
}

// Hapus user
if (isset($_GET['delete'])) {
    $stmt = $conn->prepare("DELETE FROM users WHERE id=?");
    $stmt->bind_param("i", $_GET['delete']);
    $stmt->execute();
    header("Location: dashboard.php");
}

// Ambil data user
$result = $conn->query("SELECT id, username, email, password, role FROM users");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <h2>Admin Dashboard</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Email</th>
                <th>Password</th>
                <th>Role</th>
                <th>Aksi</th>
            </tr>
            <?php while ($row = $result->fetch_assoc()) : ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= $row['username'] ?></td>
                <td><?= $row['email'] ?></td>
                <td><?= $row['password'] ?></td>
                <td><?= $row['role'] ?></td>
                <td>
                    <a href="edit_user.php?id=<?= $row['id'] ?>" class="edit-btn">Edit</a>
                    <a href="?delete=<?= $row['id'] ?>" onclick="return confirm('Hapus user ini?')" class="delete-btn">Hapus</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </table>
        <a href="../logout.php" class="logout-btn">Logout</a>
    </div>
</body>
</html>
