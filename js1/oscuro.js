const btnSwitch=document.querySelector('#switch');

btnSwitch.addEventListener('click',() =>{
    document.body.classList.toggle('dark')
    btnSwitch.classList.toggle('switch-active');
});
