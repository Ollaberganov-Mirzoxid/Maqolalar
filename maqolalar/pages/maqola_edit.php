<?php
include_once "../includes/header.php";
include_once "../includes/navbar.php";
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
        $row = $result->fetch_assoc();
        $sarlavha = $row['sarlavha'];
        $matn = $row['matn'];
    } else {
        echo "Sizga bunday maqola tahrirlash ruhsati yo'q.";
        exit();
    }
} else {
    echo "Ma'lumotlarni olishda xatolik.";
    exit();
}

// Forma ma'lumotlarni saqlash
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["update"])) {
    $yangi_sarlavha = $_POST["sarlavha"];
    $yangi_matn = $_POST["matn"];

    // Maqolani yangilash
    $update_sql = "UPDATE maqolalar SET sarlavha = '$yangi_sarlavha', matn = '$yangi_matn' WHERE id = '$maqola_id'";
    if ($conn->query($update_sql) === TRUE) {
        echo "Maqola muvaffaqiyatli yangilandi.";
        header("Location: my_maqolalar.php");
    } else {
        echo "Xatolik: " . $conn->error;
    }
}
?>

<section>
    <h2 class="title">Maqola Tahrirlash</h2>

    <form method="post" action="<?php echo $_SERVER["PHP_SELF"] . "?id=" . $maqola_id; ?>">
        <label for="sarlavha">Sarlavha:</label>
        <input type="text" name="sarlavha" value="<?php echo $sarlavha; ?>" required>

        <label for="matn">Matn:</label>
        <textarea name="matn" class="edit-matn" required><?php echo $matn; ?></textarea>

        <input type="submit" name="update" value="Maqolani Yangilash">
    </form>
</section>

<?php include_once "../includes/footer.php"; ?>
