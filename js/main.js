const navItems = document.querySelector('.nav_items');
const openNavBtn = document.querySelector('#open_nav-btn');
const closeNavBtn = document.querySelector('#close_nav-btn');


//open nav
const openNav = () => {
    navItems.style.display = 'flex';
    openNavBtn.style.display= 'none';
    closeNavBtn.style.display = 'inline-block';
}

//close nav
const closeNav = () => {
    navItems.style.display = 'none';
    openNavBtn.style.display= 'inline-block';
    closeNavBtn.style.display = 'none';
}

openNavBtn.addEventListener('click', openNav);
closeNavBtn.addEventListener('click', closeNav);

// show sidebar for small devices
const sidebar = document.querySelector('aside');
const showSidebar = document.querySelector('#show_sidebar-btn');
const hideSidebar = document.querySelector('#hide_sidebar-btn');


const showSideBar = () => {
    sidebar.style.left = '0';
    showSidebar.style.diplay = 'none';
    hideSidebar.style.display= 'inline-block';
}
const hideSideBar = () => {
    sidebar.style.left = '-100%';
    showSidebar.style.diplay = 'inline-block';
    hideSidebar.style.display= 'none';
}

showSidebar.addEventListener('click' , showSideBar);
hideSidebar.addEventListener('click', hideSideBar);