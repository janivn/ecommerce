<?php
session_start();
include '../includes/db.php';
include '../public/css/login.css';

$errors = [];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST["email"]);
    $password = $_POST["password"];

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email address.";
    }

    if (empty($errors)) {
        $stmt = $conn->prepare("SELECT id, username, email, password, role FROM users WHERE email = ?");
        if ($stmt === false) {
            $errors[] = "Prepare failed: " . $conn->error;
        } else {
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $stmt->store_result();
            if ($stmt->num_rows == 1) {
                $stmt->bind_result($id, $username, $db_email, $db_password, $role);
                $stmt->fetch();
                if (password_verify($password, $db_password)) {
                    // Login successful
                    $_SESSION['user_id'] = $id;
                    $_SESSION['username'] = $username;
                    $_SESSION['email'] = $db_email;
                    $_SESSION['role'] = $role;
                    header("Location: dashboard.php");
                    exit();
                } else {
                    $errors[] = "Invalid email or password.";
                }
            } else {
                $errors[] = "No account found with that email. <a href='register.php'>Register here</a>";
            }
            $stmt->close();
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="../public/css/register.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <script src="../public/js/register.js"></script>
</head>
<body>
    <div class="register-container">
        <form class="register-form" method="post" action="login.php">
            <h2>Login</h2>
            <?php
            if (!empty($errors)) {
                echo '<div class="error">'.implode('<br>', $errors).'</div>';
            }
            ?>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
            <p>Don't have an account? <a href="register.php">Register</a></p>
        </form>
    </div>
</body>
</html>