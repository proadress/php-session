<?php
session_start();

if(!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <!-- 引入 Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gradient-to-r from-blue-400 to-purple-600 h-screen flex items-center justify-center">

<div class="max-w-md bg-white shadow-md rounded-md p-8">
    <h2 class="text-3xl font-bold text-center text-gray-800 mb-4">Welcome, <?php echo $_SESSION['fullname']; ?>!</h2>
    
    <form action="logout.php" method="post" class="mb-4">
        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded w-full">Logout</button>
    </form>

    <a href="change_password.php" class="block text-center text-blue-500 hover:underline">修改密碼</a>
</div>

</body>
</html>

