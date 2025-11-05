<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Printafspraak aanmaken</title>
    <style>
        /* Styling code from your example */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
        }
        header {
            background: #ff00e6;
            color: white;
            padding: 10px 0;
            text-align: center;
            border-radius: 0.5rem;
        }
        .container {
            width: 80%;
            margin: auto;
            overflow: hidden;
        }
        .form-group {
            margin: 2rem;
            border-radius: 2rem;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
        }
        .form-group input, .form-group select {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .button {
            background: #ff00e6;
            color: white;
            border: none;
            padding: 10px 15px;
            cursor: pointer;
            border-radius: 5px;
        }
        .button:hover {
            background: #b0029f;
        }
    </style>
</head>
<body>
    <header>
        <h1>Printafspraken Agenda</h1>
    </header>
    <div class="container">
        <form method="POST" action="save_appointment.php">
            <div class="form-group">
                <label for="date">Datum:</label>
                <input type="date" id="date" name="date" required>
            </div>

            <div class="form-group">
                <label for="time">Tijdslot:</label>
                <select id="time" name="time" required>
                    <?php
                    // Generate time slots dynamically
                    $startTime = strtotime("08:30");
                    $endTime = strtotime("17:45");
                    $interval = 15 * 60; // 15 minutes in seconds

                    while ($startTime <= $endTime) {
                        $timeSlot = date("H:i", $startTime);
                        echo "<option value='$timeSlot'>$timeSlot</option>";
                        $startTime += $interval;
                    }
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label for="format">Papierformaat:</label>
                <select id="format" name="format" required>
                    <?php
                    // Paper format options
                    $formats = [
                        "SRA4",
                        "A4",
                        "A3",
                        "SRA3",
                        "Groot formaat printer (tot 160cm breed en 30m lang)"
                    ];
                    foreach ($formats as $format) {
                        echo "<option value='$format'>$format</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label for="printType">Printtype:</label>
                <select id="printType" name="printType" required>
                    <option value="enkelzijdig">Enkelzijdig</option>
                    <option value="dubbelzijdig">Dubbelzijdig</option>
                </select>
            </div>

            <div class="form-group">
                <label for="opmerkingen">Opmerkingen:</label>
                <input type="text" id="opmerkingen" name="opmerkingen" placeholder="Eventuele opmerkingen...">
            </div>

            <div class="form-group">
                <label for="quantity">Hoeveelheid (tussen 1 en 1000):</label>
                <input type="number" id="quantity" name="quantity" min="1" max="1000" required>
            </div>

            <button class="button" type="submit">Afspraak Maken</button>
        </form>
    </div>
</body>
</html>
