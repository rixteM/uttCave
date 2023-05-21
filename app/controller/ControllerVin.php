
<!-- ----- debut ControllerVin -->
<?php
require_once '../model/ModelVin.php';

class ControllerVin {
 // --- page d'accueil
 public static function caveAccueil() {
  include 'config.php';
  $vue = $root . '/app/view/viewCaveAccueil.html';
  if (DEBUG)
   echo ("ControllerVin : caveAccueil : vue = $vue");
  require ($vue);
 }
// Page mes propositions
 public static function codeAmelioration() {
     include 'config.php';
     $vue = $root . '/public/documentation/mesPropositions.php';
     if (DEBUG)
         echo ("ControllerVin : codeAmelioration : vue = $vue");
     require ($vue);
    }
// page decription de mon projet
    public static function codeMonProjet() {
        include 'config.php';
        $vue = $root . '/public/documentation/monProjet.php';
        if (DEBUG)
            echo ("ControllerVin : monProjet : vue = $vue");
        require ($vue);
    }

 // --- Liste des vins
 public static function vinReadAll() {
  $results = ModelVin::getAll();
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/vin/viewAll.php';
  if (DEBUG)

   echo ("ControllerVin : vinReadAll : vue = $vue");
  require ($vue);
 }

 // Affiche un formulaire pour sélectionner un id qui existe
 public static function vinReadId($args) {
     if (DEBUG) echo ("ControllerVin:vinReadId:begin</br>");
    $results = ModelVin::getAllId();
  //passage du nom de la méthode cible pour le champ action du formulaire
     // Solution 1 : vinReadOne
     //Solution 2 : vinDeleted
     $target = $args['target'];
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/vin/viewId.php';
  require ($vue);
 }

 // Affiche un vin particulier (id)
 public static function vinReadOne() {
  $vin_id = $_GET['id'];
  $results = ModelVin::getOne($vin_id);

  // ----- Construction chemin de la vue
  include 'config.php';
  if (DEBUG) echo $results[0];
    $vue = $root . '/app/view/vin/viewAll.php';
  require ($vue);
 }

 // Affiche le formulaire de creation d'un vin
 public static function vinCreate() {
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/vin/viewInsert.php';
  require ($vue);
 }

 // Affiche un formulaire pour récupérer les informations d'un nouveau vin.
 // La clé est gérée par le systeme et pas par l'internaute
 public static function vinCreated() {
  // ajouter une validation des informations du formulaire
  $results = ModelVin::insert(
      htmlspecialchars($_GET['cru']), htmlspecialchars($_GET['annee']), htmlspecialchars($_GET['degre'])
  );
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/vin/viewInserted.php';
  require ($vue);
 }

 //Supprimer un vin
    public static function vinDeleted(){
     $vin_id = $_GET['id'];
     $results = ModelVin::getOne($vin_id);
     $results2 = ModelVin::delete($vin_id);

     // ----- Construction chemin de la vue
     include 'config.php';
     $vue = $root . '/app/view/vin/viewAll.php';
     require ($vue);
    }
}
?>
<!-- ----- fin ControllerVin -->


