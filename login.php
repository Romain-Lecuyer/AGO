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
            <form action="php/actionProfil.php?A=login" method="POST">
                <h1>Connexion</h1>
                
                <label><b>E-mail / Pseudo</b></label>
                <input type="text" placeholder="Entrer le mail" name="mail" required>

                <label><b>Mot de passe</b></label>
                <input type="password" placeholder="Entrer le mot de passe" name="password" required>

                <input type="submit" id='submit' value="S'IDENTIFIER" >
                <?php
                if(isset($_GET['erreur'])){
                    $err = $_GET['erreur'];
                    if($err==1 || $err==2){
                        echo "<p style='color:red'>Utilisateur ou mot de passe incorrect</p>";
                    }
                    if($err==3){
                        echo "<p style='color:green'>Connecter-vous</p>";
                    }

                }
                ?>
                <p class="Inscriptiontext">Si vous n'avez pas de Compte AGO</p>
                
                <a class="Inscriptionlien" href = "register.php">Inscrivez-vous</a>
                
            </form>
        </div>
    </body>
</html>