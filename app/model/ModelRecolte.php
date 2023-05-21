
<!-- ----- debut ModelVin -->
<?php
require_once 'Model.php';

class ModelRecolte {

    private $producteur_id, $vin_id, $quantite;

    // pas possible d'avoir 2 constructeurs
    public function __construct($producteur_id = NULL, $vin_id = NULL, $quantite = NULL) {
        // valeurs nulles si pas de passage de parametres
        if (!is_null($producteur_id ) && !is_null($vin_id)) {
            $this->producteur_id = $producteur_id;
            $this->vin_id = $vin_id;
            $this->quantite = $quantite;
        }
    }

    function setId($producteur_id) {
        $this->id = $producteur_id;
    }

    function setCru($vin_id) {
        $this->cru = $vin_id;
    }

    function setAnnee($quantite) {
        $this->annee = $quantite;
    }

    function getVinId() {
        return $this->vin_id;
    }

    function getProducteurId() {
        return $this->producteur_id;
    }

    function getQuantite() {
        return $this->quantite;
    }

    public function __toString() {
        return "Module ($this->producteur_id, $this->vin_id, $this->quantite)<br />\n";
    }

    // Persistance .......


    public static function view() {
        printf("<tr><td>%d</td><td>%d</td><td>%d</td></tr>", self::getProducteurId(), self::getVinId(),  self::getQuantite());
    }

// retourne une liste de producteur_id
    public static function getAllIdProducteur() {
        try {
            $database = Model::getInstance();
            $query = "select distinct producteur_id from recolte order by producteur_id";
            $statement = $database->prepare($query);
            $statement->execute();
            $results = $statement->fetchAll(PDO::FETCH_COLUMN, 0);
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }


// retourne une liste des vin_id
    public static function getAllIdVin() {
        try {
            $database = Model::getInstance();
            $query = "select distinct vin_id from recolte";
            $statement = $database->prepare($query);
            $statement->execute();
            $results = $statement->fetchAll(PDO::FETCH_COLUMN, 0);
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    // retourne une liste des crus
    public static function getAllCru() {
        try {
            $database = Model::getInstance();
            $query = "select distinct cru from vin order by cru";
            $statement = $database->prepare($query);
            $statement->execute();
            $results = $statement->fetchAll(PDO::FETCH_COLUMN, 0);
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    // retourne la somme des quantité produites pour un vin donnée
    public static function getVinQuantite($vinId) {
        try {
            $database = Model::getInstance();
            $query = "SELECT recolte.vin_id, vin.cru, sum(recolte.quantite), count(recolte.quantite) from recolte, vin where recolte.vin_id = :vinId and recolte.vin_id = vin.id";
            $statement = $database->prepare($query);
            $statement->execute([
                'vinId' => $vinId
            ]);
            $results = $statement;
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    public static function getProducteurQuantite($vinId){
        try {
            $database = Model::getInstance();
            $query = "SELECT recolte.producteur_id, producteur.nom, producteur.region, recolte.quantite from recolte, vin, producteur where recolte.vin_id = :vinId and recolte.vin_id = vin.id and producteur.id = recolte.producteur_id";
            $statement = $database->prepare($query);
            $statement->execute([
                'vinId' => $vinId
            ]);
            $results = $statement;
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    public static function getListeProducteur(){
        try {
            $database = Model::getInstance();
            $query = "SELECT recolte.producteur_id, producteur.nom, producteur.prenom, sum(recolte.quantite) as somme, count(recolte.quantite) as vin, producteur.region FROM recolte, producteur where recolte.producteur_id = producteur.id group by recolte.producteur_id order by somme DESC";
            $statement = $database->query($query);
            $results = $statement;
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    public static function getListeProducteur2($tri){
        try {
            $database = Model::getInstance();
            $query = "SELECT recolte.producteur_id, producteur.nom, producteur.prenom, sum(recolte.quantite) as somme, count(recolte.quantite) as vin, producteur.region FROM recolte, producteur where recolte.producteur_id = producteur.id group by recolte.producteur_id order by ? DESC";
            $statement = $database->prepare($query);
            $statement->execute([$tri]);

            $results = $statement;
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    public static function getMany($query, $item) {
        try {
            $database = Model::getInstance();
            $statement = $database->prepare($query);
            $statement->execute([$item]);
            $results = $statement;
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    public static function getRequest($query) {
        try {
            $database = Model::getInstance();
            $statement = $database->query($query);
            $results = $statement;
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    public static function getAll() {
        try {
            $database = Model::getInstance();
            $query = "select * from recolte";
            $statement = $database->prepare($query);
            $statement->execute();
            $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelRecolte");
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    public static function getOneProducteur($producteur_id) {
        try {
            $database = Model::getInstance();
            $query = "select * from recolte where producteur_id = :producteur_id";
            $statement = $database->prepare($query);
            $statement->execute([
                'producteur_id' => $producteur_id
            ]);
            $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelRecolte");
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    public static function getOne($producteurId, $vinId) {
        try {
            $database = Model::getInstance();
           $query = "select * from recolte where producteur_id = :producteurId  and vin_id = :vinId";
           $statement = $database->prepare($query);
            $statement->execute([
                'producteurId' => $producteurId,
                'vinId' => $vinId
            ]);
            $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelRecolte");
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }


    public static function update($quantite, $producteurId, $vinId){
        try {
            $database = Model::getInstance();
            $query = "UPDATE recolte SET quantite = :quantite WHERE producteur_id = :producteurId and vin_id = :vinId";
            $statement = $database->prepare($query);
            $statement->execute([
                'quantite' => $quantite,
                'producteurId' => $producteurId,
                'vinId' => $vinId
            ]);
        }
    catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return -1;
        }
    }

public static function insert($producteurId, $vinId, $quantite) {
try {
        $database = Model::getInstance();
        // ajout d'un nouveau tuple;
        $query = "insert into recolte value (:producteurId, :vinId, :quantite)";
        $statement = $database->prepare($query);
        $statement->execute([
            'producteurId' => $producteurId,
            'vinId' => $vinId,
            'quantite' => $quantite,
        ]);
        return $producteurId;
        }
        catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return -1;
            }
    }

    public static function updated() {
        echo ("ModelRecolte : update() TODO ....");
        return null;
    }

    public static function delete($id)
    {
        echo("ModelRecolte : update() TODO ....");
        return null;
    }
}
?>
<!-- ----- fin ModelVin -->
