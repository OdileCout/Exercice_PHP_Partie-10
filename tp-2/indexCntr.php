<?php

//on stock les regex à verifier dans des variables
$regexName = '/^[A-Z][A-Za-z\é\è\ê\- ]+$/'; 
$regexCivility = '#^[+0-9a-zàâçèéêîôùû\s-]+$#i';
$regexOld = '#^[0-9]?[0-9]{1}$|^100$#i';
$regexSociety = '#^[\/\'a-zàâçèéêîôùû\s0-9-]+$#i';
$tableErrors = array();
if (isset($_POST['validateBoutton'])) {//on verifie par le boutton de validation du formulaire ($_POST['validateBoutton']) si les champs sont remplies
    if (!empty($_POST['civility'])) { // On verifie si le champ civilité est vide avec la fonction empty()
        if (!preg_match($regexCivility, $_POST['civility'])) { // On verifie le saisie dans $_POST['civility'] si le saisie correspond à la fonction de verification et sécurité preg_match() qu'on a fait
            $tableErrors['civility'] = 'Veillez bien faire votre choix'; // ne correspond pas, on affiche ce message d'erreur
        } else {
            $choise = htmlspecialchars($_POST['civility']); // sinon on recupère le saisie dans une variable $choise dans htmlspecialchars (qui recupère tout les saisie mais transforme les balise en caractère spécieaux html s'il y en a)
            /* htmlspecialchars = transforme/ désactive les balises (pour la sécurité : faille XSS)
             * != de strip_tags qui les enlève définitivement
             */
        }
    } else {
        $tableErrors['civility'] = 'Vous avez pas encore fait votre choix de civilité';
    }
    // verification du nom de famille
    if (!empty($_POST['lastName'])) { // On verifie si le champ du nom est vide avec la fonction empty()
        if (!preg_match($regexName, $_POST['lastName'])) { // On verifie si le saisie dans $_POST['lastName'] correspond à la fonction de verification et sécurité preg_match() qu'on a fait
            $tableErrors['lastName'] = 'Veillez bien saisir votre Nom (avec des lettres qui débutent par un majuscule)'; // ne correspond pas, on affiche ce message d'erreur
        } else {
            $lastName = htmlspecialchars($_POST['lastName']); // sinon on recupère le saisie dans une variable $choise dans htmlspecialchars (qui recupère tout les saisie mais transforme les balise en caractère spécieaux html s'il y en a)
        }
    } else {
        $tableErrors['lastName'] = 'Veillez saisir votre nom';
    }
    //verification de l'du prénom
    if (!empty($_POST['firstName'])) { // On verifie si le champ de le prénom est vide avec la fonction empty()
        if (!preg_match($regexName, $_POST['firstName'])) { // On verifie si le saisie dans $_POST['firstName'] correspond à la fonction de verification et sécurité preg_match() qu'on a fait
            $tableErrors['firstName'] = 'Veillez bien saisir votre Prénom (avec des lettres qui débutent par un majuscule)'; // ne correspond pas, on affiche ce message d'erreur
        } else {
            $firstName = htmlspecialchars($_POST['firstName']); // sinon on recupère le saisie dans une variable $choise dans htmlspecialchars (qui recupère tout les saisie mais transforme les balise en caractère spécieaux html s'il y en a)
        }
    } else {
        $tableErrors['firstName'] = 'Veillez saisir votre prénom';
    }
    //verification de l'age
    if (!empty($_POST['old'])) { // On verifie si le champ de l'age est vide avec la fonction empty()
        if (!preg_match($regexOld, $_POST['old'])) { // On verifie si le saisie dans $_POST['firstName'] correspond à la fonction de verification et sécurité preg_match() qu'on a fait
            $tableErrors['old'] = 'Veillez bien saisir votre age'; // ne correspond pas, on affiche ce message d'erreur
        } else {
            $old = htmlspecialchars($_POST['old']); // sinon on recupère le saisie dans une variable $choise dans htmlspecialchars (qui recupère tout les saisie mais transforme les balise en caractère spécieaux html s'il y en a)
        }
    } else {
        $tableErrors['old'] = 'Veillez saisir votre age ';
    }
    //verification de la société 
    if (!empty($_POST['society'])) { // On verifie si le champ de la société est vide avec la fonction empty()
        if (!preg_match($regexSociety, $_POST['society'])) { // On verifie si le saisie dans $_POST['society'] correspond à la fonction de verification et sécurité preg_match() qu'on a fait
            $tableErrors['society'] = 'Veillez bien remplir le champ'; // ne correspond pas, on affiche ce message d'erreur
        } else {
            $society = htmlspecialchars($_POST['society']); // sinon on recupère le saisie dans une variable $choise dans htmlspecialchars (qui recupère tout les saisie mais transforme les balise en caractère spécieaux html s'il y en a)
        }
    } else {
        $tableErrors['society'] = 'Veillez saisir votre société ';
    }
}
?>