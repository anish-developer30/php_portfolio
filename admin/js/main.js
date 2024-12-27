
const header  = document.querySelector('.header');
const sidebar  = document.querySelector('.sidebar');
const menu  = document.querySelector('#menu');




menu.onclick =()=>{
   menu.classList.toggle('fa-times');
   document.body.classList.toggle('active');
   sidebar.classList.toggle('active');
}


const pro = document.getElementById("pro").innerText;
const cate = document.getElementById("cate").innerText;
const con = document.getElementById("con").innerText;
const user = document.getElementById("user").innerText;

// chart js 
  const ctx1 = document.getElementById('myChart1');
  const ctx2 = document.getElementById('myChart2');

new Chart(ctx1,{
 type: 'bar',
    data: {
      labels: ['Users', 'Contacts', 'Categories', 'Projects'],
      datasets: [{
        label: 'Progress',
        data: [user, con,cate, pro],
        borderWidth: 1,
        backgroundColor:["#a8a8a8","#f48eb1","#a3cde0","#84ccc5"]
      }]
    },
   options:{
    responsive:false,
    padding:[
      top='20',
    ]
   }
})


new Chart(ctx2,{
 type: 'pie',
    data: {
      labels: ['Users', 'Contacts', 'Categories', 'Projects'],
      datasets: [{
        label: 'Progress',
        data: [user, con,cate, pro],
        borderWidth: 1,
        backgroundColor:["#a8a8a8","#f48eb1","#a3cde0","#84ccc5"]
      }]
    },
   options:{
    responsive:false,
    padding:[
      top='20',
    ]
   }
})
