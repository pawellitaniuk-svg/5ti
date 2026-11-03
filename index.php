
<?php
$wynik = "";
$blad = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $droga = isset($_POST["droga"]) ? floatval($_POST["droga"]) : 0;
    $czas = isset($_POST["czas"]) ? floatval($_POST["czas"]) : 0;

    if ($droga < 0 || $czas <= 0) {
        $blad = "Podaj poprawną drogę i czas!";
    } else {
        $predkosc = $droga / $czas;
        $wynik = round($predkosc, 2);
    }
}
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Obliczanie prędkości</title>


<div class="container">

    <h2>Obliczanie prędkości</h2>

    <p>Wpisz drogę oraz czas, aby obliczyć prędkość.</p>

    <form method="POST">

        <label>Droga (km):</label><br>
        <input type="number" step="any" min="0"
               name="droga" placeholder="Np. 100" required>

        <br>

        <label>Czas (h):</label><br>
        <input type="number" step="any" min="0.000001"
               name="czas" placeholder="Np. 2" required>

        <br>

        <button type="submit">Oblicz prędkość</button>

    </form>

    <?php if ($wynik !== ""): ?>

        <div class="wynik">
            Wynik: <?php echo htmlspecialchars((string)$wynik); ?> km/h
        </div>

    <?php endif; ?>

    <?php if ($blad !== ""): ?>

        <div class="blad">
            <?php echo htmlspecialchars($blad); ?>
        </div>

    <?php endif; ?>


</div>

</body>
</html>
