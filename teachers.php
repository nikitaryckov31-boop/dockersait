<?php include 'db.php'; include 'header.php'; ?>
<div style="display: flex; justify-content: space-between; align-items: center;">
    <h2>👨‍🏫 Реестр Преподавателей</h2>
    <a href="manage_teacher.php?action=add" style="background: #27ae60; color: white; padding: 10px 15px; border-radius: 5px; text-decoration: none;">+ Добавить преподавателя</a>
</div>

<table style="width: 100%; border-collapse: collapse; margin-top: 20px; background: white; box-shadow: 0 1px 3px rgba(182, 23, 23, 0.1);">
    <thead>
        <tr style="background: #bb0057; color: white; text-align: left;">
            <th style="padding: 12px; border: 1px solid #ff0000;">Фото</th>
            <th style="padding: 12px; border: 1px solid #1eff00;">ФИО</th>
            <th style="padding: 12px; border: 1px solid #9dff00;">Предмет</th>
            <th style="padding: 12px; border: 1px solid #0026ff;">Опыт (лет)</th>
            <th style="padding: 12px; border: 1px solid #f700ff;">Email</th>
            <th style="padding: 12px; border: 1px solid #0b8a00;">Действия</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $res = $conn->query("SELECT * FROM teachers ORDER BY id DESC");
        while($t = $res->fetch_assoc()): ?>
            <tr>
                <td style="padding: 10px; border: 1px solid #49e4ff; text-align: center;">
                    <img src="<?= $t['photo_url'] ?>" width="40" style="border-radius: 50%;">
                </td>
                <td style="padding: 10px; border: 1px solid #ff0000; font-weight: bold;"><?= htmlspecialchars($t['full_name']) ?></td>
                <td style="padding: 10px; border: 1px solid #2938ff;"><?= htmlspecialchars($t['subject']) ?></td>
                <td style="padding: 10px; border: 1px solid #770fff; text-align: center;"><?= $t['experience_years'] ?></td>
                <td style="padding: 10px; border: 1px solid #119200;"><?= $t['email'] ?></td>
                <td style="padding: 10px; border: 1px solid #31ffff; text-align: center;">
                    <a href="manage_teacher.php?action=edit&id=<?= $t['id'] ?>" style="color: #3498db; text-decoration: none;">✏️</a> | 
                    <a href="manage_teacher.php?action=delete&id=<?= $t['id'] ?>" style="color: #e74c3c; text-decoration: none;" onclick="return confirm('Удалить?')">🗑️</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </tbody>
</table>
<?php include 'footer.php'; ?>
