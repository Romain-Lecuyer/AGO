<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>AGO.com</title>
        <link rel="stylesheet" href="css/Style.css">
        <?php
            include("bdd/connecbdd.php");

            if(isset($_SESSION['id'])){
                $idUser = $_SESSION['id'];  
            }
            $idJeu = $_GET['J'];
            $requete = "SELECT id, nom_jeux, type, descrip, telechar FROM jeux WHERE id = ". $idJeu ."";
            $exec_requete = mysqli_query($db,$requete);
            $reponse = mysqli_fetch_array($exec_requete);
            echo"<link rel='stylesheet' href='jeux/L/" .$reponse['id']. "/StyleJeux.css'> ";
        ?>
    </head>
    <body>
        <header>
            <a class="Titre" href="index.php">A.G.O</a>
        </header>
        <?php
        if($reponse['type'] == 'L'){
            include("jeux/L/".$reponse['id']."/main.php");
        }
        if($reponse['type'] == 'T'){
            if(file_exists('jeux/T/' .$reponse['id']. '/1.png')){
                for($i = 1; $i <= 4; $i++){
                    if(file_exists('jeux/T/' .$reponse['id']. '/' .$i. '.png')){
                        echo"j'existe frer tkt";
                    }
                    else{
                        echo"t ki ?";
                    }
                }
            }
            else{
                echo"mettre l'image de AGO";
            }
        }
                
        ?>
        <section class="Bodd">
            <div class="boxjeuxdesc">
                <?php
                    /*
                    main: corps du jeu ou images
                    descrip: explication du jeu
                    */
                    if(!isset($_SESSION['id'])){
                        echo"<p class=''>Connectez vous pour rajouter aux favoris</p>";
                    }

                    else{
                        $requete2 = "SELECT count(*) FROM favoris where utilisateurID = ". $idUser ." AND jeuxID = ". $idJeu ."";
                        $exec_requete2 = mysqli_query($db,$requete2);
                        $reponse2 = mysqli_fetch_array($exec_requete2);
                        $count = $reponse2['count(*)'];

                        if($count == 0){
                            echo"<a class='favorie' href='php/actionJeux.php?A=rajouter&U=" .$idUser. "&J=" .$idJeu. "'> Rajouter aux favoris</a>"; 
                        }

                        elseif($count == 1){
                            echo"<a class='favorie' href='php/actionJeux.php?A=retirer&U=" .$idUser. "&J=" .$idJeu. "'> Enlever des favoris</a>"; 
                        }

                        else{
                            echo"<p class=''>Problème gestion des favoris </p>";
                        }
                    }
                    echo"
                    <p class='titredescrip'>Description</p>
                    <p class='descrip'>
                        ". $reponse['descrip'] ."
                    </p>";

                    if($reponse['type'] == 'T'){
                        echo"
                        <p class='titretelechargement'>Téléchargement</p>
                        <a class='telechargement' href='jeux/T/" .$reponse['id']. "/". $reponse['telechar'] ."'> ". $reponse['telechar'] ." </a>";
                    }

                    

                    ?>

            </div>
        </section>
        


    </body>
</html>
    