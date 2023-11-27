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
        <label for="quantity">Wartość:</label>
        <input type="text" id="quantity" name="quantity" required>

        <label for="from_unit">Z jednostki:</label>
        <select id="from_unit" name="from_unit" required>
            <option value="meter">Metry</option>
            <option value="kilogram">Kilogramy</option>
        </select>

        <label for="to_unit">Do jednostki:</label>
        <select id="to_unit" name="to_unit" required>
            <option value="centimeter">Centymetry</option>
            <option value="gram">Gramy</option>
        </select>

        <label for="category">Kategoria:</label>
        <select id="category" name="category" required>
            <option value="length">Długość</option>
            <option value="mass">Masa</option>
        </select>

        <button type="submit">Przelicz</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $quantity = $_POST["quantity"];
        $from_unit = $_POST["from_unit"];
        $to_unit = $_POST["to_unit"];
        $category = $_POST["category"];

        
        if (!is_numeric($quantity)) {
            echo "<p>Wprowadzona wartość nie jest liczbą.</p>";
            exit; 
        }

        function convertUnits($quantity, $from_unit, $to_unit, $category) {
            if ($category == "length") {
                if ($from_unit == "meter" && $to_unit == "centimeter") {
                    return $quantity * 100;
                } elseif ($from_unit == "centimeter" && $to_unit == "meter") {
                    return $quantity / 100;
                }
            } elseif ($category == "mass") {
                if ($from_unit == "kilogram" && $to_unit == "gram") {
                    return $quantity * 1000;
                } elseif ($from_unit == "gram" && $to_unit == "kilogram") {
                    return $quantity / 1000;
                }
            }

            return "Brak dostępnej konwersji.";
        }

        
        $result = convertUnits($quantity, $from_unit, $to_unit, $category);
        echo "<p>Wynik: $result $to_unit</p>";
    }
    ?>
</body>
</html>
</html>