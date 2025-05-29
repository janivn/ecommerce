<?php
// Database connection (update with your DB credentials)
include '../includes/db.php';


// Add these two lines to initialize the variables
$errors = [];
$success = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize inputs
    $fname = trim($_POST["fname"]);
    $mname = trim($_POST["mname"]);
    $lname = trim($_POST["lname"]);
    $email = trim($_POST["email"]);
    $mobile = trim($_POST["mobile"]);
    $password = $_POST["password"];

    // Validate names (min 2 letters, only letters)
    if (!preg_match("/^[A-Za-z]{2,}$/", $fname)) {
        $errors[] = "First name must be at least 2 letters and contain only letters.";
    }
    if ($mname && !preg_match("/^[A-Za-z]{2,}$/", $mname)) {
        $errors[] = "Middle name must be at least 2 letters and contain only letters.";
    }
    if (!preg_match("/^[A-Za-z]{2,}$/", $lname)) {
        $errors[] = "Last name must be at least 2 letters and contain only letters.";
    }

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email address.";
    }

    // Validate mobile (11 digits, starts with 0)
    if (!preg_match("/^0\\d{10}$/", $mobile)) {
        $errors[] = "Mobile number must be 11 digits and start with 0.";
    }

    // Validate password (min 8 chars, 1 uppercase, 1 lowercase, 1 number, 1 special char)
    if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\\d)(?=.*[\\W_]).{8,}$/", $password)) {
        $errors[] = "Password must be at least 8 characters, include 1 uppercase, 1 lowercase, 1 number, and 1 special character.";
    }

    // If no errors, insert into database
    if (empty($errors)) {
        // Combine names for username (customize as needed)
        $username = $fname;
        if (!empty($mname)) {
            $username .= ' ' . $mname;
        }
        $username .= ' ' . $lname;

        $stmt = $conn->prepare("INSERT INTO users (username, email, password, role) VALUES (?, ?, ?, ?)");
        if ($stmt === false) {
            $errors[] = "Prepare failed: " . $conn->error;
        } else {
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $role = 'user';
            $stmt->bind_param("ssss", $username, $email, $hashed_password, $role);
            if ($stmt->execute()) {
                // Redirect to login.php after successful registration
                header("Location: login.php");
                exit(); // Important to exit after a header redirect
            } else {
                $errors[] = "Database error: " . $stmt->error;
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
    <title>Register</title>
    <link rel="stylesheet" href="../public/css/register.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <script src="../public/js/register.js"></script>
</head>
<body>
    <div class="register-container">
        <form class="register-form" method="post" action="register.php">
            <h2>Register</h2>
            <?php
            if (!empty($errors)) {
                echo '<div class="error">'.implode('<br>', $errors).'</div>';
            }
            // Remove the success message display as we are now redirecting
            // if ($success) {
            //     echo '<div class="success">Registration successful! <a href="index.html#login">Login here</a>.</div>';
            // }
            ?>
            <input type="text" name="fname" placeholder="First Name" required pattern="[A-Za-z]{2,}">
            <input type="text" name="mname" placeholder="Middle Name (optional)" pattern="[A-Za-z]{2,}">
            <input type="text" name="lname" placeholder="Last Name" required pattern="[A-Za-z]{2,}">
            <input type="email" name="email" placeholder="Email" required>
            <input type="text" name="mobile" id="mobile" placeholder="Mobile (11 digits, starts with 0)" required maxlength="11">
            <input type="password" name="password" id="password" placeholder="Password" required>
            <button type="submit">Register</button>
            <p>Already have an account? <a href="login.php#login">Login</a></p>
        </form>
    </div>
</body>
</html>