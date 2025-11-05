<?php

require_once('../source/config.php');
require_once('../source/database.php');


if (isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password'])) {

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];


    $conn = database_connect();

    $checkQuery = "SELECT * FROM testing WHERE username = ? OR email = ?";
    $stmt = $conn->prepare($checkQuery);
    $stmt->bind_param("ss", $username, $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {

        $row = $result->fetch_assoc();
        if ($row['username'] === $username) {
            echo "Username already in use. <a href='index.html'>Back</a>";
        } elseif ($row['email'] === $email) {
            echo "Email already in use. <a href='index.html'>Back</a>";
        }
    } else {
        // Insert into the database
        $insertQuery = "INSERT INTO testing (username, password, email) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($insertQuery);
        $stmt->bind_param("sss", $username, $password, $email);

        if ($stmt->execute()) {
            echo "Account created successfully. <a href='index.html'>Back</a>";
        } else {
            echo "Account creation failed: " . $conn->error;
        }
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>
