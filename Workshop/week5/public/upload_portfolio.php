<?php
$message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['fileupload'])) {
    try {
        $file = $_FILES['fileupload'];

        if ($file['error'] !== 0) {
            throw new Exception("File upload error.");
        }

        // Allowed file types
        $allowedTypes = ['application/pdf', 'image/jpeg', 'image/png'];

        if (!in_array($file['type'], $allowedTypes)) {
            throw new Exception("Invalid file type.");
        }

        // Create uploads folder if not exists
        $uploadDir = "../uploads/";
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        // Secure file name
        $fileName = time() . "_" . basename($file['name']);
        $destination = $uploadDir . $fileName;

        // Move uploaded file
        if (!move_uploaded_file($file['tmp_name'], $destination)) {
            throw new Exception("Failed to save file.");
        }

        $message = "Portfolio uploaded successfully!";
    } catch (Exception $e) {
        $message = $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Upload Portfolio</title>
</head>
<body>

<?php include "../includes/header.php"; ?>

<h2>Upload Portfolio</h2>

<p><?= htmlspecialchars($message) ?></p>

<form method="POST" enctype="multipart/form-data">
    <input type="file" name="fileupload" accept=".pdf,.jpg,.png" required>
    <button type="submit">Upload Portfolio</button>
</form>

<?php include "../includes/footer.php"; ?>

</body>
</html>
