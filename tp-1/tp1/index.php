<?php
include_once 'controller.php';
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, user-scalable=no" />
        <link rel="stylesheet" href="bootstrap.min.css" />
        <link rel="stylesheet" href="style.css" />
        <title>TP 1 - Formulaire d'adhésion</title>
    </head>
    <body>
        <h1>TP 1 - Formulaire d'adhésion</h1>
        <p>Faire une page pour enregistrer un futur apprenant. On devra pouvoir saisir les informations suivantes :
            <br/>A la validation de ces informations, il faudra les afficher dans la même page à la place du formulaire.</p>
        <ul>
            <li>Nom</li>
            <li>Prénom</li>
            <li>Date de naissance</li>
            <li>Pays de naissance</li>
            <li>Nationalité</li>
            <li>Adresse</li>
            <li>Email</li>
            <li>Téléphone</li>
            <li>Diplôme (sans, Bac, Bac+2, Bac+3 ou supérieur)</li>
            <li>Numéro pôle emploi</li>
            <li>Nombre de badge*S*</li>
            <li>Liens codecademy</li>
            <li>Si vous étiez un super héros/une super héroïne, qui seriez-vous et pourquoi?</li>
            <li>Racontez-nous un de vos "hacks" (pas forcément technique ou informatique)</li>
            <li>Avez vous déjà eu une expérience avec la programmation et/ou l'informatique avant de remplir ce formulaire ?</li>
        </ul>
        <p>À la validation de ces informations, il faudra les afficher dans la même page à la place du formulaire.</p>
        <div class="jumbotron bg-secondary text-white">
            <p><u>Résultat</u> :</p>
            <?php
            if (empty($_POST) || !empty($errorMessage)) {
                ?>
                <form action="#" method="POST">
                    <div class="form-group<?= isset($errorMessage) ? ' has-danger' : '' ?>">
                        <label class="form-control-label" for="firstName">Prénom</label>
                        <input class="form-control <?= isset($errorMessage['firstName']) ? 'is-invalid' : '' ?>" name="firstName" id="firstName" placeholder="ex : John" type="text" value="<?= !empty($_POST['firstName']) ? $_POST['firstName'] : '' ?>"/>
                        <?php if (isset($errorMessage['firstName'])) {
                            ?><p class="<?= isset($errorMessage['firstName']) ? 'invalid-feedback' : '' ?>"><?= $errorMessage['firstName'] ?></p>
                        <?php } ?>
                    </div>
                    <div class="form-group<?= isset($errorMessage) ? ' has-danger' : '' ?>">
                        <label class="form-control-label" for="lastName">Nom de famille</label>
                        <input class="form-control <?= isset($errorMessage['lastName']) ? 'is-invalid' : '' ?>" name="lastName" id="lastName" placeholder="ex : Doe" type="text" value="<?= !empty($_POST['lastName']) ? $_POST['lastName'] : '' ?>"/>
                        <?php if (isset($errorMessage['lastName'])) {
                            ?><p class="text-danger"><?= $errorMessage['lastName'] ?></p>
                        <?php } ?>
                    </div>
                    <div class="form-group<?= isset($errorMessage) ? ' has-danger' : '' ?>">
                        <label class="form-control-label" for="birthDay">Date de naissance</label>
                        <input class="form-control <?= isset($errorMessage['birthDay']) ? 'is-invalid' : '' ?>" name="birthDay" id="birthDay" placeholder="ex : jj/mm/aaaa" type="date" value="<?= !empty($_POST['birthDay']) ? $_POST['birthDay'] : '' ?>"/>
                        <?php if (isset($errorMessage['birthDay'])) {
                            ?><p class="text-danger"><?= $errorMessage['birthDay'] ?></p>
                        <?php } ?>
                    </div>
                    <div class="form-group<?= isset($errorMessage) ? ' has-danger' : '' ?>">
                        <label class="form-control-label" for="birthPlace">Lieu de naissance</label>
                        <input class="form-control <?= isset($errorMessage['birthPlace']) ? 'is-invalid' : '' ?>" name="birthPlace" id="birthPlace" placeholder="ex : Paris" type="text" value="<?= !empty($_POST['birthPlace']) ? $_POST['birthPlace'] : '' ?>"/>
                        <?php if (isset($errorMessage['birthPlace'])) {
                            ?><p class="text-danger"><?= $errorMessage['birthPlace'] ?></p>
                        <?php } ?>
                    </div>
                    <div class="form-group<?= isset($errorMessage) ? ' has-danger' : '' ?>">
                        <label class="form-control-label" for="adress">Adresse</label>
                        <input class="form-control <?= isset($errorMessage['adress']) ? 'is-invalid' : '' ?>" name="adress" id="adress" placeholder="ex : 11 rue des lilas - 75000 Paris" type="text" value="<?= !empty($_POST['adress']) ? $_POST['adress'] : '' ?>"/>
                        <?php if (isset($errorMessage['adress'])) {
                            ?><p class="text-danger"><?= $errorMessage['adress'] ?></p>
                        <?php } ?>
                    </div>
                    <div class="form-group<?= isset($errorMessage) ? ' has-danger' : '' ?>">
                        <label class="form-control-label" for="email">Adresse eMail</label>
                        <input class="form-control <?= isset($errorMessage['email']) ? 'is-invalid' : '' ?>" name="email" id="email" placeholder="ex : john.doe@gmail.com" type="mail" value="<?= !empty($_POST['email']) ? $_POST['email'] : '' ?>"/>
                        <?php if (isset($errorMessage['email'])) {
                            ?><p class="text-danger"><?= $errorMessage['email'] ?></p>
                        <?php } ?>
                    </div>
                    <div class="form-group<?= isset($errorMessage) ? ' has-danger' : '' ?>">
                        <label class="form-control-label" for="phoneNumber">Numéro de téléphone</label>
                        <input class="form-control <?= isset($errorMessage['phoneNumber']) ? 'is-invalid' : '' ?>" name="phoneNumber" id="phoneNumber" placeholder="ex : +33 06 12 34 56 78" type="tel" value="<?= !empty($_POST['phoneNumber']) ? $_POST['phoneNumber'] : '' ?>"/>
                        <?php if (isset($errorMessage['phoneNumber'])) {
                            ?><p class="text-danger"><?= $errorMessage['phoneNumber'] ?></p>
                        <?php } ?>
                    </div>
                    <div class="form-group<?= isset($errorMessage) ? ' has-danger' : '' ?>">
                        <label class="form-control-label" for="degrees">Diplômes</label>
                        <select class="form-control <?= isset($errorMessage['degrees']) ? 'is-invalid' : '' ?>" name="degrees" id="degrees">
                            <option disabled hidden <?php (empty($_POST['degrees'])) ? 'selected' : '' ?>>Veuillez renseigner vos diplômes obtenus</option>
                            <option <?= !empty($_POST['degrees']) && $_POST['degrees'] == 'sans' ? 'selected' : '' ?> value="sans">Sans</option>
                            <option <?= !empty($_POST['degrees']) && $_POST['degrees'] == 'Baccalauréat' ? 'selected' : '' ?> value="Baccalauréat">Baccalauréat</option>
                            <option <?= !empty($_POST['degrees']) && $_POST['degrees'] == 'Bac +2' ? 'selected' : '' ?> value="Bac +2">Bac +2</option>
                            <option <?= !empty($_POST['degrees']) && $_POST['degrees'] == 'Bac +3' ? 'selected' : '' ?> value="Bac +3">Bac +3</option>
                            <option <?= !empty($_POST['degrees']) && $_POST['degrees'] == 'Supérieur' ? 'selected' : '' ?> value="Supérieur">Supérieur</option>
                        </select>
                        <?php if (isset($errorMessage['degrees'])) {
                            ?><p class="text-danger"><?= $errorMessage['degrees'] ?></p>
                        <?php } ?>
                    </div>
                    <div class="form-group<?= isset($errorMessage['poleEmploi']) ? ' has-danger' : '' ?>">
                        <label class="form-control-label" for="poleEmploi">Numéro Pôle Emploi</label>
                        <input class="form-control <?= isset($errorMessage['poleEmploi']) ? 'is-invalid' : '' ?>" name="poleEmploi" id="poleEmploi" placeholder="ex : 369-510-8-Y" type="text" value="<?= !empty($_POST['poleEmploi']) ? $_POST['poleEmploi'] : '' ?>"/>
                        <?php if (isset($errorMessage['poleEmploi'])) {
                            ?><p class="text-danger"><?= $errorMessage['poleEmploi'] ?></p>
                        <?php } ?>
                    </div>
                    <div class="form-group<?= isset($errorMessage['numberOfBadges']) ? ' has-danger' : '' ?>">
                        <label class="form-control-label" for="numberOfBadges">Nombre de badges</label>
                        <select class="form-control <?= isset($errorMessage['numberOfBadges']) ? 'is-invalid' : '' ?>" name="numberOfBadges" id="numberOfBadges">
                            <option disabled hidden <?php if (empty($_POST['numberOfBadges'])) { ?>selected<?php } ?>>Veuillez renseigner votre nombre de badges</option>
                            <option <?php if (!empty($_POST['numberOfBadges']) && ($_POST['numberOfBadges'] == '0')) { ?>selected<?php }; ?> value="0">0</option>
                            <option <?php if (!empty($_POST['numberOfBadges']) && ($_POST['numberOfBadges'] == '1')) { ?>selected<?php }; ?> value="1">1</option>
                            <option <?php if (!empty($_POST['numberOfBadges']) && ($_POST['numberOfBadges'] == '2')) { ?>selected<?php }; ?> value="2">2</option>
                            <option <?php if (!empty($_POST['numberOfBadges']) && ($_POST['numberOfBadges'] == '3')) { ?>selected<?php }; ?> value="3">3</option>
                            <option <?php if (!empty($_POST['numberOfBadges']) && ($_POST['numberOfBadges'] == '4')) { ?>selected<?php }; ?> value="4">4</option>
                            <option <?php if (!empty($_POST['numberOfBadges']) && ($_POST['numberOfBadges'] == '5')) { ?>selected<?php }; ?> value="5">5</option>
                        </select>                    
                        <?php if (isset($errorMessage['numberOfBadges'])) {
                            ?><p class="text-danger"><?= $errorMessage['numberOfBadges'] ?></p>
                        <?php } ?>
                    </div>
                    <div class="form-group<?= isset($errorMessage['codeAcademy']) ? ' has-danger' : '' ?>">
                        <label class="form-control-label" for="codeAcademy">Liens code académie</label>
                        <input class="form-control <?= isset($errorMessage['codeAcademy']) ? 'is-invalid' : '' ?>" name="codeAcademy" id="codeAcademy" placeholder="ex : ?" type="text" value="<?= !empty($_POST['codeAcademy']) ? $_POST['codeAcademy'] : '' ?>"/>
                        <?php if (isset($errorMessage['codeAcademy'])) {
                            ?><p class="text-danger"><?= $errorMessage['codeAcademy'] ?></p>
                        <?php } ?>
                    </div>
                    <div class="form-group<?= isset($errorMessage['hero']) ? ' has-danger' : '' ?>">
                        <label class="form-control-label" for="hero">Si vous étiez un héros ou une héroïne qui seriez-vous et pourquoi ?</label>
                        <textarea class="form-control <?= isset($errorMessage['hero']) ? 'is-invalid' : '' ?>" name="hero" id="hero" placeholder="ex : Superman parce que c'est le plus fort !"><?= !empty($_POST['hero']) ? $_POST['hero'] : '' ?></textarea>
                        <?php if (isset($errorMessage['hero'])) {
                            ?><p class="text-danger"><?= $errorMessage['hero'] ?></p>
                        <?php } ?>
                    </div>
                    <div class="form-group<?= isset($errorMessage['hack']) ? ' has-danger' : '' ?>">
                        <label class="form-control-label" for="hack">Racontez-nous un de vos "hacks" (pas forcément technique ou informatique)</label>
                        <textarea class="form-control <?= isset($errorMessage['hack']) ? 'is-invalid' : '' ?>" name="hack" id="hack" placeholder="ex : pas un hack de 5 minutes craft" type="text"><?= !empty($_POST['hack']) ? $_POST['hack'] : '' ?></textarea>
                        <?php if (isset($errorMessage['hack'])) {
                            ?><p class="text-danger"><?= $errorMessage['hack'] ?></p>
                        <?php } ?>
                    </div>
                    <div class="form-group<?= isset($errorMessage['experiences']) ? ' has-danger' : '' ?>">
                        <label class="form-control-label" for="experiences">Avez vous déjà eu une expérience avec la programmation et/ou l'informatique avant de remplir ce formulaire ?</label>
                        <textarea class="form-control <?= isset($errorMessage['experiences']) ? 'is-invalid' : '' ?>" name="experiences" id="experiences" placeholder="ex : connecter l'imprimante de pépé" type="text"><?= !empty($_POST['experiences']) ? $_POST['experiences'] : '' ?></textarea>
                        <?php if (isset($errorMessage['experiences'])) {
                            ?><p class="text-danger"><?= $errorMessage['experiences'] ?></p>
                        <?php } ?>
                    </div>
                    <input name="registration" type="submit"/>
                </form>
                <?php
            } else {
                ?><p><u>Prénom</u> : <?= $firstName ?></p>
                <p><u>Nom de famille</u> : <?= $lastName ?></p>
                <p><u>Date de naissance</u> : <?= $birthDay ?></p>
                <p><u>Lieu de naissance</u> : <?= $birthPlace ?></p>
                <p><u>Votre adresse</u> : <?= $adress ?></p>
                <p><u>Votre adresse email</u> : <?= $email ?></p>
                <p><u>Votre numéro de téléphone</u> : <?= $phoneNumber ?></p>
                <p><u>Diplômes</u> : <?= $degrees ?></p>
                <p><u>Numéro Pole Emploi</u> : <?= $poleEmploi ?></p>
                <p><u>Nombre de badges obtenus</u> : <?= $numberOfBadges ?></p>
                <p><u>Lien Code Academy</u> : <?= $codeAcademy ?></p>
                <p><u>Si vous étiez un super héro</u> : <?= $hero ?></p>
                <p><u>Un hack que vous avez déjà fait</u> : <?= $hack ?></p>
                <p><u>Vos expériences dans le domaine de l'informatique</u> : <?= $experiences ?></p><?php
            }
            ?>
        </div>
        <div class="row footer">
            <a title="Partie précédente" class="col-md-4 text-danger" href="http://phpp9/tp">Partie précédente: Dates</a>
            <a title="Sommaire de la partie" class="col-md-4 text-danger" href="..">Sommaire Partie 9</a>
            <a title="TP suivant" class="col-md-4" href="../tp2">TP 2</a>
        </div>
    </body>
</html>
