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
        // You can add additional validation here like checking if user exists in database
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

// Debug: Check session status (remove this in production)
// echo "<!-- Session Debug: ";
// print_r($_SESSION);
// echo " -->";
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

    <!--=============== SWIPER CSS ===============--> 
    <link rel="stylesheet" href="assets/css/swiper-bundle.min.css">

    <!--=============== CSS ===============-->
    <link rel="stylesheet" href="public/css/index.css">
    <!--=============== css about ===============-->
    <link rel="stylesheet" href="public/css/about.css">
      <!--=============== css contact ===============-->
      <link rel="stylesheet" href="public/css/contact.css">

    <title>Watches - Rolex Collection</title>
    

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
                        <a href="index.php" class="nav__link active-link">Home</a>
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
                    
                    <!-- User Authentication Section -->
                    <?php if (isLoggedIn()): ?>
                        Welcome Message
                        <li class="nav__item">
                            <span class="nav__user-greeting">
                                 <?php 
                                $fullName = getUserDisplayName();
                                $firstName = explode(' ', trim($fullName))[0];
                                echo htmlspecialchars($firstName); 
                            ?>!
                            </span>
                        </li>
                        
                        <!-- Dashboard Link (prominent display when logged in) -->
                        <li class="nav__item">
                            <a href="..user/dashboard.php" class="nav__link nav__dashboard">
                                <i class='bx bx-tachometer'></i> Dashboard
                            </a>
                        </li>
                        
                        <!-- User Menu Dropdown -->
                        <li class="nav__item nav__dropdown">
                            <a href="#" class="nav__link">
                                <i class='bx bx-cog'></i> Account <i class='bx bx-chevron-down'></i>
                            </a>
                            <ul class="nav__dropdown-menu">
                                <li><a href="/user/account_setting.php" class="nav__link">
                                    <i class='bx bx-cog'></i> Account Settings
                                </a></li>
                                <li><a href="/user/cart.php" class="nav__link">
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
                        <!-- Account Dropdown (shown when not logged in) -->
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
                <!-- Theme change button -->
                <i class='bx bx-moon change-theme' id="theme-button"></i>

                <div class="nav__shop" id="cart-shop">
                    <i class='bx bx-shopping-bag'></i>
                    <?php if (isLoggedIn()): ?>
                        <span class="cart-count" id="cart-count">0</span>
                    <?php endif; ?>
                </div>

                <div class="nav__toggle" id="nav-toggle">
                    <i class='bx bx-grid-alt'></i>
                </div>
            </div>
        </nav>
    </header>

    <!-- Success Message (for login notifications) -->
    <div class="success-message" id="success-message">
        Welcome back! You are now logged in.
    </div>

    <!--==================== CART ====================-->
    <div class="cart" id="cart">
        <i class='bx bx-x cart__close' id="cart-close"></i>

        <h2 class="cart__title-center">My Cart</h2>

        <?php if (isLoggedIn()): ?>
            <div class="cart__user-info">
                <p><i class='bx bx-user'></i> Shopping as: <strong><?php echo htmlspecialchars(getUserDisplayName()); ?></strong></p>
            </div>
        <?php endif; ?>

        <div class="cart__container">
            <article class="cart__card">
                <div class="cart__box">
                    <img src="assets/img/featured1.png" alt="" class="cart__img">
                </div>

                <div class="cart__details">
                    <h3 class="cart__title">Jazzmaster</h3>
                    <span class="cart__price">$1050</span>

                    <div class="cart__amount">
                        <div class="cart__amount-content">
                            <span class="cart__amount-box">
                                <i class='bx bx-minus' ></i>
                            </span>

                            <span class="cart__amount-number">1</span>

                            <span class="cart__amount-box">
                                <i class='bx bx-plus' ></i>
                            </span>
                        </div>

                        <i class='bx bx-trash-alt cart__amount-trash' ></i>
                    </div>
                </div>
            </article>
            
            <article class="cart__card">
                <div class="cart__box">
                    <img src="assets/img/featured3.png" alt="" class="cart__img">
                </div>

                <div class="cart__details">
                    <h3 class="cart__title">Rose Gold</h3>
                    <span class="cart__price">$850</span>

                    <div class="cart__amount">
                        <div class="cart__amount-content">
                            <span class="cart__amount-box">
                                <i class='bx bx-minus' ></i>
                            </span>

                            <span class="cart__amount-number">1</span>

                            <span class="cart__amount-box">
                                <i class='bx bx-plus' ></i>
                            </span>
                        </div>

                        <i class='bx bx-trash-alt cart__amount-trash' ></i>
                    </div>
                </div>
            </article>

            <article class="cart__card">
                <div class="cart__box">
                    <img src="assets/img/new1.png" alt="" class="cart__img">
                </div>

                <div class="cart__details">
                    <h3 class="cart__title">Longines Rose</h3>
                    <span class="cart__price">$980</span>

                    <div class="cart__amount">
                        <div class="cart__amount-content">
                            <span class="cart__amount-box">
                                <i class='bx bx-minus' ></i>
                            </span>

                            <span class="cart__amount-number">1</span>

                            <span class="cart__amount-box">
                                <i class='bx bx-plus' ></i>
                            </span>
                        </div>

                        <i class='bx bx-trash-alt cart__amount-trash' ></i>
                    </div>
                </div>
            </article>
        </div>

        <div class="cart__prices">
            <span class="cart__prices-item">3 items</span>
            <span class="cart__prices-total">$2880</span>
        </div>

        <?php if (isLoggedIn()): ?>
            <div class="cart__checkout">
                <button class="button cart__button-checkout">Proceed to Checkout</button>
            </div>
        <?php else: ?>
            <div class="cart__login-prompt">
                <p>Please login to proceed with checkout</p>
                <a href="user/login.php" class="button">Login to Checkout</a>
            </div>
        <?php endif; ?>
    </div>

    <!--==================== MAIN ====================-->
    <main class="main">
        <!--==================== HOME ====================-->
        <section class="home" id="home">
            <div class="home__container container grid">
                <div class="home__img-bg">
                    <img src="assets/img/home.png" alt="" class="home__img">
                </div>

                <div class="home__social">
                    <a href="https://www.facebook.com/" target="_blank" class="home__social-link">
                        Facebook
                    </a>
                    <a href="https://twitter.com/" target="_blank" class="home__social-link">
                        Twitter
                    </a>
                    <a href="https://www.instagram.com/" target="_blank" class="home__social-link">
                        Instagram
                    </a>
                </div>

                <div class="home__data">
                    <h1 class="home__title">NEW WATCH <br> COLLECTIONS B720</h1>
                    <p class="home__description">
                        Latest arrival of the new imported watches of the B720 series, 
                        with a modern and resistant design.
                    </p>
                    <span class="home__price">$1245</span>

                    <div class="home__btns">
                        <a href="shop.php" class="button button--gray button--small">
                            Discover
                        </a>

                        <button class="button home__button" onclick="addToCart('B720', 1245)">ADD TO CART</button>
                    </div>
                </div>
            </div>
        </section>
        
        <!--==================== NEWSLETTER ====================-->
        <section class="newsletter section container">
            <div class="newsletter__container grid">
                <h2 class="section__title newsletter__title">
                    Subscribe Our <br> Newsletter
                </h2>

                <p class="newsletter__description">
                    Don't miss out on your discounts. Subscribe to our email
                    newsletter to get the best offers, discounts, coupons, 
                    gifts and much more.
                </p>

                <form action="newsletter_subscribe.php" method="POST" class="newsletter__form" id="newsletter-form">
                    <input type="email" name="email" placeholder="Enter your email" class="newsletter__input" required>
                    <button type="submit" class="button">SUBSCRIBE</button>
                </form>
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
                    <li>
                        <a href="support.php" class="footer__link">Support Center</a>
                    </li>
                    <li>
                        <a href="customer-support.php" class="footer__link">Customer Support</a>
                    </li>
                    <li>
                        <a href="about.php" class="footer__link">About Us</a>
                    </li>
                    <li>
                        <a href="copyright.php" class="footer__link">Copyright</a>
                    </li>
                </ul>
            </div>

            <div class="footer__content">
                <h3 class="footer__title">Product</h3>

                <ul class="footer__links">
                    <li>
                        <a href="category.php?type=luxury" class="footer__link">Luxury Watches</a>
                    </li>
                    <li>
                        <a href="category.php?type=sport" class="footer__link">Sport Watches</a>
                    </li>
                    <li>
                        <a href="category.php?type=classic" class="footer__link">Classic Watches</a>
                    </li>
                    <li>
                        <a href="accessories.php" class="footer__link">Accessories</a>
                    </li>
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

    <!--=============== SWIPER JS ===============-->
    <script src="public/js/swiper-bundle.min.js"></script>

    <!--=============== MAIN JS ===============-->
    <script src="public/js/jscript.js"></script>

</body>
</html>