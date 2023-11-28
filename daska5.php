<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulator Jednostek Fizycznych</title>
</head>
<body>
    <h2>Kalkulator Jednostek Fizycznych</h2>

    <form action="kalkulator.php" method="post">
        <label for="quantity">Podaj wartosc:</label>
        <input type="text" id="quantity" name="quantity" required>

        <label for="from_unit">Z jednostki:</label>
        <select id="from_unit" name="from_unit" required>
            <?php
            $categories = [
                'Ciśnienie', 'Czas', 'Długość', 'Energia', 'Masa',
                'Objętość', 'Powierzchnia', 'Prędkość', 'Siła', 'Temperatura'
            ];

            foreach ($categories as $category) {
                echo "<optgroup label=\"$category\">";

                $units = getUnitsForCategory($category);
                foreach ($units as $unit) {
                    echo "<option value=\"$unit\">$unit</option>";
                }

                echo "</optgroup>";
            }
            ?>
        </select>

        <label for="to_unit">Do jednostki:</label>
        <select id="to_unit" name="to_unit" required>
            <?php
            foreach ($categories as $category) {
                echo "<optgroup label=\"$category\">";

                $units = getUnitsForCategory($category);
                foreach ($units as $unit) {
                    echo "<option value=\"$unit\">$unit</option>";
                }

                echo "</optgroup>";
            }
            ?>
        </select>

        <button type="submit">Przelicz</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $quantity = $_POST["quantity"];
        $from_unit = $_POST["from_unit"];
        $to_unit = $_POST["to_unit"];

        // Sprawdzenie, czy wprowadzona wartość jest liczbą
        if (!is_numeric($quantity)) {
            echo "<p>Wprowadzona wartość nie jest liczbą.</p>";
            exit; // Przerwij działanie skryptu w przypadku błędu
        }

        $result = convertUnits($quantity, $from_unit, $to_unit);
        echo "<p>Wynik: $result $to_unit</p>";
    }

    function getUnitsForCategory($category) {
        // Definicje jednostek dla każdej kategorii
        $unitsByCategory = [
            'Ciśnienie' => ['Pascal', 'Bar'],
            'Czas' => ['Sekundy', 'Minuty'],
            'Długość' => ['Metry', 'Centymetry'],
            'Energia' => ['Joule', 'Kalorie'],
            'Masa' => ['Kilogramy', 'Gramy'],
            'Objętość' => ['Metry sześcienne', 'Litry'],
            'Powierzchnia' => ['Metry kwadratowe', 'Centymetry kwadratowe'],
            'Prędkość' => ['Metry na sekundę', 'Kilometry na godzinę'],
            'Siła' => ['Newton', 'Dyne'],
            'Temperatura' => ['Stopnie Celsiusza', 'Stopnie Fahrenheit'],
        ];

        return $unitsByCategory[$category] ?? [];
    }

    function convertUnits($quantity, $from_unit, $to_unit) {
        // Funkcja przeliczająca jednostki
        // Dodaj więcej konwersji według potrzeb
        $conversions = [
            'Pascal' => 1,
            'Bar' => 0.00001,
            'Sekundy' => 1,
            'Minuty' => 0.0166667,
            'Metry' => 1,
            'Centymetry' => 100,
            'Joule' => 1,
            'Kalorie' => 0.000239006,
            'Kilogramy' => 1,
            'Gramy' => 1000,
            'Metry sześcienne' => 1,
            'Litry' => 1000,
            'Metry kwadratowe' => 1,
            'Centymetry kwadratowe' => 10000,
            'Metry na sekundę' => 1,
            'Kilometry na godzinę' => 3.6,
            'Newton' => 1,
            'Dyne' => 100000,
            'Stopnie Celsiusza' => 1,
            'Stopnie Fahrenheit' => 33.8,
        ];

        if (isset($conversions[$from_unit]) && isset($conversions[$to_unit])) {
            $conversionFactor = $conversions[$from_unit] / $conversions[$to_unit];
            return $quantity * $conversionFactor;
        } else {
            return "Brak dostępnej konwersji.";
        }
    }
    ?>
</body>
</html>