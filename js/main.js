const ul = document.querySelector('.ul');
const span = document.querySelector('.barra');

span.addEventListener('click', ()=>{
  ul.classList.toggle('barra-mostrar');
})