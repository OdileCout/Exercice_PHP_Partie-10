<?php
//On récupère le code php sur le fichier indexCntr.php (le fichier controleur) (ici c'est la vue, la page html d'affichage)
include_once 'indexCntr.php';
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" /><!-- le meta viewport est là mettre en place le responsive, pour reconaitre les écran de téléphone -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootswatch/4.3.1/journal/bootstrap.min.css" />
  <link rel="stylesheet" href="bootstrap.min.css" />
  <link rel="stylesheet" href="style.css" />
  <title>php Partie 10 tp-2</title>
</head>
<body>
  <div class="container">
      <h1>Partie 10 / TP-2</h1>
     
      <form method="POST" action="#" enctype="multipart/form-data">
           <div class="form-group">
          <label for="civility">Civilité : </label> <!-- liste deroulante -->
          <select name="civility" class="form-control" id="civility">
            <option disabled <?= empty($_POST['civility']) ? 'selected' : '' ?> >Veuillez faire un choix !</option><!-- on verifie si le champ est vide cette option s'affiche -->
            <option value="Monsieur" <?= !empty($_POST['civility']) && $_POST['civility'] == 'Monsieur' ? 'selected' : '' ?>>Monsieur</option><!-- on veriffie avec un terner si $_POST['civility'] exist, on l'affiche, sinon rien -->
            <option value="Madame" <?= !empty($_POST['civility']) && $_POST['civility'] == 'Madame' ? 'selected' : '' ?>>Madame</option>
          </select>
          <?php if (isset($tableErrors['civility'])) { ?> <!-- le tableau $formErrors['civility'](le tableau qui recupère l'erreur exist, on l'affiche -->
            <div class="alert-danger">
              <p><?= $tableErrors['civility'] ?></p> <!-- on l'affiche le tableau $formErrors['civility'](le tableau qui recupère l'erreur dans un une balise p -->
            </div>
          <?php } ?>
           </div>
        <div class="form-group">
          <label for="lastName">Nom : </label>
          <input type="text" value="<?= isset($_POST['lastName']) ? $_POST['lastName'] : '' ?>" name="lastName" class="form-control" id="lastName" placeholder=" Ex : Dupont" /> <!-- on verifie avec un ternair dans l'attribut value si le                                                                                                                                                                       la variable super globale $_POST['lastName'] exist, on l'affiche sinon on affiche rien -->
          <?php
          // On affiche un alerte rouge qui contient le texte de l'erreur s'il y en à une.
          if (isset($tableErrors['lastName'])) {// on verifie si le tableau $formErrors['lastName'] (le tableau qui recupère le message d'erreur) exist
            ?>
            <div class="alert-danger">
              <p><?= $tableErrors['lastName'] ?></p> <!-- on l'affiche le tableau $formErrors['lastName'] (le tableau qui recupère le message d'erreur) exist -->
            </div>
          <?php } ?>
        </div>
        <div class="form-group">
          <label for="firstName">Prénom : </label>
          <input type="text" value="<?= isset($_POST['firstName']) ? $_POST['firstName'] : '' ?>" name="firstName" class="form-control" id="firstName" placeholder="Ex : Jean" />
          <?php if (isset($tableErrors['firstName'])) { ?>
            <div class="alert-danger">
              <p><?= $tableErrors['firstName'] ?></p>
            </div>
          <?php } ?>
        </div>
          <div class="form-group">
          <label for="old">Age : </label>
          <input type="number" value="<?= isset($_POST['old']) ? $_POST['old'] : '' ?>" name="old" class="form-control" min ="0" max="100" id="old" placeholder="0 à 100" /> <!-- le required sert à bloquer la validation du formulaire si le champ n'est pas valider ça empêche la vérification -->
          <?php if (isset($tableErrors['old'])) { ?>
            <div class="alert-danger">
              <p><?= $tableErrors['old'] ?></p>
            </div>
          <?php } ?>
        </div>
          <div class="form-group">
          <label for="society">Société : </label>
          <input type="text" value="<?= isset($_POST['society']) ? $_POST['society'] : '' ?>" name="society" class="form-control" id="society" placeholder="Ex : Orange" />
          <?php if (isset($tableErrors['society'])) { ?>
            <div class="alert-danger">
              <p><?= $tableErrors['society'] ?></p>
            </div>
          <?php } ?>
        </div> 
          <input type="submit" name="validateBoutton" title="button"  value="valider" />
      </form>
       <?php
      // On affiche le formulaire si rien a été envoyé ou qu'il y a une erreur dans ce qui à été saisi.
    if (!empty($_POST) && empty($tableErrors)) { ?><!-- count($_POST == 0 veut dire, si le tout les champ est vide et count($formErrors > 0 compte s'il y a des erreurs, donc superieur à 0 --> 
    <div class="mt-5">
          <p>Civilité : <?= $choise ?></p>
          <p>Nom : <?= $lastName ?></p>
          <p>Prénom : <?= $firstName ?></p>
          <p>Age : <?= $old <= 1 ? $old . ' an' : $old . ' ans' ?></p>
          <p>Société : <?= $society ?></p>
      </div>
   <?php   } ?> 
     <p id="boutton"><a title="linkHomePage" href="../index.php"  class="btn btn-info">Page d'accueil</a></p>
  </div>    
</body>
</html>
