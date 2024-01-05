<?php
$servername = "localhost"; // Server nomi
$username = "root"; // Foydalanuvchi nomi
$password = ""; // Parol
$dbname = "yangiliklar"; // Bazaning nomi

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Ulanishda xatolik: " . $conn->connect_error);
}
?>
