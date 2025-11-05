    <style>
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
        .appointment-list {
            margin-top: 20px;
            background: white;
            padding: 15px;
            border-radius: 1rem;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }
        .appointment-list h2 {
            margin-bottom: 10px;
        }
        .appointment-item {
            border-bottom: 1px solid #ddd;
            padding: 10px 0;
        }
        .appointment-item:last-child {
            border-bottom: none;
        }
        .appointment-details {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .appointment-info {
            flex: 1;
        }
        .appointment-actions {
            display: flex;
            gap: 10px;
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
        .button.decline {
            background: #e60000;
        }
        .button.decline:hover {
            background: #a40000;
        }
    </style>
<?php
session_start();


if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {

    header("Location: login.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
</head>
<body>
    <div class="container">
        <div class="appointment-list">
            <h2>Overzicht van Printafspraken</h2>
            <!-- Example of an appointment -->
            <div class="appointment-item">
                <div class="appointment-details">
                    <div class="appointment-info">
                        <p><strong>Datum:</strong> 2025-01-25</p>
                        <p><strong>Tijdslot:</strong> 09:00</p>
                        <p><strong>Papierformaat:</strong> A4</p>
                        <p><strong>Printtype:</strong> Enkelzijdig</p>
                        <p><strong>Opmerkingen:</strong> Geen</p>
                        <p><strong>Hoeveelheid:</strong> 100</p>
                    </div>
                    <div class="appointment-actions">
                        <button class="button accept">Accepteren</button>
                        <button class="button decline">Afwijzen</button>
                    </div>
                </div>
            </div>
            <!-- Repeat appointment items as necessary -->
        </div>
    </div>
</body>
</html>


