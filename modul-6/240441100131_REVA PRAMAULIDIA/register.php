<!DOCTYPE html>
<html lang="en">
<head>
<body>
    <link rel="stylesheet" href="style.css">
    <style>
    body {
        font-family: 'Arial', sans-serif;
        background-color: #f0f2f5;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
    }

    form {
        background-color: #ffffff;
        padding: 30px;
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        width: 300px;
    }

    h2 {
        text-align: center;
        margin-bottom: 20px;
        color: #333;
    }

    label {
        font-size: 14px;
        color: #555;
    }

    input[type="text"],
    input[type="password"] {
        width: 100%;
        padding: 10px;
        margin: 8px 0 16px 0;
        border: 1px solid #ccc;
        border-radius: 6px;
        box-sizing: border-box;
    }

    button {
        width: 100%;
        background-color:rgb(16, 8, 63);
        color: white;
        padding: 12px;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        font-size: 16px;
    }

    a {
        color:rgb(53, 31, 175);
        text-decoration: none;
    }

    .success-message {
        background-color: #e6ffe6;
        color:rgb(15, 10, 92);
        border: 1px solidrgb(17, 8, 90);
        padding: 12px;
        border-radius: 8px;
        margin-bottom: 20px;
        text-align: center;
    }
    </style>
</head>
</body>
</html>

<?php
session_start();
include 'config.php';

$register_message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password_plain = $_POST['password'];

    $password_hashed = password_hash($password_plain, PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password_hashed')";

    if ($conn->query($sql) === TRUE) {
        $register_message = "Registrasi berhasil! <a href='login.php'>Login di sini</a>";
    } else {
        $register_message = "Error: " . $conn->error;
    }
}
$conn->close();
?>

<form action="" method="POST" id="registerForm">
    <h2>Register</h2>

    <?php if (!empty($register_message)): ?>
        <div class="success-message">
            <?php echo $register_message; ?>
        </div>
    <?php endif; ?>

    <label>Username</label><br>
    <input type="text" name="username" id="username" required><br>

    <label>Password</label><br>
    <input type="password" name="password" id="password" required><br>
    <input type="checkbox" onclick="togglePassword()"> Tampilkan Password<br><br>
    <small style="cursor:pointer; color:rgb(53, 31, 175);" onclick="togglePassword()"> Tampilkan Password</small><br><br>

    <button type="submit">Daftar</button>
</form>

<script>
document.getElementById('registerForm').addEventListener('submit', function(e) {
    var username = document.getElementById('username').value.trim();
    var password = document.getElementById('password').value.trim();

    if (username === "" || password === "") {
        alert("Harap isi username dan password!");
        e.preventDefault(); 
    }
});

function togglePassword() {
    var passwordField = document.getElementById("password");
    if (passwordField.type === "password") {
        passwordField.type = "text";
    } else {
        passwordField.type = "password";
    }
}
</script>