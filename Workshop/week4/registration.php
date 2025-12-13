<?php
$name = "";
$email = "";
$errors = [];
$success = "";

// If form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];

    if (empty($name)) {
        $errors['name'] = "Name is required.";
    }

    if (empty($email)) {
        $errors['email'] = "Email is required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Invalid email format.";
    }

    if (empty($password)) {
        $errors['password'] = "Password is required.";
    } elseif (strlen($password) < 6) {
        $errors['password'] = "Password must be at least 6 characters.";
    }

    if ($password !== $confirm_password) {
        $errors['confirm_password'] = "Passwords do not match.";
    }

    // If no errors → save user
    if (empty($errors)) {

        $file = "users.json";
        if (!file_exists($file)) {
            file_put_contents($file, json_encode([]));
        }
        
        $data = file_get_contents($file);
        $users = json_decode($data, true);


        $data = file_get_contents($file);
        $users = json_decode($data, true);

        if (!is_array($users)) {
            $users = [];
        }

        $hashed = password_hash($password, PASSWORD_DEFAULT);

        $users[] = [
            "name" => $name,
            "email" => $email,
            "password" => $hashed
        ];

        file_put_contents($file, json_encode($users, JSON_PRETTY_PRINT));

        $success = "Registration Successful!";
        $name = $email = ""; // Clear fields
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Registration</title>
    <style>
        body { font-family: Arial; background: #f2f2f2; padding: 30px; }
        .container { width: 400px; margin: auto; background: white; padding: 20px; border-radius: 8px; }
        .input-box { margin-bottom: 15px; }
        label { font-weight: bold; margin-bottom: 5px; display: block; }
        input { width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px; }
        .error { color: red; font-size: 13px; }
        .success { background: #c8f7c5; padding: 10px; border-radius: 5px; margin-bottom: 10px; }
        button { width: 100%; padding: 10px; background: #4CAF50; color: white; border: none; border-radius: 4px; cursor: pointer; }
    </style>
</head>
<body>

<div class="container">
    <h2>User Registration</h2>

    <?php if ($success): ?>
        <div class="success"><?= $success ?></div>
    <?php endif; ?>

    <form method="POST">

        <div class="input-box">
            <label>Name</label>
            <input type="text" name="name" value="<?= htmlspecialchars($name) ?>">
            <div class="error"><?= $errors['name'] ?? "" ?></div>
        </div>

        <div class="input-box">
            <label>Email</label>
            <input type="email" name="email" value="<?= htmlspecialchars($email) ?>">
            <div class="error"><?= $errors['email'] ?? "" ?></div>
        </div>

        <div class="input-box">
            <label>Password</label>
            <input type="password" name="password">
            <div class="error"><?= $errors['password'] ?? "" ?></div>
        </div>

        <div class="input-box">
            <label>Confirm Password</label>
            <input type="password" name="confirm_password">
            <div class="error"><?= $errors['confirm_password'] ?? "" ?></div>
        </div>

        <button type="submit">Register</button>

    </form>
</div>

</body>
</html>