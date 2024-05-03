<?php
session_start();

if(isset($_SESSION['username'])) {
    header("Location: welcome.php");
    exit;
}

if($_SERVER["REQUEST_METHOD"] == "POST") {
    // 驗證帳號密碼
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    // 載入使用者資料
    $lines = file("users.txt", FILE_IGNORE_NEW_LINES);
    foreach ($lines as $line) {
        list($stored_username, $stored_password, $fullname) = explode(",", $line);
        if ($username === $stored_username && password_verify($password, $stored_password)) {
            $_SESSION['username'] = $username;
            $_SESSION['fullname'] = $fullname;
            header("Location: welcome.php");
            exit;
        }
    }
    // 登入失敗
    header("Location: login.php?error=1");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <?php if(isset($_GET['error']) && $_GET['error'] == 1): ?>
        <p style="color:red;">Invalid username or password.</p>
    <?php endif; ?>
    <form method="post" action="">
        <label>Username:</label><br>
        <input type="text" name="username" required><br>
        <label>Password:</label><br>
        <input type="password" name="password" required><br><br>
        <input type="submit" value="Login">
    </form>
</body>
</html>
