let menuBtn = document.querySelector('#menu');
let navbar = document.querySelector('.navbar');
let header = document.querySelector('.header');


menuBtn.addEventListener('click',()=>{
    menuBtn.classList.toggle('fa-times')
    navbar.classList.toggle('active')
})

window.onscroll = ()=> {     
    menuBtn.classList.remove('fa-times')
    navbar.classList.remove('active')
}