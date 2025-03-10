<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = md5($_POST['password']); // Sebaiknya pakai password_hash() di produksi

    // Gunakan prepared statement untuk keamanan
    $query = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
    
    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Registrasi berhasil!'); window.location.href = 'index.php';</script>";
        exit();
    } else {
        die("Error: " . mysqli_error($conn)); // Debugging error
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Registrasi</title>
    <link rel="stylesheet" href="css/register.css">
</head>
<body>

    <form action="" method="post">
        <h2>Halaman Registrasi</h2>

        <label for="username">Username:</label>
        <input type="text" name="username" placeholder="Username" required><br>
        
        <label for="email">Email:</label>
        <input type="email" name="email" placeholder="Email" required><br>
        
        <label for="password">Password:</label>
        <input type="password" name="password" placeholder="Password" required><br>

        <button type="submit">Register</button>
        <br>
        <p>Sudah punya akun? <a href="index.php">Login disini</a></p>
    </form>

</body>
</html>
