<?php
$name = "";
$email = "";
$errors = [];
$success = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Name validation
    $name = trim($_POST["name"] ?? "");
    if (empty($name)) {
        $errors[] = "Name is required.";
    } elseif (!preg_match("/^[a-zA-Z ]+$/", $name)) {
        $errors[] = "Name should contain only letters and spaces.";
    }
    // Email validation
    $email = trim($_POST["email"] ?? "");

    if (empty($email)) {
        $errors[] = "Email is required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Enter a valid email address.";
    }
    // Password validation
    $password = $_POST["password"] ?? "";
    if (empty($password)) {
        $errors[] = "Password is required.";
    } elseif (strlen($password) < 8) {
        $errors[] = "Password must contain at least 8 characters.";
    } 
    // Confirm password validation
    $confirm_password = $_POST["confirm_password"] ?? "";
    if (empty($confirm_password)) {
        $errors[] = "Confirm Password is required.";
    } elseif ($password !== $confirm_password) {
        $errors[] = "Passwords do not match.";
    }
    // Display result
    if (empty($errors)) {
        $success = "Registration Successful!";

        // Clear form
        $name = "";
        $email = "";
    }
}
?>
<html>
<head>
    <title>Registration Form</title>

    <style>
       body {
    font-family: Arial;
    background-color: lightyellow;
}

.container {
    width: 350px;
    margin: 50px auto;
    padding: 20px;
    background-color: white;
}

h2 {
    text-align: center;
}

label {
    display: block;
    margin-top: 10px;
}

input {
    width: 100%;
    padding: 8px;
    box-sizing: border-box;
}

button {
    width: 100%;
    padding: 10px;
    margin-top: 15px;
    background-color: #d4b83f;
    border: none;
    color: white;
}

.error {
    color: red;
}

.success {
    color: green;
}
    </style>
</head>

<body>

<div class="container">

    <h2>Registration Form</h2>

    <?php if (!empty($errors)): ?>
        <div class="error">
            <?php foreach ($errors as $error): ?>
                <p><?= htmlspecialchars($error) ?></p>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <?php if ($success): ?>
        <div class="success">
            <?= htmlspecialchars($success) ?>
        </div>
    <?php endif; ?>

    <form method="POST">

        <label>Name</label>
        <input type="text" name="name"
            value="<?= htmlspecialchars($name) ?>"
            placeholder="Enter your name"required>

        <label>Email</label>
        <input type="email" name="email"
            value="<?= htmlspecialchars($email) ?>"
            placeholder="Enter your email" required>

        <label>Password</label>
        <input type="password" name="password"
            placeholder="Enter password"required>

        <label>Confirm Password</label>
        <input type="password" name="confirm_password"
            placeholder="Confirm password" required >
        <button type="submit">Register</button>
    </form>
</div>
</body>
</html>

