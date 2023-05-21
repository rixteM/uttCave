
<!-- ----- début viewVinId -->
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
    <h3>Rechercher la quantité totale d'un vin ainsi que le nombre de producteurs ayants produit ce vin</h3>
    <hr>
    <form role="form" method='get' action='router2.php'>
        <div class="form-group">
            <input type="hidden" name='action' value='recolteSommeQuantite'>
            <label for="id">id vin : </label> <select class="form-control" id='vinId' name='vinId' style="width: 100px">
                <?php
                foreach ($results as $id) {
                    echo ("<option>$id</option>");
                }
                ?>
            </select>
        </div>
        <p/>

        <button class="btn btn-primary" type="submit">Submit form</button>
    </form>
    <p/>
</div>

<?php include $root . '/app/view/fragment/fragmentCaveFooter.html'; ?>

<!-- ----- fin viewVinId -->