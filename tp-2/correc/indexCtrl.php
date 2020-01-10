<?php
$formError = array();
$regexName = '/^[A-Z][a-zéèêàâîôùç\s-A-Z]+$/';
$regexSociety = '/^[a-zéèêàâîôùç\s-A-Z0-9]+$/';

if (isset($_POST['addCandidate'])){
    if(!empty($_POST['civility'])){
        if($_POST['civility'] == 'M.' || $_POST['civility'] == 'Mme.'){
            $civility = htmlspecialchars($_POST['civility']);
        }else{
            $formError['civility'] = 'Veuillez sélectionner une des propositions présentes dans la liste.';
        }
    }else{
        $_POST['civility'] = 'Veuillez sélectionner une des propositions présentes dans la liste.';
    }
    if(!empty($_POST['firstname'])){
        if(preg_match($regexName, $_POST['firstname'])){
            $firstname = htmlspecialchars($_POST['firstname']);
        }else{
            $formError['firstname'] = 'Le prénom doit contenir des lettres majuscules et minuscules, des tirets ou des espaces.';
        }
    }else{
        $formError['firstname'] = 'Veuillez entrer votre prénom';
    }
    if(!empty($_POST['lastname'])){
        if(filter_var($_POST['lastname'], FILTER_VALIDATE_REGEXP, array('options'=>array('regexp'=>$regexName)))){
            $lastname = htmlspecialchars($_POST['lastname']);
        }else{
            $formError['lastname'] = 'Le nom doit contenir des lettres majuscules et minuscules, des tirets ou des espaces.';
        }
    }else{
        $formError['lastname'] = 'Veuillez entrer votre nom';
    }
    if (!empty($_POST['age'])){
        if(filter_var($_POST['age'], FILTER_VALIDATE_INT)){
            if($_POST['age'] >= 0 && $_POST['age'] <= 120){
                $age = htmlspecialchars($_POST['age']);
            }else{
                $formError['age'] = 'Votre âge doit être compris entre 1 et 120 ans.';
            }
        }else{
            $formError['age'] = 'Veuillez entrer un nombre correcte.';
        }
    }else{
        $formError['age'] = 'Veuillez entrer votre age.';
    }
    if(!empty($_POST['society'])){
        if(preg_match($regexSociety, $_POST['society'])){
            $society = htmlspecialchars($_POST['society']);
        }else{
            $formError['society'] = 'Les caractères autorisés sont les lettres en majuscules/minuscules, les chiffres, les espaces, les tirrets et les accents.';
        }
    }else{
        $formError['society'] = 'Veuillez préciser votre société.';
    }
}