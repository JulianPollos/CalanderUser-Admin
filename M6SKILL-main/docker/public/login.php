<?php
session_start(); // Start the session

require_once('../source/config.php');
require_once('../source/database.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $conn = database_connect();
    $query = "SELECT * FROM testing WHERE username = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Check password
        if ($password === $row['password']) {
            // Store role and username in session
            $_SESSION['username'] = $row['username'];
            $_SESSION['role'] = $row['role'];

            // Redirect based on role
            if ($row['role'] === 'admin') {
                header("Location: indexadmin.php");
            } else {
                header("Location: indexuser.php");
            }
            exit();
        } else {
            echo "Invalid password. <a href='index.html'>Back</a>";
        }
    } else {
        echo "Invalid username. <a href='index.html'>Back</a>";
    }

    $stmt->close();
    $conn->close();
}
?>
