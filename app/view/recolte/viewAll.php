
<!-- ----- début viewAll -->
<?php
//include ('../../controller/config.php');
require ($root . '/app/view/fragment/fragmentCaveHeader.html');
?>

<body>
<div class="container">
    <?php
    include $root . '/app/view/fragment/fragmentCaveMenu.html';
    include $root . '/app/view/fragment/fragmentCaveJumbotron.html';
    ?>
    <br>

        <?php

        // La liste des vins est dans une variable $results
        if ($results) {
            echo("<h2>La récolte suivante a été modifiée</h2>");
            echo '
            <table class = "table table-striped table-bordered">
            <thead>
             <tr class="success">
                <th scope = "col">Producteur_id</th>
                <th scope = "col">Vin_id</th>
                <th scope = "col">Quantité</th>
            </tr>
            </thead>
            <tbody> ';

            foreach ($results as $element) {
                printf("<tr><td>%d</td><td>%d</td><td>%d</td></tr>", $element->getProducteurId(), $element->getVinId(), $element->getQuantite());
            }
        }
        else {
            echo ("<h3 class='text-danger'>La requête n'a pas pu être executée, le couple vin_id et producteur_id n'existe pas</h3>");
            echo ("producteur_id = " . $_GET['producteurId'] . '<br>');
            echo ("vin_id = " . $_GET['vinId'] . '<br>');
        }
        ?>
        </tbody>
    </table>
</div>
<?php include $root . '/app/view/fragment/fragmentCaveFooter.html'; ?>

<!-- ----- fin viewAll -->