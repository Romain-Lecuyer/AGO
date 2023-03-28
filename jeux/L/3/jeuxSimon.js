// function utiliser pour le jeux

var couleur = [];
var i = 0;
var j = 0

var verif = 0;
var verifauto = 0;

var cleartime = 1500;
var autotime = 2000;

var scor = 0;

function changerdifficulter(choix){
	console.log(choix);
	if(choix == 1){
		cleartime = 1500;
        autotime = 2000;
		document.getElementById('choixdiff').innerHTML='FACILE';

	}else if(choix == 2){
		cleartime = 1000;
        autotime = 1500;
		document.getElementById('choixdiff').innerHTML='MOYEN';

	}else if(choix == 3){
		cleartime = 750;
        autotime = 1000;
		document.getElementById('choixdiff').innerHTML='DIFICILE';
	}
}



function aleatoire() {
    i = 0;
    j = 0;
    verif = 0;
    verifauto = 0

    var min = 0
    var max = 20
    
    
    //window.alert(couleur.length);
	// entre 0 a 3 donc il y a 4 chiffre

    var aleat = Math.floor(Math.random() * (max - min)) + min;
    //window.alert(aleat);
    couleur.push(aleat);
    //window.alert(couleur.length);
    automa()
    
}

function automa(){
    if(verifauto < couleur.length){
        var auto = 0;
        auto = couleur[verifauto];
        
        if(auto >= 0 && auto <5){
            setTimeout(function () {
            document.getElementById("b1").innerHTML= "<p class='C' /p>" // jaune
            document.getElementById("b2").innerHTML= "";
            document.getElementById("b5").innerHTML= "";
            document.getElementById("b4").innerHTML= "";
            },500);
            verifauto = verifauto +1
            setTimeout(clear,cleartime);
            setTimeout(automa,autotime);
        }
        if(auto >= 5 && auto <10){
            setTimeout(function () {
            document.getElementById("b2").innerHTML= "<p class='C' /p>" // rouge
            document.getElementById("b1").innerHTML= "";
            document.getElementById("b5").innerHTML= "";
            document.getElementById("b4").innerHTML= "";
            },500);
            verifauto = verifauto +1
            setTimeout(clear,cleartime);
            setTimeout(automa,autotime);
        }
        if(auto >= 10 && auto <15){
            setTimeout(function () {
            document.getElementById("b4").innerHTML= "<p class='C' /p>" // bleu
            document.getElementById("b2").innerHTML= "";
            document.getElementById("b5").innerHTML= "";
            document.getElementById("b1").innerHTML= "";
            },500);
            verifauto = verifauto +1
            setTimeout(clear,cleartime);
            setTimeout(automa,autotime);
        }
        if(auto >= 15 && auto <=20){
            setTimeout(function () {
            document.getElementById("b5").innerHTML= "<p class='C' /p>" // vert
            document.getElementById("b2").innerHTML= "";
            document.getElementById("b1").innerHTML= "";
            document.getElementById("b4").innerHTML= "";
            },500);
            verifauto = verifauto +1
            setTimeout(clear,cleartime);
            setTimeout(automa,autotime);
        }

        function clear(){
            document.getElementById("b1").innerHTML= "";
            document.getElementById("b2").innerHTML= "";
            document.getElementById("b4").innerHTML= "";
            document.getElementById("b5").innerHTML= "";
            auto = 0;
        }
    
    }
    else (jouer())
}


function jouer() {
    document.getElementById("b1").innerHTML= "";
    document.getElementById("b2").innerHTML= "";
    document.getElementById("b4").innerHTML= "";
    document.getElementById("b5").innerHTML= "";
    
    
if(verif < couleur.length){
    var jeu = 0;
    jeu = couleur[verif]; // recuper l'element du tableau avec le nombre de index de la variable verif
    
        if(jeu >= 0 && jeu <5){
            document.getElementById("b1").innerHTML= "<input type ='button' class='C' onClick='good1()'/>" // jaune
            document.getElementById("b2").innerHTML= "<input type ='button' class='C' onClick='end()'/>";
            document.getElementById("b5").innerHTML= "<input type ='button' class='C' onClick='end()'/>";
            document.getElementById("b4").innerHTML= "<input type ='button' class='C' onClick='end()'/>";
        }
        else if(jeu >= 5 && jeu <10){
            document.getElementById("b2").innerHTML= "<input type ='button' class='C' onClick='good2()'/>" // rouge
            document.getElementById("b1").innerHTML= "<input type ='button' class='C' onClick='end()'/>";
            document.getElementById("b5").innerHTML= "<input type ='button' class='C' onClick='end()'/>";
            document.getElementById("b4").innerHTML= "<input type ='button' class='C' onClick='end()'/>";
        }
        else if(jeu >= 10 && jeu <15){
            document.getElementById("b4").innerHTML= "<input type ='button' class='C' onClick='good3()'/>" // bleu
            document.getElementById("b2").innerHTML= "<input type ='button' class='C' onClick='end()'/>";
            document.getElementById("b5").innerHTML= "<input type ='button' class='C' onClick='end()'/>";
            document.getElementById("b1").innerHTML= "<input type ='button' class='C' onClick='end()'/>";
        }
        else if(jeu >= 15 && jeu <=20){
            document.getElementById("b5").innerHTML= "<input type ='button' class='C' onClick='good4()'/>" // vert
            document.getElementById("b2").innerHTML= "<input type ='button' class='C' onClick='end()'/>";
            document.getElementById("b1").innerHTML= "<input type ='button' class='C' onClick='end()'/>";
            document.getElementById("b4").innerHTML= "<input type ='button' class='C' onClick='end()'/>";
        }

        
}
else {aleatoire()}
            
}
function good1(){
    verif = verif + 1;
    scor = scor + 10;
    document.getElementById("scord").innerHTML = scor;
    jouer();
}
function good2(){
    verif = verif + 1;
    scor = scor + 10;
    document.getElementById("scord").innerHTML = scor;
    jouer();
}
function good3(){
    verif = verif + 1;
    scor = scor + 10;
    document.getElementById("scord").innerHTML = scor;
    jouer();
}
function good4(){
    verif = verif + 1;
    scor = scor + 10;
    document.getElementById("scord").innerHTML = scor;
    jouer();
}
function end(){
    couleur = [];
    i = 0;
    j = 0;
    verif = 0;
    document.getElementById("Bouton").style.display= 'block';
    document.getElementById("b1").innerHTML= "";
    document.getElementById("b2").innerHTML= "";
    document.getElementById("b4").innerHTML= "";
    document.getElementById("b5").innerHTML= "";
    document.getElementById("Diff1").style.display= 'block';
    document.getElementById("Diff2").style.display= 'block';
    document.getElementById("Diff3").style.display= 'block';
}