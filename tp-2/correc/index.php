<?php
include_once 'indexCtrl.php';
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, user-scalable=no" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css" />
        <title>TP 2</title>
    </head>
    <body class="container-fluid">
        <h1>TP 2</h1>
        <h2>Remplissez ce formulaire pour vous inscrire :</h2>
        <div class="formContainer row justify-content-center text-center">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="col-lg-4 col-sd-4 col-sm-12">
                <div class="form-group">
                    <label for="civility">Civilité : </label>
                    <select name="civility" id="civility" class="form-control <?= (isset($_POST['civility']) ? (!isset($formError['civility']) ? 'is-valid' : 'is-invalid') : '') ?>">
                        <option disabled <?= !isset($_POST['civility']) ? 'selected' : '' ?>>M. ou Mme.</option>
                        <option value="M." <?= isset($_POST['civility']) && $_POST['civility'] == 'M.' ? 'selected' : '' ?>>M.</option>
                        <option value="Mme." <?= isset($_POST['civility']) && $_POST['civility'] == 'Mme.' ? 'selected' : '' ?>>Mme.</option>
                    </select>
                    <p class="text-danger"><?= isset($formError['civility']) ? $formError['civility'] : '' ?></p>
                    <label for="firstname">Prénom : </label><input class="form-control <?= (isset($_POST['firstname']) ? (!isset($formError['firstname']) ? 'is-valid' : 'is-invalid') : '') ?>" type="text" name="firstname" id="firstname" placeholder="Jean-Claude" value="<?= isset($_POST['firstname']) ? $_POST['firstname'] : '' ?>" required />
                    <p class="text-danger"><?= isset($formError['firstname']) ? $formError['firstname'] : '' ?></p>
                    <label for="lastname">Nom : </label><input class="form-control <?= (isset($_POST['lastname']) ? (!isset($formError['lastname']) ? 'is-valid' : 'is-invalid') : '') ?>" type="text" name="lastname" id="lastname" placeholder="Gloomy" value="<?= isset($_POST['lastname']) ? $_POST['lastname'] : '' ?>" required />
                    <p class="text-danger"><?= isset($formError['lastname']) ? $formError['lastname'] : '' ?></p>
                    <label for="age">Votre âge : </label><input class="form-control <?= (isset($_POST['age']) ? (!isset($formError['age']) ? 'is-valid' : 'is-invalid') : '') ?>" type="number" min="0" max="120" name="age" id="age" placeholder="28" value="<?= isset($_POST['age']) ? $_POST['age'] : '' ?>" required />
                    <p class="text-danger"><?= isset($formError['age']) ? $formError['age'] : '' ?></p>
                    <label for="society">Votre société : </label><input class="form-control <?= (isset($_POST['society']) ? (!isset($formError['society']) ? 'is-valid' : 'is-invalid') : '') ?>" type="text" name="society" id="society" placeholder="La Manu" value="<?= isset($_POST['society']) ? $_POST['society'] : '' ?>" required />
                    <p class="text-danger"><?= isset($formError['society']) ? $formError['society'] : '' ?></p>
                    <input type="submit" name="addCandidate" id="addCandidate" class="btn btn-primary" />
                </div>
            </form>
        </div>
        <?php
        if (isset($civility) && isset($firstname) && isset($lastname) && isset($age) && isset($society)) {
            ?>
            <div class="row justify-content-center">
                <div class="col-12 text-center">
                    <ul class="">
                        <li>Civilité : <?= $civility ?></li>
                        <li>Nom : <?= $lastname ?></li>
                        <li>Prénom : <?= $firstname ?></li>
                        <li>Age : <?= $age ?> an(s)</li>
                        <li>Société : <?= $society ?></li>
                    </ul>
                </div>
            </div>
            <?php
        }
        ?>
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </body>
</html>