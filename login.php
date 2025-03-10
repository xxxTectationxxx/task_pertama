<?php
session_start();

// Mengecek apakah user sudah login
if (!isset($_SESSION['user_id'])) {
    // Jika belum login, redirect ke halaman login
    header("Location: index.php");
    exit();
}

// Ambil data pengguna dari session
$user_id = $_SESSION['user_id'];

// Koneksi ke database
require 'db.php';

// Query untuk mendapatkan username berdasarkan user_id
$query = "SELECT username FROM users WHERE id = $user_id";
$result = mysqli_query($conn, $query);

// Mengecek apakah query berhasil
if ($result) {
    $user = mysqli_fetch_assoc($result);
    $username = $user['username'];
} else {
    // Jika query gagal
    die("Error: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        /* Reset default styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Set the body style */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        /* Center the content */
        .dashboard {
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
            text-align: center;
        }

        /* Title styling */
        h1 {
            font-size: 32px;
            color: #333;
            margin-bottom: 20px;
        }

        /* Button styling */
        .logout-btn {
            width: 100%;
            padding: 12px;
            background-color: #f44336;
            border: none;
            border-radius: 6px;
            color: white;
            font-size: 16px;
            cursor: pointer;
            margin-top: 20px;
            transition: background-color 0.3s;
        }

        .logout-btn:hover {
            background-color: #e53935;
        }
    </style>
</head>
<body>

    <div class="dashboard">
        <h1>Selamat datang, <?php echo htmlspecialchars($username); ?>!</h1>
        <p>Ini adalah halaman dashboard Anda.</p>
        
        <!-- Tombol logout -->
        <form action="logout.php" method="post">
            <button type="submit" class="logout-btn">Logout</button>
        </form>
    </div>

</body>
</html>
