const btn = document.getElementById('menu-btn');
const menu = document.getElementById('mobile-menu');
const favoriteButton = document.getElementById('favorite-button'); 
const cartButton = document.getElementById('cart-button')

btn.addEventListener('click', () => {
    menu.classList.toggle('hidden');
});

function handleButtonClick(button, toggleClassBefore, toggleClassAfter, timeOut){
        button.classList.toggle(toggleClassBefore);
        button.classList.toggle(toggleClassAfter);

        button.classList.toggle('zoom-in-out');
        setTimeout(() => {
            button.classList.toggle('zoom-in-out')
        }, timeOut);
}

favoriteButton.addEventListener('click', () => {
    handleButtonClick(favoriteButton, 'text-gray-500' , 'text-red-500', 500);
});

cartButton.addEventListener('click', () => {
    handleButtonClick(cartButton, 'text-gray-500' , 'text-blue-500', 500);
});

