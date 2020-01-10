<?php
// je stocke dans la variable '$patternName' ma regex pour les noms !
$patternName = '%^([A-Z]{1}[a-zÀ-ÖØ-öø-ÿ]+)([- ]{1}[A-Z]{1}[a-zÀ-ÖØ-öø-ÿ]+){0,1}$%';
$regexDateOfBorn = '/^(((0[1-9])|(1\d)|(2\d)|(3[0-1]))\/((0[1-9])|(1[0-2]))\/(\d{4}))$/gm';
$regexPostalAdress = '';
$mailAdressRegex = '/[-0-9a-zA-Z.+_]+@[-0-9a-zA-Z.+_]+.[a-zA-Z]{2,4}/igm';
$numberPhoneRegex = '/((\+)33|0|0033)[1-9](\d{2}){4}/igm';
$linkRegex = '\^(http|https|ftp):\/\/([\w]*)\.([\w]*)\.(com|net|org|biz|info|mobi|us|cc|bz|tv|ws|name|co|me)(\.[a-z]{1,3})?\z/i';
// je créé un tableau qui va contenir mes erreurs.
$formErrors = array();
// On vérifie le nombre de lignes dans le tableau POST qui contient toutes les données saisies dans le formulaire.
if (count($_POST) > 0) {
    // on vérifie que la variable $_POST['lastName'] existe ET n'est pas vide.
    if (!empty($_POST['lastName'])) {
        // Je vérifie bien que ma variable $_POST['lastName'] correspond à ma patternName.
        if (preg_match($patternName, $_POST['lastName'])) {
            // On stocke dans la variable lastName la variable $_POST['lastName'] dont on a désactivé les balises HTML.
            $lastName = htmlspecialchars($_POST['lastName']);
        } else {
            // Si la saisie utilisateur ne correspond pas à la regex on va stocker une erreur lastName dans notre tableau d'erreurs.
            $formErrors['lastName'] = 'Vôtre nom de famille est incorrect';
        }
    } else {
        // On va réutiliser notre erreur lastName parce que les deux ne peuvent pas exister en même temps.
        $formErrors['lastName'] = 'Veuillez renseigner votre nom de famille';
    }

    if (!empty($_POST['firstName'])) {
        if (preg_match($patternName, $_POST['firstName'])) {
            $firstName = htmlspecialchars($_POST['firstName']);
        } else {
            $formErrors['firstName'] = 'Vôtre prénom est incorrect';
        }
    } else {
        $formErrors['firstName'] = 'Veuillez renseigner votre prénom';
    }
    if (!empty($_POST['dateOfBorn'])) {
        if (preg_match($patternName, $_POST['dateOfBorn'])) {
            $dateOfBorn = htmlspecialchars($_POST['dateOfBorn']);
        } else {
            $formErrors['dateOfBorn'] = 'Vôtre votre date de naissance est incorrect';
        }
    } else {
        $formErrors['dateOfBorn'] = 'Veuillez renseigner votre votre date de naissance';
    }
    if (!empty($_POST['countryOfBorn'])) {
        if (preg_match($patternName, $_POST['countryOfBorn'])) {
            $countryOfBorn = htmlspecialchars($_POST['countryOfBorn']);
        } else {
            $formErrors['countryOfBorn'] = 'Vôtre votre pays de naissance est incorrect';
        }
    } else {
        $formErrors['countryOfBorn'] = 'Veuillez renseigner votre pays de naissance';
    }

    /* if (!empty($_POST['title'])) {
      if ($_POST['title'] === 'Monsieur' || $_POST['title'] === 'Madame') {
      $title = $_POST['title'];
      } else {
      $formErrors['title'] = 'Vôtre civilité est incorrecte';
      }
      } else {
      $formErrors['title'] = 'Veuillez renseigner votre civilité';
      }
      // On verifie que le fichier a bien été envoyé.
      if (!empty($_FILES['file']) && $_FILES['file']['error'] == 0) {
      // On stock dans $fileInfos les informations concernant le chemin du fichier.
      $fileInfos = pathinfo($_FILES['file']['name']);
      // On crée un tableau contenant les extensions autorisées.
      $fileExtension = ['pdf', 'PDF', 'Pdf'];
      // On verifie si l'extension de notre fichier est dans le tableau des extension autorisées.
      if (in_array($fileInfos['extension'], $fileExtension)) {
      //On définit le chemin vers lequel uploader le fichier
      $path = 'uploads/';
      //On crée une date pour différencier les fichiers
      $date = date('Y-m-d_H-i-s');
      //On crée le nouveau nom du fichier (celui qu'il aura une fois uploadé)
      $fileNewName = $lastName . $firstName . '_' . $date;
      //On stocke dans une variable le chemin complet du fichier (chemin + nouveau nom + extension une fois uploadé) Attention : ne pas oublier le point
      $fileFullPath = $path . $fileNewName . '.' . $fileInfos['extension'];
      //move_uploaded_files : déplace le fichier depuis son emplacement temporaire ($_FILES['file']['tmp_name']) vers son emplacement définitif ($fileFullPath)
      if (move_uploaded_file($_FILES['file']['tmp_name'], $fileFullPath)) {
      //On définit les droits du fichiers uploadé (Ici : écriture et lecture pour l'utilisateur apache, lecture uniquement pour le groupe et tout le monde)
      chmod($fileFullPath, 0644);
      } else {
      $formErrors['file'] = 'Votre fichier ne s\'est pas téléversé correctement';
      }
      } else {
      $formErrors['file'] = 'Votre fichier n\'est pas du format attendu';
      }
      } else {
      $formErrors['file'] = 'Veuillez selectionner un fichier';
      } */
}
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootswatch/4.3.1/journal/bootstrap.min.css" />
        <link rel="stylesheet" href="style.css" />
        <title>PHP Partie 10 tp-1</title>
    </head>
    <body>
        <div class="container">
            <?php
