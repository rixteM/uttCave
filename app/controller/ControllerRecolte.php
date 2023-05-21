<!-- ----- debut ControllerRecolte -->
<?php
require_once '../model/ModelRecolte.php';

class ControllerRecolte {

    // --- Liste des producteurs
    public static function recolteReadAll() {
        $results = ModelRecolte::getListeProducteur();
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/recolte/viewListeProducteur.php';
        if (DEBUG)
            echo ("ControllerProducteur : producteurReadAll : vue = $vue");
        require ($vue);
    }

    // --- Liste des producteurs triée
    public static function recolteListeTri() {
        $tri = $_GET['ordre'];
        include 'config.php';
        if (DEBUG){
            echo("<h1>$tri</h1>");
            echo("<pre>");
            print_r($_GET);
            echo("</pre>");
        }
        $results = ModelRecolte::getListeProducteur2($tri);
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/recolte/viewListeProducteur.php';
        if (DEBUG) {

            echo("ControllerProducteur : producteurReadAll : vue = $vue");
        }
        require ($vue);
    }


    // Affiche un formulaire pour sélectionner de vin_id et de producteur id
    public static function recolteReadId() {
        include 'config.php';
        if (DEBUG) echo ("ControllerVin:vinReadId:begin</br>");
        $results1 = ModelRecolte::getAllIdProducteur();
        $results2 = ModelRecolte::getAllIdVin();

        // ----- Construction chemin de la vue
        $vue = $root . '/app/view/recolte/viewId.php';
        require ($vue);
    }

    // Affiche un formulaire pour créer in nouvel élément dans récolte
    public static function recolteCreate() {
        $results1 = ModelRecolte::getAllIdProducteur();
        $results2 = ModelRecolte::getAllIdVin();

        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/recolte/viewInsert.php';
        require ($vue);
    }

    // Affiche un formulaire pour récupérer les informations de la nouvelle récolte.

    public static function recolteCreated() {
        // ajouter une validation des informations du formulaire
        $results = ModelRecolte::insert(
            htmlspecialchars($_GET['producteurId']), htmlspecialchars($_GET['vinId']), htmlspecialchars($_GET['quantite'])
        );
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/recolte/viewInserted.php';
        require ($vue);
    }


    // Affiche un formulaire pour sélectionner de vin_id
    public static function recolteReadVinId() {
        include 'config.php';
        if (DEBUG) echo ("ControllerVin:vinReadId:begin</br>");

        $results = ModelRecolte::getAllIdVin();

        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/recolte/viewVinId.php';
        require ($vue);
    }

    // Affiche un formulaire pour sélectionner un cru particulier
    public static function recolteReadCru() {
        $results = ModelRecolte::getAllCru();

        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/recolte/viewVinCru.php';
        require ($vue);
    }

    // Affiche un formulaire pour sélectionner un cru particulier
    public static function recolteListeCru() {
        $query = "SELECT vin.id, vin.cru, vin.annee, vin.degre, SUM(recolte.quantite) as somme, COUNT(recolte.quantite) as prod FROM vin, recolte WHERE vin.cru = ? and vin.id = recolte.vin_id GROUP BY vin.annee";
        $cru = $_GET['cru'];
        $results = ModelRecolte::getMany($query, $cru);

        $query2 = "SELECT vin.annee, SUM(recolte.quantite) as somme, COUNT(recolte.quantite) as prod FROM vin, recolte WHERE vin.id = recolte.vin_id GROUP BY vin.annee";
        $results2 = ModelRecolte::getRequest($query2);
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/recolte/viewVinListeCru.php';
        require ($vue);
    }

    //Affiche la qantité total d'un vin en fonction de son id
    public static function recolteSommeQuantite(){
        $vinId = $_GET['vinId'];
        $results = ModelRecolte::getVinQuantite($vinId);
        $results2 = ModelRecolte::getProducteurQuantite($vinId);

        include 'config.php';
        $vue = $root . '/app/view/recolte/viewVinQuantite.php';
        require ($vue);
    }

    // Modifie la quantité d'une récolte donnée
    public static function recolteUpdateQuantite() {

        $producteurId = $_GET['producteurId'];
        $vinId = $_GET['vinId'];
        $quantite = $_GET['quantite'];
        $results2 = ModelRecolte::update($quantite, $producteurId, $vinId);
        $results = ModelRecolte::getOne($producteurId, $vinId);

        // ----- Construction chemin de la vue
        include 'config.php';
        if (DEBUG){
            echo ("Résultat = $results[0] <br>");
            echo ("producteur_id = $producteurId<br>");
            echo ("vin_id = $vinId<br>");
            echo ("quantité = $quantite");
        }
        $vue = $root . '/app/view/recolte/viewAll.php';
        require ($vue);
    }
}
?>
<!-- ----- fin ControllerRecolte -->
