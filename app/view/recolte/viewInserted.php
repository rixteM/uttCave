
<!-- ----- début viewInserted -->
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
    <!-- ===================================================== -->
    <?php
    if ($results !== -1) {
     echo ("<h3>Le nouvelle récolte a été ajoutée </h3>");
     echo("<ul>");
     echo ("<li>producteur_id = " . $_GET['producteurId'] . "</li>");
     echo ("<li> vin_id = " . $_GET['vinId'] . "</li>");
     echo ("<li>Quantité = " . $_GET['quantite'] . "</li>");
     echo("</ul>");
    }
    else if ($results == -1) {
        echo ("<h3 class='text-danger'>Problème d'insertion de la récolte suivante</h3>");
        echo("<ul>");
        echo ("<li>producteur_id = " . $_GET['producteurId'] . "</li>");
        echo ("<li> vin_id = " . $_GET['vinId'] . "</li>");
        echo ("<li>Quantité = " . $_GET['quantite'] . "</li>");
        echo("</ul>");
        echo("<p>Cette récolte existe déjà. Changer de clé primaire</p>");

    }
    else {
     echo ("<h3 class='text-danger'>Problème d'insertion de la récolte</h3>");
     echo ("producteur_id = " . $_GET['producteurId']);
     echo ("vin_id = " . $_GET['vinId']);
    }
    echo("</div>");
    
    include $root . '/app/view/fragment/fragmentCaveFooter.html';
    ?>
    <!-- ----- fin viewInserted -->    

    
    