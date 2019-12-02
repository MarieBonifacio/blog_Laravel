require('./bootstrap');
AOS.init()



//Menu burger
let bouton = document.querySelector('#burgerButton');
console.log(bouton);

bouton.addEventListener("click", function(){
    document.querySelector('aside').classList.add('open');
});

//fermer menu burger
let boutonFermer = document.querySelector('#closeButton');
boutonFermer.addEventListener("click", function(){
    document.querySelector('aside').classList.remove('open');
});


//AJAX CRUD
