<?php
include_once "../includes/header.php";
include_once "../includes/navbar.php";
include_once "../includes/db_connection.php";
session_start();

if (!isset($_SESSION['foydalanuvchi_id'])) {
    header("Location: login.php");
    exit();
}

?>

<section>
    <h2 class="title">Mening Maqolalarim</h2>

    <?php
    $foydalanuvchi_id = $_SESSION['foydalanuvchi_id'];
    $sql = "SELECT * FROM maqolalar WHERE foydalanuvchi_id = '$foydalanuvchi_id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<article class='sarlavha-matn'>";
            echo "<div >";
            echo "<h3>" . $row["sarlavha"] . "</h3>";
            echo "<p>" . $row["matn"] . "</p>";
            echo "</div>";

            // Tahrirlash va O'chirish tugmalarini qo'shish
            echo "<div class='edit-delete-buttons'>";
            echo "<a href='maqola_edit.php?id=" . $row['id'] . "' class='edit-button'>Tahrirlash</a>";
            echo " | ";
            echo "<a href='maqola_delete.php?id=" . $row['id'] . "' class='delete-button'>O'chirish</a>";
            echo "</div>";

            echo "</article>";
        }
    } else {
        echo "Siz hali maqola qo'shmadingiz.";
    }
    ?>
</section>

<?php include_once "../includes/footer.php"; ?>
