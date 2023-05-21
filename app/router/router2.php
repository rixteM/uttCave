
<!-- ----- debut Router2 -->
<?php
require ('../controller/ControllerVin.php');
require ('../controller/ControllerProducteur.php');
require ('../controller/ControllerRecolte.php');

// --- récupération de l'action passée dans l'URL
$query_string = $_SERVER['QUERY_STRING'];

// fonction parse_str permet de construire 
// une table de hachage (clé + valeur)
parse_str($query_string, $param);

// --- $action contient le nom de la méthode statique recherchée
$action = htmlspecialchars($param["action"]);

//Modification du routeur pour prendre en compte l'ensemble des paramètres
$action = $param['action'];

// --- En supprime l'élément action de la structure
unset($param['action']);

// --- Tout ce qui restent sont les arguments
$args = $param;

// --- Liste des méthodes autorisées

switch ($action) {
 case "vinReadAll" :
 case "vinReadOne" :
 case "vinReadId" :
 case "vinCreate" :
 case "vinCreated" :
 case "vinDeleted" :
 case "codeAmelioration" :
 case"codeMonProjet":
  ControllerVin::$action($args);
  break;

    case "producteurReadAll" :
    case "producteurReadOne" :
    case "producteurReadId" :
    case "producteurCreate" :
    case "producteurCreated" :
    case "producteurReadAllRegion" :
    case "producteurDeleted" :
      ControllerProducteur::$action($args);
        break;

    case "recolteReadId" :
    case "recolteUpdateQuantite" :
    case "recolteReadAll" :
    case "recolteReadVinId" :
    case "recolteSommeQuantite":
    case "recolteListeTri":
    case "recolteReadCru":
    case "recolteListeCru":
    case "recolteCreate":
    case "recolteCreated":
    case "recolteCreated":
        ControllerRecolte::$action($args);
        break;

  // Tache par défaut
 default:
     $action = "caveAccueil";
     ControllerVin::$action($args);
}

?>
<!-- ----- Fin Router2 -->

