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