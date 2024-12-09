<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "portfolio";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT name, email, message, submitted_at FROM contacts ORDER BY submitted_at DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<div>";
        echo "<h3>" . htmlspecialchars($row["name"]) . " (" . htmlspecialchars($row["email"]) . ")</h3>";
        echo "<p>" . htmlspecialchars($row["message"]) . "</p>";
        echo "<small>Submitted on: " . htmlspecialchars($row["submitted_at"]) . "</small>";
        echo "</div><hr>";
    }
} else {
    echo "No messages found.";
}

$conn->close();
?>
