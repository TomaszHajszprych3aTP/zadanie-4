<?php
$usernameToSave = "user123";
$passwordToSave = "secret_password";

$hashedPassword = password_hash($passwordToSave, PASSWORD_DEFAULT);

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO users (username, password) VALUES ('$usernameToSave', '$hashedPassword')";

if ($conn->query($sql) === TRUE) {
    echo "Dane zostały zapisane poprawnie.";
} else {
    echo "Błąd podczas zapisywania danych: " . $conn->error;
}

$conn->close();

?>
