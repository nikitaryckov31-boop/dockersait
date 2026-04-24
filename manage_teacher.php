<?php 
include 'db.php'; 

// 1. ЛОГИКА УДАЛЕНИЯ
if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id'])) {
    $id = (int)$_GET['id'];
    $conn->query("DELETE FROM teachers WHERE id = $id");
    header("Location: teachers.php");
    exit();
}

// 2. ЛОГИКА СОХРАНЕНИЯ (Исправлено: добавлена проверка на наличие данных)
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['full_name'])) {
    $name = $conn->real_escape_string($_POST['full_name']);
    $subject = $conn->real_escape_string($_POST['subject']);
    $email = $conn->real_escape_string($_POST['email'] ?? '');
    $exp = (int)($_POST['experience_years'] ?? 0);
    $photo = $conn->real_escape_string($_POST['photo_url'] ?? 'https://dicebear.com');

    if (!empty($_POST['id'])) { // Редактируем
        $id = (int)$_POST['id'];
        $conn->query("UPDATE teachers SET full_name='$name', subject='$subject', email='$email', experience_years=$exp, photo_url='$photo' WHERE id=$id");
    } else { // Добавляем нового
        $conn->query("INSERT INTO teachers (full_name, subject, email, experience_years, photo_url) VALUES ('$name', '$subject', '$email', $exp, '$photo')");
    }
    header("Location: teachers.php");
    exit();
}

// 3. ПОДГОТОВКА ДАННЫХ ДЛЯ ФОРМЫ
$t = ['id' => '', 'full_name' => '', 'subject' => '', 'email' => '', 'experience_years' => '', 'photo_url' => ''];
if (isset($_GET['action']) && $_GET['action'] == 'edit' && isset($_GET['id'])) {
    $id = (int)$_GET['id'];
    $res = $conn->query("SELECT * FROM teachers WHERE id = $id");
    if ($res && $res->num_rows > 0) {
        $t = $res->fetch_assoc();
    }
}

include 'header.php'; 
?>

<div style="max-width: 500px; margin: auto; background: #bbff00; padding: 25px; border-radius: 8px; box-shadow: 0 2px 10px rgba(207, 24, 24, 0.1);">
    <h2 style="text-align: center; color: #1674d1;"><?= !empty($t['id']) ? '✏️ Редактировать' : '➕ Добавить' ?> преподавателя</h2>
    <hr><br>

    <form method="POST">
        <input type="hidden" name="id" value="<?= $t['id'] ?>">
        
        <label>ФИО:</label><br>
        <input type="text" name="full_name" value="<?= htmlspecialchars($t['full_name']) ?>" required style="width: 100%; padding: 10px; margin: 10px 0; border: 1px solid #388eff; border-radius: 4px;"><br>
        
        <label>Предмет:</label><br>
        <input type="text" name="subject" value="<?= htmlspecialchars($t['subject']) ?>" required style="width: 100%; padding: 10px; margin: 10px 0; border: 1px solid #ff0101; border-radius: 4px;"><br>
        
        <label>Email:</label><br>
        <input type="email" name="email" value="<?= htmlspecialchars($t['email']) ?>" style="width: 100%; padding: 10px; margin: 10px 0; border: 1px solid #d014ff; border-radius: 4px;"><br>
        
        <label>Опыт работы (лет):</label><br>
        <input type="number" name="experience_years" value="<?= $t['experience_years'] ?>" style="width: 100%; padding: 10px; margin: 10px 0; border: 1px solid #0fff37; border-radius: 4px;"><br>
        
        <label>Ссылка на фото (URL):</label><br>
        <input type="text" name="photo_url" value="<?= htmlspecialchars($t['photo_url']) ?>" placeholder="https://..." style="width: 100%; padding: 10px; margin: 10px 0; border: 1px solid #3797cf; border-radius: 4px;"><br>
        
        <button type="submit" style="background: #3498db; color: white; padding: 12px; border: none; border-radius: 5px; cursor: pointer; width: 100%; font-weight: bold; font-size: 16px; margin-top: 10px;">СОХРАНИТЬ</button>
        <br><br>
        <a href="teachers.php" style="color: #777; text-decoration: none; display: block; text-align: center;">← Назад к списку</a>
    </form>
</div>

<?php include 'footer.php'; ?>
