<?php include 'db.php'; include 'header.php'; ?>
<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
    <h2>👨‍🎓 Реестр Студентов</h2>
    <a href="manage_student.php?action=add" style="background: #27ae60; color: white; padding: 10px 15px; border-radius: 5px; text-decoration: none; font-weight: bold;">+ Добавить студента</a>
</div>

<table style="width: 100%; border-collapse: collapse; background: white; box-shadow: 0 1px 3px rgba(255, 2, 2, 0.1);">
    <thead>
        <tr style="background: #257416; color: white; text-align: left;">
            <th style="padding: 12px; border: 1px solid #ddd; text-align: center;">Фото</th>
            <th style="padding: 12px; border: 1px solid #ff2424;">ФИО</th>
            <th style="padding: 12px; border: 1px solid #0084ff;">Группа</th>
            <th style="padding: 12px; border: 1px solid #00ff22;">Ср. балл</th>
            <th style="padding: 12px; border: 1px solid #db25ff;">Год поступления</th>
            <th style="padding: 12px; border: 1px solid #ffd30f; text-align: center;">Действия</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $res = $conn->query("SELECT * FROM students ORDER BY id DESC");
        while($s = $res->fetch_assoc()): ?>
            <tr>
                <td style="padding: 10px; border: 1px solid #ddd; text-align: center;">
                    <img src="<?= $s['photo_url'] ?>" width="40" style="border-radius: 50%;">
                </td>
                <td style="padding: 10px; border: 1px solid #11ff31; font-weight: bold;"><?= htmlspecialchars($s['full_name']) ?></td>
                <td style="padding: 10px; border: 1px solid #ff0000;"><?= htmlspecialchars($s['group_name']) ?></td>
                <td style="padding: 10px; border: 1px solid #1900ff; text-align: center; color: green; font-weight: bold;"><?= $s['average_score'] ?></td>
                <td style="padding: 10px; border: 1px solid #eeff01; text-align: center;"><?= $s['enrollment_year'] ?></td>
                <td style="padding: 10px; border: 1px solid #ff17cd; text-align: center;">
                    <a href="manage_student.php?action=edit&id=<?= $s['id'] ?>" title="Редактировать" style="text-decoration: none;">✏️</a> | 
                    <a href="manage_student.php?action=delete&id=<?= $s['id'] ?>" title="Удалить" style="text-decoration: none;" onclick="return confirm('Точно удалить студента?')">🗑️</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </tbody>
</table>
<?php include 'footer.php'; ?>
