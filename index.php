<?php
// Kerakli bo'lsa yoki tizimga qanday qilib integratsiyani o'tkazish kerak bo'lsa
include_once "includes/db_connection.php";
?>
<!DOCTYPE html>
<html lang="uz">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Maqolalar</title>
</head>
<body>
<?php include_once "includes/db_connection.php"; ?>
<header>
    <h1>Maqolalar</h1>
    <nav>
        <?php
        session_start();
        if (isset($_SESSION['foydalanuvchi_id'])) {
            echo '<ul>
                    <li><a href="index.php">Asosiy</a></li>
                    <li><a href="pages/my_maqolalar.php">Mening maqolalar</a></li>
                    <li><a href="pages/create_maqola.php">Maqola qo\'shish</a></li>
                    <li><a href="pages/logout.php">Logout</a></li>
                  </ul>';
        } else {
            echo '<ul>
                    <li><a href="index.php">Asosiy</a></li>
                    <li><a href="pages/my_maqolalar.php">Mening maqolalar</a></li>
                    <li><a href="pages/create_maqola.php">Maqola qo\'shish</a></li>
                    <li><a href="pages/login.php">Kirish</a></li>
                  </ul>';
        }
        ?>
    </nav>
</header>

<section>
    <h2 class="title">Asosiy Sahifa</h2>

    <?php
    // Barcha maqolalarni olish
    $sql = "SELECT maqolalar.id, maqolalar.sarlavha, maqolalar.matn, foydalanuvchilar.ism 
            FROM maqolalar 
            INNER JOIN foydalanuvchilar ON maqolalar.foydalanuvchi_id = foydalanuvchilar.id 
            ORDER BY maqolalar.id DESC";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Maqolalarni ko'rsatish
        while ($row = $result->fetch_assoc()) {
            echo '<div class = "maqola">
                    <h3>' . $row["sarlavha"] . '</h3>
                    <p>' . $row["matn"] . '</p>
                    <p><strong>' . $row["ism"] . '</strong></p>
                  </div>';
        }
    } else {
        echo "Hozircha maqola yo'q.";
    }
    ?>
</section>

<?php include_once "includes/footer.php"; ?>
