/*=============== SHOP JS ===============*/

// Filter functionality
const filterBtns = document.querySelectorAll('.shop-filter__btn');
const shopCards = document.querySelectorAll('.shop__card');

filterBtns.forEach(btn => {
    btn.addEventListener('click', () => {
        // Remove active class from all buttons
        filterBtns.forEach(b => b.classList.remove('active'));
        // Add active class to clicked button
        btn.classList.add('active');

        const filterValue = btn.getAttribute('data-filter');

        shopCards.forEach(card => {
            if (filterValue === 'all') {
                card.style.display = 'block';
            } else {
                const cardCategories = card.getAttribute('data-category');
                if (cardCategories && cardCategories.includes(filterValue)) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            }
        });
    });
});

// Sort functionality
const sortSelect = document.querySelector('.shop-sort__select');

sortSelect.addEventListener('change', () => {
    const sortValue = sortSelect.value;
    const shopContainer = document.querySelector('.shop__container');
    const cards = Array.from(shopContainer.querySelectorAll('.shop__card'));

    let sortedCards;

    switch(sortValue) {
        case 'price-low':
            sortedCards = cards.sort((a, b) => {
                const priceA = parseInt(a.querySelector('.shop__price').textContent.replace('$', ''));
                const priceB = parseInt(b.querySelector('.shop__price').textContent.replace('$', ''));
                return priceA - priceB;
            });
            break;
        case 'price-high':
            sortedCards = cards.sort((a, b) => {
                const priceA = parseInt(a.querySelector('.shop__price').textContent.replace('$', ''));
                const priceB = parseInt(b.querySelector('.shop__price').textContent.replace('$', ''));
                return priceB - priceA;
            });
            break;
        case 'name':
            sortedCards = cards.sort((a, b) => {
                const nameA = a.querySelector('.shop__title').textContent;
                const nameB = b.querySelector('.shop__title').textContent;
                return nameA.localeCompare(nameB);
            });
            break;
        default:
            return;
    }

    // Re-append sorted cards
    sortedCards.forEach(card => shopContainer.appendChild(card));
});
