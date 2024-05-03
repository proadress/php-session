<?php
$plaintext_password = "abc"; // 替換成你的原始密碼
$hashed_password = password_hash($plaintext_password, PASSWORD_DEFAULT);
echo $hashed_password;
?>
