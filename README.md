# Maqolalar
Assalomu Alaykum Bu dasturni ishga tushirish uchun avvalo Kompyuteringizda "xampp" dasturi bo'lishi kerak agar bo'masa shu silka orqali yuklab olishingiz mumkin.

    https://sourceforge.net/projects/xampp/files/latest/download

xampp dasturini yuklab olgandan so'ng uni kompyuteringizning 'Windows o'rnatilgan' joyi ko'p xollarda "C" disk bo'ladi o'sha yerga o'rnatishingizni tavsiya qilaman. O'rnatib bo'lgandan so'ng kompyuteringizda "XAMPP Control Panel" dasturi chiqadi chiqmasa "ПУСК" orqali kiring keyin 'Apache' va 'MySQL' ga "start" bering va sizning kompyuteringizda "XAMPP" ishga tushganini tekshirish uchun kompyuteringizdagi "chrome" yoki shunga o'xshash dasturga kiring va shunday deb yozing.

    http://localhost/phpmyadmin/

agar ishlasa dastur ishga tushgan bo'ladi va shu yerda "Создать БД" orqali "Database" ma'lumotlar bazasini yarating nomi:

    "rav"

database yaratgandan so'ng ushbu kodlar orqali table yarating:

    CREATE TABLE `data` (
    `id` int(255) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    `name` varchar(255) NOT NULL,
    `email` varchar(255) NOT NULL,
    `t_number` bigint(255) NOT NULL,
    `password` varchar(255) NOT NULL
    )

bu table yaratilgandan so'ng ushbu tablaeni ham yarating:

    CREATE TABLE `create_jobs` (
    `id` int(255) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    `name` varchar(255) NOT NULL,
    `jobs_name` varchar(255) NOT NULL,
    `jobs` varchar(255) NOT NULL,
    `money` varchar(255) NOT NULL,
    `description` varchar(10000) NOT NULL
    ) 

shu ikkala tableni ham yaratgandan so'ng yuklab olingan ushbu "WDK_FANIDAN_MUSTAQIL_ISH" dasturini boya o'rnatgan "xampp" dasturining "htdocs" papkasiga tashlang. O'sha papkaga kirish uchun "xampp" ni qayerga o'rnatgan bo'lsangiz o'sha yerga boring va xampp dagan papkaga kiring undan keyin ko'p hollarda 6-da turadi "htdocs".
