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
    <link rel="stylesheet" href="public/css/contact.css">

    <title>Contact Us - Watches</title>
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
                        <a href="about.php" class="nav__link">About Us</a>
                    </li>
                    <li class="nav__item">
                        <a href="contact.php" class="nav__link active-link">Contact Us</a>
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
    </div>

    <!--==================== MAIN ====================-->
    <main class="main">
        <!--==================== CONTACT HERO ====================-->
        <section class="contact-hero section">
            <div class="contact-hero__container container">
                <div class="contact-hero__data">
                    <h1 class="contact-hero__title">Get In Touch</h1>
                    <p class="contact-hero__description">
                        Have questions about our luxury watches? We're here to help you find the perfect timepiece.
                    </p>
                </div>
            </div>
        </section>

        <!--==================== CONTACT INFO ====================-->
        <section class="contact-info section container">
            <div class="contact-info__container grid">
                <div class="contact-info__card">
                    <i class='bx bx-map contact-info__icon'></i>
                    <h3 class="contact-info__title">Our Location</h3>
                    <p class="contact-info__description">
                        1234 - Peru<br>
                        La Libertad 43210
                    </p>
                </div>

                <div class="contact-info__card">
                    <i class='bx bx-phone contact-info__icon'></i>
                    <h3 class="contact-info__title">Call Us</h3>
                    <p class="contact-info__description">
                        +51 123-456-789<br>
                        Mon - Fri: 9:00 AM - 6:00 PM
                    </p>
                </div>

                <div class="contact-info__card">
                    <i class='bx bx-envelope contact-info__icon'></i>
                    <h3 class="contact-info__title">Email Us</h3>
                    <p class="contact-info__description">
                        info@rolexwatches.com<br>
                        support@rolexwatches.com
                    </p>
                </div>
            </div>
        </section>

        <!--==================== CONTACT FORM ====================-->
        <section class="contact-form section container">
            <div class="contact-form__container grid">
                <div class="contact-form__data">
                    <h2 class="section__title">Send Us A Message</h2>
                    <p class="contact-form__description">
                        Fill out the form below and we'll get back to you as soon as possible.
                    </p>

                    <form action="" class="contact-form__form" method="POST">
                        <div class="contact-form__group">
                            <input type="text" name="name" placeholder="Your Name" class="contact-form__input" required>
                        </div>

                        <div class="contact-form__group">
                            <input type="email" name="email" placeholder="Your Email" class="contact-form__input" required>
                        </div>

                        <div class="contact-form__group">
                            <input type="text" name="subject" placeholder="Subject" class="contact-form__input" required>
                        </div>

                        <div class="contact-form__group">
                            <textarea name="message" placeholder="Your Message" class="contact-form__textarea" rows="5" required></textarea>
                        </div>

                        <button type="submit" class="button contact-form__button">Send Message</button>
                    </form>
                </div>

                <div class="contact-form__image">
                    <img src="assets/img/story.png" alt="Contact us" class="contact-form__img">
                    <div class="contact-form__square"></div>
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

                <form action="" class="newsletter__form">
                    <input type="email" placeholder="Enter your email" class="newsletter__input">
                    <button class="button">SUBSCRIBE</button>
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
                        <a href="#" class="footer__link">Support Center</a>
                    </li>
                    <li>
                        <a href="#" class="footer__link">Customer Support</a>
                    </li>
                    <li>
                        <a href="#" class="footer__link">About Us</a>
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
                        <a href="#" class="footer__link">Road bikes</a>
                    </li>
                    <li>
                        <a href="#" class="footer__link">Mountain bikes</a>
                    </li>
                    <li>
                        <a href="#" class="footer__link">Electric bikes</a>
                    </li>
                    <li>
                        <a href="#" class="footer__link">Accesories</a>
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