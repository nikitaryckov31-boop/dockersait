<?php 
include 'db.php'; 

// 1. ЛОГИКА УДАЛЕНИЯ
if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id'])) {
    $id = (int)$_GET['id'];
    $conn->query("DELETE FROM students WHERE id = $id");
    header("Location: students.php");
    exit();
}

// 2. ЛОГИКА СОХРАНЕНИЯ (Исправлено: добавлена проверка и поле фото)
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['full_name'])) {
    $name = $conn->real_escape_string($_POST['full_name']);
    $group = $conn->real_escape_string($_POST['group_name']);
    $email = $conn->real_escape_string($_POST['email'] ?? '');
    $score = (float)($_POST['average_score'] ?? 0);
    $year = (int)($_POST['enrollment_year'] ?? date('Y'));
    $photo = $conn->real_escape_string($_POST['photo_url'] ?? 'https://dicebear.com');

    if (!empty($_POST['id'])) { // РЕДАКТИРОВАНИЕ
        $id = (int)$_POST['id'];
        $conn->query("UPDATE students SET full_name='$name', group_name='$group', email='$email', average_score=$score, enrollment_year=$year, photo_url='$photo' WHERE id=$id");
    } else { // НОВЫЙ СТУДЕНТ
        $conn->query("INSERT INTO students (full_name, group_name, email, average_score, enrollment_year, photo_url) VALUES ('$name', '$group', '$email', $score, $year, '$photo')");
    }
    header("Location: students.php");
    exit();
}

// 3. ПОДГОТОВКА ДАННЫХ ДЛЯ ФОРМЫ
$s = ['id' => '', 'full_name' => '', 'group_name' => '', 'email' => '', 'average_score' => '', 'enrollment_year' => date('Y'), 'photo_url' => ''];
if (isset($_GET['action']) && $_GET['action'] == 'edit' && isset($_GET['id'])) {
    $id = (int)$_GET['id'];
    $res = $conn->query("SELECT * FROM students WHERE id = $id");
    if ($res && $res->num_rows > 0) {
        $s = $res->fetch_assoc();
    }
}

include 'header.php'; 
?>

<div style="max-width: 600px; margin: auto; background: white; padding: 30px; border-radius: 10px; box-shadow: 0 4px 15px rgba(0,0,0,0.1);">
    <h2 style="text-align: center;"><?= !empty($s['id']) ? '📝 Редактировать данные' : '➕ Добавить нового студента' ?></h2>
    <hr><br>
    
    <form method="POST">
        <input type="hidden" name="id" value="<?= $s['id'] ?>">
        
        <div style="margin-bottom: 15px;">
            <label>ФИО Студента:</label>
            <input type="text" name="full_name" value="<?= htmlspecialchars($s['full_name']) ?>" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
        </div>
        
        <div style="display: flex; gap: 15px; margin-bottom: 15px;">
            <div style="flex: 1;">
                <label>Группа:</label>
                <input type="text" name="group_name" value="<?= htmlspecialchars($s['group_name']) ?>" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
            </div>
            <div style="flex: 1;">
                <label>Средний балл:</label>
                <input type="number" step="0.01" name="average_score" value="<?= $s['average_score'] ?>" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
            </div>
        </div>
        
        <div style="margin-bottom: 15px;">
            <label>Email:</label>
            <input type="email" name="email" value="<?= htmlspecialchars($s['email']) ?>" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
        </div>

        <div style="margin-bottom: 15px;">
            <label>Год поступления:</label>
            <input type="number" name="enrollment_year" value="<?= $s['enrollment_year'] ?>" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
        </div>

        <div style="margin-bottom: 20px;">
            <label>Ссылка на фото (URL):</label>
            <input type="text" name="photo_url" value="<?= htmlspecialchars($s['photo_url']) ?>" placeholder="https://..." style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
        </div>
        
        <button type="submit" style="width: 100%; background: #3498db; color: white; padding: 12px; border: none; border-radius: 5px; cursor: pointer; font-size: 16px; font-weight: bold;">СОХРАНИТЬ ДАННЫЕ</button>
        <br><br>
        <a href="students.php" style="display: block; text-align: center; color: #7f8c8d; text-decoration: none;">← Назад к списку</a>
    </form>
</div>

<?php include 'footer.php'; ?>
