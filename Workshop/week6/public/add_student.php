<?php
require '../connection/db.php';
$students = [];
try {
    $stmt = $pdo->query("SELECT * FROM students");
    $students = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch(PDOException $e) {
	echo "PDO exception occured: ". $e->getMessage();
}

if($_SERVER['REQUEST_METHOD']=="POST" && isset($_POST['add_student'])){
    try{
        $name = $_POST['name'] ?? '';
        $email = $_POST['email'] ?? '';
        $course = $_POST['course'] ?? '';
        
        if(empty($name) || empty($email) || empty($course)){
            echo "All fields are required!";
        } else {
            $sql = "INSERT INTO students (name, email, course) VALUES(?,?,?)";
            $stmt = $pdo->prepare($sql);
            $execute = $stmt->execute([$name, $email, $course]);
            
            if($execute){
                echo "Successfully inserted";
                // Redirect after successful insertion (uncomment when ready)
                // header("Location: index.php");
                // exit();
            }
        }
    } catch(PDOException $e){
        die("Unable to insert: " . $e->getMessage());
    }
}
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Student Database</title>
    <link rel="stylesheet" href="../require/style.css">
</head>
<body>

    <h1>Insert Student Credentials</h1>
    <?php require "../require/links.php"; ?>
    
    <form method="POST">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
        
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        
        <label for="course">Course:</label>
        <input type="text" id="course" name="course" required>

        <button type="submit" name="add_student">Add Student</button>
    </form>
    
</body>
</html>