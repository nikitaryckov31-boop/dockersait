<?php 
// Подключаем базу данных
include 'db.php'; 
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Колледж - 142 АПТ</title>
    <style>
        /* Быстрые стили для красоты, если style.css еще не подхватился */
        body { font-family: sans-serif; margin: 0; background: #f4f4f4; }
        header { background: #0080ff; color: white; padding: 20px; text-align: center; }
        nav { background: #34495e; padding: 10px; text-align: center; }
        nav a { color: white; margin: 0 15px; text-decoration: none; font-weight: bold; }
        nav a:hover { color: #3498db; }
        .container { max-width: 1000px; margin: 20px auto; padding: 20px; background: white; border-radius: 8px; }
        .welcome-block { text-align: center; padding: 40px; }
    </style>
</head>
<body>

    <header>
        <h1>🎓 Система управления Колледжем</h1>
        <p>Аудитория 142 АПТ</p>
    </header>

    <nav>
        <a href="index.php">🏠 Главная</a>
        <a href="about.php">📖 О проекте</a>
        <a href="teachers.php">👨‍🏫 Преподаватели</a>
        <a href="students.php">👨‍🎓 Студенты</a>
        <a href="contacts.php">📞 Контакты</a>
    </nav>

    <div class="container">
        <div class="welcome-block">
            <h2>Я изучаю Docker в аудитории 142 АПТ</h2>
            <p>Добро пожаловать в нашу учебную систему управления!</p>
            <p>Используйте меню выше, чтобы перейти к спискам студентов или преподавателей.</p>
            <div style="margin-top: 30px;">
                <img src="https://dicebear.com" width="150" alt="Docker Mascot">
            </div>
        </div>
    </div>

    <footer style="text-align: center; padding: 20px; color: #ff8181;">
        <p>&copy; <?= date('Y') ?> Проект Docker + PHP + MySQL. 142 АПТ</p>
    </footer>

</body>
</html>
