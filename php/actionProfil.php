<?php 
    include("../bdd/connecbdd.php");

    $action = $_GET['A'];

    if($action == "inscrip"){
        if(isset($_POST['pseudo']) && isset($_POST['mail']) && isset($_POST['mdp'])){
            $mail = mysqli_real_escape_string($db,htmlspecialchars($_POST['mail']));
            $mdp = mysqli_real_escape_string($db,htmlspecialchars($_POST['mdp']));
            $pseudo = mysqli_real_escape_string($db,htmlspecialchars($_POST['pseudo']));
        
            $requete = "INSERT INTO `utilisateur`(`mail`, `mdp`, `pseudo`) VALUES ('".$mail."','".$mdp."','".$pseudo."')";
            $exec_requete = mysqli_query($db,$requete) or die("Foobar");

            $requete = "UPDATE `utilisateur` SET statut = 'Hors-Ligne' WHERE mail = '" .$mail. "'";
            $exec_requete = mysqli_query($db,$requete) or die("Foobar");

            header('Location: ../login.php'); 
        }
        else {
            header('Location: ../register.php?erreur');
        }
        mysqli_close($db);
    }
    
    if($action == "deco"){ 
        $idUser = $_SESSION['id'];
        $requete = "UPDATE `utilisateur` SET statut = 'Hors-Ligne' WHERE id = " .$idUser. "";
        $exec_requete = mysqli_query($db,$requete) or die("Foobar");

        $_SESSION = array();
        session_destroy();
        header('Location: ../index.php');
    }       

    if($action == "login"){
        if(isset($_POST['mail']) && isset($_POST['password'])){
            // on applique les deux fonctions mysqli_real_escape_string et htmlspecialchars
            // pour éliminer toute attaque de type injection SQL et XSS
            $mail = mysqli_real_escape_string($db,htmlspecialchars($_POST['mail']));
            $password = mysqli_real_escape_string($db,htmlspecialchars($_POST['password']));
            
            if($mail !== "" && $password !== ""){
                $requete = "SELECT count(*) FROM utilisateur WHERE mail = '".$mail."' AND mdp = '".$password."' ";
                $exec_requete = mysqli_query($db,$requete);
                $reponse      = mysqli_fetch_array($exec_requete);
                $count = $reponse['count(*)'];
                if($count!=0) // nom d'utilisateur et mot de passe correctes
                {
                    $requete = "SELECT id FROM utilisateur where 
                    mail = '".$mail."' OR pseudo = '" .$mail. "' AND mdp = '".$password."' ";
                    $exec_requete = mysqli_query($db,$requete);
                    $reponse      = mysqli_fetch_array($exec_requete);

                    $_SESSION['id'] = $reponse['id'];
                    $requete = "UPDATE `utilisateur` SET statut = 'En ligne' WHERE id = " .$reponse['id']. "";
                    $exec_requete = mysqli_query($db,$requete) or die("Foobar");

                    header('Location: ../index.php');
                }
                else{
                    header('Location: ../login.php?erreur=1'); // utilisateur ou mot de passe incorrect
                }
            }
            else{
                header('Location: ../login.php?erreur=2'); // utilisateur ou mot de passe vide
            }
        }
        else{
            header('Location: ../login.php');
        }
         mysqli_close($db); // fermer la connexion 
    }

    if($action == "publier"){
        if(isset($_POST['nom']) && isset($_POST['desc'])){

            //Recuperer les valeurs du form
            $nom = mysqli_real_escape_string($db,htmlspecialchars($_POST['nom']));
            $desc = mysqli_real_escape_string($db,htmlspecialchars($_POST['desc']));
            $fichier = $_FILES['fichier'];

            $nomOrigine = $_FILES['fichier']['name'];
            $elementsChemin = pathinfo($nomOrigine);
            $extensionFichier = $elementsChemin['extension'];
            $extensionsAutorisees = array("zip");
            
            if (!(in_array($extensionFichier, $extensionsAutorisees))) {
                header('Location: ../UpDL.php?erreur=4');
            } 
            else {    
                $requete = "INSERT INTO `jeux`(`nom_jeux`, `descrip`, `telechar`, `type`) VALUES ('".$nom."','".$desc."','".$nomOrigine."','T')";
                $exec_requete = mysqli_query($db,$requete) or die("Foobar");

                $requete = "SELECT id, telechar FROM jeux WHERE nom_jeux = '". $nom ."'";
                $exec_requete = mysqli_query($db,$requete);
                $reponse = mysqli_fetch_array($exec_requete);

                //Creation d'un dossier pour contenir le jeu
                mkdir("../jeux/T/" .$reponse['id']. "", 0700);

                // Copie dans le repertoire du script avec un nom
                //a definir la limite
                $repertoireDestination = "../jeux/T/".$reponse['id']."/";
                $nomDestination = $reponse['telechar'];
                        
                if (move_uploaded_file($_FILES["fichier"]["tmp_name"],$repertoireDestination.$nomDestination)) {
                    if (isset($_FILES['img'])) {
                        // Pour récuperer tout les information du tableau
                        $myFile = $_FILES['img'];
                        // Pour compter le nombre d'element dans le tableau
                        $fileCount = count($myFile["name"]);
                        
                        // on boucle sur le tableau pour traiter les infromation 1 par 1
                        for ($i = 0; $i < $fileCount; $i++) {
                            // on récupere les ifomration pour verifier leur type (extention) si il est autoriser ou pas 
                            $nomOrigine =  $myFile["name"][$i];//$_FILES['monfichier']['name'];
                            $elementsChemin = pathinfo($nomOrigine);
                            $extensionFichier = $elementsChemin['extension'];
                            $extensionsAutorisees = array("png", "jpg", "gif");
                            if (!(in_array($extensionFichier, $extensionsAutorisees))) {
                                header('Location: ../UpDL.php?erreur=4');
                            }
                            else{    
        
                                // Copie dans le repertoire du script avec un nom
                                // incluant l'heure a la seconde pres 
                                $repertoireDestination = "../jeux/T/" .$reponse['id']. "/";
                                $nomDestination = $i + 1 .".". $extensionFichier;
                                //echo $nomDestination;
                    
                                $taille_max    = 104857600;
                                $taille_fichier = $myFile["size"][$i]; //filesize($_FILES['monfichier']['tmp_name']);
                                if ($taille_fichier < $taille_max){ // on verifie la taille du fichier
                    
                                    $nomfichier = $nomDestination; // on met la date au sont nom pour pas avoir 2 fichier avec                   un meme nom
                                    // on déplace le fichier dans le repertoire destinataire (la ou le fichier sera a la fin)
                                    move_uploaded_file($myFile["tmp_name"][$i],$repertoireDestination.$nomfichier);
                    
                                    //header('location:../index.php?media=0'); // redirige vers la page media
                    
                    
                                } 
                                else {
                                    header('Location: ../UpDL.php?erreur=3');
                                }
                            }
                        }
                    }
                    header('Location: ../profil.php');
                }
                else {
                    header('Location: ../UpDL.php?erreur=2');
                }
            }
        }
        else{
            header('Location: ../UpDL.php?erreur=1');
        }
    }

?>