<?php
include_once 'indexCntr.php';
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, user-scalable=no" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css" />
        <title>PHP partie 10 TP-3</title>
    </head>
    <body class="container-fluid">
        <?php
        //On appelle la fonction
        echo displayArray($portrait1);
        echo displayArray($portrait2);
        echo displayArray($portrait3);
        echo displayArray($portrait4);
        ?>
    </body>
</html>