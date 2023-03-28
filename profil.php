<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>AGO.com</title>
        <link rel="stylesheet" href="css/StyleProfil.css">
    </head>
    <body>
    <header>

        <?php
        include("bdd/connecbdd.php");
        if(isset($_SESSION['id'])){
            if(isset($_GET['pseudo'])){
                $requete = 'SELECT * FROM utilisateur WHERE pseudo = "' . $_GET['pseudo'] . '"';
                $exec_requete = mysqli_query($db,$requete);
                $reponse = mysqli_fetch_array($exec_requete);
                $donnees = $reponse;
                $id= $donnees['id'];
            }else{
                $id = $_SESSION['id'];
                $requete = 'SELECT * FROM utilisateur WHERE id = "' . $id . '"';
                $exec_requete = mysqli_query($db,$requete);
                $reponse = mysqli_fetch_array($exec_requete);
                $donnees = $reponse;
            }

            
            if($donnees['img'] == ''){
                $image = 'logo';
            }else{
                $image = $donnees['img'];
            }
            echo'<a class="Titre" href="index.php">A.G.O</a>
            </header>';

            echo "<section class='Bodd'>
                <div class='box'>
                    <div class='cercle'>
                    <img class='imag' src='imaUser/".$image.".png' alt='Not image'>
                    </div>

                    <p class='name'>".$donnees['pseudo']."</p>
                    <p class='descrip'>" . $donnees['descrip'] . "</p><br>";
                    if(isset($_GET['pseudo']) && $donnees['id'] != $_SESSION['id']){
                        $requete5 = 'SELECT count(*) FROM amis WHERE (demandeur =  '.$id.'  AND receveur = '.$_SESSION['id'].') OR (demandeur = '.$_SESSION['id'].' AND receveur = '.$id.')';
                        $exec_requete5 = mysqli_query($db,$requete5);
                        $reponse5 = mysqli_fetch_array($exec_requete5);
                        $count = $reponse5['count(*)'];
                        if($count == 0){
                            echo"<form action='php/actionAmis.php?A=ajouter&amis=". $donnees['id'] ."' method='POST'><input type='submit' class='boutton' value='Ajouter'></form>";
                        }else{
                            echo"<form action='php/actionAmis.php?A=enlever&amis=". $donnees['id'] ."' method='POST'><input type='submit' class='boutton' value='Enlever'></form>";
                        }
                    }
            echo "  <br><br></div>
                <div class='box2'>
                <p class='titredescrip'>Liste Amis</p>
                <div class='scrol'>";
                $requete = "SELECT * FROM utilisateur INNER JOIN amis ON utilisateur.id = amis.demandeur  WHERE amis.demandeur = ". $id ."  AND amis.statut='valider' OR amis.receveur = ". $id ." AND amis.statut='valider'";
                $exec_requete = mysqli_query($db,$requete);
                while ($row = mysqli_fetch_assoc($exec_requete)){
                    if($row['receveur'] != $id){
                        $amis = $row['receveur'];
                    }else{$amis = $row['demandeur'];}

                    $requete2 = 'SELECT * FROM utilisateur WHERE id = "' . $amis . '"';
                    $exec_requete2 = mysqli_query($db,$requete2);
                    $reponse2 = mysqli_fetch_array($exec_requete2);
                    $donnees2 = $reponse2;
                    if($donnees2['img'] == ''){
                        $imageamis2 = 'logo';
                    }else{
                        $imageamis2 = $donnees2['img'];
                    }
                    echo"<div class='amis'>
                        <img class='imagamis' src='imaUser/".$imageamis2.".png' alt='Not image'>
                        <a class='pseudo' href='profil.php?pseudo=". $donnees2['pseudo'] ."' >". $donnees2['pseudo'] ."</a>
                        <p class='descrip'>". $donnees2['descrip'] ."</p>
                        <p class='statut'>". $donnees2['statut'] ."</p>
                    </div>
                    ";
                }

               echo "</div>";
                if(!isset($_GET['pseudo']) || $donnees['id'] == $_SESSION['id']){

                    echo "<p class='titredescrip'>En Attente</p><div class='scrol'>";
                    $requete = "SELECT * FROM utilisateur INNER JOIN amis ON utilisateur.id = amis.demandeur  WHERE amis.receveur = ". $id ." AND amis.statut='attent'";
                    $exec_requete = mysqli_query($db,$requete);
                    while ($row = mysqli_fetch_assoc($exec_requete)){
                        if($row['receveur'] != $id){
                            $amis = $row['receveur'];
                        }else{$amis = $row['demandeur'];}

                        $requete3 = 'SELECT * FROM utilisateur WHERE id = "' . $amis . '"';
                        $exec_requete3 = mysqli_query($db,$requete3);
                        $reponse3 = mysqli_fetch_array($exec_requete3);
                        $donnees3 = $reponse3;
                        if($donnees3['img'] == ''){
                            $imageamis3 = 'logo';
                        }else{
                            $imageamis3 = $donnees3['img'];
                        }
                        echo"<div class='amis'>
                            <img class='imagamis' src='imaUser/".$imageamis3.".png' alt='Not image'>
                            <a class='pseudo' href='profil.php?pseudo=". $donnees3['pseudo'] ."'>". $donnees3['pseudo'] ."</a>
                            <p class='descrip'>". $donnees3['descrip'] ."</p>
                            <div class='choix_amis'>
                                <form action='php/actionAmis.php?A=accepter&amis=". $donnees3['id'] ."' method='POST'><input type='submit' value='Accepter'></form>
                                <form action='php/actionAmis.php?A=refuser&amis=". $donnees3['id'] ."' method='POST'><input type='submit' value='refuser'></form>
                                <form action='php/actionAmis.php?A=blocker&amis=". $donnees3['id'] ."' method='POST'><input type='submit' value='blocker'></form>
                            </div>
                        </div>
                        ";
                    }
                    echo "</div>";
                }
               

               echo "<p class='titredescrip'>Jeux en Favori</p>
                <div class='scrol'>";
                
                $requete = "SELECT id, nom_jeux FROM jeux INNER JOIN favoris ON jeux.id = favoris.jeuxID WHERE favoris.utilisateurID = ". $id ."";
                $exec_requete = mysqli_query($db,$requete);
                $i = 1;
                while ($row = mysqli_fetch_assoc($exec_requete)){
                    echo"<div class='game'>
                    <a href='jeux.php?J=". $row['id'] ."'><img class='imag' src='image/" . $row['id'] . ".png' alt='Not image'></a>
                    </div>
                    ";
                }
                echo "</div></div>";
            }
            else{
                header('Location: index.php');
            }
        ?>
        
    </section>
    <script>
        function accepeter_amis(id){
            <?php ?>
        }
    </script>
    </body>
</html>