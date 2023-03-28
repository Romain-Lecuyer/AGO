<?php

    include("../bdd/connecbdd.php");

        $action = $_GET['A'];
        $idUser = $_SESSION['id'];
        $idamis = $_GET['amis'];

    if($action == "ajouter"){
        $requete = "INSERT INTO `amis`(`demandeur`, `receveur`, `statut`) VALUES (" .$idUser. "," .$idamis. ",'attent')";
        $exec_requete = mysqli_query($db,$requete);

        $requete = 'SELECT * FROM utilisateur WHERE id = "' . $idamis . '"';
        $exec_requete = mysqli_query($db,$requete);
        $reponse = mysqli_fetch_array($exec_requete);
        header('Location: ../profil.php?pseudo='.$reponse['pseudo']);
        
    } 

    if($action == "enlever"){
        $requete = "DELETE FROM `amis`  WHERE (demandeur = " .$idUser. " AND receveur = " .$idamis. ") OR (demandeur = " .$idamis. " AND receveur = " .$idUser. ")";
        $exec_requete = mysqli_query($db,$requete);

        $requete = 'SELECT * FROM utilisateur WHERE id = "' . $idamis . '"';
        $exec_requete = mysqli_query($db,$requete);
        $reponse = mysqli_fetch_array($exec_requete);
        header('Location: ../profil.php?pseudo='.$reponse['pseudo']);
    }  

    if($action == "accepter"){
        $requete = "UPDATE `amis` SET statut = 'valider' WHERE demandeur = " .$idamis. " AND receveur = " .$idUser. "";
        $exec_requete = mysqli_query($db,$requete);
        header('Location: ../profil.php');
        
    } 

    if($action == "refuser"){
        $requete = "DELETE FROM `amis`  WHERE demandeur = " .$idamis. " AND receveur = " .$idUser. "";
        $exec_requete = mysqli_query($db,$requete);
        header('Location: ../profil.php');
    }  

    if($action == "blocker"){
        $requete = "UPDATE `amis` SET statut = 'blocker' WHERE demandeur = " .$idamis. " AND receveur = " .$idUser. "";
        $exec_requete = mysqli_query($db,$requete);
        header('Location: ../profil.php');
    }

?>