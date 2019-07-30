const menuIcon = document.querySelector('#menu-icon');
const slideoutMenu = document.querySelector('#slideout-menu');
const searchIcon = document.querySelector('#search-icon');
const searchBox = document.querySelector('#searchbox');

searchIcon.addEventListener('click', () => {
    if (searchBox.style.top == '10vh') {
        searchBox.style.top = '24px';
        searchBox.style.pointerEvents = 'none';
    }
    else {
        searchBox.style.top = '10vh';
        searchBox.style.pointerEvents = 'auto';
    }
});

menuIcon.addEventListener('click', () => {
    if (slideoutMenu.style.opacity == '1') {
        slideoutMenu.style.opacity = '0';
        slideoutMenu.style.pointerEvents = 'none';
    }
    else {
        slideoutMenu.style.opacity = '1';
        slideoutMenu.style.pointerEvents = 'auto';
    }
});