<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>AGO.com</title>
        <link rel="stylesheet" href="css/loginstyle.css">
        <p class="Titre">A.G.O</p>
    </head>
    <body>
        <div id="container">            
            <form enctype="multipart/form-data" action="php/actionProfil.php?A=publier" method="POST">
                <h1>Publier un jeu</h1>
                
                <label><b>Nom</b></label>
                <input type="text" maxlength= "50" placeholder="Entrez le nom du jeu" name="nom" required>

                <label><b>Description</b></label>
                <input type="text" maxlength="256" placeholder="Entrer la description" name="desc" required>

                <label><b>Jeu (zip seulement)</b></label>
                <input type="file" name="fichier" accept=".zip" required> <br><br>

                <label><b>Images (png seulement) (Jusqu'à 3)</b></label>
                <input type="hidden" name="MAX_FILE_SIZE" value="104857600"/>
                <input type="file" name="img[]" multiple/>

                <input type="submit" id='submit' value="Publier" >
                <?php
                if(isset($_GET['erreur'])){
                    $err = $_GET['erreur'];
                    if($err==1){
                        echo "<p style='color:red'>Eléments manquants</p>";
                    }
                    if($err==2){
                        echo "<p style='color:red'>Erreur sur l'upload des fichiers</p>";
                    }
                    if($err==3){
                        echo "<p style='color:red'>Fichiers trop volumineux</p>";
                    }
                    if($err==4){
                        echo "<p style='color:red'>Problème d'extension</p>";
                    }
                }
                ?>
            </form>
        </div>
    </body>
</html>