// On affiche le formulaire si rien a été envoyé ou qu'il y a une erreur dans ce qui à été saisi.
            if (count($_POST) == 0 || count($formErrors) > 0) {
                ?>
                <form method="POST" action="index.php" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="lastName">Nom</label>
                        <?php
                        /* On donne en valeur à notre input ce qui a été saisi par notre utilisateur . ça permet à l'utilisateur de ne pas ressaisir ses données en cas d'erreur
                         * isset($_POST['lastName']) ? $_POST['lastName'] : ''
                         * Si $_POST['lastName'] existe (?) alors on affiche $_POST['lastName'] (:) Sinon on affiche rien.
                         */
                        ?>
                        <input type="text" value="<?= isset($_POST['lastName']) ? $_POST['lastName'] : '' ?>" name="lastName" class="form-control" id="lastName" placeholder="Dupont" required />
                        <?php
                        // On affiche un alerte rouge qui contient le texte de l'erreur s'il y en à une.
                        if (isset($formErrors['lastName'])) {
                            ?>
                            <div class="alert-danger">
                                <p><?= $formErrors['lastName'] ?></p>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="form-group">
                        <label for="firstName">Prénom</label>
                        <input type="text" value="<?= isset($_POST['firstName']) ? $_POST['firstName'] : '' ?>" name="firstName" class="form-control" id="firstName" placeholder="Jean" required />
                        <?php if (isset($formErrors['firstName'])) { ?>
                            <div class="alert-danger">
                                <p><?= $formErrors['firstName'] ?></p>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="form-group">
                        <label for="dateOfBorn">Date de naissance: </label>
                        <input type="text" value="<?= isset($_POST['dateOfBorn']) ? $_POST['dateOfBorn'] : '' ?>" name="dateOfBorn" class="form-control" id="dateOfBorn" placeholder="30/05/1955" required />
                        <?php if (isset($formErrors['dateOfBorn'])) { ?>
                            <div class="alert-danger">
                                <p><?= $formErrors['dateOfBorn'] ?></p>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="form-group">
                        <label for="countryOfBorn">Pays de naissance: </label>
                        <input type="text" value="<?= isset($_POST['countryOfBorn']) ? $_POST['countryOfBorn'] : '' ?>" name="countryOfBorn" class="form-control" id="countryOfBorn" placeholder="France" required />
                        <?php if (isset($formErrors['dateOfBorn'])) { ?>
                            <div class="alert-danger">
                                <p><?= $formErrors['dateOfBorn'] ?></p>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="form-group">
                        <label for="nationality">Nationalité: </label>
                        <input type="text" value="<?= isset($_POST['nationality']) ? $_POST['nationality'] : '' ?>" name="nationality" class="form-control" id="nationality" placeholder="Français" required />
                        <?php if (isset($formErrors['nationality'])) { ?>
                            <div class="alert-danger">
                                <p><?= $formErrors['nationality'] ?></p>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="form-group">
                        <label for="adress">Adresse: </label>
                        <input type="text" value="<?= isset($_POST['adress']) ? $_POST['adress'] : '' ?>" name="adress" class="form-control" id="adress" placeholder="5 rue des Voges, Mitry 50210, France" required />
                        <?php if (isset($formErrors['adress'])) { ?>
                            <div class="alert-danger">
                                <p><?= $formErrors['adress'] ?></p>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="form-group">
                        <label for="mailAdress">Email: </label>
                        <input type="text" value="<?= isset($_POST['mailAdress']) ? $_POST['mailAdress'] : '' ?>" name="mailAdress" class="form-control" id="mailAdress" placeholder="exemple@yahoo.com" required />
                        <?php if (isset($formErrors['mailAdress'])) { ?>
                            <div class="alert-danger">
                                <p><?= $formErrors['mailAdress'] ?></p>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="form-group">
                        <label for="numberPhone">Téléphone: </label>
                        <input type="text" value="<?= isset($_POST['numberPhone']) ? $_POST['numberPhone'] : '' ?>" name="numberPhone" class="form-control" id="numberPhone" placeholder="06 34 56 57 85" required />
                        <?php if (isset($formErrors['numberPhone'])) { ?>
                            <div class="alert-danger">
                                <p><?= $formErrors['numberPhone'] ?></p>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="form-group">
                        <label for="diploma">Diplôme (sans, Bac, Bac+2, Bac+3 ou supérieur): </label>
                        <input type="text" value="<?= isset($_POST['diploma']) ? $_POST['diploma'] : '' ?>" name="diploma" class="form-control" id="diploma" placeholder="" required />
                        <?php if (isset($formErrors['diploma'])) { ?>
                            <div class="alert-danger">
                                <p><?= $formErrors['diploma'] ?></p>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="form-group">
                        <label for="poleemploiNumber">Numéro pôle emploi: </label>
                        <input type="text" value="<?= isset($_POST['poleemploiNumber']) ? $_POST['poleemploiNumber'] : '' ?>" name="poleemploiNumber" class="form-control" id="poleemploiNumber" placeholder="" required />
                        <?php if (isset($formErrors['poleemploiNumber'])) { ?>
                            <div class="alert-danger">
                                <p><?= $formErrors['poleemploiNumber'] ?></p>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="form-group">
                        <label for="badgeNumber">Numéro de badge: </label>
                        <input type="text" value="<?= isset($_POST['badgeNumber']) ? $_POST['badgeNumber'] : '' ?>" name="badgeNumber" class="form-control" id="badgeNumber" placeholder="" required />
                        <?php if (isset($formErrors['badgeNumber'])) { ?>
                            <div class="alert-danger">
                                <p><?= $formErrors['badgeNumber'] ?></p>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="form-group">
                        <label for="getLink">Lien codecademy: </label>
                        <input type="text" value="<?= isset($_POST['getLink']) ? $_POST['getLink'] : '' ?>" name="getLink" class="form-control" id="getLink" placeholder="" required />
                        <?php if (isset($formErrors['getLink'])) { ?>
                            <div class="alert-danger">
                                <p><?= $formErrors['getLink'] ?></p>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="form-group">
                        <label for="featureCharacter">Si vous étiez un super héros/une super héroïne, qui seriez-vous et pourquoi?: </label>
                        <textarea type="text" value="<?= isset($_POST['featureCharacter']) ? $_POST['featureCharacter'] : '' ?>" name="featureCharacter" class="form-control" id="featureCharacter" placeholder="" required></textarea>
                        <?php if (isset($formErrors['featureCharacter'])) { ?>
                            <div class="alert-danger">
                                <p><?= $formErrors['featureCharacter'] ?></p>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="form-group">
                        <label for="hacks">Racontez-nous un de vos "hacks" (pas forcément technique ou informatique): </label>
                        <textarea type="text" value="<?= isset($_POST['hacks']) ? $_POST['hacks'] : '' ?>" name="hacks" class="form-control" id="hacks" placeholder="" required></textarea>
                        <?php if (isset($formErrors['hacks'])) { ?>
                            <div class="alert-danger">
                                <p><?= $formErrors['hacks'] ?></p>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="form-group">
                        <label for="experience">Avez vous déjà eu une expérience avec la programmation et/ou l'informatique avant de remplir ce formulaire ?: </label>
                        <textarea type="text" value="<?= isset($_POST['experience']) ? $_POST['experience'] : '' ?>" name="experience" class="form-control" id="experience" placeholder="" required></textarea>
                        <?php if (isset($formErrors['experience'])) { ?>
                            <div class="alert-danger">
                                <p><?= $formErrors['experience'] ?></p>
                            </div>
                        <?php } ?>
                    </div>
                    <input type="submit" name="submit" value="Envoyer" class="btn btn-primary" />
                </form>
                <?php
                /* Pour l'affichage des données si tout a été validé
                 * On affiche une alerte verte pour prévenir que l'utilisateur que tout s'est bien passé:
                 * On affiche les variables lastname , firstname et title car elle contiennent la saisie de l'utilisateur si tout s'est bien passée
                 * On utilise la balises br uniquement dans un p
                 * On a ajouté un bouton de retour au formulaire pour simplifier la navigation.
                 */
            } else {
                ?>
                <div class="alert-success">
                    <p>Vos données ont bien été envoyées et votre fichier a bien été transmis.</p>
                </div>
                <div class="well jumbotron">
                    <p>
                        Nom : <?= $lastName ?> <br />
                        Prénom : <?= $firstName ?> <br />
                        Date de naissance : <?= $dateOfBorn ?> <br />
                        Pays de naissance : <?= $countryOfBorn ?><br />
                        <!--Extension : <?= $fileInfos['extension'] ?> <br />
                        Votre fichier : <a href="<?= $fileFullPath ?>" title="Lien vers le fichier" target="_blank"><?= $fileNewName ?></a>-->
                    </p>
                    <a href="index.php" title="Retour vers le formulaire" class="btn btn-info">Ajouter un nouvel utilisateur</a>
                </div>
            <?php } ?>
            <p id="boutton"><a title="linkHomePage" href="../index.php"  class="btn btn-info">Page d'accueil</a></p>
        </div>
    </body>
</html>
