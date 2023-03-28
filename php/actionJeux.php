<?php 
    include("../bdd/connecbdd.php");

    $action = $_GET['A'];

    if($action == "rajouter"){
        $jeu = $_GET['J'];
        $user = $_GET['U'];

        $requete = "INSERT INTO `favoris`(`utilisateurID`, `jeuxID`) VALUES ('".$user."','".$jeu."')";
        echo $requete;
         $exec_requete = mysqli_query($db,$requete) or die("Foobar");

        header('Location: ../jeux.php?J=' .$jeu. '');
    }

    if($action == "retirer"){
        $jeu = $_GET['J'];
        $user = $_GET['U'];

        $requete = "DELETE FROM `favoris` WHERE utilisateurID =" .$user. " AND jeuxID =" .$jeu. ";";
        $exec_requete = mysqli_query($db,$requete) or die("Foobar");

        header('Location: ../jeux.php?J=' .$jeu. '');
    }

?>