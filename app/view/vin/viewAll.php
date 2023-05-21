
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

    <table class = "table table-striped table-bordered">
        <thead>
        <tr>
            <th scope = "col">id</th>
            <th scope = "col">cru</th>
            <th scope = "col">année</th>
            <th scope = "col">degré</th>
        </tr>
        </thead>
        <tbody>
        <?php

        // La liste des vins est dans une variable $results
        if ($results) {
            if ($results2){
                echo("<h3>Le vin suivant a été supprimé : </h3>");
            }
            else {
                echo ("<h3 class='text-danger'>Problème de suppression du Vin</h3>");
                echo ("<p>Il est probable qu'il soit présent dans la table des récoltes</p>");
                echo ("id = " . $_GET['id']);
            }
            foreach ($results as $element) {
                printf("<tr><td>%d</td><td>%s</td><td>%d</td><td>%.2f</td></tr>", $element->getId(), $element->getCru(), $element->getAnnee(), $element->getDegre());
            }
        }
        else {
            echo ("Problème");
        }
        ?>
        </tbody>
    </table>
</div>
<?php include $root . '/app/view/fragment/fragmentCaveFooter.html'; ?>

<!-- ----- fin viewAll -->