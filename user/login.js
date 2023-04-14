var btn = document.getElementById('btnMedical')

btn.addEventListener("click",()=>{

  window.location.assign("../medical/login")

})


var login =document.getElementById('login');
var signup =document.getElementById('signup');

var signButton =document.getElementById('signButton')
var logButton =document.getElementById('logButton')

signButton.addEventListener('click',()=>{


    signup.classList.remove('hidden')
    login.classList.add('hidden')



})
logButton.addEventListener('click',()=>{


   login.classList.remove('hidden')
    signup.classList.add('hidden')



})