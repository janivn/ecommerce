<?php
session_start();

// Enhanced session validation
function isLoggedIn() {
    return (isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])) || 
           (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true);
}

// Function to check if user has valid session
function validateSession() {
    if (isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])) {
        return true;
    }
    return false;
}

// Function to get user display name
function getUserDisplayName() {
    if (isset($_SESSION['username']) && !empty($_SESSION['username'])) {
        return $_SESSION['username'];
    } elseif (isset($_SESSION['email']) && !empty($_SESSION['email'])) {
        return $_SESSION['email'];
    } elseif (isset($_SESSION['user_id'])) {
        return 'User #' . $_SESSION['user_id'];
    }
    return 'Guest';
}

// Sample cart items (in a real application, this would come from database/session)
$cartItems = [
    [
        'id' => 1,
        'name' => 'Jazzmaster',
        'price' => 1050,
        'image' => 'assets/img/featured1.png',
        'quantity' => 1,
        'description' => 'Classic design with modern features'
    ],
    [
        'id' => 2,
        'name' => 'Rose Gold',
        'price' => 850,
        'image' => 'assets/img/featured3.png',
        'quantity' => 1,
        'description' => 'Elegant rose gold finish'
    ],
    [
        'id' => 3,
        'name' => 'Longines Rose',
        'price' => 980,
        'image' => 'assets/img/new1.png',
        'quantity' => 1,
        'description' => 'Premium luxury timepiece'
    ]
];

// Calculate totals
$subtotal = 0;
$itemCount = 0;
foreach ($cartItems as $item) {
    $subtotal += $item['price'] * $item['quantity'];
    $itemCount += $item['quantity'];
}

