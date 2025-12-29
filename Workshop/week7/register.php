<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['add_students'])){
	$student_id = $_POST['student_id'] ?? "";
    $name = $_POST['name']  ?? "";
	$password = $_POST['password']  ?? "";
	$tableName = "students";

	// echo $password; 
	$hashedpassword = password_hash($password, PASSWORD_BCRYPT);

	$sql = "INSERT INTO $tableName (student_id,full_name,password_hash) Values(?,?,?)";
	try{
		$stmt = $pdo -> prepare($sql);
	$stmt -> execute([$student_id,$name,$hashedpassword]);
	echo "Students Added Succesfully";
	header("Refresh:1, url = login.php");
}catch(PDOException $e){
	die("Unable to add student". $e -> getMessage());
}
	
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>User Registration</title>
</head>
<body>

<form method="POST">
    <label for="student_id">Student ID</label>
    <input type="text" id="student_id" name="student_id" required>

    <label for="name">Name</label>
    <input type="text" id="name" name="name" required>

    <label for="password">Password</label>
    <input type="password" id="password" name="password" required>

    <button type="submit" name="add_students">Add Student</button>
</form>

</body>
</html>