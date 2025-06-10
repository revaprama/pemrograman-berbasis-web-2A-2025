<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Aplikasi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f2f5;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }

        .login-container {
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px; 
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .error-message {
            color: red;
            text-align: center;
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #4a5568;
            font-size: 1.05em;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #cbd5e0;
            border-radius: 8px;
            box-sizing: border-box;
            font-size: 1em;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }

        button[type="submit"] {
            background-color: #4c51bf;
            color: white;
            padding: 12px 25px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 1.1em;
            font-weight: 700;
            width: 100%;
            transition: background-color 0.3s ease, transform 0.2s ease;
            margin-top: 15px;
        }
    </style>
</head>
<body>
<?php
session_start();
include 'config.php';

$login_error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username_input = $_POST['username'];
    $password_input = $_POST['password'];

    $sql = "SELECT id, username, password FROM users WHERE username = '$username_input'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $hashed_password_from_db = $row['password'];

        if (password_verify($password_input, $hashed_password_from_db)) {
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $row['username'];
            $_SESSION['user_id'] = $row['id'];

            header("Location: dashboard.php");
            exit;
        } else {
            $login_error = "Password salah!";
        }
    } else {
        $login_error = "Username tidak ditemukan!";
    }
}
$conn->close();
?>
<form id="loginForm" action="" method="POST">
    <h2>Login</h2>
    <?php if (!empty($login_error)): ?>
        <p style="color:red;"><?php echo $login_error; ?></p>
    <?php endif; ?>
    <label>Username</label><br>
    <input type="text" id="username" name="username" required><br>
    <label>Password</label><br>
    <input type="password" id="password" name="password" required><br>
    <button type="submit" name="login">Login</button>
    <p>Apakah Belum punya akun? <a href="register.php">Daftar di sini</a></p>
</form>

<script>
document.getElementById('loginForm').addEventListener('submit', function(e) {
    var username = document.getElementById('username').value.trim();
    var password = document.getElementById('password').value.trim();

    if (username === "" || password === "") {
        alert("Harap isi semua kolom!");
        e.preventDefault(); 
    }
});
</script>