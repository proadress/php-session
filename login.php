<?php
session_start();


if(isset($_SESSION['username'])) {
    header("Location: welcome.php");
    exit;
}

if($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_SESSION['lockout_until']) && $_SESSION['lockout_until'] > time()) {
        // 用戶被鎖定中，重導向回登入頁面
        header("Location: login.php?error=3");
        exit;
    }
        
    // 檢查帳號及密碼是否只包含英數字
    if (!preg_match('/^[a-zA-Z0-9]+$/', $_POST['username']) || !preg_match('/^[a-zA-Z0-9]+$/', $_POST['password'])) {
        // 如果不符合格式，重新導向回登入頁面
        header("Location: login.php?error=2");
        exit;
    }


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
            // 登入成功，清除失敗計數及鎖定時間
            unset($_SESSION['login_failures']);
            unset($_SESSION['lockout_until']);
            header("Location: welcome.php");
            exit;
        }
    }
    // 登入失敗，記錄失敗時間及次數
    if (!isset($_SESSION['login_failures'])) {
        $_SESSION['login_failures'] = 1;
    } else {
        $_SESSION['login_failures']++;
    }

    // 如果連續失敗次數達到三次，鎖定帳號五分鐘
    if ($_SESSION['login_failures'] >= 3) {
        $_SESSION['lockout_until'] = time() + ( 20); // 鎖定五分鐘
        // 清除失敗計數
        unset($_SESSION['login_failures']);
        // 重導向回登入頁面，並顯示鎖定訊息
        header("Location: login.php?error=3");
        exit;
    }

    // 登入失敗
    header("Location: login.php?error=1");
    exit;
}
?>
<?php
if(isset($_GET['error'])) {
    $error = $_GET['error'];
    if ($error == 1) {
        echo "<p>帳號或密碼錯誤。</p>";
    } elseif ($error == 2) {
        echo "<p>輸入內容限英數字。</p>";
    } elseif ($error == 3) {
        echo "<p>您的帳號已被鎖定，請稍後再試。剩餘鎖定時間：";
        $remaining_time = $_SESSION['lockout_until'] - time();
        echo gmdate("H:i:s", $remaining_time); // 將剩餘秒數轉換為時:分:秒的格式
        echo "</p>";
    }
}
?>



<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>登入</title>
    <!-- 引入 Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gradient-to-r from-blue-400 to-purple-600 h-screen flex items-center justify-center">

<div class="max-w-md bg-white shadow-md rounded-md p-8">
    <h1 class="text-3xl font-bold text-center text-gray-800 mb-8">請登入</h1>
    
    <form action="login.php" method="post">
        <div class="mb-4">
            <label for="username" class="block text-gray-700 font-bold mb-2">帳號：</label>
            <input type="text" id="username" name="username" class="form-input w-full">
        </div>
        <div class="mb-4">
            <label for="password" class="block text-gray-700 font-bold mb-2">密碼：</label>
            <input type="password" id="password" name="password" class="form-input w-full">
        </div>
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded w-full">登入</button>
    </form>
</div>

</body>
</html>
