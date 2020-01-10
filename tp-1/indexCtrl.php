<?php

$formError = array(); // la j'ai declaré un tableau formError
$regexName = '/^[A-Z][A-Za-z\é\è\ê\- ]+$/'; //regex pour le nom de famille, prénom, et tous les champ avec que des texts tex 
$regexDateOfBirth = '/^(0?[1-9]|[12][0-9]|3[01])[\/\-](0?[1-9]|1[012])[\/\-]\d{4}$/';
$regexAdress = '^$'; // regex de l'adresse postale
$regexMailAdress = '/[-0-9a-zA-Z.+_]+@[-0-9a-zA-Z.+_]+.[a-zA-Z]{2,4}/'; // regex de l'adresse email
$regexPhoneNumber = ''; // regex du numéro de téléphone
$regexAnswer = ''; //regex des trois réponses du champ d'explication
$regexOflink = ''; // regex pour le champ du lien codecademy
$regexNumber = ''; // regex pour le nombre des badges et le numéro pôle emploi
// la on verifie que le bouton submit existe et que l'on a validé le formulaire
if (isset($_POST['addCandidate'])) {
    //verification du champs du nom de famille
    if (!empty($_POST['name'])) {// le empty fait deja le isset !=different de
        if (preg_match($regexName, $_POST['name'])) {
            $name = htmlspecialchars($_POST['name']); // strtags va supprimer les tags, cad des elements ex, il voit un chevron, il le supprime alors que htmlspecialchars va proteger le chevron et l'ecrire dans un autre language pour devenir inoffensif
        } else {// l'avantage de ne pas utiliser les && est de personnaliser les erreurs
            $formError['name'] = 'le nom ne doit contenir que des lettres en majuscule et en minuscule et doit commencer par une majuscule';
        }
    } else {
        $formError['name'] = 'Veuillez saisir votre nom';
    }
    //verification du champs du prénom
    if (!empty($_POST['secondName'])) {// le empty fait deja le isset !=different de
        if (preg_match($regexName, $_POST['secondName'])) {
            $secondName = htmlspecialchars($_POST['secondName']); // strtags va supprimer les tags, cad des elements ex, il voit un chevron, il le supprime alors que htmlspecialchars va proteger le chevron et l'ecrire dans un autre language pour devenir inoffensif
        } else {// l'avantage de ne pas utiliser les && est de personnaliser les erreurs
            $formError['secondName'] = 'le Prénom ne doit contenir que des lettres en majuscule et en minuscule et doit commencer par une majuscule';
        }
    } else {
        $formError['secondName'] = 'Veuillez saisir votre Prénom';
    }
    //verification de la date de naissance
    if (!empty($_POST['dateOfBirth'])) {
        if (preg_match($regexDateOfBirth, $_POST['dateOfBirth'])) {
            $dateOfBirth = htmlspecialchars($_POST['dateOfBirth']);
        } else {
            $formError['dateOfBirth'] = 'Votre date de naissance doit contenir ques des nombres, separer par des slash';
        }
    } else {
        $formError['dateOfBirth'] = 'Veuillez saisir votre Date de naissance';
    }
    //verification du champ du pays de naissance
    if (!empty($_POST['countryOfBirth'])) {// le empty fait deja le isset !=different de
        if (preg_match($regexName, $_POST['countryOfBirth'])) {
            $countryOfBirth = htmlspecialchars($_POST['countryOfBirth']);
        } else {
            $formError['countryOfBirth'] = 'Veillez mettre le bon nom';
        }
    } else {
        $formError['countryOfBirth'] = 'Veuillez saisir votre pays de naissance';
    }
    //verification de la nationalité
    if (!empty($_POST['nationality'])) {
        if (preg_match($regexName, $_POST['nationality'])) {
            $nationality = htmlspecialchars($_POST['nationality']);
        } else {
            $formError['nationality'] = 'Veillez mettre le bon nom';
        }
    } else {
        $formError['nationality'] = 'Veuillez saisir votre nationalité';
    }
    //verification de l'adresse postale
    if (!empty($_POST['adress'])) {
        if (preg_match($regexadress, $_POST['adress'])) {
            $adress = htmlspecialchars($_POST['adress']);
        } else {
            $formError['adress'] = 'Veillez mettre la bonne adresse';
        }
    } else {
        $formError['adress'] = 'Veuillez saisir votre adresse postale';
    }
    //verification de l'email
    if (!empty($_POST['email'])) {
        if (preg_match($regexMailAdress, $_POST['email'])) {
            $mailAdress = htmlspecialchars($_POST['email']);
        } else {
            $formError['email'] = 'Veillez mettre la bonne adresse';
        }
    } else {
        $formError['email'] = 'Veuillez saisir votre adresse email';
    }
    //verification de numero de téléphone
    if (!empty($_POST['numberOfPhone'])) {
        if (preg_match($regexPhoneNumber, $_POST['numberOfPhone'])) {
            $phoneNumber = htmlspecialchars($_POST['numberOfPhone']);
        } else {
            $formError['numberOfPhone'] = 'Veillez mettre la un bon numéro de téléphone';
        }
    } else {
        $formError['numberOfPhone'] = 'Veuillez saisir votre numéro de téléphone';
    }
    //verification de diplome
    if (!empty($_POST['diplome'])) {
        if (preg_match($regexName, $_POST['diplome'])) {
            $diplome = htmlspecialchars($_POST['diplome']);
        } else {
            $formError['diplome'] = 'Veillez mettre le bon';
        }
    } else {
        $formError['diplome'] = 'Veillez choisir ce qui vous correspod';
    }
    //verification de numero pôle emploi
    if (!empty($_POST['numberPoleEmploi'])) {
        if (preg_match($regexNumber, $_POST['numberPoleEmploi'])) {
            $numberPoleEmploi = htmlspecialchars($_POST['numberPoleEmploi']);
        } else {
            $formError['numberPoleEmploi'] = 'Veillez mettre le bon';
        }
    } else {
        $formError['numberPoleEmploi'] = 'Veillez choisir ce qui vous correspod';
    }
    //verification de nombre de badge
    if (!empty($_POST['numberOfBadge'])) {
        if (preg_match($regexNumber, $_POST['numberOfBadge'])) {
            $numberOfBadge = htmlspecialchars($_POST['numberOfBadge']);
        } else {
            $formError['numberOfBadge'] = 'Veillez mettre le bon';
        }
    } else {
        $formError['numberOfBadge'] = 'Veillez choisir ce qui vous correspod';
    }
    //verification du lien codecademy
    if (!empty($_POST['codeacademy'])) {
        if (preg_match($regexOflink, $_POST['codeacademy'])) {
            $codeacademy = htmlspecialchars($_POST['codeacademy']);
        } else {
            $formError['codeacademy'] = 'Veillez mettre le bon lien';
        }
    } else {
        $formError['codeacademy'] = 'Veillez remplir le champ le lien codecademy';
    }
    //verification des trait de caractère
    if (!empty($_POST['caracter'])) {
        if (preg_match($regexAnswer, $_POST['caracter'])) {
            $caracter = htmlspecialchars($_POST['caracter']);
        } else {
            $formError['caracter'] = 'Votre phrase ne devrait pas contenier des ......';
        }
    } else {
        $formError['caracter'] = 'Veillez remplir le champ';
    }
    //verification de l'experience hacks
    if (!empty($_POST['hacks'])) {
        if (preg_match($regexAnswer, $_POST['hacks'])) {
            $hacks = htmlspecialchars($_POST['hacks']);
        } else {
            $formError['hacks'] = 'Votre phrase ne devrait pas contenier des ......';
        }
    } else {
        $formError['hacks'] = 'Veillez remplir le champ';
    }
    //verification de l'expérience informatique
    if (!empty($_POST['experience'])) {
        if (preg_match($regexAnswer, $_POST['experience'])) {
            $experience = htmlspecialchars($_POST['experience']);
        } else {
            $formError['experience'] = 'Votre phrase ne devrait pas contenier des ......';
        }
    } else {
        $formError['experience'] = 'Veillez remplir le champ';
    }
}

