// code du jeux speed clicke

// variable utiliser pour le chrono
var startTime = 0
var start = 0
var end = 0
var diff = 0
var timerID = 0

var difficulter = 1;
var timemax = 1;
var scordnegatif = 1;


let scord = 0;

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


//function utiliser pour le chrono NE PAS MODIFIER !!!

function chrono(){
	end = new Date()
	diff = end - start;
	diff = new Date(diff)
	var msec = diff.getMilliseconds()
	var sec = diff.getSeconds()
	var min = diff.getMinutes()
	if (min < 10){
		min = "0" + min
	}
	if (sec < 10){
		sec = "0" + sec
	}
	if(msec < 10){
		msec = "00" +msec
	}
	else if(msec < 100){
		msec = "0" +msec
    }
    
    
	
    
	document.getElementById("chronotime").value = min + ":" + sec + ":" + msec
	
	if(difficulter == 1){ // facile
		if(min == timemax){
			document.getElementById("Bouton").style.display= 'block';

			document.getElementById("Diff1").style.display= 'block';
			document.getElementById("Diff2").style.display= 'block';
			document.getElementById("Diff3").style.display= 'block';
			start = new Date()-diff
			clearInterval(setinter);
			
		}
	}else if(difficulter == 2 || difficulter == 3){
		if(sec == timemax){ // moyen et difficile
			document.getElementById("Bouton").style.display= 'block';

			document.getElementById("Diff1").style.display= 'block';
			document.getElementById("Diff2").style.display= 'block';
			document.getElementById("Diff3").style.display= 'block';
			start = new Date()-diff
			clearInterval(setinter);
			
		}
	}
}

function blostart(){
	document.getElementById("b1").innerHTML= "" 
    document.getElementById("b2").innerHTML= "" 
    document.getElementById("b3").innerHTML= "" 
    document.getElementById("b4").innerHTML= "" 
    document.getElementById("b6").innerHTML= "" 
    document.getElementById("b7").innerHTML= "" 
    document.getElementById("b8").innerHTML= "" 
    document.getElementById("b9").innerHTML= ""
	document.getElementById("Bouton").style.display= 'none';
	document.getElementById("Diff1").style.display= 'none';
	document.getElementById("Diff2").style.display= 'none';
	document.getElementById("Diff3").style.display= 'none';
	document.getElementById("b5").innerHTML= "<input type='button' class='B' onClick='demarrage()'/>";
	
}

function demarrage(){
	start = new Date();
	//scord = -1
	setinter = setInterval("chrono()", 10);
	aleatoire();
	//blo();
}

function blo(){
	if(min = diff.getMinutes()<1){
		aleatoire();
		scor();
	}
}

function scor(){
	scord = scord + 1;
	document.getElementById("scord").innerHTML= scord;
}

function blo2(){
	if(min = diff.getMinutes()<1){
		scor2();
	}
}

function scor2(){
	scord = scord - scordnegatif;
	document.getElementById("scord").innerHTML= scord;
}