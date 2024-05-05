<?php
session_start();

// 檢查是否已經登入
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $old_password = $_POST['old_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    // 檢查新密碼是否與舊密碼相同
    if ($new_password === $old_password) {
        header("Location: change_password.php?error=1");
        exit;
    }

    // 其他密碼驗證過程...

    // 更新密碼
    updatePassword($_SESSION['username'], $new_password); // 自定義函數，用於更新密碼

    header("Location: change_password.php?success=1");
    exit;
}

// 定義更新密碼函數
function updatePassword($username, $new_password) {

    // 將新密碼進行哈希處理
    $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

    // 讀取使用者資料
    $lines = file("users.txt", FILE_IGNORE_NEW_LINES);
    $updated_lines = array();
    

    // 更新使用者資料
    foreach ($lines as $line) {
        list($stored_username, $stored_password, $fullname) = explode(",", $line);
        if ($username === $stored_username) {
            // 更新密碼
            $line = "$stored_username,$hashed_password,$fullname";
        }
        $updated_lines[] = $line;
    }

    // 寫回使用者資料到檔案中
    file_put_contents("users.txt", implode("\n", $updated_lines));
}
?>
<?php
if (isset($_GET['error'])) {
    $error = $_GET['error'];
    if ($error == 1) {
        echo "<p>新密碼不得與舊密碼相同。</p>";
    }
} elseif (isset($_GET['success'])) {
    echo "<p>密碼修改成功。</p>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>修改密碼</title>
    <!-- 引入 Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gradient-to-r from-blue-400 to-purple-600 h-screen flex items-center justify-center">

<div class="max-w-md bg-white shadow-md rounded-md p-8">
    <h1 class="text-3xl font-bold text-center text-gray-800 mb-8">修改密碼</h1>
    
    <form action="change_password.php" method="post">
        <div class="mb-4">
            <label for="old_password" class="block text-gray-700 font-bold mb-2">舊密碼：</label>
            <input type="password" id="old_password" name="old_password" class="form-input w-full">
        </div>
        <div class="mb-4">
            <label for="new_password" class="block text-gray-700 font-bold mb-2">新密碼：</label>
            <input type="password" id="new_password" name="new_password" class="form-input w-full">
        </div>
        <div class="mb-4">
            <label for="confirm_password" class="block text-gray-700 font-bold mb-2">確認新密碼：</label>
            <input type="password" id="confirm_password" name="confirm_password" class="form-input w-full">
        </div>
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded w-full">修改密碼</button>
    </form>
    <a href="welcome.php" class="block text-center text-gray-700 mt-4 hover:underline">回主頁</a>
</div>

</body>
</html>
