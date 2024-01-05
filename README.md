# Maqolalar
Assalomu Alaykum Bu dasturni ishga tushirish uchun avvalo Kompyuteringizda "xampp" dasturi bo'lishi kerak agar bo'masa shu silka orqali yuklab olishingiz mumkin.

    https://sourceforge.net/projects/xampp/files/latest/download

xampp dasturini yuklab olgandan so'ng uni kompyuteringizning 'Windows o'rnatilgan' joyi ko'p xollarda "C" disk bo'ladi o'sha yerga o'rnatishingizni tavsiya qilaman. O'rnatib bo'lgandan so'ng kompyuteringizda "XAMPP Control Panel" dasturi chiqadi chiqmasa "ПУСК" orqali kiring keyin 'Apache' va 'MySQL' ga "start" bering va sizning kompyuteringizda "XAMPP" ishga tushganini tekshirish uchun kompyuteringizdagi "chrome" yoki shunga o'xshash dasturga kiring va shunday deb yozing.

    http://localhost/phpmyadmin/
    
agar ishlasa dastur ishga tushgan bo'ladi va shu yerda "Создать БД" orqali "Database" ma'lumotlar bazasini yarating nomi:

    -- CREATE DATABASE
    CREATE DATABASE IF NOT EXISTS `yangiliklar` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;

    -- SELECT DATABASE
    USE `yangiliklar`;
    
    -- CREATE TABLE foydalanuvchilar
    CREATE TABLE IF NOT EXISTS `foydalanuvchilar` (
      `id` int(11) NOT NULL AUTO_INCREMENT,
      `ism` varchar(50) NOT NULL,
      `email` varchar(100) NOT NULL,
      `parol` varchar(255) NOT NULL,
      PRIMARY KEY (`id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
    
    -- CREATE TABLE maqolalar
    CREATE TABLE IF NOT EXISTS `maqolalar` (
      `id` int(11) NOT NULL AUTO_INCREMENT,
      `sarlavha` varchar(255) NOT NULL,
      `matn` text NOT NULL,
      `foydalanuvchi_id` int(11) DEFAULT NULL,
      PRIMARY KEY (`id`),
      KEY `foydalanuvchi_id` (`foydalanuvchi_id`),
      CONSTRAINT `maqolalar_ibfk_1` FOREIGN KEY (`foydalanuvchi_id`) REFERENCES `foydalanuvchilar` (`id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


shu ikkala tableni ham yaratgandan so'ng yuklab olingan ushbu "WDK_FANIDAN_MUSTAQIL_ISH" dasturini boya o'rnatgan "xampp" dasturining "htdocs" papkasiga tashlang. O'sha papkaga kirish uchun "xampp" ni qayerga o'rnatgan bo'lsangiz o'sha yerga boring va xampp dagan papkaga kiring undan keyin ko'p hollarda 6-da turadi "htdocs".
