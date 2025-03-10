<?php
require 'db.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = hash('md5', $_POST['password']);

    $stmt = $conn->prepare("SELECT id, role FROM users WHERE username=? AND password=?");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['role'] = $user['role'];

        if ($user['role'] == 'admin') {
            header("Location: admin/dashboard.php");
        } else {
            header("Location: login.php");
        }
    } else {
        echo "<script>
                alert('Username atau password salah!');
                window.location.href = 'login.php';
              </script>";
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <form method="post">
        <h2>Login</h2>
        
        <!-- Username -->
        <label for="username">Username:</label>
        <input type="text" name="username" placeholder="Username" required><br>
        
        <!-- Password -->
        <label for="password">Password:</label>
        <input type="password" name="password" placeholder="Password" required><br>
        
        <button type="submit">Login</button>
        <br>
        <p>Belum punya akun? <a href="register.php">Daftar disini</a></p>
    </form>

</body>
</html>
