
<?php
$error = "";
$success = "";

$name = "";
$email = "";
$phone = "";

if (isset($_POST['submit'])) {

    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $phone = trim($_POST['phone'] ?? '');
    $password = $_POST['password'] ?? '';
    $confirm = $_POST['confirm'] ?? '';

    if (empty($name)) {
        $error = "Name is required!";
    }
    elseif (!preg_match("/^[a-zA-Z ]{3,50}$/", $name)) {
        $error = "Invalid name!";
    }
    elseif (empty($email)) {
        $error = "Email is required!";
    }
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Invalid email!";
    }
    elseif (empty($phone)) {
        $error = "Phone number is required!";
    }
    elseif (!preg_match("/^[0-9]{10}$/", $phone)) {
        $error = "Phone number must contain 10 digits!";
    }
    elseif (empty($password)) {
        $error = "Password is required!";
    }
    elseif (strlen($password) < 8) {
        $error = "Password must contain at least 8 characters!";
    }
    elseif (empty($confirm)) {
        $error = "Confirm password is required!";
    }
    elseif ($password != $confirm) {
        $error = "Passwords do not match!";
    }
    else {
        $success = "Registration Successful!";
    }
}
?>
<html>
<head>
<title>Registration Form</title>

<style>
body {
    font-family: Arial;
    background: #e6f2ff;
}

.container {
    width: 350px;
    margin: 40px auto;
    padding: 25px;
    background: white;
    border-radius: 10px;
    box-shadow: 0 0 10px gray;
}

h2 {
    text-align: center;
    color: blue;
}

label {
    display: block;
    margin-top: 10px;
}

input {
    width: 100%;
    padding: 10px;
    margin: 8px 0;
    box-sizing: border-box;
    border: 1px solid gray;
    border-radius: 5px;
}

button {
    width: 100%;
    padding: 10px;
    background: blue;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    margin-top: 10px;
}

.message {
    color: red;
    font-size: 13px;
    text-align: center;
}

.success {
    color: green;
    text-align: center;
}
</style>

</head>

<body>

<div class="container">

<h2>Registration Form</h2>

<p class="message">
<?php echo htmlspecialchars($error); ?>
</p>

<p class="success">
<?php echo htmlspecialchars($success); ?>
</p>

<form method="post">

<label>Name:</label>
<input type="text" name="name"
value="<?php echo htmlspecialchars($name); ?>">

<label>Email:</label>
<input type="text" name="email"
value="<?php echo htmlspecialchars($email); ?>">

<label>Phone:</label>
<input type="text" name="phone"
value="<?php echo htmlspecialchars($phone); ?>">

<label>Password:</label>
<input type="password" name="password">

<label>Confirm Password:</label>
<input type="password" name="confirm">

<button type="submit" name="submit">Register</button>

</form>

</div>

</body>
</html>

