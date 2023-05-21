<!-- ----- debut ControllerProducteur -->
<?php
require_once '../model/ModelProducteur.php';

class ControllerProducteur {

    // --- Liste des producteurs
    public static function producteurReadAll() {
        $results = ModelProducteur::getAll();
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/producteur/viewAll.php';
        if (DEBUG)
            echo ("ControllerProducteur : producteurReadAll : vue = $vue");
        require ($vue);
    }

    // --- Liste des régions sans doublons
    public static function producteurReadAllRegion() {
        $request = "select distinct region from producteur order by region";
        $results = ModelProducteur::getMany($request);
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/producteur/viewAllRegion.php';
        if (DEBUG)
            echo ("ControllerProducteur : producteurReadAll : vue = $vue");
        require ($vue);
    }

    // Affiche un formulaire pour sélectionner un id qui existe
    public static function producteurReadId($args) {
        if (DEBUG) echo ("ControllerVin:vinReadId:begin</br>");
        $results = ModelProducteur::getAllId();
        //passage du nom de la méthode cible pour le champ action du formulaire
        // Solution 1 : producteurReadOne
        //Solution 2 : producteurDeleted
        $target = $args['target'];

        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/producteur/viewId.php';
        require ($vue);
    }

    // Affiche un vin particulier (id)
    public static function producteurReadOne() {
        $producteur_id = $_GET['id'];
        $results = ModelProducteur::getOne($producteur_id);

        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/producteur/viewAll.php';
        require ($vue);
    }

    // Affiche le formulaire de creation d'un vin
    public static function producteurCreate() {
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/producteur/viewInsert.php';
        require ($vue);
    }

    // Affiche un formulaire pour récupérer les informations d'un nouveau vin.
    // La clé est gérée par le systeme et pas par l'internaute
    public static function producteurCreated() {
        // ajouter une validation des informations du formulaire
        $results = ModelProducteur::insert(
            htmlspecialchars($_GET['nom']), htmlspecialchars($_GET['prenom']), htmlspecialchars($_GET['region'])
        );
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/producteur/viewInserted.php';
        require ($vue);
    }

    //Supprimer un vin
    public static function producteurDeleted(){
        $producteur_id = $_GET['id'];
        $results = ModelProducteur::getOne($producteur_id);
        $results2 = ModelProducteur::delete($producteur_id);

        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/producteur/viewAll.php';
        require ($vue);
    }

}
?>
<!-- ----- fin ControllerProducteur -->