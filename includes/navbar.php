<?php include_once "db_connection.php"; ?>
<header>
    <h1>Maqolalar</h1>
    <nav>
        <?php
        session_start();
        if (isset($_SESSION['foydalanuvchi_id'])) {
            echo '<ul>
                    <li><a href="../index.php">Asosiy</a></li>
                    <li><a href="../pages/my_maqolalar.php">Mening maqolalar</a></li>
                    <li><a href="../pages/create_maqola.php">Maqola qo\'shish</a></li>
                    <li><a href="../pages/logout.php">Logout</a></li>
                  </ul>';
        } else {
            echo '<ul>
                    <li><a href="../index.php">Asosiy</a></li>
                    <li><a href="../pages/my_maqolalar.php">Mening maqolalar</a></li>
                    <li><a href="../pages/create_maqola.php">Maqola qo\'shish</a></li>
                    <li><a href="../pages/login.php">Kirish</a></li>
                  </ul>';
        }
        ?>
    </nav>
</header>
