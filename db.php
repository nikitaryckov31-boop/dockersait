<?php
// Подавляем вывод системной ошибки через @, чтобы вывести свою красивую
$conn = @new mysqli("db", "root", "root_password", "app_db");

if ($conn->connect_error) {
    die("<div style='color:red; font-family:sans-serif; text-align:center; padding:50px;'>
            <h2>База данных еще спит... 😴</h2>
            <p>Подождите 10-20 секунд и обновите страницу (F5).</p>
         </div>");
}
$conn->set_charset("utf8mb4");
