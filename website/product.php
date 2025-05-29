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
    <!-- <link rel="stylesheet" href="public/css/about.css">
    <!--=============== css contact ===============-->
    <!-- <link rel="stylesheet" href="public/css/contact.css"> -->
    <!-- =============== css product =============== --> 
    <link rel="stylesheet" href="public/css/product.css">

    <title>Product Detail - Rolex</title>
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
                        <a href="product.php" class="nav__link active-link">Product Detail</a>
                    </li>
                    <li class="nav__item">
                        <a href="about.php" class="nav__link">About </a>
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
        <section class="breadcrumb">
            <div class="container">
                <div class="breadcrumb__container">
                    <a href="index.php" class="breadcrumb__link">Home</a>
                    <span class="breadcrumb__separator">/</span>
                    <a href="shop.php" class="breadcrumb__link">Shop</a>
                    <span class="breadcrumb__separator">/</span>
                    <span class="breadcrumb__current">Product Detail</span>
                </div>
            </div>
        </section>

        <!--==================== PRODUCT DETAIL ====================-->
        <section class="product-detail section container">
            <div class="product-detail__container grid">
                <div class="product-detail__images">
                    <div class="swiper product-swiper">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <img src="assets/img/product1.png" alt="Spirit Rose" class="product-detail__img" id="main-product-img">
                            </div>
                            <div class="swiper-slide">
                                <img src="assets/img/product1.png" alt="Spirit Rose Side View" class="product-detail__img">
                            </div>
                            <div class="swiper-slide">
                                <img src="assets/img/product1.png" alt="Spirit Rose Back View" class="product-detail__img">
                            </div>
                        </div>
                        <div class="swiper-button-next">
                            <i class='bx bx-chevron-right'></i>
                        </div>
                        <div class="swiper-button-prev">
                            <i class='bx bx-chevron-left'></i>
                        </div>
                    </div>

                    <div class="product-detail__thumbnails">
                        <img src="assets/img/product1.png" alt="Thumbnail 1" class="product-detail__thumbnail active" data-image="assets/img/product1.png">
                        <img src="assets/img/product2.png" alt="Thumbnail 2" class="product-detail__thumbnail" data-image="assets/img/product2.png">
                        <img src="assets/img/product3.png" alt="Thumbnail 3" class="product-detail__thumbnail" data-image="assets/img/product3.png">
                    </div>
                </div>

                <div class="product-detail__content">
                    <span class="product-detail__tag">Premium</span>
                    <h1 class="product-detail__title" id="product-title">Spirit Rose</h1>
                    
                    <div class="product-detail__rating">
                        <div class="stars">
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                            <i class='bx bx-star'></i>
                        </div>
                        <span class="rating-text">(4.5) 128 Reviews</span>
                    </div>
                    
                    <div class="product-detail__price">
                        <span class="price-current" id="product-price">$1500</span>
                        <span class="price-original">$1800</span>
                    </div>

                    <p class="product-detail__description">
                        Elegant and sophisticated timepiece crafted with precision. Features a rose gold finish with 
                        premium leather strap, sapphire crystal glass, and Swiss movement technology. Perfect for 
                        formal occasions and everyday elegance.
                    </p>

                    <div class="product-detail__options">
                        <div class="product-option">
                            <span class="option-label">Color:</span>
                            <div class="color-options">
                                <button class="color-option active" data-color="rose-gold" style="background: linear-gradient(45deg, #d4af37, #ffd700);"></button>
                                <button class="color-option" data-color="silver" style="background: linear-gradient(45deg, #c0c0c0, #e6e6e6);"></button>
                                <button class="color-option" data-color="black" style="background: linear-gradient(45deg, #2c2c2c, #4a4a4a);"></button>
                            </div>
                        </div>

                        <div class="product-option">
                            <span class="option-label">Size:</span>
                            <div class="size-options">
                                <button class="size-option" data-size="38mm">38mm</button>
                                <button class="size-option active" data-size="42mm">42mm</button>
                                <button class="size-option" data-size="46mm">46mm</button>
                            </div>
                        </div>
                    </div>

                    <div class="product-detail__quantity">
                        <span class="quantity-label">Quantity:</span>
                        <div class="quantity-controls">
                            <button class="quantity-btn" id="decrease-qty">
                                <i class='bx bx-minus'></i>
                            </button>
                            <span class="quantity-number" id="product-quantity">1</span>
                            <button class="quantity-btn" id="increase-qty">
                                <i class='bx bx-plus'></i>
                            </button>
                        </div>
                    </div>

                    <div class="product-detail__actions">
                        <button class="button button--primary add-to-cart-btn">
                            <i class='bx bx-cart-add'></i>
                            ADD TO CART
                        </button>
                        <button class="button button--secondary buy-now-btn">
                            BUY NOW
                        </button>
                        <button class="wishlist-btn">
                            <i class='bx bx-heart'></i>
                        </button>
                    </div>

                    <div class="product-detail__features">
                        <div class="feature">
                            <i class='bx bx-shield-check'></i>
                            <span>2 Year Warranty</span>
                        </div>
                        <div class="feature">
                            <i class='bx bx-refresh'></i>
                            <span>30 Day Return</span>
                        </div>
                        <div class="feature">
                            <i class='bx bx-car'></i>
                            <span>Free Shipping</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!--==================== PRODUCT TABS ====================-->
        <section class="product-tabs section container">
            <div class="tabs__nav">
                <button class="tab__btn active" data-tab="description">Description</button>
                <button class="tab__btn" data-tab="specifications">Specifications</button>
                <button class="tab__btn" data-tab="reviews">Reviews (128)</button>
            </div>

            <div class="tabs__content">
                <div class="tab__panel active" id="description">
                    <h3>Product Description</h3>
                    <p>
                        The Spirit Rose represents the pinnacle of horological craftsmanship, combining traditional 
                        Swiss watchmaking techniques with contemporary design elements. This exceptional timepiece 
                        features a meticulously crafted rose gold case that exudes luxury and sophistication.
                    </p>
                    <p>
                        Each watch is assembled by master craftsmen with over 20 years of experience, ensuring 
                        every detail meets our exacting standards. The dial features elegant Roman numerals and 
                        luminous hands for optimal readability in all lighting conditions.
                    </p>
                </div>

                <div class="tab__panel" id="specifications">
                    <h3>Technical Specifications</h3>
                    <ul class="specifications-list">
                        <li><strong>Movement:</strong> Swiss Automatic</li>
                        <li><strong>Case Material:</strong> Rose Gold Plated Stainless Steel</li>
                        <li><strong>Case Diameter:</strong> 42mm</li>
                        <li><strong>Water Resistance:</strong> 100m / 330ft</li>
                        <li><strong>Crystal:</strong> Sapphire Crystal</li>
                        <li><strong>Strap:</strong> Genuine Leather</li>
                        <li><strong>Power Reserve:</strong> 40 hours</li>
                        <li><strong>Functions:</strong> Hours, Minutes, Seconds, Date</li>
                    </ul>
                </div>

                <div class="tab__panel" id="reviews">
                    <div class="reviews-summary">
                        <div class="average-rating">
                            <span class="rating-number">4.5</span>
                            <div class="stars-large">
                                <i class='bx bxs-star'></i>
                                <i class='bx bxs-star'></i>
                                <i class='bx bxs-star'></i>
                                <i class='bx bxs-star'></i>
                                <i class='bx bx-star'></i>
                            </div>
                            <span class="total-reviews">Based on 128 reviews</span>
                        </div>
                    </div>

                    <div class="reviews-list">
                        <div class="review">
                            <div class="review-header">
                                <img src="assets/img/testimonial1.jpg" alt="User" class="review-avatar">
                                <div class="review-meta">
                                    <h4 class="review-name">John Smith</h4>
                                    <div class="review-rating">
                                        <i class='bx bxs-star'></i>
                                        <i class='bx bxs-star'></i>
                                        <i class='bx bxs-star'></i>
                                        <i class='bx bxs-star'></i>
                                        <i class='bx bxs-star'></i>
                                    </div>
                                    <span class="review-date">March 15, 2024</span>
                                </div>
                            </div>
                            <p class="review-text">
                                Excellent quality watch! The craftsmanship is outstanding and it looks even better 
                                in person. Highly recommend for anyone looking for a luxury timepiece.
                            </p>
                        </div>

                        <div class="review">
                            <div class="review-header">
                                <img src="assets/img/testimonial2.jpg" alt="User" class="review-avatar">
                                <div class="review-meta">
                                    <h4 class="review-name">Sarah Johnson</h4>
                                    <div class="review-rating">
                                        <i class='bx bxs-star'></i>
                                        <i class='bx bxs-star'></i>
                                        <i class='bx bxs-star'></i>
                                        <i class='bx bxs-star'></i>
                                        <i class='bx bx-star'></i>
                                    </div>
                                    <span class="review-date">March 10, 2024</span>
                                </div>
                            </div>
                            <p class="review-text">
                                Beautiful watch with elegant design. The rose gold finish is gorgeous and the 
                                strap is very comfortable. Great value for money!
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!--==================== RELATED PRODUCTS ====================-->
        <section class="related-products section container">
            <h2 class="section__title">Related Products</h2>

            <div class="products__container grid">
                <article class="products__card">
                    <img src="assets/img/product2.png" alt="" class="products__img">
                    <h3 class="products__title">Khaki Pilot</h3>
                    <span class="products__price">$1350</span>
                    <button class="products__button">
                        <i class='bx bx-shopping-bag'></i>
                    </button>
                </article>

                <article class="products__card">
                    <img src="assets/img/product3.png" alt="" class="products__img">
                    <h3 class="products__title">Jubilee Black</h3>
                    <span class="products__price">$870</span>
                    <button class="products__button">
                        <i class='bx bx-shopping-bag'></i>
                    </button>
                </article>

                <article class="products__card">
                    <img src="assets/img/product4.png" alt="" class="products__img">
                    <h3 class="products__title">Fosil Me3</h3>
                    <span class="products__price">$650</span>
                    <button class="products__button">
                        <i class='bx bx-shopping-bag'></i>
                    </button>
                </article>

                <article class="products__card">
                    <img src="assets/img/product5.png" alt="" class="products__img">
                    <h3 class="products__title">Duchen</h3>
                    <span class="products__price">$950</span>
                    <button class="products__button">
                        <i class='bx bx-shopping-bag'></i>
                    </button>
                </article>
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
                    <li><a href="#" class="footer__link">Support Center</a></li>
                    <li><a href="#" class="footer__link">Customer Support</a></li>
                    <li><a href="#" class="footer__link">About Us</a></li>
                    <li><a href="#" class="footer__link">Copy Right</a></li>
                </ul>
            </div>

            <div class="footer__content">
                <h3 class="footer__title">Product</h3>
                <ul class="footer__links">
                    <li><a href="#" class="footer__link">Luxury Watches</a></li>
                    <li><a href="#" class="footer__link">Sport Watches</a></li>
                    <li><a href="#" class="footer__link">Smart Watches</a></li>
                    <li><a href="#" class="footer__link">Accessories</a></li>
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

        <span class="footer__copy">&#169; Bedimcode. All rights reserved</span>
    </footer>

    <!--=============== SCROLL UP ===============-->
    <a href="#" class="scrollup" id="scroll-up">
        <i class='bx bx-up-arrow-alt scrollup__icon'></i>
    </a>

    <!--=============== SWIPER JS ===============-->
    <script src="public/js/swiper-bundle.min.js"></script>

    <!--=============== MAIN JS ===============-->
    <script src="public/js/jscript.js"></script>

    <!--=============== PRODUCT JS ===============-->
    <script src="public/js/product.js"></script>
</body>
</html>