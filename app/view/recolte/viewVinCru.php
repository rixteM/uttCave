
<!-- ----- début viewVinCru-->
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
    <h3>Sélectionner un cru en particulier</h3>
    <hr>
    <form role="form" method='get' action='router2.php'>
        <div class="form-group">
            <input type="hidden" name='action' value='recolteListeCru'>
            <label for="id">id vin : </label> <select class="form-control" id='cru' name='cru' style="width: 20%">
                <?php
                foreach ($results as $cru) {
                    echo ("<option>$cru</option>");
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

<!-- ----- fin viewVinCru -->