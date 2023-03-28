// function utiliser pour le jeux

function aleatoire() {
    
    var min = 0
    var max = 9
    

	 
	// entre 0 a 8 donc il y a 9 chiffre
    if(document.getElementById("Bouton").style.display= 'none'){

        var aleat = Math.floor(Math.random() * (max - min)) + min;
        if(aleat == 0){
            document.getElementById("b1").innerHTML= "<input type='button' class='B' onClick='blo()'/>"
        }else {
            document.getElementById("b1").innerHTML= "<input type='button' class='A' onClick='blo2()'/>"
        }
        
        if(aleat == 1){
            document.getElementById("b2").innerHTML= "<input type='button' class='B' onClick='blo()'/>"
        }else {
            document.getElementById("b2").innerHTML= "<input type='button' class='A' onClick='blo2()'/>"
        }
        
        if(aleat == 2){
            document.getElementById("b3").innerHTML= "<input type='button' class='B' onClick='blo()'/>"
        }else {
            document.getElementById("b3").innerHTML= "<input type='button' class='A' onClick='blo2()'/>"
        }
        
        if(aleat == 3){
            document.getElementById("b4").innerHTML= "<input type='button' class='B' onClick='blo()'/>"
        }else {
            document.getElementById("b4").innerHTML= "<input type='button' class='A' onClick='blo2()'/>"
        }
        
        if(aleat == 4){
            document.getElementById("b5").innerHTML= "<input type='button' class='B' onClick='blo()'/>"
        }else {
            document.getElementById("b5").innerHTML= "<input type='button' class='A' onClick='blo2()'/>"
        }
        
        if(aleat == 5){
            document.getElementById("b6").innerHTML= "<input type='button' class='B' onClick='blo()'/>"
        }
        else {
            document.getElementById("b6").innerHTML= "<input type='button' class='A' onClick='blo2()'/>"
        }
        
        if(aleat == 6){
            document.getElementById("b7").innerHTML= "<input type='button' class='B' onClick='blo()'/>" 
        }else {
            document.getElementById("b7").innerHTML= "<input type='button' class='A' onClick='blo2()'/>"
        }
        
        if(aleat == 7){
            document.getElementById("b8").innerHTML= "<input type='button' class='B' onClick='blo()'/>" 
        }else {
            document.getElementById("b8").innerHTML= "<input type='button' class='A' onClick='blo2()'/>"
        }
        
        if(aleat == 8){
            document.getElementById("b9").innerHTML= "<input type='button' class='B' onClick='blo()'/>" 
        }else {
            document.getElementById("b9").innerHTML= "<input type='button' class='A' onClick='blo2()'/>"
        }
        
    }
}