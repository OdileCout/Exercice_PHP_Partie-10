<?php
// html est la vue
include_once 'indexCtrl.php'
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="" />
        <link rel="stylesheet" href="style1.css" />
        <title>partie 10 exo1</title>
    </head>
    <body>
        <h1>Partie 10 exo1</h1>
        <?php
        if (count($formError) > 0 || !isset($_POST['addCandidate'])) {
            ?>
            <form method="POST" action="#">
                <div class="form-group">
                    <label for="name">Nom :</label><input type="text" name="name" id="name" placeholder="dupont" value="<?php echo isset($_POST['name']) ? $_POST['name'] : '' ?>"/>
                    <p><?php echo isset($formError['name']) ? $formError['name'] : '' ?></p>
                </div>
                <div class="form-group">
                    <label for="secondName">Prénom :</label><input type="text" name="secondName" placeholder="Pierre" id="secondName" value="<?= isset($_POST['secondName']) ? $_POST['secondName'] : '' ?>" />
                    <p><?php echo isset($formError['secondName']) ? $formError['secondName'] : ''; ?></p>
                </div>
                <div class="form-group">
                    <label for="dateOfBirth">Date de naissance :</label><input type="text" name="dateOfBirth" id="dateOfBirth" placeholder="12/12/2019" value="<?= isset($_POST['dateOfBirth']) ? $_POST['dateOfBirth'] : '' ?>"/>
                    <p><?= isset($formError['dateOfBirth']) ? $formError['dateOfBirth'] : '' ?></p>
                </div>
                <div class="form-group">
                    <label for="countryOfBirth">Pays de naissance :</label><input type="text" name="countryOfBirth" id="countryOfBirth" placeholder="Pays de naissance" value="<?= isset($_POST['countryOfBirth']) ? $_POST['countryOfBirth'] : '' ?>"/>
                    <p><?= isset($formError['countryOfBirth']) ? $formError['countryOfBirth'] : '' ?></p>
                </div>
                <div class="form-group">
                    <label for="nationality">Nationalite :</label><input type="text" name="nationality" id="nationality" placeholder="nationalité" value="<?= isset($_POST['nationality']) ? $_POST['nationality'] : '' ?>"/></label>
                    <p><?= isset($formError['nationality']) ? $formError['nationality'] : '' ?></p>
                </div>
                <div class="form-group">
                    <label for="adress">Adresse :</label><input type="text" name="adress" placeholder="adresse" id="adress" value="<?= isset($_POST['adress']) ? $_POST['adress'] : '' ?>"/>
                    <p><?= isset($formError['adress']) ? $formError['adress'] : '' ?></p>
                </div>
                <div class="form-group">
                    <label for="email">adresse Mail :</label><input type="email" name="email" id="email" placeholder="jean.dupont@laposte.net" value="<?= isset($_POST['email']) ? $_POST['email'] : '' ?>"/>
                    <p><?= isset($formError['email']) ? $formError['email'] : '' ?></p>
                </div>
                <div class="form-group">
                    <label for="numberOfPhone">Numero de téléphone :</label><input type="tel" name="numberOfPhone" id="numberOfPhone" placeholder="06 28 34 55 75" value="<?= isset($_POST['numberOfPhone']) ? $_POST['numberOfPhone'] : '' ?>"/>
                    <p><?= isset($formError['numberOfPhone']) ? $formError['numberOfPhone'] : '' ?></p>
                </div>
                <div class="form-group">
                    <label for="diplome">Diplome :</label>
                    <select name="diplome" id="diplome">
                        <option disabled <?php if(empty($_POST['diplome'])){?>selected<?php } ?> hidden>choix</option>
                        <option <?php if(!empty($_POST['diplome']) && ($_POST['diplome'] == 'Sans')){?>selected<?php } ?> value="Sans">Sans</option>
                        <option <?php if(!empty($_POST['diplome']) && ($_POST['diplome'] == 'Bac')){?>selected<?php } ?> value="Bac">Bac</option>
                        <option <?php if(!empty($_POST['diplome']) && ($_POST['diplome'] == 'Bac+2')){?>selected<?php } ?> value="Bac+2">Bac+2</option>
                        <option <?php if(!empty($_POST['diplome']) && ($_POST['diplome'] == 'Bac+3')){?>selected<?php } ?> value="Bac+3">Bac+3</option>
                        <option <?php if(!empty($_POST['diplome']) && ($_POST['diplome'] == 'Supérieur')){?>selected<?php } ?> value="Supérieur">Supérieur</option>
                    </select>
                    <p><?= isset($formError['diplome']) ? $formError['diplome'] : '' ?></p>
                </div>
                <div class="form-group">
                    <label for="numberPoleEmploi">Numéro pôle emploi :</label><input type="text" name="numberPoleEmploi" id="numberPoleEmploi" placeholder="2058" value="<?= isset($_POST['numberPoleEmploi']) ? $_POST['numberPoleEmploi'] : '' ?>"/>
                    <p><?= isset($formError['numberPoleEmploi']) ? $formError['numberPoleEmploi'] : '' ?></p>
                </div>
                <div class="form-group">
                    <label for="numberOfBadge">Nombre de badges :</label><input type="text" name="numberOfBadge" id="numberOfBadge" placeholder="635" value="<?= isset($_POST['numberOfBadge']) ? $_POST['numberOfBadge'] : '' ?>"/>
                    <p><?= isset($formError['numberOfBadge']) ? $formError['numberOfBadge'] : '' ?></p>
                </div>
                <div class="form-group">
                    <label for="codeacademy">Liens codeacademy :</label><input type="url" name="codeacademy" id="codeacademy" value="<?= isset($_POST['codeacademy']) ? $_POST['codeacademy'] : '' ?>"/>
                    <p><?= isset($formError['codeacademy']) ? $formError['codeacademy'] : '' ?></p>
                </div>
                <div class="form-group">
                    <label for="caracter">Si vous étiez un super héro ou une super heroine, qui seriez vous et pourquoi? :</label><textarea type="text" id="caracter" name="caracter" class="textare" placeholder="Votre text ici" value="<?= isset($_POST['caracter']) ? $_POST['caracter'] : '' ?>"></textarea>
                    <p><?= isset($formError['caracter']) ? $formError['caracter'] : '' ?></p>
                </div>
                <div class="form-group">
                    <label for="hacks">Racontez nous une de vos "hacks" (pas forcément technique ou informatique) :</label><textarea type="text" id="hacks" name="hacks" class="textare" placeholder="Votre text ici" value="<?= isset($_POST['hacks']) ? $_POST['hacks'] : '' ?>"></textarea>
                    <p><?= isset($formError['hacks']) ? $formError['hacks'] : '' ?></p>
                </div>
                <div class="form-group">
                    <label for="experience">Avez-vous déjà eu une experience avec la programmation et/ou l'informatique avant de remplir ce formulaire? :</label><textarea type="text" id="experience" name="experience" class="textare" placeholder="Votre text ici" value="<?= isset($_POST['experience']) ? $_POST['experience'] : '' ?>"></textarea>
                    <p><?= isset($formError['experience']) ? $formError['experience'] : '' ?></p>
                </div>
                <input name="addCandidate" type="submit" value="valider" class="boutton" />
            </form>
            <div class="">
            <?php } else { ?>
                <p>Nom : <?php echo $name; ?></p>
                <p>Prénom : <?php echo $secondName; ?></p> 
                <p>Date de naissance : <?= $dateOfBirth ?></p>
                <p>Pays de naissance : <?= $countryOfBirth ?></p>
                <p>Nationalité : <?= $nationality ?></p>
                <p>Adresse : <?= $adress ?></p>
                <p>Email : <?= $mailAdress ?></p>
                <p>Téléphone : <?= $phoneNumber ?></p>
                <p>Diplôme : <?= $diplome ?></p>
                <p>Numéro pôle emploi : <?= $numberPoleEmploi ?></p>
                <p>Nombre de badges : <?= $numberOfBadge ?></p>
                <p>Liens codeacademy : <?= $codeacademy ?></p>
                <p>Racontez nous une de vos "hacks" (pas forcément technique ou informatique) : <?= $caracter ?></p>
                <p>Racontez nous une de vos "hacks" (pas forcément technique ou informatique) : <?= $hacks ?></p>
                <p>Avez-vous déjà eu une experience avec la programmation et/ou l'informatique avant de remplir ce formulaire? : <?= $experience ?></p>
            <?php } ?>
        </div>
        <p id="boutton"><a title="linkHomePage" href="../index.php"  class="btn btn-info">Page d'accueil</a></p>
    </body>
</html>