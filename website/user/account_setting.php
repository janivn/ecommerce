<?php
session_start();
include '../includes/db.php';

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$errors = [];
$success = false;
$edit_mode = false;

// Toggle edit mode
if (isset($_GET['edit'])) {
    $edit_mode = true;
}

// Check if mobile column exists in the users table
$result = $conn->query("DESCRIBE users");
$columns = [];
if ($result) {
    while ($row = $result->fetch_assoc()) {
        $columns[] = $row['Field'];
    }
}
$mobile_column_exists = in_array('mobile', $columns);

if ($_SERVER["REQUEST_METHOD"] == "POST" && $edit_mode) {
    // Get current user data
    $user_id = $_SESSION['user_id'];
    
    // Sanitize inputs
    $fname = trim($_POST["fname"]);
    $mname = trim($_POST["mname"]);
    $lname = trim($_POST["lname"]);
    $email = trim($_POST["email"]);
    $mobile = $mobile_column_exists ? trim($_POST["mobile"]) : '';
    
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

    // Validate mobile only if column exists and field is not empty
    if ($mobile_column_exists && !empty($mobile)) {
        if (!preg_match("/^0\\d{10}$/", $mobile)) {
            $errors[] = "Mobile number must be 11 digits and start with 0.";
        }
    }

    // Check if email already exists for other users
    $email_check_stmt = $conn->prepare("SELECT id FROM users WHERE email = ? AND id != ?");
    if ($email_check_stmt) {
        $email_check_stmt->bind_param("si", $email, $user_id);
        $email_check_stmt->execute();
        $email_result = $email_check_stmt->get_result();
        if ($email_result->num_rows > 0) {
            $errors[] = "Email address is already registered to another account.";
        }
        $email_check_stmt->close();
    }

    if (empty($errors)) {
        // Combine names for username (same logic as register.php)
        $username = $fname;
        if (!empty($mname)) {
            $username .= ' ' . $mname;
        }
        $username .= ' ' . $lname;
        
        // Update user data based on available columns
        if ($mobile_column_exists) {
            $stmt = $conn->prepare("UPDATE users SET username=?, email=?, mobile=? WHERE id=?");
            if ($stmt === false) {
                $errors[] = "Prepare failed: " . $conn->error;
            } else {
                $stmt->bind_param("sssi", $username, $email, $mobile, $user_id);
                if ($stmt->execute()) {
                    $success = true;
                    // Update session data
                    $_SESSION['username'] = $username;
                    $_SESSION['email'] = $email;
                } else {
                    $errors[] = "Database error: " . $stmt->error;
                }
                $stmt->close();
            }
        } else {
            // Update without mobile if column doesn't exist
            $stmt = $conn->prepare("UPDATE users SET username=?, email=? WHERE id=?");
            if ($stmt === false) {
                $errors[] = "Prepare failed: " . $conn->error;
            } else {
                $stmt->bind_param("ssi", $username, $email, $user_id);
                if ($stmt->execute()) {
                    $success = true;
                    // Update session data
                    $_SESSION['username'] = $username;
                    $_SESSION['email'] = $email;
                } else {
                    $errors[] = "Database error: " . $stmt->error;
                }
                $stmt->close();
            }
        }
    }
}

// Get current user data
$user_id = $_SESSION['user_id'];
if ($mobile_column_exists) {
    $stmt = $conn->prepare("SELECT username, email, mobile FROM users WHERE id = ?");
} else {
    $stmt = $conn->prepare("SELECT username, email FROM users WHERE id = ?");
}

if ($stmt === false) {
    die("Prepare failed: " . $conn->error);
}

$stmt->bind_param("i", $user_id);
if (!$stmt->execute()) {
    die("Execute failed: " . $stmt->error);
}

if ($mobile_column_exists) {
    $stmt->bind_result($username, $email, $mobile);
} else {
    $stmt->bind_result($username, $email);
    $mobile = ''; // Default value if column doesn't exist
}

$stmt->fetch();
$stmt->close();

// Parse username into components with better logic
$name_parts = explode(' ', trim($username));
$fname = $name_parts[0] ?? '';

