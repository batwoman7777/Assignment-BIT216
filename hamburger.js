const menu = document.querySelector(".navigation");
const hamburger = document.querySelector(".hamburger-menu");

hamburger.addEventListener("click", () =>{
    hamburger.classList.toggle("active");
    menu.classList.toggle("active");
});

document.querySelectorAll(".link").forEach(n => n.addEventListener("click", () =>{
    hamburger.classList.remove("active");
    menu.classList.remove("active"); 
} ));