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
            <form action="php/actionProfil.php?A=inscrip" method="POST">
                <h1>Inscription</h1>
                
                <label><b>Nom d'utilisateur</b></label>
                <input type="text" placeholder="Entrer le nom d'utilisateur" name="username" required>

                <label><b>Adresse mail</b></label>
                <input type="text" placeholder="Entrer le mail" name="mail" required>

                <label><b>Choisissez un Mot de passe</b></label>
                <input type="password" placeholder="Entrer le mot de passe" name="password" required>

                <label><b>Confirmez le Mot de passe</b></label>
                <input type="password" placeholder="Confirmer le mot de passe" name="passwordConf" required>


                <input type="submit" id='submit' value="S'INSCRIPTION" >
                <?php
                if(isset($_GET['erreur'])){
                    $err = $_GET['erreur'];
                    if($err==1){
                        echo "<p style='color:red'>Nom d'utilisateur deja inscrit</p>";
                    }
                    if($err==2){
                        echo "<p style='color:red'>Mot de passe incorrect</p>";
                    }
                    if($err==3){
                        echo "<p style='color:red'>Echec d'inscription</p>";
                    }
                }
                ?>
                <p class="Inscriptiontext">Déjà un compte AGO ?</p>
                
                <a class="Inscriptionlien" href = "login.php">S'identifier</a>
                
            </form>
        </div>
    </body>
</html>