$tax = $subtotal * 0.08; // 8% tax
$shipping = $subtotal > 1000 ? 0 : 50; // Free shipping over $1000
$total = $subtotal + $tax + $shipping;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--=============== FAVICON ===============-->
    <link rel="shortcut icon" href="assets/img/favicon.png" type="image/x-icon">

    <!--=============== BOXICONS ===============-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

    <!--=============== CSS ===============-->
    <link rel="stylesheet" href="public/css/index.css">

    <title>Shopping Cart - Rolex Collection</title>
    
    <style>
        /* Cart Page Specific Styles */
        .cart-page {
            padding: 6rem 0 2rem;
            min-height: 100vh;
        }

        .cart-page__container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 1rem;
        }

        .cart-page__title {
            font-size: var(--h1-font-size);
            color: var(--title-color);
            text-align: center;
            margin-bottom: 2rem;
        }

        .cart-page__content {
            display: grid;
            grid-template-columns: 1fr 350px;
            gap: 2rem;
            align-items: start;
        }

        .cart-items {
            background: var(--container-color);
            padding: 1.5rem;
            border-radius: 1rem;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .cart-item {
            display: grid;
            grid-template-columns: 100px 1fr auto;
            gap: 1rem;
            padding: 1rem 0;
            border-bottom: 1px solid var(--border-color);
            align-items: center;
        }

        .cart-item:last-child {
            border-bottom: none;
        }

        .cart-item__image {
            width: 100px;
            height: 100px;
            border-radius: 0.5rem;
            object-fit: cover;
        }

        .cart-item__info h3 {
            font-size: var(--h3-font-size);
            color: var(--title-color);
            margin-bottom: 0.25rem;
        }

        .cart-item__info p {
            font-size: var(--small-font-size);
            color: var(--text-color);
            margin-bottom: 0.5rem;
        }

        .cart-item__price {
            font-size: var(--h3-font-size);
            color: var(--first-color);
            font-weight: var(--font-semi-bold);
        }

        .cart-item__controls {
            display: flex;
            flex-direction: column;
            gap: 1rem;
            align-items: center;
        }

        .quantity-controls {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            background: var(--body-color);
            padding: 0.25rem;
            border-radius: 0.5rem;
        }

        .quantity-btn {
            background: var(--first-color);
            color: white;
            border: none;
            width: 30px;
            height: 30px;
            border-radius: 0.25rem;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: background 0.3s;
        }

        .quantity-btn:hover {
            background: var(--button-color-alt);
        }

        .quantity-input {
            width: 50px;
            text-align: center;
            border: 1px solid var(--border-color);
            padding: 0.25rem;
            border-radius: 0.25rem;
            background: var(--container-color);
            color: var(--text-color);
        }

        .remove-btn {
            background: #ff4757;
            color: white;
            border: none;
            padding: 0.5rem;
            border-radius: 0.25rem;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 0.25rem;
            font-size: var(--small-font-size);
            transition: background 0.3s;
        }

        .remove-btn:hover {
            background: #ff3838;
        }

        .cart-summary {
            background: var(--container-color);
            padding: 1.5rem;
            border-radius: 1rem;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            height: fit-content;
            position: sticky;
            top: 6rem;
        }

        .cart-summary h3 {
            font-size: var(--h2-font-size);
            color: var(--title-color);
            margin-bottom: 1rem;
            text-align: center;
        }

        .summary-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 0.75rem;
            padding: 0.5rem 0;
        }

        .summary-row:not(:last-child) {
            border-bottom: 1px solid var(--border-color);
        }

        .summary-row.total {
            font-weight: var(--font-semi-bold);
            font-size: var(--h3-font-size);
            color: var(--first-color);
            border-top: 2px solid var(--first-color);
            padding-top: 1rem;
            margin-top: 1rem;
        }

        .checkout-btn {
            width: 100%;
            background: var(--first-color);
            color: white;
            border: none;
            padding: 1rem;
            border-radius: 0.5rem;
            font-size: var(--normal-font-size);
            font-weight: var(--font-semi-bold);
            cursor: pointer;
            margin-top: 1rem;
            transition: all 0.3s;
        }

        .checkout-btn:hover {
            background: var(--button-color-alt);
            transform: translateY(-2px);
        }

        .continue-shopping {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            color: var(--first-color);
            text-decoration: none;
            margin-top: 1rem;
            padding: 0.75rem;
            border: 1px solid var(--first-color);
            border-radius: 0.5rem;
            transition: all 0.3s;
        }

        .continue-shopping:hover {
            background: var(--first-color);
            color: white;
        }

        .empty-cart {
            text-align: center;
            padding: 3rem;
            color: var(--text-color);
        }

        .empty-cart i {
            font-size: 4rem;
            color: var(--text-color-light);
            margin-bottom: 1rem;
        }

        .login-prompt {
            text-align: center;
            padding: 2rem;
            background: var(--container-color);
            border-radius: 1rem;
            margin: 2rem 0;
        }

        .login-prompt i {
            font-size: 3rem;
            color: var(--first-color);
            margin-bottom: 1rem;
        }

        /* Mobile Responsive */
        @media screen and (max-width: 768px) {
            .cart-page__content {
                grid-template-columns: 1fr;
                gap: 1rem;
            }

            .cart-item {
                grid-template-columns: 80px 1fr;
                gap: 0.75rem;
            }

            .cart-item__controls {
                grid-column: 1 / -1;
                flex-direction: row;
                justify-content: space-between;
                margin-top: 0.5rem;
            }

            .cart-summary {
                position: static;
            }
        }

        /* Navigation styles */
        .nav__dropdown {
            position: relative;
        }
        
        .nav__dropdown-menu {
            display: none;
            position: absolute;
            top: 100%;
            left: 0;
            background: var(--container-color);
            border-radius: 0.5rem;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            padding: 0.5rem 0;
            min-width: 160px;
            z-index: 1000;
            border: 1px solid var(--border-color);
        }
        
        .nav__dropdown:hover .nav__dropdown-menu {
            display: block;
            animation: fadeIn 0.3s ease;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .nav__dropdown-menu li {
            list-style: none;
        }
        
        .nav__dropdown-menu .nav__link {
            padding: 0.75rem 1rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            white-space: nowrap;
            font-size: var(--small-font-size);
            text-transform: none;
            transition: all 0.3s ease;
        }
        
        .nav__dropdown-menu .nav__link:hover {
            background: var(--first-color);
            color: var(--white-color);
            transform: translateX(5px);
        }
        
        .nav__user-greeting {
            color: var(--first-color);
            font-size: var(--small-font-size);
            font-weight: var(--font-medium);
            padding: 0.5rem 1rem;
            background: var(--container-color);
            border-radius: 0.25rem;
            border: 1px solid var(--first-color);
            margin-right: 0.5rem;
        }
        
        .nav__dashboard {
            background: var(--first-color);
            color: white !important;
            padding: 0.5rem 1rem;
            border-radius: 0.25rem;
            transition: all 0.3s ease;
        }
        
        .nav__dashboard:hover {
            background: var(--button-color-alt);
            transform: translateY(-2px);
        }
    </style>
</head>
<body>
    <!--==================== HEADER ====================-->
    <header class="header" id="header">
        <nav class="nav container">
            <a href="index.php" class="nav__logo">
                <i class='bx bxs-watch nav__logo-icon'></i> Rolex
            </a>

            <div class="nav__menu" id="nav-menu">
                <ul class="nav__list">
                    <li class="nav__item">
                        <a href="index.php" class="nav__link">Home</a>
                    </li>
                    <li class="nav__item">
                        <a href="shop.php" class="nav__link">Shop</a>
                    </li>
                    <li class="nav__item">
                        <a href="product.php" class="nav__link">Product Detail</a>
                    </li>
                    <li class="nav__item">
                        <a href="about.php" class="nav__link">About</a>
                    </li>
                    <li class="nav__item">
                        <a href="contact.php" class="nav__link">Contact Us</a>
                    </li>
                    <li class="nav__item">
                        <a href="cart.php" class="nav__link active-link">
                            <i class='bx bx-shopping-bag'></i> Cart
                        </a>
                    </li>
                    
                    <!-- User Authentication Section -->
                    <?php if (isLoggedIn()): ?>
                        <li class="nav__item">
                            <span class="nav__user-greeting">
                                <i class='bx bx-user-circle'></i>
                                Hello, <?php echo htmlspecialchars(getUserDisplayName()); ?>!
                            </span>
                        </li>
                        
                        <li class="nav__item">
                            <a href="user/dashboard.php" class="nav__link nav__dashboard">
                                <i class='bx bx-tachometer'></i> Dashboard
                            </a>
                        </li>
                        
                        <li class="nav__item nav__dropdown">
                            <a href="#" class="nav__link">
                                <i class='bx bx-cog'></i> Account <i class='bx bx-chevron-down'></i>
                            </a>
                            <ul class="nav__dropdown-menu">
                                <li><a href="profile.php" class="nav__link">
                                    <i class='bx bx-user-circle'></i> My Profile
                                </a></li>
                                <li><a href="orders.php" class="nav__link">
                                    <i class='bx bx-receipt'></i> My Orders
                                </a></li>
                                <li><a href="wishlist.php" class="nav__link">
                                    <i class='bx bx-heart'></i> Wishlist
                                </a></li>
                                <li><a href="settings.php" class="nav__link">
                                    <i class='bx bx-cog'></i> Settings
                                </a></li>
                                <li><hr style="margin: 0.5rem 0; border: 1px solid var(--border-color);"></li>
                                <li><a href="user/logout.php" class="nav__link" onclick="return confirmLogout()">
                                    <i class='bx bx-log-out'></i> Logout
                                </a></li>
                            </ul>
                        </li>
                    <?php else: ?>
                        <li class="nav__item nav__dropdown">
                            <a href="#" class="nav__link">
                                <i class='bx bx-user'></i> Account <i class='bx bx-chevron-down'></i>
                            </a>
                            <ul class="nav__dropdown-menu">
                                <li><a href="user/login.php" class="nav__link">
                                    <i class='bx bx-log-in'></i> Login
                                </a></li>
                                <li><a href="user/register.php" class="nav__link">
                                    <i class='bx bx-user-plus'></i> Register
                                </a></li>
                                <li><hr style="margin: 0.5rem 0; border: 1px solid var(--border-color);"></li>
                                <li><a href="guest-checkout.php" class="nav__link">
                                    <i class='bx bx-shopping-bag'></i> Guest Checkout
                                </a></li>
                            </ul>
                        </li>
                    <?php endif; ?>
                </ul>

                <div class="nav__close" id="nav-close">
                    <i class='bx bx-x'></i>
                </div>
            </div>

            <div class="nav__btns">
                <i class='bx bx-moon change-theme' id="theme-button"></i>
                <div class="nav__toggle" id="nav-toggle">
                    <i class='bx bx-grid-alt'></i>
                </div>
            </div>
        </nav>
    </header>

    <!--==================== MAIN ====================-->
    <main class="main">
        <section class="cart-page">
            <div class="cart-page__container">
                <h1 class="cart-page__title">Shopping Cart</h1>

                <?php if (!isLoggedIn()): ?>
                    <div class="login-prompt">
                        <i class='bx bx-user-circle'></i>
                        <h3>Please Login to View Your Cart</h3>
                        <p>You need to be logged in to manage your shopping cart and proceed with checkout.</p>
                        <a href="user/login.php?redirect=cart.php" class="button" style="margin-top: 1rem;">
                            <i class='bx bx-log-in'></i> Login Now
                        </a>
                        <br>
                        <a href="user/register.php" class="continue-shopping" style="margin-top: 0.5rem;">
                            <i class='bx bx-user-plus'></i> Create Account
                        </a>
                    </div>
                <?php elseif (empty($cartItems)): ?>
                    <div class="empty-cart">
                        <i class='bx bx-shopping-bag'></i>
                        <h3>Your cart is empty</h3>
                        <p>Looks like you haven't added any items to your cart yet.</p>
                        <a href="shop.php" class="button" style="margin-top: 1rem;">
                            <i class='bx bx-store'></i> Start Shopping
                        </a>
                    </div>
                <?php else: ?>
                    <div class="cart-page__content">
                        <div class="cart-items">
                            <div class="cart-items__header">
                                <h3>Items in Your Cart (<?php echo $itemCount; ?>)</h3>
                                <p style="color: var(--text-color); margin-bottom: 1rem;">
                                    <i class='bx bx-user'></i> Shopping as: <strong><?php echo htmlspecialchars(getUserDisplayName()); ?></strong>
                                </p>
                            </div>

                            <?php foreach ($cartItems as $item): ?>
                                <div class="cart-item" data-item-id="<?php echo $item['id']; ?>">
                                    <img src="<?php echo $item['image']; ?>" alt="<?php echo htmlspecialchars($item['name']); ?>" class="cart-item__image">
                                    
                                    <div class="cart-item__info">
                                        <h3><?php echo htmlspecialchars($item['name']); ?></h3>
                                        <p><?php echo htmlspecialchars($item['description']); ?></p>
                                        <div class="cart-item__price">$<?php echo number_format($item['price'], 2); ?></div>
                                    </div>
                                    
                                    <div class="cart-item__controls">
                                        <div class="quantity-controls">
                                            <button class="quantity-btn" onclick="updateQuantity(<?php echo $item['id']; ?>, -1)">
                                                <i class='bx bx-minus'></i>
                                            </button>
                                            <input type="number" class="quantity-input" value="<?php echo $item['quantity']; ?>" 
                                                   min="1" onchange="setQuantity(<?php echo $item['id']; ?>, this.value)">
                                            <button class="quantity-btn" onclick="updateQuantity(<?php echo $item['id']; ?>, 1)">
                                                <i class='bx bx-plus'></i>
                                            </button>
                                        </div>
                                        <button class="remove-btn" onclick="removeItem(<?php echo $item['id']; ?>)">
                                            <i class='bx bx-trash'></i> Remove
                                        </button>
                                    </div>
                                </div>
                            <?php endforeach; ?>

                            <a href="shop.php" class="continue-shopping">
                                <i class='bx bx-arrow-back'></i> Continue Shopping
                            </a>
                        </div>

                        <div class="cart-summary">
                            <h3>Order Summary</h3>
                            
                            <div class="summary-row">
                                <span>Subtotal (<?php echo $itemCount; ?> items):</span>
                                <span id="subtotal">$<?php echo number_format($subtotal, 2); ?></span>
                            </div>
                            
                            <div class="summary-row">
                                <span>Tax (8%):</span>
                                <span id="tax">$<?php echo number_format($tax, 2); ?></span>
                            </div>
                            
                            <div class="summary-row">
                                <span>Shipping:</span>
                                <span id="shipping">
                                    <?php if ($shipping == 0): ?>
                                        <span style="color: var(--first-color);">FREE</span>
                                    <?php else: ?>
                                        $<?php echo number_format($shipping, 2); ?>
                                    <?php endif; ?>
                                </span>
                            </div>
                            
                            <?php if ($subtotal < 1000 && $subtotal > 0): ?>
                                <div class="summary-row" style="font-size: var(--small-font-size); color: var(--first-color);">
                                    <span>Add $<?php echo number_format(1000 - $subtotal, 2); ?> for free shipping!</span>
                                </div>
                            <?php endif; ?>
                            
                            <div class="summary-row total">
                                <span>Total:</span>
                                <span id="total">$<?php echo number_format($total, 2); ?></span>
                            </div>
                            
                            <button class="checkout-btn" onclick="proceedToCheckout()">
                                <i class='bx bx-credit-card'></i> Proceed to Checkout
                            </button>
                            
                            <div style="margin-top: 1rem; font-size: var(--small-font-size); color: var(--text-color);">
                                <p><i class='bx bx-shield-check'></i> Secure checkout with SSL encryption</p>
                                <p><i class='bx bx-undo'></i> 30-day return policy</p>
                                <p><i class='bx bx-support'></i> 24/7 customer support</p>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </section>
    </main>

    <!--==================== FOOTER ====================-->
    <footer class="footer section">
        <div class="footer__container container grid">
            <div class="footer__content">
                <h3 class="footer__title">Our information</h3>
                <ul class="footer__list">
                    <li>1234 - Peru</li>
                    <li>La Libertad 43210</li>
                    <li>123-456-789</li>
                </ul>
            </div>
            <div class="footer__content">
                <h3 class="footer__title">About Us</h3>
                <ul class="footer__links">
                    <li><a href="support.php" class="footer__link">Support Center</a></li>
                    <li><a href="customer-support.php" class="footer__link">Customer Support</a></li>
                    <li><a href="about.php" class="footer__link">About Us</a></li>
                    <li><a href="copyright.php" class="footer__link">Copyright</a></li>
                </ul>
            </div>
            <div class="footer__content">
                <h3 class="footer__title">Product</h3>
                <ul class="footer__links">
                    <li><a href="category.php?type=luxury" class="footer__link">Luxury Watches</a></li>
                    <li><a href="category.php?type=sport" class="footer__link">Sport Watches</a></li>
                    <li><a href="category.php?type=classic" class="footer__link">Classic Watches</a></li>
                    <li><a href="accessories.php" class="footer__link">Accessories</a></li>
                </ul>
            </div>
            <div class="footer__content">
                <h3 class="footer__title">Social</h3>
                <ul class="footer__social">
                    <a href="https://www.facebook.com/" target="_blank" class="footer__social-link">
                        <i class='bx bxl-facebook'></i>
                    </a>
                    <a href="https://twitter.com/" target="_blank" class="footer__social-link">
                        <i class='bx bxl-twitter'></i>
                    </a>
                    <a href="https://www.instagram.com/" target="_blank" class="footer__social-link">
                        <i class='bx bxl-instagram'></i>
                    </a>
                </ul>
            </div>
        </div>
        <span class="footer__copy">&#169; Rolex Collection <?php echo date('Y'); ?>. All rights reserved</span>
    </footer>

    <!--=============== SCROLL UP ===============-->
    <a href="#" class="scrollup" id="scroll-up">
        <i class='bx bx-up-arrow-alt scrollup__icon'></i>
    </a>

    <!--=============== MAIN JS ===============-->
    <script src="public/js/jscript.js"></script>

    <script>
        // Cart functionality
        const isLoggedIn = <?php echo isLoggedIn() ? 'true' : 'false'; ?>;

        function updateQuantity(itemId, change) {
            const quantityInput = document.querySelector(`[data-item-id="${itemId}"] .quantity-input`);
            let currentQuantity = parseInt(quantityInput.value);
            let newQuantity = currentQuantity + change;
            
            if (newQuantity < 1) newQuantity = 1;
            
            quantityInput.value = newQuantity;
            updateCartTotals();
            
            // Here you would typically send an AJAX request to update the server-side cart
            console.log(`Updated item ${itemId} quantity to ${newQuantity}`);
        }

        function setQuantity(itemId, quantity) {
            quantity = parseInt(quantity);
            if (quantity < 1) quantity = 1;
            
            const quantityInput = document.querySelector(`[data-item-id="${itemId}"] .quantity-input`);
            quantityInput.value = quantity;
            updateCartTotals();
            
            console.log(`Set item ${itemId} quantity to ${quantity}`);
        }

        function removeItem(itemId) {
            if (confirm('Are you sure you want to remove this item from your cart?')) {
                const cartItem = document.querySelector(`[data-item-id="${itemId}"]`);
                cartItem.remove();
                updateCartTotals();
                
                // Check if cart is empty
                const remainingItems = document.querySelectorAll('.cart-item');
                if (remainingItems.length === 0) {
                    location.reload(); // Reload to show empty cart message
                }
                
                console.log(`Removed item ${itemId} from cart`);
            }
        }

        function updateCartTotals() {
            let subtotal = 0;
            let itemCount = 0;
            
            document.querySelectorAll('.cart-item').forEach(item => {
                const price = parseFloat(item.querySelector('.cart-item__price').textContent.replace('$', '').replace(',', ''));
                const quantity = parseInt(item.querySelector('.quantity-input').value);
                subtotal += price * quantity;
                itemCount += quantity;
            });
            
            const tax = subtotal * 0.08;
            const shipping = subtotal > 1000 ? 0 : 50;
            const total = subtotal + tax + shipping;
            
            // Update display
            document.getElementById('subtotal').textContent = `$${subtotal.toFixed(2)}`;
            document.getElementById('tax').textContent = `$${tax.toFixed(2)}`;
            document.getElementById('total').textContent = `$${total.toFixed(2)}`;
            
            const shippingElement = document.getElementById('shipping');
            if (shipping === 0) {
                shippingElement.innerHTML = '<span style="color: var(--first-color);">FREE</span>';
            } else {
                shippingElement.textContent = `${shipping.toFixed(2)}`;
            }
            
            // Update items count in header
            const itemsHeader = document.querySelector('.cart-items__header h3');
            if (itemsHeader) {
                itemsHeader.textContent = `Items in Your Cart (${itemCount})`;
            }
        }

        function proceedToCheckout() {
            if (!isLoggedIn) {
                alert('Please login to proceed with checkout.');
                window.location.href = 'user/login.php?redirect=cart.php';
                return;
            }
            
            // Get cart items for checkout
            const cartItems = [];
            document.querySelectorAll('.cart-item').forEach(item => {
                const itemId = item.getAttribute('data-item-id');
                const name = item.querySelector('.cart-item__info h3').textContent;
                const price = parseFloat(item.querySelector('.cart-item__price').textContent.replace(', '').replace(',', ''));
                const quantity = parseInt(item.querySelector('.quantity-input').value);
                
                cartItems.push({
                    id: itemId,
                    name: name,
                    price: price,
                    quantity: quantity
                });
            });
            
            if (cartItems.length === 0) {
                alert('Your cart is empty.');
                return;
            }
            
            // Store cart data for checkout (in a real app, this would be handled server-side)
            sessionStorage.setItem('checkoutItems', JSON.stringify(cartItems));
            
            // Redirect to checkout page
            window.location.href = 'checkout.php';
        }

        function confirmLogout() {
            return confirm('Are you sure you want to logout?');
        }

        // Initialize page
        document.addEventListener('DOMContentLoaded', function() {
            // Update totals on page load
            if (isLoggedIn && document.querySelectorAll('.cart-item').length > 0) {
                updateCartTotals();
            }
            
            // Handle quantity input changes
            document.querySelectorAll('.quantity-input').forEach(input => {
                input.addEventListener('blur', function() {
                    const itemId = this.closest('.cart-item').getAttribute('data-item-id');
                    setQuantity(itemId, this.value);
                });
                
                input.addEventListener('keypress', function(e) {
                    if (e.key === 'Enter') {
                        this.blur();
                    }
                });
            });
            
            // Smooth scroll for back to top
            const scrollUp = document.getElementById('scroll-up');
            if (scrollUp) {
                scrollUp.addEventListener('click', function(e) {
                    e.preventDefault();
                    window.scrollTo({
                        top: 0,
                        behavior: 'smooth'
                    });
                });
            }
            
            // Show/hide scroll up button
            window.addEventListener('scroll', function() {
                if (scrollUp) {
                    if (window.scrollY >= 560) {
                        scrollUp.classList.add('show-scroll');
                    } else {
                        scrollUp.classList.remove('show-scroll');
                    }
                }
            });
        });

        // Enhanced dropdown functionality for mobile
        document.querySelectorAll('.nav__dropdown').forEach(dropdown => {
            dropdown.addEventListener('click', function(e) {
                if (window.innerWidth <= 767) {
                    e.preventDefault();
                    const menu = this.querySelector('.nav__dropdown-menu');
                    menu.style.display = menu.style.display === 'block' ? 'none' : 'block';
                }
            });
        });

        // Auto-save cart changes (simulate AJAX)
        function saveCartToServer() {
            // In a real application, this would send cart data to server
            const cartData = [];
            document.querySelectorAll('.cart-item').forEach(item => {
                const itemId = item.getAttribute('data-item-id');
                const quantity = parseInt(item.querySelector('.quantity-input').value);
                cartData.push({ id: itemId, quantity: quantity });
            });
            
            console.log('Saving cart to server:', cartData);
            // localStorage.setItem('cart', JSON.stringify(cartData)); // Don't use localStorage in artifacts
        }

        // Debounced save function
        let saveTimeout;
        function debouncedSave() {
            clearTimeout(saveTimeout);
            saveTimeout = setTimeout(saveCartToServer, 1000);
        }

        // Add event listeners for auto-save
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.quantity-input').forEach(input => {
                input.addEventListener('input', debouncedSave);
            });
        });
    </script>
</body>
</html>