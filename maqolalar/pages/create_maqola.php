<?php include_once "../includes/header.php"; ?>
<?php include_once "../includes/navbar.php"; ?>

<section>
    <h2 class="title">Maqola qo'shish</h2>

    <?php
    // Maqola qo'shish logikasi
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["qoshish"])) {
        // Foydalanuvchi tizimga kira emas bo'lsa, sahifani kirish sahifasiga yo'naltirish
        if (!isset($_SESSION['foydalanuvchi_id'])) {
            header("Location: login.php");
            exit();
        }

        // Maqolani bazaga qo'shish
        $foydalanuvchi_id = $_SESSION['foydalanuvchi_id'];
        $sarlavha = $_POST["sarlavha"];
        $matn = $_POST["matn"];

        $sql = "INSERT INTO maqolalar (foydalanuvchi_id, sarlavha, matn) VALUES ('$foydalanuvchi_id', '$sarlavha', '$matn')";

        if ($conn->query($sql) === TRUE) {
            echo "Maqola qo'shildi!";
        } else {
            echo "Xatolik: " . $conn->error;
        }
    }
    ?>

    <!-- Maqola qo'shish formasi -->
    <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <label for="sarlavha">Sarlavha:</label>
        <input type="text" name="sarlavha" required>

        <label for="matn">Matn:</label>
        <textarea name="matn" rows="8" required></textarea>

        <input type="submit" name="qoshish" value="Maqolani Qo'shish">
    </form>
</section>

<?php include_once "../includes/footer.php"; ?>
