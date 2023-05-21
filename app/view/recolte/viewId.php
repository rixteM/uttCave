
<!-- ----- début viewId -->
<?php 
//include ('../../controller/config.php');
require ($root . '/app/view/fragment/fragmentCaveHeader.html');
?>

<body>
  <div class="container">
      <?php
      include $root . '/app/view/fragment/fragmentCaveMenu.html';
      include $root . '/app/view/fragment/fragmentCaveJumbotron.html';

      // $results contient un tableau avec la liste des clés.
      ?>

    <form role="form" method='get' action='router2.php'>
      <div class="form-group">
        <input type="hidden" name='action' value='recolteUpdateQuantite'>
        <label for="id">id producteur : </label> <select class="form-control" id='producteurId' name='producteurId' style="width: 100px">
            <?php
            foreach ($results1 as $id) {
             echo ("<option>$id</option>");
            }
            ?>
        </select>
      </div>
      <p/>

        <div class="form-group">
            <label for="id">id vin : </label> <select class="form-control" id='vinId' name='vinId' style="width: 100px">
                <?php
                foreach ($results2 as $id) {
                    echo ("<option>$id</option>");
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="Nom">Quantité
                <input type="text" class="form-control" name="quantite" value="100">
            </label>
        </div>
        <p/>
      <button class="btn btn-primary" type="submit">Submit form</button>
    </form>
    <p/>
  </div>

  <?php include $root . '/app/view/fragment/fragmentCaveFooter.html'; ?>

  <!-- ----- fin viewId -->