if (count($name_parts) == 2) {
    // Only first and last name
    $mname = '';
    $lname = $name_parts[1];
} elseif (count($name_parts) >= 3) {
    // Has middle name - take the last part as last name, everything in between as middle name
    $mname = implode(' ', array_slice($name_parts, 1, -1));
    $lname = end($name_parts);
} else {
    // Only one name part
    $mname = '';
    $lname = '';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Settings</title>
    <link rel="stylesheet" href="../public/css/register.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <style>
        .account-container {
            max-width: 500px;
            margin: 50px auto;
            padding: 20px;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .account-info { 
            margin-bottom: 20px; 
        }
        .account-info p { 
            margin: 10px 0; 
            padding: 8px;
            background-color: #f8f9fa;
            border-radius: 5px;
        }
        .btn {
            display: inline-block;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            margin: 5px;
            cursor: pointer;
            border: none;
            font-size: 14px;
        }
        .btn-primary { 
            background-color: #007bff;
            color: white;
        }
        .btn-primary:hover { 
            background-color: #0056b3; 
        }
        .btn-secondary {
            background-color: #6c757d;
            color: white;
        }
        .btn-secondary:hover { 
            background-color: #545b62; 
        }
        .success { 
            color: #155724;
            background-color: #d4edda;
            border: 1px solid #c3e6cb;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 15px; 
        }
        .error { 
            color: #721c24;
            background-color: #f8d7da;
            border: 1px solid #f5c6cb;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 15px; 
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box;
        }
        .form-group input:disabled {
            background-color: #e9ecef;
            opacity: 0.6;
        }
        .disabled-note {
            font-size: 12px;
            color: #dc3545;
            margin-top: 5px;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }
        .back-link {
            text-align: center;
            margin-top: 20px;
        }
        .back-link a {
            color: #007bff;
            text-decoration: none;
        }
        .back-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="account-container">
        <?php if (!$edit_mode): ?>
            <div class="account-info">
                <h2>Account Information</h2>
                <p><strong>Name:</strong> <?php echo htmlspecialchars($username); ?></p>
                <p><strong>Email:</strong> <?php echo htmlspecialchars($email); ?></p>
                <?php if ($mobile_column_exists && !empty($mobile)): ?>
                    <p><strong>Mobile:</strong> <?php echo htmlspecialchars($mobile); ?></p>
                <?php elseif ($mobile_column_exists): ?>
                    <p><strong>Mobile:</strong> <em>Not provided</em></p>
                <?php endif; ?>
                <div style="text-align: center;">
                    <a href="?edit=1" class="btn btn-primary">Edit Information</a>
                </div>
            </div>
        <?php else: ?>
            <form method="post" action="account_setting.php?edit=1">
                <h2>Edit Account Information</h2>
                
                <?php if (!empty($errors)): ?>
                    <div class="error"><?php echo implode('<br>', $errors); ?></div>
                <?php endif; ?>
                
                <?php if ($success): ?>
                    <div class="success">Account updated successfully!</div>
                <?php endif; ?>
                
                <div class="form-group">
                    <input type="text" name="fname" placeholder="First Name" 
                           value="<?php echo htmlspecialchars($fname); ?>" 
                           required pattern="[A-Za-z]{2,}" 
                           title="First name must be at least 2 letters and contain only letters">
                </div>
                
                <div class="form-group">
                    <input type="text" name="mname" placeholder="Middle Name (optional)" 
                           value="<?php echo htmlspecialchars($mname); ?>" 
                           pattern="[A-Za-z]{2,}" 
                           title="Middle name must be at least 2 letters and contain only letters (if provided)">
                </div>
                
                <div class="form-group">
                    <input type="text" name="lname" placeholder="Last Name" 
                           value="<?php echo htmlspecialchars($lname); ?>" 
                           required pattern="[A-Za-z]{2,}" 
                           title="Last name must be at least 2 letters and contain only letters">
                </div>
                
                <div class="form-group">
                    <input type="email" name="email" placeholder="Email" 
                           value="<?php echo htmlspecialchars($email); ?>" required>
                </div>
                
                <div class="form-group">
                    <?php if ($mobile_column_exists): ?>
                        <input type="text" name="mobile" placeholder="Mobile (11 digits, starts with 0)" 
                               value="<?php echo htmlspecialchars($mobile); ?>" 
                               maxlength="11" pattern="0\d{10}" 
                               title="Mobile number must be 11 digits and start with 0">
                    <?php else: ?>
                        <input type="text" name="mobile" placeholder="Mobile (11 digits, starts with 0)" 
                               value="<?php echo htmlspecialchars($mobile); ?>" 
                               maxlength="11" disabled>
                        <div class="disabled-note">Mobile field disabled - column doesn't exist in database</div>
                    <?php endif; ?>
                </div>
                
                <div style="text-align: center;">
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                    <a href="account_setting.php" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        <?php endif; ?>
        
        <div class="back-link">
            <a href="dashboard.php">← Back to Dashboard</a>
        </div>
    </div>
</body>
</html>