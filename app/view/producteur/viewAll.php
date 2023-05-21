
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
          <th scope = "col">Nom</th>
          <th scope = "col">Prénom</th>
          <th scope = "col">Région</th>
        </tr>
      </thead>
      <tbody>
          <?php
          // La liste des vins est dans une variable $results
          if ($results) {
              if (isset($results2)){
                  echo("<h2>Le producteur suivant a été supprimé : </h2>");
              }
              foreach ($results as $element) {
               printf("<tr><td>%d</td><td>%s</td><td>%s</td><td>%s</td></tr>", $element->getId(), $element->getNom(), $element->getPrenom(), $element->getRegion());
              }
          }
          else {
              echo ("<h3>Problème de suppression du producteur</h3>");
              echo ("id = " . $_GET['id']);
          }
          ?>
      </tbody>
    </table>
  </div>
  <?php include $root . '/app/view/fragment/fragmentCaveFooter.html'; ?>

  <!-- ----- fin viewAll -->