<?php
require "../connection/db.php";

if (isset($_GET['id'])) {
    $student_id = $_GET['id'];
    
    if (!isset($_GET['confirm'])) {
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Confirm Delete</title>
            <link rel="stylesheet" href="../require/style.css">
        </head>
        <body>
            <div class="confirmation-container">
                <h2>Confirm Deletion</h2>
                <p>Are you sure you want to delete this student?</p>
                <a href="?id=<?php echo $student_id; ?>&confirm=yes" class="btn btn-danger">Delete</a>
                <a href="view.php" class="btn btn-secondary">Cancel</a>
            </div>
        </body>
        </html>
        <?php
        exit();
    }
    
    $stmt = $pdo->prepare("DELETE FROM students WHERE id = ?");
    $stmt->execute([$student_id]);
    
    header("Location: view.php");
    exit();
} else {
    die("No student ID specified");
}
?>