
<!-- ----- début viewVinQuantite -->
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

    <h3>Quantité totale d'un vin ainsi que le nombre de producteurs ayants produit ce vin</h3>
    <table class = "table table-striped table-bordered">
        <thead>
        <tr class="success">
            <th scope = "col">Vin_id</th>
            <th scope = "col">Cru</th>
            <th scope = "col">Quantité produite</th>
            <th scope = "col">Nombre de producteur</th>
        </tr>
        </thead>
        <tbody>
        <?php
        // La liste des vins est dans une variable $results
        if ($results) {
            echo("<tbody>");
            while ($row = $results -> fetch()) {
                printf("<tr><td>%d</td><td>%s</td><td>%d</td><td>%d</td></tr>", $row['vin_id'], $row['cru'], $row['sum(recolte.quantite)'], $row['count(recolte.quantite)']);
            }
            echo("</tbody>");
            echo("</table>");
            echo("<br>");
            echo '<table class = "table table-striped table-bordered">
            <thead>
            <tr class="success">
                <th scope = "col">Identifiant producteur</th>
                <th scope = "col">Nom</th>
                <th scope = "col">Région</th>
                <th scope = "col">Quantité produite</th>
                
            </tr>
            </thead>
            <tbody>';

            echo("<tbody>");
            while ($row = $results2 -> fetch()) {
                printf("<tr><td>%d</td><td>%s</td><td>%s</td><td>%d</td></tr>", $row['producteur_id'], $row['nom'], $row['region'], $row['quantite']);
            }
            echo("</tbody>");
            echo("</table>");




        }
        else {
            echo ("<h3>La requête n'a pas pu être executée</h3>");
        }
        ?>
        </tbody>
    </table>
</div>
<?php include $root . '/app/view/fragment/fragmentCaveFooter.html'; ?>

<!-- ----- fin viewVinQuantite -->
