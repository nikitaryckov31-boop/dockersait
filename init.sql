-- Устанавливаем кодировку для корректного отображения русского языка
SET NAMES 'utf8mb4';

-- Удаляем старые таблицы, если они были
DROP TABLE IF EXISTS students;
DROP TABLE IF EXISTS teachers;

-- 1. Таблица Преподавателей (8 полей)
CREATE TABLE teachers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    full_name VARCHAR(100) NOT NULL,
    subject VARCHAR(100) NOT NULL,
    email VARCHAR(100),
    phone VARCHAR(20) DEFAULT '+7 (000) 000-00-00',
    experience_years INT DEFAULT 0,
    bio TEXT,
    photo_url VARCHAR(255),
    is_active BOOLEAN DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 2. Таблица Студентов (8 полей)
CREATE TABLE students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    full_name VARCHAR(100) NOT NULL,
    group_name VARCHAR(20) NOT NULL,
    email VARCHAR(100),
    birth_date DATE,
    average_score DECIMAL(3,2) DEFAULT 0.00,
    hobbies TEXT,
    photo_url VARCHAR(255),
    enrollment_year INT DEFAULT 2023
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Наполняем Преподавателей (О нас)
INSERT INTO teachers (full_name, subject, email, phone, experience_years, bio, photo_url, is_active) VALUES 
('Иван Степанович Докеров', 'Архитектура ПО', 'stepanych@university.ru', '+7 (900) 111-22-33', 15, 'Эксперт по контейнеризации и высоконагруженным системам.', 'https://dicebear.com', 1),
('Мария Петровна Базова', 'Базы Данных', 'maria_db@university.ru', '+7 (900) 444-55-66', 8, 'Знает всё про SQL-инъекции и нормальные формы.', 'https://dicebear.com', 1);

-- Наполняем Студентов (Главная)
INSERT INTO students (full_name, group_name, email, birth_date, average_score, hobbies, photo_url, enrollment_year) VALUES 
('Никита Программистов', 'ПОВТ-21', 'nikita_student@dev.ru', '2004-05-15', 4.95, 'Docker, PHP, тренажерный зал', 'https://dicebear.com', 2022),
('Алексей Контейнеров', 'ИВТ-22', 'alex_whale@dev.ru', '2005-09-20', 4.50, 'Настройка серверов, киберспорт', 'https://dicebear.com', 2023),
('Анна Скриптова', 'ПОВТ-21', 'anna_code@dev.ru', '2004-12-01', 5.00, 'Frontend, дизайн, фотография', 'https://dicebear.com', 2022);
