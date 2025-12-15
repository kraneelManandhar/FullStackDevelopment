<?php
// Initialize variables
$errors = [];
$success = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    try {
        // 1. Get and trim input
        $name   = trim($_POST["name"] ?? "");
        $email  = trim($_POST["email"] ?? "");
        $skills = trim($_POST["skills"] ?? "");

        // 2. Validation using string functions
        if (empty($name)) {
            $errors[] = "Name is required.";
        }

        if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Valid email is required.";
        }

        if (empty($skills)) {
            $errors[] = "Skills are required.";
        }

        // Stop execution if validation fails
        if (!empty($errors)) {
            throw new Exception("Validation failed.");
        }

        // 3. Convert skills string into array
        $skillsArray = explode(",", $skills);
        $skillsArray = array_map("trim", $skillsArray); // remove extra spaces

        // Convert skills array back to string for storage
        $skillsString = implode(" | ", $skillsArray);

        // 4. Save student info into students.txt
        $file = fopen("../data/students.txt", "a");
        if (!$file) {
            throw new Exception("Unable to open file.");
        }

        $record = "Name: $name, Email: $email, Skills: $skillsString" . PHP_EOL;
        fwrite($file, $record);
        fclose($file);

        $success = "Student added successfully!";
    } catch (Exception $e) {
        // 5. Error handling
        if (empty($errors)) {
            $errors[] = $e->getMessage();
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Add Student</title>
</head>
<body>

<?php include "../includes/header.php"; ?>

<h2>Add Student Information</h2>

<!-- Display errors -->
<?php if (!empty($errors)): ?>
    <ul style="color:red;">
        <?php foreach ($errors as $error): ?>
            <li><?= htmlspecialchars($error) ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<!-- Display success -->
<?php if ($success): ?>
    <p style="color:green;"><?= htmlspecialchars($success) ?></p>
<?php endif; ?>

<!-- 1. Student Form -->
<form method="post">
    <label>Name:</label><br>
    <input type="text" name="name"><br><br>

    <label>Email:</label><br>
    <input type="text" name="email"><br><br>

    <label>Skills (comma-separated):</label><br>
    <input type="text" name="skills" placeholder="HTML, CSS, PHP"><br><br>

    <button type="submit">Add Student</button>
</form>

<?php include "../includes/footer.php"; ?>

</body>
</html>
