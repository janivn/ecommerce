<?php
// You can add any PHP logic here if needed
$page_title = "About Us - Rolex Watch Store";
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
    <!--=============== about CSS ===============-->
    <link rel="stylesheet" href="public/css/about.css">



    <title><?php echo $page_title; ?></title>
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
                        <a href="about.php" class="nav__link active-link">About </a>
                    </li>
                    <li class="nav__item">
                        <a href="contact.php" class="nav__link">Contact Us</a>
                    </li>
                    <!-- User Dropdown Start -->
                    <li class="nav__item nav__dropdown">
                        <a href="#" class="nav__link">Account <i class='bx bx-chevron-down'></i></a>
                        <ul class="nav__dropdown-menu">
                            <li><a href="user/register.php" class="nav__link">Register</a></li>
                            <li><a href="user/login.php" class="nav__link">Login</a></li>
                        </ul>
                    </li>
                    <!-- User Dropdown End -->
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
                </div>

                <div class="nav__toggle" id="nav-toggle">
                    <i class='bx bx-grid-alt'></i>
                </div>
            </div>
        </nav>
    </header>

    <!--==================== CART ====================-->
    <div class="cart" id="cart">
        <i class='bx bx-x cart__close' id="cart-close"></i>

        <h2 class="cart__title-center">My Cart</h2>

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
        </div>

        <div class="cart__prices">
            <span class="cart__prices-item">1 item</span>
            <span class="cart__prices-total">$1050</span>
        </div>
    </div>

    <!--==================== MAIN ====================-->
    <main class="main">
        <!--==================== ABOUT HERO ====================-->
        <section class="about-hero section">
            <div class="about-hero__container container">
                <div class="about-hero__data">
                    <h1 class="about-hero__title">About Our Story</h1>
                    <p class="about-hero__description">
                        Discover the passion and craftsmanship behind our inspirational watch collection.
                    </p>
                </div>
            </div>
        </section>

        <!--==================== STORY EXPANDED ====================-->
        <section class="story section container">
            <div class="story__container grid">
                <div class="story__data"> 
                    <h2 class="section__title story__section-title">
                        Our Heritage
                    </h2>

                    <h1 class="story__title">
                        Inspirational Watch of <br> this year
                    </h1>

                    <p class="story__description">
                        The latest and modern watches of this year, is available in various 
                        presentations in this store, discover them now. Our commitment to excellence 
                        has been unwavering since our founding, bringing you timepieces that combine 
                        traditional craftsmanship with contemporary design.
                    </p>

                    <a href="shop.php" class="button button--small">Explore Collection</a>
                </div>

                <div class="story__images">
                    <img src="assets/img/story.png" alt="" class="story__img">
                    <div class="story__square"></div>
                </div>
            </div>
        </section>

        <!--==================== MISSION & VISION ====================-->
        <section class="mission section container">
            <div class="mission__container grid">
                <div class="mission__content">
                    <div class="mission__data">
                        <i class='bx bx-target-lock mission__icon'></i>
                        <h3 class="mission__title">Our Mission</h3>
                        <p class="mission__description">
                            To provide exceptional timepieces that combine precision, elegance, and innovation. 
                            We strive to offer watches that not only tell time but tell your story.
                        </p>
                    </div>

                    <div class="mission__data">
                        <i class='bx bx-diamond mission__icon'></i>
                        <h3 class="mission__title">Our Vision</h3>
                        <p class="mission__description">
                            To become the leading destination for premium watches, known for our curated 
                            selection, exceptional customer service, and commitment to quality craftsmanship.
                        </p>
                    </div>

                    <div class="mission__data">
                        <i class='bx bx-heart mission__icon'></i>
                        <h3 class="mission__title">Our Values</h3>
                        <p class="mission__description">
                            Quality, integrity, and customer satisfaction are at the heart of everything we do. 
                            We believe in building lasting relationships through trust and excellence.
                        </p>
                    </div>
                </div>

                <div class="mission__images">
                    <img src="assets/img/home.png" alt="" class="mission__img">
                </div>
            </div>
        </section>

        <!--==================== TEAM ====================-->
        <section class="team section container">
            <h2 class="section__title">Our Team</h2>
            
            <div class="team__container grid">
                <article class="team__card">
                    <div class="team__img-container">
                        <img src="assets/img/testimonial1.jpg" alt="" class="team__img">
                    </div>
                    <div class="team__data">
                        <h3 class="team__name">John Smith</h3>
                        <span class="team__position">Founder & CEO</span>
                        <p class="team__description">
                            With over 20 years in the watch industry, John brings passion and expertise to our collection.
                        </p>
                        <div class="team__social">
                            <a href="#" class="team__social-link">
                                <i class='bx bxl-linkedin'></i>
                            </a>
                            <a href="#" class="team__social-link">
                                <i class='bx bxl-twitter'></i>
                            </a>
                        </div>
                    </div>
                </article>

                <article class="team__card">
                    <div class="team__img-container">
                        <img src="assets/img/testimonial2.jpg" alt="" class="team__img">
                    </div>
                    <div class="team__data">
                        <h3 class="team__name">Sarah Johnson</h3>
                        <span class="team__position">Head of Design</span>
                        <p class="team__description">
                            Sarah curates our collection with an eye for timeless elegance and modern innovation.
                        </p>
                        <div class="team__social">
                            <a href="#" class="team__social-link">
                                <i class='bx bxl-linkedin'></i>
                            </a>
                            <a href="#" class="team__social-link">
                                <i class='bx bxl-instagram'></i>
                            </a>
                        </div>
                    </div>
                </article>

                <article class="team__card">
                    <div class="team__img-container">
                        <img src="assets/img/testimonial3.jpg" alt="" class="team__img">
                    </div>
                    <div class="team__data">
                        <h3 class="team__name">Michael Chen</h3>
                        <span class="team__position">Master Watchmaker</span>
                        <p class="team__description">
                            Michael ensures every timepiece meets our highest standards of precision and quality.
                        </p>
                        <div class="team__social">
                            <a href="#" class="team__social-link">
                                <i class='bx bxl-linkedin'></i>
                            </a>
                            <a href="#" class="team__social-link">
                                <i class='bx bxl-facebook'></i>
                            </a>
                        </div>
                    </div>
                </article>
            </div>
        </section>

        <!--==================== FEATURES ====================-->
        <section class="features section container">
            <h2 class="section__title">Why Choose Us</h2>
            
            <div class="features__container grid">
                <div class="features__content">
                    <i class='bx bx-shield-check features__icon'></i>
                    <h3 class="features__title">Authenticity Guaranteed</h3>
                    <p class="features__description">
                        Every watch in our collection is authentic and comes with proper documentation and warranty.
                    </p>
                </div>

                <div class="features__content">
                    <i class='bx bx-support features__icon'></i>
                    <h3 class="features__title">Expert Support</h3>
                    <p class="features__description">
                        Our knowledgeable team provides expert advice to help you find the perfect timepiece.
                    </p>
                </div>

                <div class="features__content">
                    <i class='bx bx-time features__icon'></i>
                    <h3 class="features__title">Lifetime Service</h3>
                    <p class="features__description">
                        We offer comprehensive after-sales service and maintenance for all our watches.
                    </p>
                </div>

                <div class="features__content">
                    <i class='bx bx-package features__icon'></i>
                    <h3 class="features__title">Secure Shipping</h3>
                    <p class="features__description">
                        Fast, secure, and insured shipping ensures your watch arrives safely and on time.
                    </p>
                </div>
            </div>
        </section>

        <!--==================== CALL TO ACTION ====================-->
        <section class="cta section container">
            <div class="cta__container">
                <div class="cta__data">
                    <h2 class="cta__title">Ready to Find Your Perfect Watch?</h2>
                    <p class="cta__description">
                        Explore our curated collection of premium timepieces and discover the watch that tells your story.
                    </p>
                    <div class="cta__buttons">
                        <a href="shop.php" class="button">Shop Now</a>
                        <a href="contact.php" class="button button--gray">Contact Us</a>
                    </div>
                </div>
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
                        <a href="#" class="footer__link">Support Center</a>
                    </li>
                    <li>
                        <a href="#" class="footer__link">Customer Support</a>
                    </li>
                    <li>
                        <a href="about.php" class="footer__link">About Us</a>
                    </li>
                    <li>
                        <a href="#" class="footer__link">Copy Right</a>
                    </li>
                </ul>
            </div>

            <div class="footer__content">
                <h3 class="footer__title">Product</h3>

                <ul class="footer__links">
                    <li>
                        <a href="#" class="footer__link">Luxury Watches</a>
                    </li>
                    <li>
                        <a href="#" class="footer__link">Sport Watches</a>
                    </li>
                    <li>
                        <a href="#" class="footer__link">Classic Watches</a>
                    </li>
                    <li>
                        <a href="#" class="footer__link">Accessories</a>
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

        <span class="footer__copy">&#169; Bedimcode. All rigths reserved</span>
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