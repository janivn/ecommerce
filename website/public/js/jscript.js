/*=============== SHOW MENU ===============*/
const navMenu = document.getElementById('nav-menu');
const navToggle = document.getElementById('nav-toggle');
const navClose = document.getElementById('nav-close');

/* Menu show */
if (navToggle) {
    navToggle.addEventListener('click', () => {
        navMenu.classList.add('show-menu');
    });
}

/* Menu hidden */
if (navClose) {
    navClose.addEventListener('click', () => {
        navMenu.classList.remove('show-menu');
    });
}

/*=============== REMOVE MENU MOBILE ===============*/
const navLink = document.querySelectorAll('.nav__link');

const linkAction = () => {
    if (navMenu) {
        navMenu.classList.remove('show-menu');
    }
};

navLink.forEach(n => n.addEventListener('click', linkAction));

/*=============== CHANGE BACKGROUND HEADER ===============*/
const scrollHeader = () => {
    const header = document.getElementById('header');
    if (header) {
        header.classList.toggle('scroll-header', window.scrollY >= 50);
    }
};

window.addEventListener('scroll', scrollHeader);

/*=============== TESTIMONIAL SWIPER ===============*/
if (typeof Swiper !== 'undefined') {
    const testimonialSwiper = new Swiper(".testimonial-swiper", {
        spaceBetween: 30,
        loop: true,
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
    });
}

/*=============== NEW SWIPER ===============*/
if (typeof Swiper !== 'undefined') {
    const newSwiper = new Swiper(".new-swiper", {
        spaceBetween: 24,
        loop: true,
        breakpoints: {
            576: { slidesPerView: 2 },
            768: { slidesPerView: 3 },
            1024: { slidesPerView: 4 },
        },
    });
}

/*=============== SCROLL SECTIONS ACTIVE LINK ===============*/
const sections = document.querySelectorAll('section[id]');

const scrollActive = () => {
    const scrollDown = window.scrollY;

    sections.forEach(current => {
        const sectionHeight = current.offsetHeight;
        const sectionTop = current.offsetTop - 58;
        const sectionId = current.getAttribute('id');
        const sectionsClass = document.querySelector(`.nav__menu a[href*="${sectionId}"]`);

        if (sectionsClass) {
            sectionsClass.classList.toggle('active-link', scrollDown > sectionTop && scrollDown <= sectionTop + sectionHeight);
        }
    });
};

window.addEventListener('scroll', scrollActive);

/*=============== SHOW SCROLL UP ===============*/ 
const scrollUp = () => {
    const scrollUpElement = document.getElementById('scroll-up');
    if (scrollUpElement) {
        scrollUpElement.classList.toggle('show-scroll', window.scrollY >= 350);
    }
};

window.addEventListener('scroll', scrollUp);

/*=============== SHOW CART ===============*/
const cart = document.getElementById('cart');
const cartShop = document.getElementById('cart-shop');
const cartClose = document.getElementById('cart-close');

if (cartShop && cart) {
    cartShop.addEventListener('click', () => {
        cart.classList.add('show-cart');
    });
}

if (cartClose && cart) {
    cartClose.addEventListener('click', () => {
        cart.classList.remove('show-cart');
    });
}

/*=============== DARK LIGHT THEME ===============*/ 
const themeButton = document.getElementById('theme-button');
const darkTheme = 'dark-theme';
const iconTheme = 'bx-sun';

if (themeButton) {
    let selectedTheme = localStorage.getItem('selected-theme');
    let selectedIcon = localStorage.getItem('selected-icon');

    const getCurrentTheme = () => document.body.classList.contains(darkTheme) ? 'dark' : 'light';
    const getCurrentIcon = () => themeButton.classList.contains(iconTheme) ? 'bx-sun' : 'bx-moon';

    if (selectedTheme) {
        document.body.classList.toggle(darkTheme, selectedTheme === 'dark');
        themeButton.classList.toggle(iconTheme, selectedIcon === 'bx-sun');
    }

    themeButton.addEventListener('click', () => {
        document.body.classList.toggle(darkTheme);
        themeButton.classList.toggle(iconTheme);
        
        localStorage.setItem('selected-theme', getCurrentTheme());
        localStorage.setItem('selected-icon', getCurrentIcon());
    });
}

/*=============== ACTIVE NAVIGATION LINK ===============*/
document.addEventListener('DOMContentLoaded', () => {
    const navLinks = document.querySelectorAll('.nav__link');
    const currentPage = window.location.pathname.split('/').pop();

    navLinks.forEach(link => {
        if (link.getAttribute('href') === currentPage) {
            link.classList.add('active');
        }
    });
});

// Modal Functions
const showModal = (modalId) => {
    const modal = document.getElementById(modalId);
    if (modal) {
        modal.style.display = 'block';
    }
};

const closeModal = (modalId) => {
    const modal = document.getElementById(modalId);
    if (modal) {
        modal.style.display = 'none';
    }
};

