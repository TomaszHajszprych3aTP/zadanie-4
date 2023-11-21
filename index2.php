<?php

// Dane do połączenia z bazą danych
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "database";

// Dane do logowania
$enteredUsername = "user123";
$enteredPassword = "password123";

// Połączenie z bazą danych
$conn = new mysqli($servername, $username, $password, $dbname);

// Sprawdzenie połączenia
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Zapytanie do pobrania zaszyfrowanego hasła z bazy danych
$sql = "SELECT password FROM users WHERE username='$enteredUsername'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Użytkownik istnieje, sprawdź hasło
    $row = $result->fetch_assoc();
    $hashedPasswordFromDatabase = $row['password'];

    // Sprawdzenie hasła za pomocą password_verify
    if (password_verify($enteredPassword, $hashedPasswordFromDatabase)) {
        echo "Logowanie udane!";
    } else {
        echo "Błędne hasło.";
    }
} else {
    echo "Użytkownik nie istnieje.";
}

// Zamknięcie połączenia z bazą danych
$conn->close();

?>
