<?php
include_once "../includes/header.php";
include_once "../includes/navbar.php";
include_once "db_connection.php";

session_start(); // Sessionni boshlash

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["login"])) {
    $email = $_POST["email"];
    $parol = $_POST["parol"];

    $sql = "SELECT id, ism, parol FROM foydalanuvchilar WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($parol, $row["parol"])) {
            $_SESSION['foydalanuvchi_id'] = $row['id']; // Sessionga foydalanuvchi id ni saqlash
             $msg1= "Xush kelibsiz, " . $row["ism"] . "!";
            header("Location: ../index.php");
        } else {
            $msg2 = "Noto'g'ri parol.";
        }
    } else {
        $msg2 = "Foydalanuvchi topilmadi.";
    }
}
?>

<section class="login-signup">
    <h2>Kirish</h2>
    <p style = "color: green"><?php echo $msg1?></p>
    <p style = "color: red"><?php echo $msg2?></p>
    <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <label for="email">Email:</label>
        <input type="email" name="email" required>

        <label for="parol">Parol:</label>
        <input type="password" name="parol" required>

        <input type="submit" name="login" value="Kirish">
    </form>
    <p>Hozircha akkauntingiz yo'qmi? <a href="signup.php">Ro'yxatdan o'ting</a>.</p>
</section>

<?php include_once "../includes/footer.php"; ?>
