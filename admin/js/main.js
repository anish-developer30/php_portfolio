
const header  = document.querySelector('.header');
const sidebar  = document.querySelector('.sidebar');
const menu  = document.querySelector('#menu');


menu.onclick =()=>{
   menu.classList.toggle('fa-times');
   document.body.classList.toggle('active');
   sidebar.classList.toggle('active');
}