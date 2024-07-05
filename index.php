<?php
include 'includes/config.php';
$conn = get_db_connection($config);

$date_today = date('j M.');
$time_now = date('H.i');

$sql = "SELECT title, description, date, time FROM news_EN ORDER BY id DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Evaluare națională de 10!</title>
    <link rel="icon" href="images/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/script.js" defer></script>

    <?php include 'includes/sidebar.php'; ?>
</head>
<body>

<div class="main-content">
    <div class="container">
        <div class="columns">
            <div class="news">
                <h2>Noutăți 2024</h2>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        // Construim date-time-ul știrii
                        $news_date_time_str = $row["date"] . ' ' . $row["time"];
                        $news_date_time = DateTime::createFromFormat('j M. H.i', $news_date_time_str);

                        // Obținem date-time-ul curent
                        $current_date_time = new DateTime();

                        // Comparația datei și orei știrii cu data și ora curentă
                        if ($news_date_time <= $current_date_time) {
                            echo '<div class="news-item">';
                            echo '<div class="news-content">';
                            echo '<div class="news-title">' . $row["title"] . '</div>';
                            echo '<div class="news-description">' . $row["description"] . '</div>';
                            echo '</div>';
                            echo '<div class="news-footer">';
                            echo '<div class="news-date">' . htmlspecialchars($row["date"]) . ' ' . htmlspecialchars($row["time"]) . '</div>';
                            echo '<div class="logo-link">';
                            echo '<a href="https://onedu.ro" target="_blank"><img src="https://www.onedu.ro/wp-content/uploads/2023/08/logoCOR.webp" alt="logo_onedu"></a>';
                            echo '</div>';
                            echo '</div>';
                            echo '</div>';
                        }
                    }
                } else {
                    echo '0 results';
                }
                ?>
            </div>
            <div class="side-column">
                <div class="calendar">
                    <h2>Calendar 2024</h2>
<!--                    <div class="calendar-event" data-date="today">03.07, până la ora 14:00 - Rezultate înaintea-->
                        contestațiilor
<!--                    </div>-->
<!--                    <div class="calendar-event">03.07 16:00-19:00 - Depunere contestațiilor</div>-->
<!--                    <div class="calendar-event">04.07 08:00-12:00 - Depunere contestațiilor</div>-->
                    <div class="calendar-event">09.00 12:00 - Afișarea rezultatelor finale</div>
                    <div class="calendar-event">11-12 15-22.07 - Completarea opțiunilor în fișele de înscriere și verificarea corectitudinii datelor</div>
                    <div class="calendar-event">24.07 - Comunicarea rezultatelor repartizării la liceu</div>
                    <div class="calendar-event">25-30.07 - Depunerea dosarului de înscriere la liceul la care elevul a fost repartizat</div>
                </div>
                <div class="statistics">
                    <h2>Statistici</h2>
                    <div class="statistic-item">
                        <p>Candidați înscriși</p>
                        160.467
                    </div>
                    <div class="statistic-item">
                        <p>Candidați prezenți</p>
                        153.903
                    </div>
                    <div class="statistic-item">
                        <p>Candidați cu note peste 5</p>
                        113.708
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
<footer>
    <?php
    $conn->close();
    include 'includes/footer.php';
    ?>
</footer>
</html>

