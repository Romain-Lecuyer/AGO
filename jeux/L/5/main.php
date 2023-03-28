<section class="BoddJeux">
    <div class="box">
        <div class="Cblock">
            <div class="BlockJeux">
                <div class="B3">
                    <p id = "POM"> plus ou moins</p>    
                </div>
                <div class="B1" id="b1">
                    <input class="inp" type="text" maxlength="5" id="nombre" placeholder="entré nombre">
                </div>
                <div class="B4" id="b4">
                    <input class="ok" type="button" value="ok" onClick="Rnb()">
                </div>
                <div class="B2" id="b2">
                    <p class="hist">Historique</p>
                    <p class="histnb" id="hnb" value=""></p>
                </div>
                
                <div class="B5" id="b5">
                    <p class="essey" >Nombre D'essais</p>
                    <p class="esseyNB" id = "essaie">0</p>
                </div>
            </div>
            <div class="blocktime" >
                <form name="chronoForm">
                    <div id="Bouton">
                        <input class="Start" type="button" name="startstop" value="Commencer" onClick="Refresh()" />
                    </div>
                    <br><br>
                            <p class='choixdiff' id='choixdiff'>FACILE</p>
                            <br>

                            <div id="Diff1">
                                <input class="Diff1" type="button" value="Facile" onclick="changerdifficulter(1)"/>
                            </div>
                            <br>
                            <div id="Diff2">
                                <input class="Diff2" type="button" value="Moyen" onclick="changerdifficulter(2)"/>
                            </div>
                            <br>
                            <div id="Diff3">
                                <input class="Diff3" type="button" value="Difficile" onclick="changerdifficulter(3)"/>
                            </div>  
                </form>
            </div> 
        </div>
    </div>
</section>

<script type="text/javascript" src='jeux/L/5/JP.js' async></script>