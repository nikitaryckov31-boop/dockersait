<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Контакты</title>
</head>
<body>
    <header><h1>Связаться с нами</h1></header>
    <nav><a href="index.php">Главная</a><a href="about.php">О нас</a><a href="contacts.php">Контакты</a></nav>
    <div class="container">
        <form style="display: flex; flex-direction: column; gap: 10px; max-width: 400px; margin: auto;">
            <input type="text" placeholder="Ваше имя" style="padding: 10px;">
            <input type="email" placeholder="Ваш Email" style="padding: 10px;">
            <textarea placeholder="Сообщение" style="padding: 10px; height: 100px;"></textarea>
            <button type="submit" style="padding: 10px; background: #2c3e50; color: white; border: none; cursor: pointer;">Отправить</button>
        </form>
    </div>
</body>
</html>
