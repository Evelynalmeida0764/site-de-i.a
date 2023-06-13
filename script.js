const hamburguer = document.querySelector(".hamburguer");
const navMenu = document.querySelector(".nav-menu");

hamburguer.addEventListener("click",mobileMenu);

function mobileMenu(){
    hamburguer.classList.toggle("active");
    navMenu.classList.toggle("active");
}

const navLink = document.querySelectorAll(".nav-link");

navLink.forEach(n=> n.addEventListener("click",closeMenu));

function closeMenu(){
    hamburguer.classList.remove("active");
    navMenu.classList.remove("active");
}

