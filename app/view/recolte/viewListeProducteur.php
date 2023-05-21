
<!-- ----- début viewListeProducteur -->
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

    <h3>Liste des producteurs triés par quantités produites</h3>
    <form role="form" method='get' action='router2.php'>
        <input type="hidden" name='action' value='recolteListeTri'>
    <div class="form-group">
        <label>Ordonner par :
            <select class="form-control" name="ordre">
                <option value="producteur_id" >Id</option>
                <option value="nom">Nom</option>
                <option value="prenom">Prénom</option>
                <option value="somme">Quantité</option>
                <option value="vin">Nombre de cru</option>
                <option value="region" >Région</option>
            </select>
        <button class="btn btn-primary" type="submit">Choisir</button>
        </label>
    </div>
    </form>

    <table class = "table table-striped table-bordered">
        <thead>
        <tr class="success">
            <th scope = "col">Id producteur</th>
            <th scope = "col">Nom</th>
            <th scope = "col">Prénom</th>
            <th scope = "col">Quantité</th>
            <th scope = "col">Nombre de cru produit</th>
            <th scope = "col">Région</th>
        </tr>
        </thead>
        <tbody>
        <?php
        // La liste des vins est dans une variable $results
        if ($results) {
            echo("<tbody>");
            while ($row = $results -> fetch()) {
                printf("<tr><td>%d</td><td>%s</td><td>%s</td><td>%d</td><td>%d</td><td>%s</td></tr>", $row['producteur_id'], $row['nom'], $row['prenom'], $row['somme'], $row['vin'], $row['region']);
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

<!-- ----- fin viewListeProducteur -->
