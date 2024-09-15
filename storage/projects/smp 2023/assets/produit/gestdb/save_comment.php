<?php
// Specify the database name and path
$databaseFile = 'db.sqlite';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the form data
    $name = $_POST['name'];
    $comment = $_POST['comment'];

    try {
        // Create a new SQLite database connection
        $pdo = new PDO("sqlite:$databaseFile");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Prepare the INSERT statement
        $insertQuery = "INSERT INTO comment (name, txtcomment) VALUES (:name, :comment)";
        $statement = $pdo->prepare($insertQuery);

        // Bind the parameter values
        $statement->bindParam(':name', $name);
        $statement->bindParam(':comment', $comment);

        // Execute the statement
        $statement->execute();

        // Display success message
        echo "Comment saved successfully!";

        header("Location: ../live.php");

    } catch (PDOException $e) {
        // Display error message
        echo "Failed to save comment: " . $e->getMessage();
    }
}
?>
