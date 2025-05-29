<?php
session_start();
include '../includes/db.php';

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
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

// Welcome message based on time
$hour = date('H');
if ($hour < 12) {
    $greeting = "Good Morning";
} elseif ($hour < 17) {
    $greeting = "Good Afternoon";
} else {
    $greeting = "Good Evening";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../public/css/register.css">
    <link rel="stylesheet" href="../public/css/dashboard.css">
    
</head>
<body>
    <div class="dashboard-container">
        <div class="header">
            <h1>Dashboard</h1>
            <p class="welcome-text"><?php echo $greeting; ?>, <?php echo htmlspecialchars(explode(' ', $username)[0]); ?>!</p>
        </div>
        
        <div class="user-info">
            <h3>Your Account Information</h3>
            <div class="info-row">
                <span class="info-label">Full Name:</span>
                <span class="info-value"><?php echo htmlspecialchars($username); ?></span>
            </div>
            <div class="info-row">
                <span class="info-label">Email:</span>
                <span class="info-value"><?php echo htmlspecialchars($email); ?></span>
            </div>
            <?php if ($mobile_column_exists): ?>
            <div class="info-row">
                <span class="info-label">Mobile:</span>
                <span class="info-value">
                    <?php echo !empty($mobile) ? htmlspecialchars($mobile) : '<em>Not provided</em>'; ?>
                </span>
            </div>
            <?php endif; ?>
            <div class="info-row">
                <span class="info-label">Account Status:</span>
                <span class="info-value" style="color: #28a745; font-weight: bold;">Active</span>
            </div>
        </div>
        
        <div class="quick-stats">
            <h3>Quick Stats</h3>
            <div class="stats-grid">
                <div class="stat-item">
                    <div class="stat-number"><?php echo date('d'); ?></div>
                    <div class="stat-label">Current Day</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number"><?php echo date('M'); ?></div>
                    <div class="stat-label">Current Month</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number"><?php echo date('Y'); ?></div>
                    <div class="stat-label">Current Year</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number"><?php echo date('H:i'); ?></div>
                    <div class="stat-label">Current Time</div>
                </div>
            </div>
        </div>
        
        <div class="dashboard-menu">
            <a href="../shop.php" class="menu-item shop">
                <h4>Browse Shop</h4>
                <p>Explore our products and make purchases</p>
            </a>
            
            <a href="my_orders.php" class="menu-item orders">
                <h4>My Orders</h4>
                <p>View your order history and track orders</p>
            </a>
            
            <a href="account_setting.php" class="menu-item settings">
                <h4>Account Settings</h4>
                <p>Update your personal information and preferences</p>
            </a>
            
            <a href="profile.php" class="menu-item">
                <h4>View Profile</h4>
                <p>View and manage your complete profile</p>
            </a>
            
            <a href="change_password.php" class="menu-item">
                <h4>Change Password</h4>
                <p>Update your account password for security</p>
            </div>
            
            <a href="logout.php" class="menu-item logout" onclick="return confirm('Are you sure you want to logout?')">
                <h4>Logout</h4>
                <p>Sign out of your account securely</p>
            </a>
        </div>
        
        <div style="text-align: center; margin-top: 20px; color: #666; font-size: 14px;">
            <p>Last login: <?php echo date('F j, Y \a\t g:i A'); ?></p>
        </div>
    </div>
</body>
</html>