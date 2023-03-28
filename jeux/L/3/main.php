        <section class="BoddJeux">
        <div class='boxTitre'>
                <p class='titre'>Simon</p>
            </div>
            <div class="box">
                <div class="Cblock">
                    <div class="BlockJeux">
                        <div class="B1" id="b1">
                        </div>
                        <div class="B2" id="b2">
                        </div>
                        <div class="B3"></div>
                        <div class="B4" id="b4">
                        </div>
                        <div class="B5" id="b5">
                        </div>
                    </div>
                    <div class="blocktime" >
                        <form name="chronoForm">
                            <div id="Bouton">
                                <input class="Start" type="button" name="startstop"  value="Commencer" onClick="Start()" />
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
                    <div class="BlockScord" >
                        <p class="tsc">Score :</p>
                        <p class="SC" id="scord">0</p>
                    </div>     
                </div>
            </div>
        </section>
<script type="text/javascript" src='jeux/L/3/Starting.js' async></script>
<script type="text/javascript" src='jeux/L/3/jeuxSimon.js' async></script>