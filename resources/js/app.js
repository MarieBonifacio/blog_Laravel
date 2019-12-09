require('./bootstrap');
// AOS.init()



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
    buttonComAction(boutonCom);
});

function buttonComAction(boutonCom){
    boutonCom.addEventListener("click", function(){
        boutonCom.parentNode.parentNode.querySelector('.navCom').classList.add('open');    
    });
}

//fermer menu commentaires
let boutonComCloses = document.querySelectorAll(".boutonComClose");
boutonComCloses.forEach(function(boutonComClose){
    boutonComClose.addEventListener("click", function(){
        boutonComClose.parentNode.classList.remove('open');
    });
}); 


//ISOTOPE

//MENU ARTICLES
let buttonActu = document.querySelector('.buttonActualités');
let buttonHumeur = document.querySelector('.buttonHumeur');
let buttonDevWeb = document.querySelector('.buttonWebDev');
let buttonAll = document.querySelector('.all');
// console.log(buttonActu);

function changeColor (button, classAdd){
    button.addEventListener('click', function(){
        // document.body.classList.remove(class1, class2);
        document.body.className = "";
        document.body.classList.add(classAdd)
        document.cookie = 'ppkcookie1=testcookie';
    });
}

changeColor(buttonActu,'actualités');
changeColor(buttonHumeur,'humeur');
changeColor(buttonDevWeb,'devweb');

buttonAll.addEventListener('click', function(){
    document.body.className = ""
})

