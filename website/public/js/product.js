// Product image gallery
const thumbnails = document.querySelectorAll('.product-detail__thumbnail');
const mainImg = document.getElementById('main-product-img');

thumbnails.forEach(thumbnail => {
    thumbnail.addEventListener('click', () => {
        thumbnails.forEach(t => t.classList.remove('active'));
        thumbnail.classList.add('active');
        mainImg.src = thumbnail.dataset.image;
    });
});

// Quantity controls
const decreaseBtn = document.getElementById('decrease-qty');
const increaseBtn = document.getElementById('increase-qty');
const quantitySpan = document.getElementById('product-quantity');
let quantity = 1;

decreaseBtn.addEventListener('click', () => {
    if (quantity > 1) {
        quantity--;
        quantitySpan.textContent = quantity;
    }
});

increaseBtn.addEventListener('click', () => {
    quantity++;
    quantitySpan.textContent = quantity;
});

// Color and size options
const colorOptions = document.querySelectorAll('.color-option');
const sizeOptions = document.querySelectorAll('.size-option');

colorOptions.forEach(option => {
    option.addEventListener('click', () => {
        colorOptions.forEach(o => o.classList.remove('active'));
        option.classList.add('active');
    });
});

sizeOptions.forEach(option => {
    option.addEventListener('click', () => {
        sizeOptions.forEach(o => o.classList.remove('active'));
        option.classList.add('active');
    });
});

// Tab functionality
const tabBtns = document.querySelectorAll('.tab__btn');
const tabPanels = document.querySelectorAll('.tab__panel');

tabBtns.forEach(btn => {
    btn.addEventListener('click', () => {
        const tabId = btn.dataset.tab;
        
        tabBtns.forEach(b => b.classList.remove('active'));
        tabPanels.forEach(p => p.classList.remove('active'));
        
        btn.classList.add('active');
        document.getElementById(tabId).classList.add('active');
    });
});

// Wishlist toggle
const wishlistBtn = document.querySelector('.wishlist-btn');
wishlistBtn.addEventListener('click', () => {
    const icon = wishlistBtn.querySelector('i');
    if (icon.classList.contains('bx-heart')) {
        icon.classList.remove('bx-heart');
        icon.classList.add('bxs-heart');
        wishlistBtn.style.color = '#ff6b6b';
    } else {
        icon.classList.remove('bxs-heart');
        icon.classList.add('bx-heart');
        wishlistBtn.style.color = '';
    }
});

// Add to cart functionality
const addToCartBtn = document.querySelector('.add-to-cart-btn');
addToCartBtn.addEventListener('click', () => {
    // Add product to cart logic here
    alert('Product added to cart!');
});

// Buy now functionality
const buyNowBtn = document.querySelector('.buy-now-btn');
buyNowBtn.addEventListener('click', () => {
    // Redirect to checkout logic here
    alert('Redirecting to checkout...');
});
