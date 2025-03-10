<?php
include 'db.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = md5($_POST['password']); // Sebaiknya pakai password_hash() di produksi
    
    // Periksa apakah username sudah ada
    $check_username = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");
    if(mysqli_num_rows($check_username) > 0) {
        $error = "Username sudah ada!";
    } 
    // Periksa apakah email sudah ada
    else {
        $check_email = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");
        if(mysqli_num_rows($check_email) > 0) {
            $error = "Email sudah digunakan!";
        } 
        // Jika username dan email belum ada, lakukan registrasi
        else {
            // Gunakan prepared statement untuk keamanan
            $query = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
            if (mysqli_query($conn, $query)) {
                echo "<script>alert('Registrasi berhasil!'); window.location.href = 'index.php';</script>";
                exit();
            } else {
                $error = "Error: " . mysqli_error($conn); // Debugging error
            }
        }
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
        <input type="text" name="username" placeholder="Username" required value="<?php echo isset($_POST['username']) ? htmlspecialchars($_POST['username']) : ''; ?>"><br>
        
        <label for="email">Email:</label>
        <input type="email" name="email" placeholder="Email" required value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>"><br>
        
        <label for="password">Password:</label>
        <input type="password" name="password" placeholder="Password" required><br>
        
        <button type="submit">Register</button>
        <br>
        <p>Sudah punya akun? <a href="index.php">Login disini</a></p>
        <?php if (isset($error)) { echo "<p style='color: red;'>$error</p>"; } ?>
    </form>
</body>
</html>