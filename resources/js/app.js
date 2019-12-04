require('./bootstrap');
AOS.init()



//Menu burger
let bouton = document.querySelector('#burgerButton');

bouton.addEventListener("click", function(){
    document.querySelector('aside').classList.add('open');
});

//fermer menu burger
let boutonFermer = document.querySelector('#closeButton');
boutonFermer.addEventListener("click", function(){
    document.querySelector('aside').classList.remove('open');
});

//menu Commentaires

let boutonComs = document.querySelectorAll(".buttonCom");
boutonComs.forEach (function(boutonCom){
    boutonCom.addEventListener("click", function(){
        boutonCom.parentNode.parentNode.querySelector('.navCom').classList.add('open');    
    });
});


//fermer menu commentaires
let boutonComCloses = document.querySelectorAll(".boutonComClose");
boutonComCloses.forEach(function(boutonComClose){
    boutonComClose.addEventListener("click", function(){
        boutonComClose.parentNode.classList.remove('open');
    });
}); 


//AJAX CRUD
