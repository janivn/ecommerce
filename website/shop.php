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
    <link rel="stylesheet" href="public/css/shop.css">

    <title>Shop - Rolex Watches</title>
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
                        <a href="shop.php" class="nav__link active-link">Shop</a>
                    </li>
                    <li class="nav__item">
                        <a href="product.php" class="nav__link">Product Detail</a>
                    </li>
                    <li class="nav__item">
                        <a href="about.php" class="nav__link">About Us</a>
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
        <!--==================== SHOP HERO ====================-->
        <section class="shop-hero section">
            <div class="shop-hero__container container">
                <div class="shop-hero__data">
                    <h1 class="shop-hero__title">Premium Watch Collection</h1>
                    <p class="shop-hero__description">
                        Discover our exclusive collection of luxury timepieces, featuring the finest craftsmanship and timeless elegance.
                    </p>
                </div>
            </div>
        </section>

        <!--==================== SHOP FILTERS ====================-->
        <section class="shop-filters section container">
            <div class="shop-filters__container">
                <h3 class="shop-filters__title">Filter by Category</h3>
                <div class="shop-filters__buttons">
                    <button class="shop-filter__btn active" data-filter="all">All Watches</button>
                    <button class="shop-filter__btn" data-filter="luxury">Luxury</button>
                    <button class="shop-filter__btn" data-filter="sport">Sport</button>
                    <button class="shop-filter__btn" data-filter="classic">Classic</button>
                    <button class="shop-filter__btn" data-filter="new">New Arrivals</button>
                </div>
                
                <div class="shop-filters__sort">
                    <select class="shop-sort__select">
                        <option value="default">Sort by Default</option>
                        <option value="price-low">Price: Low to High</option>
                        <option value="price-high">Price: High to Low</option>
                        <option value="name">Name: A to Z</option>
                    </select>
                </div>
            </div>
        </section>

        <!--==================== SHOP PRODUCTS ====================-->
        <section class="shop section container" id="shop">
            <div class="shop__container grid">
                <!-- Featured Products from Index -->
                <article class="shop__card" data-category="luxury">
                    <span class="shop__tag sale">Sale</span>
                    <img src="assets/img/featured1.png" alt="" class="shop__img">
                    <div class="shop__data">
                        <h3 class="shop__title">Jazzmaster</h3>
                        <span class="shop__price">$1050</span>
                        <div class="shop__rating">
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                        </div>
                    </div>
                    <button class="button shop__button">ADD TO CART</button>
                </article>

                <article class="shop__card" data-category="sport">
                    <span class="shop__tag sale">Sale</span>
                    <img src="assets/img/featured2.png" alt="" class="shop__img">
                    <div class="shop__data">
                        <h3 class="shop__title">Ingersoll</h3>
                        <span class="shop__price">$250</span>
                        <div class="shop__rating">
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                            <i class='bx bx-star'></i>
                        </div>
                    </div>
                    <button class="button shop__button">ADD TO CART</button>
                </article>

                <article class="shop__card" data-category="luxury">
                    <span class="shop__tag sale">Sale</span>
                    <img src="assets/img/featured3.png" alt="" class="shop__img">
                    <div class="shop__data">
                        <h3 class="shop__title">Rose Gold</h3>
                        <span class="shop__price">$890</span>
                        <div class="shop__rating">
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                        </div>
                    </div>
                    <button class="button shop__button">ADD TO CART</button>
                </article>

                <!-- Products from Index -->
                <article class="shop__card" data-category="luxury">
                    <span class="shop__tag">Premium</span>
                    <img src="assets/img/product1.png" alt="" class="shop__img">
                    <div class="shop__data">
                        <h3 class="shop__title">Spirit Rose</h3>
                        <span class="shop__price">$1500</span>
                        <div class="shop__rating">
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                        </div>
                    </div>
                    <button class="button shop__button">ADD TO CART</button>
                </article>

                <article class="shop__card" data-category="sport">
                    <img src="assets/img/product2.png" alt="" class="shop__img">
                    <div class="shop__data">
                        <h3 class="shop__title">Khaki Pilot</h3>
                        <span class="shop__price">$1350</span>
                        <div class="shop__rating">
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                            <i class='bx bx-star'></i>
                        </div>
                    </div>
                    <button class="button shop__button">ADD TO CART</button>
                </article>

                <article class="shop__card" data-category="classic">
                    <img src="assets/img/product3.png" alt="" class="shop__img">
                    <div class="shop__data">
                        <h3 class="shop__title">Jubilee Black</h3>
                        <span class="shop__price">$870</span>
                        <div class="shop__rating">
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                            <i class='bx bx-star'></i>
                        </div>
                    </div>
                    <button class="button shop__button">ADD TO CART</button>
                </article>

                <article class="shop__card" data-category="classic">
                    <img src="assets/img/product4.png" alt="" class="shop__img">
                    <div class="shop__data">
                        <h3 class="shop__title">Fossil ME3</h3>
                        <span class="shop__price">$650</span>
                        <div class="shop__rating">
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                            <i class='bx bx-star'></i>
                            <i class='bx bx-star'></i>
                        </div>
                    </div>
                    <button class="button shop__button">ADD TO CART</button>
                </article>

                <article class="shop__card" data-category="luxury">
                    <img src="assets/img/product5.png" alt="" class="shop__img">
                    <div class="shop__data">
                        <h3 class="shop__title">Duchen</h3>
                        <span class="shop__price">$950</span>
                        <div class="shop__rating">
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                            <i class='bx bx-star'></i>
                        </div>
                    </div>
                    <button class="button shop__button">ADD TO CART</button>
                </article>

                <!-- New Arrivals from Index -->
                <article class="shop__card" data-category="new">
                    <span class="shop__tag new">New</span>
                    <img src="assets/img/new1.png" alt="" class="shop__img">
                    <div class="shop__data">
                        <h3 class="shop__title">Longines Rose</h3>
                        <span class="shop__price">$980</span>
                        <div class="shop__rating">
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                        </div>
                    </div>
                    <button class="button shop__button">ADD TO CART</button>
                </article>

                <article class="shop__card" data-category="new">
                    <span class="shop__tag new">New</span>
                    <img src="assets/img/new2.png" alt="" class="shop__img">
                    <div class="shop__data">
                        <h3 class="shop__title">Jazzmaster</h3>
                        <span class="shop__price">$1100</span>
                        <div class="shop__rating">
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                            <i class='bx bx-star'></i>
                        </div>
                    </div>
                    <button class="button shop__button">ADD TO CART</button>
                </article>

                <article class="shop__card" data-category="new sport">
                    <span class="shop__tag new">New</span>
                    <img src="assets/img/new3.png" alt="" class="shop__img">
                    <div class="shop__data">
                        <h3 class="shop__title">Swiss Military</h3>
                        <span class="shop__price">$1350</span>
                        <div class="shop__rating">
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                        </div>
                    </div>
                    <button class="button shop__button">ADD TO CART</button>
                </article>

                <article class="shop__card" data-category="new luxury">
                    <span class="shop__tag new">New</span>
                    <img src="assets/img/new4.png" alt="" class="shop__img">
                    <div class="shop__data">
                        <h3 class="shop__title">Baume & Mercier</h3>
                        <span class="shop__price">$1200</span>
                        <div class="shop__rating">
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                        </div>
                    </div>
                    <button class="button shop__button">ADD TO CART</button>
                </article>
            </div>

            <!-- Pagination -->
            <div class="shop__pagination">
                <button class="shop__pagination-btn active">1</button>
                <button class="shop__pagination-btn">2</button>
                <button class="shop__pagination-btn">3</button>
                <button class="shop__pagination-btn">
                    <i class='bx bx-chevron-right'></i>
                </button>
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
     <!--=============== shop JS ===============-->
     <script src="public/js/shop.js"></script>


</body>
</html>