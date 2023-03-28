        <section class="BoddJeux">
            <div class='boxTitre'>
                <p class='titre'>Speed Click</p>
            </div>
            <div class="box">
                <div class="Cblock">
                    <div class="blocktime" >
                        <form name="chronoForm">
                            <input class="Chrono" type="text" name="chronotime" id="chronotime" value="00:00:00"/>
                            <div id="Bouton">
                                <input class="Start" type="button" name="startstop"  value="Commencer" onclick="blostart()"/>
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
                    <div class="BlockJeux">
                        <div class="C" id="b1">
                        </div>
                        <div class="C" id="b2">
                        </div>
                        <div class="C" id="b3">
                        </div>
                        <div class="C" id="b4">
                        </div>
                        <div class="C" id="b5">
                        </div>
                        <div class="C" id="b6">
                        </div>
                        <div class="C" id="b7">
                        </div>
                        <div class="C" id="b8">
                        </div>
                        <div class="C" id="b9">
                        </div>
                    </div>
                    <div class="BlockScord" >
                        <p class="tsc">Score :</p>
                        <p class="SC" id="scord">0</p>
                        
                    </div>
                </div>
            </div>
        </section>
<script type="text/javascript" src='jeux/L/2/Chrono.js'></script>
<script type="text/javascript" src='jeux/L/2/jeux.js'></script>