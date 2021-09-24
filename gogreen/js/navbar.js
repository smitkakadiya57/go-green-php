window.addEventListener('resize', function () {
    addRequiredClass();
});

let hamburger = document.querySelector('.hamburger');
let navmenu = document.querySelector(".nav_menu");
let navbtn = document.querySelector('.nav_btn');
let isActive = false
let nav = document.querySelector(".nav_bar");



function addRequiredClass() {
    if (window.innerWidth < 860) {
        nav.classList.add('nav_responsive');
        hamburger.classList.add("fa-bars");
      
    } else {
        nav.classList.remove('nav_responsive')
    }
}


window.onload = addRequiredClass;


hamburger.addEventListener('click', () => {

    if (!isActive) {

        hamburger.classList.add("fa-times");
        hamburger.classList.remove("fa-bars");
        console.log(hamburger.classList);
        navbtn.style.display = "block";
        navmenu.style.display = "block";
        // nav.style.background="red";
        nav.style.background="rgba(5, 170, 5, 0.698)";
        
        isActive = true;
    } else {
        hamburger.classList.add("fa-bars");
        hamburger.classList.remove("fa-times");
       
        console.log(hamburger.classList);
        navbtn.style.display = "none";
        navmenu.style.display = "none";
        nav.style.background="green";
        isActive = false;
        addRequiredClass;
    }
})