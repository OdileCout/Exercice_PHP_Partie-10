<?php

// On fait les regex à part à la première visite, quand le POST est vide
if (isset($_POST['registration'])) {
    // \s pour tous les espaces, sauts de ligne etc
    // i pour 'insensitive' (à la casse)
    $regName = '#^[\'a-zàâçèéêîôùû\s-]+$#i';
    $regAdress = '#^[\/\'a-zàâçèéêîôùû\s0-9-]+$#i';
    $regDate = '#^[0-9]{4}-[0-9]{2}-[0-9]{2}$#';
    $regMail = '#^[a-z0-9._-]+@[a-z0-9._-]+\.[a-z]{2,6}$#i';
    $regPE = '#^[\sa-z0-9-]+$#i';
    $regPhone = '#^[+0-9]+$#';
    $regBadges = '#^[1-5]$#';
    $regDegrees = '#^[+0-9a-zàâçèéêîôùû\s-]+$#i';
    $regUrl = '#^(https:|http:|www\.)*(.*)([.]{1})(.{2,})#i';

    /* On vérifie que le champ n'est pas vide 
      Puis qu'il correspond à la regex
      On a un message d'erreur pour chaque cas
      Utiliser de préférence la fonction 'filter_var' */
    if (!empty($_POST['firstName'])) {
        if (!preg_match($regName, $_POST['firstName'])) {
            $errorMessage['firstName'] = 'Vous avez mal rempli votre prénom';
        } else {
            /* htmlspecialchars = transforme/ désactive les balises (pour la sécurité : faille XSS)
             * != de strip_tags qui les enlève définitivement
             */
            $firstName = htmlspecialchars($_POST['firstName']);
        }
    } else {
        /* Penser à préciser QUEL champ a un pb 
          par ex pour les personnes malvoyantes */
        $errorMessage['firstName'] = 'Le champ prénom est vide';
    }
    if (!empty($_POST['lastName'])) {
        if (!preg_match($regName, $_POST['lastName'])) {
            $errorMessage['lastName'] = 'Vous avez mal rempli votre nom de famille';
        } else {
            $lastName = htmlspecialchars($_POST['lastName']);
        }
    } else {
        $errorMessage['lastName'] = 'Le champ nom de famille est vide';
    }
    if (!empty($_POST['birthDay'])) {
        if (!preg_match($regDate, $_POST['birthDay'])) {
            $errorMessage['birthDay'] = 'Vous avez mal rempli votre date d\'anniversaire';
        } else {
            $birthDay = htmlspecialchars($_POST['birthDay']);
        }
    } else {
        $errorMessage['birthDay'] = 'Le champ anniversaire est vide';
    }
    if (!empty($_POST['birthPlace'])) {
        if (!preg_match($regAdress, $_POST['birthPlace'])) {
            $errorMessage['birthPlace'] = 'Vous avez mal rempli votre lieu de naissance';
        } else {
            $birthPlace = htmlspecialchars($_POST['birthPlace']);
        }
    } else {
        $errorMessage['birthPlace'] = 'Le champ date lieu de naissance est vide';
    }
    if (!empty($_POST['adress'])) {
        if (!preg_match($regAdress, $_POST['adress'])) {
            $errorMessage['adress'] = 'Vous avez mal rempli votre adresse';
        } else {
            $adress = htmlspecialchars($_POST['adress']);
        }
    } else {
        $errorMessage['adress'] = 'Le champ adresse est vide';
    }
    if (!empty($_POST['email'])) {
        if (!preg_match($regMail, $_POST['email'])) {
            $errorMessage['email'] = 'Vous avez mal rempli votre adresse email';
        } else {
            $email = htmlspecialchars($_POST['email']);
        }
    } else {
        $errorMessage['email'] = 'Le champ adresse email est vide';
    }
    if (!empty($_POST['phoneNumber'])) {
        if (!preg_match($regPhone, $_POST['phoneNumber'])) {
            $errorMessage['phoneNumber'] = 'Vous avez mal rempli votre numéro de téléphone';
        } else {
            $phoneNumber = htmlspecialchars($_POST['phoneNumber']);
        }
    } else {
        $errorMessage['phoneNumber'] = 'Le champ numéro de téléphone est vide';
    }
    if (!empty($_POST['degrees'])) {
        if (!preg_match($regDegrees, $_POST['degrees'])) {
            $errorMessage['degrees'] = 'Vous avez mal rempli vos diplômes';
        } else {
            $degrees = htmlspecialchars($_POST['degrees']);
        }
    } else {
        $errorMessage['degrees'] = 'Le champ diplômes est vide';
    }
    if (!empty($_POST['poleEmploi'])) {
        if (!preg_match($regPE, $_POST['poleEmploi'])) {
            $errorMessage['poleEmploi'] = 'Vous avez mal rempli votre numéro pole emploi';
        } else {
            $poleEmploi = htmlspecialchars($_POST['poleEmploi']);
        }
    } else {
        $errorMessage['poleEmploi'] = 'Le champ numéro pole emploi est vide';
    }
    if (!empty($_POST['numberOfBadges'])) {
        if (!preg_match($regBadges, $_POST['numberOfBadges'])) {
            $errorMessage['numberOfBadges'] = 'Vous avez mal rempli votre nombre de badges';
        } else {
            $numberOfBadges = htmlspecialchars($_POST['numberOfBadges']);
        }
    } else {
        $errorMessage['numberOfBadges'] = 'Le champ nombres de badges est vide';
    }
    if (!empty($_POST['codeAcademy'])) {
        if (!preg_match($regUrl, $_POST['codeAcademy'])) {
            $errorMessage['codeAcademy'] = 'Vous avez mal rempli le champ lien code académie';
        } else {
            $codeAcademy = htmlspecialchars($_POST['codeAcademy']);
        }
    } else {
        $errorMessage['codeAcademy'] = 'Le champ lien code académie est vide';
    }
    if (!empty($_POST['hero'])) {
        if (!preg_match($regName, $_POST['hero'])) {
            $errorMessage['hero'] = 'Vous avez mal rempli le champ \'si vous étiez un héro\'';
        } else {
            $hero = htmlspecialchars($_POST['hero']);
        }
    } else {
        $errorMessage['hero'] = 'Le champ \'si vous étiez un héro\' est vide';
    }
    if (!empty($_POST['hack'])) {
        if (!preg_match($regName, $_POST['hack'])) {
            $errorMessage['hack'] = 'Vous avez mal rempli le champ \'hack\'';
        } else {
            $hack = htmlspecialchars($_POST['hack']);
        }
    } else {
        $errorMessage['hack'] = 'Le champ \'hack\' est vide';
    }
    if (!empty($_POST['experiences'])) {
        if (!preg_match($regName, $_POST['experiences'])) {
            $errorMessage['experiences'] = 'Vous avez mal rempli le champ expériences';
        } else {
            $experiences = htmlspecialchars($_POST['experiences']);
        }
    } else {
        $errorMessage['experiences'] = 'Le champ expériences est vide';
    }
}