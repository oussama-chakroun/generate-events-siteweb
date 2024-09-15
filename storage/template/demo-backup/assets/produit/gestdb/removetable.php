<?php
// Specify the database name and path
$databaseFile = 'db.sqlite';

try {
    // Create a new SQLite database
    $pdo = new PDO("sqlite:$databaseFile");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Truncate the "comment" table
    $truncateTableQuery = "DELETE FROM comment";
    $pdo->exec($truncateTableQuery);

    // Display success message
    echo "The 'comment' table has been emptied successfully!";
} catch (PDOException $e) {
    // Display error message
    echo "Failed to empty the 'comment' table: " . $e->getMessage();
}
?>
