let menuBtn = document.querySelector('#menu');
let navbar = document.querySelector('.navbar');


menuBtn.addEventListener('click',()=>{
    menuBtn.classList.toggle('fa-times')
    navbar.classList.toggle('active')
})