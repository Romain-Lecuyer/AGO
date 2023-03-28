<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>AGO.com</title>
        <link rel="stylesheet" href="css/Style.css">
    </head>
    <body>
        <?php
            include("bdd/connecbdd.php");
            
        ?>
        <header>
            <input type="image" onclick="menu_on_off()" class="imagBouton" src="image/boutton.png" alt="Not image">
            <script>
                var open = 0;
                function menu_on_off(){
                    if(open == 0){
                        open = 1
                        document.getElementById("BackgMenu").className = "BCmenu";
                        document.getElementById("BackgMenu").innerHTML = "<input type='button' class='BotBC' onclick='menu_on_off()'>"
                        document.getElementById("Menu").className = "menu";                      

                        //à rajouter quand ce sera codé
                        //<br><br><br> <a class='Bacuielle'>Forum</a> <br><br><br> <a class='Bacuielle' href='boutique.php'>Boutique</a>

                        //<input type="image" onclick="openM()" class="imagBouton" src="image/boutton.png"alt="Not image">
                    }
                    else if(open == 1){
                        open = 0;
                        document.getElementById("BackgMenu").className = "";
                        document.getElementById("BackgMenu").innerHTML = "";
                        document.getElementById("Menu").className = "BCmenu_invisible";
                    }
                }
            </script>

            <a class="Titre" href="#">A.G.O </a>
            <?php
                if(isset($_SESSION['id'])){
                    echo"
                    <div class='menu_connecte'>
                        <a class='text' href='profil.php'>Jeux</a>
                        <a class='text' href='profil.php'>Amis</a>
                        <a class='text' href='profil.php'>Profil</a>
                        <a class='text' href='php/actionProfil.php?A=deco'>deconnection</a>
                    </div>
                    ";
                }

                else{
                    echo"
                    <div class='menu_defaut'>
                        <a class='login' href='login.php'>S'identifier</a>
                        <a class='register' href='register.php'>S'inscrire</a>
                    </div>
                    ";
                }
            
            ?>
        </header>

        <section class="Bodd" >
            <div id="BackgMenu" class="">
            </div>
            <div id= "Menu" class="BCmenu_invisible">
            <?php
                if(isset($_SESSION['id'])){
                    echo "<br><br> <a class='Bacuielle' href='profil.php'>Jeux</a><br><br><a class='Bacuielle' href='profil.php'>Amis</a><br><br> <a class='Bacuielle' href='profil.php'>Profil</a><br><br> <a class='Deconnect' href='php/actionProfil.php?A=deco'>Deconnection</a></div>";
                }else{
                    echo "<br><br> <a class='Bacuielle' href='login.php'>S'identifier</a><br><br> <a class='Bacuielle' href='register.php'>S'inscrire</a>";
                }
                ?>
            </div>

            <div>
                <a class="titre">Jeux Populaires</a>
                <input class="BTV" type="button" value=" Tout Voir " onclick="window.open('JP.html','_self')">
            </div>
            
            <div class="box">
                
                <div class="scrol">
                    <?php
                        $requete = "SELECT id, type FROM jeux ORDER BY nblike DESC";
                        $exec_requete = mysqli_query($db,$requete);
                        $i = 1; 
                        while ($row = mysqli_fetch_assoc($exec_requete)){
                            echo"
                            <div class='game'>
                            <a href='jeux.php?J=" . $row['id'] . "'><img class='imag' src='jeux/" .$row['type']. "/" . $row['id'] . "/1.png' alt='Not image'>
                            </a>
                            </div>
                            ";
                        }
                    ?>
                    
                </div>
            </div>

            <div>
                <a class="titre">Jeux Jouables en Téléchargement</a>
            </div>
            
            <div class="box">
                <div class="scrol">
                
                    
                    <?php
                        $requete = "SELECT id FROM jeux WHERE type = 'T'";
                        $exec_requete = mysqli_query($db,$requete);
                        $i = 1;
                        while ($row = mysqli_fetch_assoc($exec_requete)){
                            echo"
                            <div class='game'>
                            <a href='jeux.php?J=". $row['id'] ."'><img class='imag' src='jeux/T/" . $row['id'] . "/1.png'alt='Not image'><br>
                            </a>
                            </div>
                            ";
                        }
                    ?>
                    
                </div>
            </div>

            <div>
                <a class="titre">Jeux Jouables en Ligne</a>
            </div>
            <div class="box">
                <div class="scrol">
                    <?php
                        $requete = "SELECT id FROM jeux WHERE type = 'L'";
                        $exec_requete = mysqli_query($db,$requete);
                        $i = 1;
                        while ($row = mysqli_fetch_assoc($exec_requete)){
                            echo"
                            <div class='game'>
                            <a href='jeux.php?J=". $row['id'] ."'><img class='imag' src='jeux/L/" . $row['id'] . "/1.png' alt='Not image'><br>
                            </a>
                            </div>
                            ";
                        }
                    ?>
                </div>
            </div>


        </section>

        
    </body>
    <script type="text/javascript" src="js/autoJ.js"></script>    
</html>