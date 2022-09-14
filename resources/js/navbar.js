// Toggle dropdown menu when user clicks on avatar.
const avatar = document.getElementById('avatar');
const dropdownMenu = document.getElementById('dropdown-menu');

const toggleDropdownMenu = () => {
    dropdownMenu.classList.toggle('hidden');
};

if(avatar) {
    avatar.addEventListener('click', toggleDropdownMenu);
}

// Toggle mobile navbar menu when user clicks on hamburger/close icon.
const hamburgerBtn = document.getElementById('hamburger-btn');
const hamburgerIcon = document.getElementById('hamburger-icon');
const closeIcon = document.getElementById('close-icon');
const mobileMenu = document.getElementById('mobile-menu');

const toggleMobileMenu = () => {
    mobileMenu.classList.toggle('hidden');
    hamburgerIcon.classList.toggle('hidden');
    closeIcon.classList.toggle('hidden');
};

if(hamburgerBtn) {
    hamburgerBtn.addEventListener('click', toggleMobileMenu);
}

// Close menus when user clicks outside the specified elements.
window.addEventListener('click', event => {
    const isAvatarClicked = event.composedPath().includes(avatar);
    const isHamburgerClicked = event.composedPath().includes(hamburgerBtn);

    if(!isAvatarClicked && dropdownMenu) {
        dropdownMenu.classList.add('hidden');
    }

    if(!isHamburgerClicked && mobileMenu) {
        mobileMenu.classList.add('hidden');
        hamburgerIcon.classList.remove('hidden');
        closeIcon.classList.add('hidden');
    }
});

// Log user out
const logout = document.getElementById('logout');

if(logout) {
    logout.addEventListener('click', event => {
        event.preventDefault();
        event.target.closest('form').submit();
    });
}