// Close modal when clicking outside of it
window.addEventListener('click', (event) => {
    const registerModal = document.getElementById('registerModal');
    const loginModal = document.getElementById('loginModal');
    
    if (registerModal && event.target === registerModal) {
        closeModal('registerModal');
    }
    if (loginModal && event.target === loginModal) {
        closeModal('loginModal');
    }
});

// Handle form submissions
document.addEventListener('DOMContentLoaded', () => {
    const registerForm = document.getElementById('registerForm');
    const loginForm = document.getElementById('loginForm');
    
    if (registerForm) {
        registerForm.addEventListener('submit', (e) => {
            e.preventDefault();
            alert('Register form submitted!');
            closeModal('registerModal');
        });
    }
    
    if (loginForm) {
        loginForm.addEventListener('submit', (e) => {
            e.preventDefault();
            alert('Login form submitted!');
            closeModal('loginModal');
        });
    }
});

// Login status check and protected links
document.addEventListener('DOMContentLoaded', () => {
    let isLoggedIn = false;
    try {
        isLoggedIn = typeof window.userLoggedIn !== 'undefined' ? window.userLoggedIn : false;
    } catch (e) {
        console.warn('User  login status not available');
    }

    document.querySelectorAll('.protected-link').forEach(link => {
        link.addEventListener('click', function(e) {
            if (!isLoggedIn) {
                e.preventDefault();
                alert('Please log in to access this feature.');
                showModal('loginModal');
            }
        });
    });

    updateCartUI();
});

// Add to cart functionality
document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.button--small.product__button').forEach(button => {
        button.addEventListener('click', function() {
            const productElement = this.closest('.products__card');
            if (productElement) {
                const titleElement = productElement.querySelector('.products__title');
                const priceElement = productElement.querySelector('.products__price');
                
                if (titleElement && priceElement) {
                    const productName = titleElement.textContent;
                    const price = priceElement.textContent.replace('$', '');
                    
                    alert(`Added ${productName} ($${price}) to cart!`);
                    updateCartCount();
                }
            }
        });
    });
});

// Function to update cart count
function updateCartCount() {
    const cartCount = document.getElementById('cart-count');
    if (cartCount && isLoggedIn) {
        let currentCount = parseInt(cartCount.textContent) || 0;
        cartCount.textContent = currentCount + 1;
    }
}

// Function to update cart UI
function updateCartUI() {
    const cartCount = document.getElementById('cart-count');
    if (cartCount && isLoggedIn) {
        cartCount.textContent = '0';
        cartCount.style.display = 'inline-block';
    }
}

// Newsletter form handling
document.addEventListener('DOMContentLoaded', () => {
    const newsletterForm = document.getElementById('newsletter-form');
    if (newsletterForm) {
        newsletterForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const emailInput = this.querySelector('input[name="email"]') || this.email;
            
            if (!emailInput) {
                alert('Email input not found.');
                return;
            }
            
            const email = emailInput.value;
            
            if (!email || !email.includes('@')) {
                alert('Please enter a valid email address.');
                return;
            }
            
            this.submit();
        });
    }
});

// Enhanced dropdown functionality for mobile
document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.nav__dropdown').forEach(dropdown => {
        dropdown.addEventListener('click', function(e) {
            if (window.innerWidth <= 767) {
                e.preventDefault();
                const menu = this.querySelector('.nav__dropdown-menu');
                if (menu) {
                    menu.style.display = menu.style.display === 'block' ? 'none' : 'block';
                }
            }
        });
    });
});

// Pass PHP login status to JavaScript
const isLoggedIn = window.isLoggedIn || false;
const userName = "<?php echo isLoggedIn() ? htmlspecialchars(getUser DisplayName()) : ''; ?>";

// Show success message if just logged in
document.addEventListener('DOMContentLoaded', () => {
    const urlParams = new URLSearchParams(window.location.search);
    if (urlParams.get('login') === 'success') {
        showSuccessMessage('Welcome back! You are now logged in.');
        window.history.replaceState({}, document.title, window.location.pathname);
    }
});

// Function to show success message
function showSuccessMessage(message) {
    const successMsg = document.getElementById('success-message');
    if (successMsg) {
        successMsg.textContent = message;
        successMsg.style.display = 'block';
        setTimeout(() => {
            successMsg.style.display = 'none';
        }, 5000);
    }
}

// Function to handle protected links
function handleProtectedLinks() {
    const protectedLinks = ['user/dashboard.php', 'user/account_setting.php', 'orders.php', 'settings.php', 'wishlist.php'];
    
    protectedLinks.forEach(page => {
        const links = document.querySelectorAll(`a[href="${page}"]`);
        links.forEach(link => {
            link.addEventListener('click', function(e) {
                if (!isLoggedIn) {
                    e.preventDefault();
                    const pageName = page.replace('.php', '').replace('-', ' ');
                    alert(`Please login to access ${pageName}.`);
                    window.location.href = `user/login.php?redirect=${encodeURIComponent(page)}`;
                }
            });
        });
    });
}

// Function to confirm logout
function confirmLogout() {
    return confirm('Are you sure you want to logout?');
}
