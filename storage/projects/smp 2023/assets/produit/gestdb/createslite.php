<?php
// Specify the database name and path
$databaseFile = 'db.sqlite';

try {
    // Create a new SQLite database
    $pdo = new PDO("sqlite:$databaseFile");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Create the "comment" table
    $createTableQuery = "CREATE TABLE IF NOT EXISTS comment (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        name TEXT NOT NULL,
        txtcomment TEXT NOT NULL
    )";
    $pdo->exec($createTableQuery);

    // Display success message
    echo "SQLite database and 'comment' table created successfully!";
} catch (PDOException $e) {
    // Display error message
    echo "Failed to create SQLite database: " . $e->getMessage();
}
?>
