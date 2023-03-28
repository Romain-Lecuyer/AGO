var nba = 0;
var nb = 0;
var histo = "";
var essaie = 0;

var difficulter = 1;
function changerdifficulter(choix){
	console.log(choix);
	if(choix == 1){
		difficulter = 1;
		timemax = 1;
		scordnegatif = 1;
		document.getElementById('choixdiff').innerHTML='FACILE';

	}else if(choix == 2){
		difficulter = 2;
		timemax = 45;
		scordnegatif = 3;
		document.getElementById('choixdiff').innerHTML='MOYEN';

	}else if(choix == 3){
		difficulter = 3;
		timemax = 30;
		scordnegatif = 5;
		document.getElementById('choixdiff').innerHTML='DIFICILE';
	}
}

function Refresh(){
    document.getElementById("hnb").innerHTML="";
    document.getElementById("POM").innerHTML="plus ou moins";
    histo = "";
    essaie = 0;
    document.getElementById("essaie").innerHTML= essaie;
    nba = 0;
    nb = 0;
    document.getElementById("nombre").value= "";
    CalculNb();
}


function CalculNb(){

    var min = 0;

    if(difficulter == 1){
        var max = 10000;
    }
    else if(difficulter == 2){
        var max = 50000;
    }
    else if(difficulter == 3){
        var max = 100000;
    }

    nba = Math.floor(Math.random() * (max - min)) + min;
    document.getElementById("Bouton").style.display= 'none';
    document.getElementById("b4").style.display= 'block';
}


function Rnb(){
    nb =document.getElementById("nombre").value;
    Estimation();
    document.getElementById('hnb').scrollTop = 1000;
};


function Estimation(){
    
    if(nb==nba){
        document.getElementById("POM").innerHTML= "BRAVO"
        document.getElementById("Bouton").style.display= 'block'
    }

    else if(nb < nba){
        essaie++;
        document.getElementById("essaie").innerHTML= essaie;
        document.getElementById("POM").innerHTML= "Plus"
        histo = document.getElementById("hnb").innerHTML=histo + nb.toString()+ " <br>";
    }
    
    else if(nb > nba){
        essaie++;
        document.getElementById("essaie").innerHTML= essaie;
        document.getElementById("POM").innerHTML= "Moins"
        histo = document.getElementById("hnb").innerHTML=histo + nb.toString()+ " <br>";
    }
    
};