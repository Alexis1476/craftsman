console.log("dsadsa");

let sideBar = document.getElementById('sideBar');
let isOpen = false;

sideBar.style.transform = "translate(-100%,0%)";

function openSideBar()
{
    if (!isOpen)
    {
        sideBar.classList.remove('sideBarClose');
        sideBar.classList.add('sideBarOpen');
        isOpen = true;
    }
    else
    {
        sideBar.classList.remove('sideBarOpen');
        sideBar.classList.add('sideBarClose');
        isOpen = false;
    }
}

function sleep(seconds)
{
    let e = new Date().getTime() + (seconds * 1000);
    while (new Date().getTime() <= e) {}
}
