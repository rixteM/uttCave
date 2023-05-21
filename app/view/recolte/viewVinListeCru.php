
<!-- ----- début viewVinListeCru -->
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

    <h3>Liste des différentes années, quantitées produites et degrés pour le cru suivant :</h3>

    <table class = "table table-striped table-bordered">
        <thead>
        <tr class="success">
            <th scope = "col">Id vin</th>
            <th scope = "col">Cru</th>
            <th scope = "col">Année</th>
            <th scope = "col">Degré</th>
            <th scope = "col">Quantité produite</th>
            <th scope = "col">Nombre de producteurs</th>
        </tr>
        </thead>
        <tbody>
        <?php
        // La liste des vins est dans une variable $results
        if ($results) {
            echo("<tbody>");
            while ($row = $results -> fetch()) {
                printf("<tr><td>%d</td><td>%s</td><td>%d</td><td>%.2f</td><td>%d</td><td>%d</td></tr>", $row['id'], $row['cru'], $row['annee'], $row['degre'], $row['somme'], $row['prod']);
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
    <h3>Tableau de la quantité totale produite de vin et du nombre de producteur an fonction des années</h3>
    <table class = "table table-striped table-bordered">
        <thead>
        <tr class="success">
            <th scope = "col">Année</th>
            <th scope = "col">Quantité de vin totale produite</th>
            <th scope = "col">Nombre de producteur</th>
        </tr>
        </thead>
        <tbody>
        <?php
        // La liste des vins est dans une variable $results
        if ($results2) {
            echo("<tbody>");
            while ($row = $results2 -> fetch()) {
                printf("<tr><td>%d</td><td>%d</td><td>%d</td></tr>", $row['annee'], $row['somme'], $row['prod']);
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

<!-- ----- fin viewVinListeCru -->

