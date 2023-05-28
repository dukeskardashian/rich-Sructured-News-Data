<?php
// Datenbankverbindung herstellen und JSON-Code generieren
$servername = "localhost";
$username = "";
$password = "";
$dbname = "";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Verbindung zur Datenbank fehlgeschlagen: " . $conn->connect_error);
}

$sql = "SELECT title, pcontent FROM qa_posts";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $jsonData = array();
    while ($row = $result->fetch_assoc()) {
        $title = $row["title"];
        $pcontent = $row["pcontent"];

        $data = array(
            "headline" => $title,
            "content" => $pcontent
            // Weitere relevante Felder für die Rich Results hier ergänzen
        );

        $jsonData[] = $data;
    }

    // JSON-Code in ein JavaScript-Objekt umwandeln
    $jsonString = json_encode($jsonData);
} else {
    $jsonString = "";
}

// Verbindung zur Datenbank schließen
$conn->close();
?>

<!DOCTYPE html>
<html>

<body>
    <!-- Google structured data -->

    <script type="application/json" id="json-data">
        <?php echo $jsonString; ?>
    </script>

    <!-- structured data end -->
</body>
</html>
