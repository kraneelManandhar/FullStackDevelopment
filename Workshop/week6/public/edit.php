<?php
require 'db.php';

// Get student ID
if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit;
}

$id = $_GET['id'];

// Fetch student data
try {
    $stmt = $pdo->prepare("SELECT * FROM students WHERE id = ?");
    $stmt->execute([$id]);
    $student = $stmt->fetch();
    
    if (!$student) {
        echo "<p style='color:red;'>Student not found!</p>";
        echo "<a href='index.php'>Back to list</a>";
        exit;
    }
} catch(PDOException $e) {
    die("Error: " . $e->getMessage());
}

// Handle update
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $course = $_POST['course'];
    
    try {
        // Check if email exists for other students
        $check = $pdo->prepare("SELECT id FROM students WHERE email = ? AND id != ?");
        $check->execute([$email, $id]);
        
        if ($check->rowCount() > 0) {
            echo "<p style='color:red;'>Email already exists for another student!</p>";
        } else {
            $stmt = $pdo->prepare("UPDATE students SET name = ?, email = ?, course = ? WHERE id = ?");
            $stmt->execute([$name, $email, $course, $id]);
            echo "<p style='color:green;'>Student updated successfully!</p>";
            
            // Refresh student data
            $stmt = $pdo->prepare("SELECT * FROM students WHERE id = ?");
            $stmt->execute([$id]);
            $student = $stmt->fetch();
        }
    } catch(PDOException $e) {
        echo "<p style='color:red;'>Error: " . $e->getMessage() . "</p>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Student</title>
</head>
<body>
    <h1>Edit Student</h1>
    
    <a href="index.php">Back to List</a>
    <hr>
    
    <form method="POST">
        <p>ID: <?php echo $student['id']; ?></p>
        <p>Name: <br><input type="text" name="name" value="<?php echo htmlspecialchars($student['name']); ?>" required></p>
        <p>Email: <br><input type="email" name="email" value="<?php echo htmlspecialchars($student['email']); ?>" required></p>
        <p>Course: <br><input type="text" name="course" value="<?php echo htmlspecialchars($student['course']); ?>" required></p>
        <p>Created: <?php echo $student['created_at']; ?></p>
        <p>
            <input type="submit" value="Update Student">
            <a href="?delete=<?php echo $id; ?>" onclick="return confirm('Are you sure?')" style="color:red;">Delete</a>
        </p>
    </form>
</body>
</html>