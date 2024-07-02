<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/favicon.png" type="image/x-icon">
    <title>Subiecte EN</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="js/script.js" defer></script>
    <?php include 'includes/sidebar.php'; ?>
</head>
<body>


<div class="main-content">
    <div class="container">
        <form action="" method="GET" class="inline-form">
            <h1>Subiecte de evaluare națională</h1>
            <div class="search-form">
                <label for="materie">Materie:</label>
                <select name="materie" id="materie">
                    <option value="romana">Română</option>
                    <option value="matematica">Matematică</option>
                </select>

                <label for="an">An:</label>
                <select name="an" id="an">
                    <option value="2023">2023</option>
                    <option value="2022">2022</option>
                    <option value="2021">2021</option>
                    <option value="2020">2020</option>
                    <option value="2019">2019</option>
                </select>
                <button type="submit">Caută</button>
            </div>
        </form>

        <?php

        include 'includes/config.php';
        $conn = get_db_connection($config);

        if (isset($_GET['materie']) && isset($_GET['an'])) {
            $materie = $_GET['materie'];
            $an = $_GET['an'];

            $sql = "SELECT nume, cale_pdf_subiect, cale_pdf_barem FROM subiecte_EN WHERE materie = '$materie' AND an = $an";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                echo '<div class="subiecte-list">';
                echo "<h2>Subiecte pentru $materie în anul $an:</h2>";
                echo "<ul>";
                while ($row = $result->fetch_assoc()) {
                    $nume_subiect = $row['nume'];
                    $cale_pdf_subiect = $row['cale_pdf_subiect'];
                    $cale_pdf_barem = $row['cale_pdf_barem'];
                    echo "<li>$nume_subiect &emsp; <a href=\"$cale_pdf_subiect\" target=\"_blank\">Subiect</a> &emsp; <a href=\"$cale_pdf_barem\" target=\"_blank\">Barem</a></li>";
                }
                echo "</ul>";
                echo '</div>';
            } else {
                echo '<p>Nu au fost găsite subiecte pentru criteriile selectate.</p>';
            }
        }

        $conn->close();
        ?>

    </div>
</div>

<?php include 'includes/footer.php'; ?>

</body>
</html>
