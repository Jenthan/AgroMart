function pleaselogin() {  
  
  
    alert ("Please Login the System");  
 } 
 
 function ordersalert() {  
  
  
    alert ("Only Registered customers can check his/her card details");  
 }
 function logincusalert(){
    alert("Only Registered customers can order");
 }


let menu = document.querySelector('#menu-bar');
let navbar = document.querySelector('.navbar');
let header = document.querySelector('.header-2');

menu.addEventListener('click', () =>{
    menu.classList.toggle('fa-times');
    navbar.classList.toggle('active');
});

window.onscroll = () =>{
    menu.classList.remove('fa-times');
    navbar.classList.remove('active');

    if(window.scrollY > 150){
        header.classList.add('active');
    }else{
        header.classList.remove('active');
    }

}
/*
        const icon = document.querySelector('.icon'); 
        const search = document.querySelector('.search'); 
        icon.onclick = function(){
            search.classList.toggle('active')
        }
    */