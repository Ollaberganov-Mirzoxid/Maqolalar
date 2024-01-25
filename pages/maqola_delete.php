<?php
include_once "../includes/db_connection.php";
session_start();

if (!isset($_SESSION['foydalanuvchi_id'])) {
    header("Location: login.php");
    exit();
}

if (isset($_GET['id'])) {
    $maqola_id = $_GET['id'];
    $foydalanuvchi_id = $_SESSION['foydalanuvchi_id'];

    // Maqolani olish
    $sql = "SELECT * FROM maqolalar WHERE id = '$maqola_id' AND foydalanuvchi_id = '$foydalanuvchi_id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Maqola mavjud, uni o'chirish
        $delete_sql = "DELETE FROM maqolalar WHERE id = '$maqola_id'";
        if ($conn->query($delete_sql) === TRUE) {
            echo "Maqola muvaffaqiyatli o'chirildi.";
            // Bu joyga maqolaning to'g'ri o'zgartirish sahifasining manzili bo'lishi mumkin
            // Masalan, index.php ga yo'naltirish mumkin
            header("Location: my_maqolalar.php");
        } else {
            echo "Xatolik: " . $conn->error;
        }
    } else {
        echo "Sizga bunday maqola o'chirish ruhsati yo'q.";
    }
} else {
    echo "Ma'lumotlarni olishda xatolik.";
}
?>
