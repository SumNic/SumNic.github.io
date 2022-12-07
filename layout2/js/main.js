(function(){
    const burgerItem = document.querySelector('.burger');
    const menu = document.querySelector('.header__menu_nav');
    const menuCloseItem = document.querySelector('.header__nav-close');
    burgerItem.addEventListener('click', () => {
        menu.classList.add('header__menu_nav-activ');
    });
    menuCloseItem.addEventListener('click', () => {
        menu.classList.remove('header__menu_nav-activ');
    });

}());