(function(){
    const burgerItem = document.querySelector('.burger');
    const menu = document.querySelector('.wrapper__menu');
    const menuCloseItem = document.querySelector('.header__nav-close');
    burgerItem.addEventListener('click', () => {
        menu.classList.add('wrapper__menu-activ');
    });
    menuCloseItem.addEventListener('click', () => {
        menu.classList.remove('wrapper__menu-activ');
    });

}());