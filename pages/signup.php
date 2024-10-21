<?php include_once "../includes/header.php"; ?>
<?php include_once "../includes/navbar.php"; ?>

<section class="login-signup">
    <h2>Ro'yxatdan o'tish</h2>
    <!-- Ro'yxatdan o'tish sahifasi ma'lumotlari -->  
    <?php
    $msg1 = "";
    $msg2 = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["signup"])) {
        $ism = $_POST["ism"];
        $email = $_POST["email"];
        $parol = password_hash($_POST["parol"], PASSWORD_DEFAULT);

        $sql = "INSERT INTO foydalanuvchilar (ism, email, parol) VALUES ('$ism', '$email', '$parol')";

        if ($conn->query($sql) === TRUE) {
            $msg1 = "Ro'yxatdan o'tildi. Endi <a href='login.php'>kirishingiz</a> mumkin.";
        } else {
            $msg2 = "Xatolik: " . $conn->error;
        }
    }
    ?>

    <p style = "color: green"><?php echo $msg1?></p>
    <p style = "color: red"><?php echo $msg2?></p>
    
    <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <label for="ism">Ismingiz:</label>
        <input type="text" name="ism" required>

        <label for="email">Email:</label>
        <input type="email" name="email" required>

        <label for="parol">Parol:</label>
        <input type="password" name="parol" required>

        <input type="submit" name="signup" value="Ro'yxatdan O'tish">
    </form>
    <p>Akkountingiz bormi? <a href="login.php">Kirish</a></p>
</section>

<?php include_once "../includes/footer.php"; ?>
