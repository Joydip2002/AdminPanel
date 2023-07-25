// Sidenav
var el = document.getElementById("wrapper");
var toggleButton = document.getElementById("menu-toggle");
var  cbtn = document.getElementById("Crossbtn");

toggleButton.onclick = function () {
    el.classList.toggle("toggled");
    cbtn.style.visibility = "visible";
    toggleButton.style.visibility = "hidden";
};
cbtn.onclick=function(){
    // alert("click")
    el.classList.toggle("toggled");
    cbtn.style.visibility = "hidden";
    toggleButton.style.visibility = "visible";
};

// Dark and Light Theme
function light() {
    const sun = document.getElementById("sun");
    const moon = document.getElementById("moon");
    sun.style.visibility = "hidden";
    moon.style.visibility = "visible";
    moon.style.marginRight = "1rem";
    var rootColor = document.querySelector(":root"); 
    rootColor.style.setProperty("--anchorColor","#000");
    rootColor.style.setProperty("--sideNavbar","#fcf8f7");
    rootColor.style.setProperty("--backTheme","#fff"); 
}
function moon() {
    const sun = document.getElementById("sun");
    const moon = document.getElementById("moon");
    sun.style.visibility = "visible";
    moon.style.visibility = "hidden";
    var rootColor = document.querySelector(":root"); 
    rootColor.style.setProperty("--anchorColor","white");
    rootColor.style.setProperty("--sideNavbar","#1f2940");
    rootColor.style.setProperty("--backTheme","#141b2d");
}

// Full Screen Code
const fullscreenButton = document.getElementById('expend');
const fullScreenContent = document.getElementById('fullScreenContent');

// Store the original content to revert when exiting full-screen mode
const originalContent = fullScreenContent.innerHTML;

fullscreenButton.addEventListener('click', () => {
    if (fullScreenContent.requestFullscreen) {
        fullScreenContent.requestFullscreen();
        fullScreenContent.style.background = "white";
    } else if (fullScreenContent.mozRequestFullScreen) {
        fullScreenContent.mozRequestFullScreen();
        fullScreenContent.style.background = "white";
    } else if (fullScreenContent.webkitRequestFullscreen) {
        fullScreenContent.webkitRequestFullscreen();
    } else if (fullScreenContent.msRequestFullscreen) {
        fullScreenContent.msRequestFullscreen();
        fullScreenContent.style.background = "white";
    }
});

// Event listener to revert to original content when exiting full-screen mode
document.addEventListener('fullscreenchange', exitFullScreenHandler);
document.addEventListener('webkitfullscreenchange', exitFullScreenHandler);
document.addEventListener('mozfullscreenchange', exitFullScreenHandler);
document.addEventListener('MSFullscreenChange', exitFullScreenHandler);

function exitFullScreenHandler() {
    if (!document.fullscreenElement && !document.webkitFullscreenElement && !document.mozFullScreenElement && !document.msFullscreenElement) {
        // Exit full-screen mode and revert to original content
        fullScreenContent.innerHTML = originalContent;
    }
}