<?php
$redirect_url = '';
if (isset($_GET['unique_code'])) {
    $unique_code = $_GET['unique_code'];

    function get_redirect_url($unique_code)
    {
        $county = (ctype_alpha($unique_code[1])) ? substr($unique_code, 0, 2) : $unique_code[0];
        $url = "http://evaluare.edu.ro/rezultate/{$county}/index.html?queries[search]={$unique_code}";
        return $url;
    }

    $redirect_url = get_redirect_url($unique_code);
}
?>
<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/favicon.png" type="image/x-icon">
    <title>Rezultate 2024</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="js/script.js" defer></script>
    <?php include 'includes/sidebar.php'; ?>
</head>
<body>

<div class="main-content">
    <div class="container">
        <div class="useful-info">
            <h1 style="text-align: center;">Rezultate</h1>
            <br/>
            <div class="search-box">
                <form method="GET">
                    <label for="unique_code">Introduceți codul candidatului:</label>
                    <input type="text" id="unique_code" name="unique_code" required>
                    <button type="submit">Caută</button>
                </form>
            </div>

            <div class="results">
                <?php if (!empty($redirect_url)): ?>
                    <p>Dacă nu ai fost redirecționat automat, <a href="<?php echo $redirect_url; ?>" target="_blank">dă
                            click aici pentru rezultate.</a></p>
                    <script>
                        window.open('<?php echo $redirect_url; ?>', '_blank');
                    </script>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="useful-info">
            <h1 style="text-align: center;">Procedura privind depunerea contestațiilor</h1>
            <p style="text-align: center;">
                Contestațiile se depun la secretariatele unităților de învățământ la care candidații sunt înscriși,
                conform
                calendarului oficial (3 iulie: 16-19, 4 iulie: 8-12). Documentele necesare depunerii contestațiilor
                trebuie semnate
                și de părintele sau reprezentantul legal al minorului.

                <br/>
                <br/>

                <b>ATENȚIE!</b> În situația în care notele obținute la contestații sunt mai mici decât cele inițiale, se
                păstrează
                notele obținute în urma contestației. Nota obținută în urma contestației nu mai poate fi modficată.

                <br/>
                <br/>

                Gândește-te bine înainte de a depune contestație!
                <br/>
                <br/>
                <a href="https://evaluare.fiide10.ro/docs/2024/model-contestatie-EN-2024.pdf" target="_blank">Descarcă
                    model contestație</a>


            </p>

        </div>
    </div>

</div>

<?php include 'includes/footer.php'; ?>

</body>
</html>
