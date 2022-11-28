let sideBar = document.getElementById('sideBar');
let sideMenuHtml = sideBar.innerHTML;
sideBar.innerHTML = "";
let isOpen = false;

const MD_WIDTH = 768;
window.onresize = resize;

function resize()
{
    if (document.body.clientWidth > MD_WIDTH)
    {
        closeSideMenu();
    }
}

function openSideBar()
{
    if (!isOpen)
    {
        openSideMenu();
    }
    else
    {
        closeSideMenu();
    }
}

function openSideMenu()
{
    sideBar.innerHTML = sideMenuHtml;
    isOpen = true;
}

function closeSideMenu()
{
    sideBar.innerHTML = "";
    isOpen = false;
}