<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>登入系統</title>
    <!-- 引入 Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gradient-to-r from-blue-400 to-purple-600 h-screen flex items-center justify-center">

<div class="bg-white shadow-md rounded-md p-8">
    <h1 class="text-4xl font-bold text-center text-gray-800 mb-8">歡迎來到我們的登入系統！</h1>
    <div class="text-red-700">
        <div>預設帳號 account</div>
        <div>預設密碼 abc</div>
    </div>
    <!-- <div class="mb-4">
        <p class="text-gray-700 mb-2">這是一個優雅而華麗的登入系統，具備以下功能：</p>
        <ul class="list-disc pl-4">
            <li class="text-gray-700">使用帳號和密碼登入（輸入被限制為字母和數字，以防止 SQL 注入）。</li>
            <li class="text-gray-700">使用文字檔或資料庫存儲使用者資料，包括帳號、加密密碼和姓名。</li>
            <li class="text-gray-700">使用會話管理已登入的用戶。</li>
            <li class="text-gray-700">成功登入後，在頁面上提供登出按鈕以結束會話。</li>
            <li class="text-gray-700">未登入的用戶在嘗試訪問其他頁面時會被自動重定向到登入頁面。</li>
            <li class="text-gray-700">在 3 分鐘內連續 3 次登入失敗後，帳號將被鎖定 5 分鐘。</li>
        </ul>
    </div>
    <div class="mb-4">
        <p class="text-gray-700 mb-2">在登入頁面（<code>login.php</code>）中，以下是我們的程式碼片段：</p>
        <ol class="list-decimal pl-6">
            <li><code>login.php</code> 第 10 至 20 行：</li>
            <li>第 2 個程式碼片段</li>
            <li>第 3 個程式碼片段</li>
            <li>第 4 個程式碼片段</li>
            <li>第 5 個程式碼片段</li>
            <li>第 6 個程式碼片段</li>
            <li>第 7 個程式碼片段</li>
        </ol>
    </div> -->

    <div class="mb-8">
        <h2 class="text-2xl font-bold text-gray-800 mb-4">登入系統功能與程式碼位置對應</h2>
        <table class="table-auto">
            <thead>
                <tr>
                    <th class="px-4 py-2 text-left">功能</th>
                    <th class="px-4 py-2 text-left">程式碼檔名</th>
                    <th class="px-4 py-2 text-left">程式碼段落</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="border px-4 py-2">輸入帳號及密碼登入系統（限英數字，防止 SQL Injection 攻擊）</td>
                    <td class="border px-4 py-2">login.php</td>
                    <td class="border px-4 py-2">17-22</td>
                </tr>
                <tr>
                    <td class="border px-4 py-2">使用文字檔或資料庫儲存使用者資料（含帳號、密碼（加密）、姓名）</td>
                    <td class="border px-4 py-2">user.txt</td>
                    <td class="border px-4 py-2">ALL</td>
                </tr>
                <tr>
                    <td class="border px-4 py-2">輸入帳密正確即登入成功，顯示"歡迎<姓名>"訊息，利用 Session 進行會談管理</td>
                    <td class="border px-4 py-2">welcome.php</td>
                    <td class="border px-4 py-2">ALL</td>
                </tr>
                <tr>
                    <td class="border px-4 py-2">登入成功頁面顯示"登出"按鈕，點擊後刪除 Session，跳回登入頁面</td>
                    <td class="border px-4 py-2">logout.php</td>
                    <td class="border px-4 py-2">ALL</td>
                </tr>
                <tr>
                    <td class="border px-4 py-2">未經登入直接跳至任一頁面重導至登入頁面</td>
                    <td class="border px-4 py-2">所有保護頁面</td>
                    <td class="border px-4 py-2">1-8</td>
                </tr>
                <tr>
                    <td class="border px-4 py-2">三分鐘內連續登入失敗三次鎖定五分鐘</td>
                    <td class="border px-4 py-2">login.php</td>
                    <td class="border px-4 py-2">43-58</td>
                </tr>
                <tr>
                    <td class="border px-4 py-2">修改密碼功能（不得與前三代相同）</td>
                    <td class="border px-4 py-2">change_password.php</td>
                    <td class="border px-4 py-2">ALL</td>
                </tr>
            </tbody>
        </table>
    </div>



    <div class="mt-8">
        <p class="text-center text-gray-700">準備好開始了嗎？立即<a href="login.php" class="text-blue-500 hover:underline">登入</a>吧！</p>
    </div>
</div>

</body>
</html>
