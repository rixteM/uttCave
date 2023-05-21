
<!-- ----- début mesPropositions -->
<?php
//include ('../../controller/config.php');
require ($root . '/app/view/fragment/fragmentCaveHeader.html');
?>

<body>
<div class="container">
    <?php
    include $root . '/app/view/fragment/fragmentCaveMenu.html';
    ?>
    <div class="center">
    <h1 class="text-center">Mes propositions d'amélioration</h1>
    <h2>Première proposition</h2>
    <p>Dans la classe ModelVin la fonction statique view() a été définie.
        Cette fonction fait appelle à des méthode qui se trouvent dans la classe ModelVin en utilisant la cariable $this comme nous pouvons le voir ci-dessous :</p>
    <ul>
        <li>$this->getAllId()</li>
        <li>$this->getCru()</li>
        <li>$this->getAnnee()</li>
        <li>$this->getDegre()</li>
    </ul>
    <p>Comme les méthodes statiques peuvent être appelées sans qu'une instance d'objet n'ait été créée,
        la pseudo-variable $this n'est pas disponible dans les méthodes déclarées comme statiques.
        C'est pourquoi j'ai modififier le code en remplaçant <strong>this-></strong> par <strong>self::</strong> comme ci-dessous :s</p>
    <ul>
        <li>self::getAllId()</li>
        <li>self::getCru()</li>
        <li>self::getAnnee()</li>
        <li>self::getDegre()</li>
    </ul>

    <h2>Deuxième proposition</h2>
    <p>La méthode __toString() est une méthode qui permet retourner la représentation d'una classe. Cependant dans la classe ModelVin la
        fonction __toString retourne inditantifiant qui n'est pas une chaîne de caratère.
        Je l'ai donc modiflié en remplaçant le return initial de la fonction par : <br>
        <strong>return "Module ($this->id, $this->cru, $this->annee, $this->degre)";</strong></p>

    </div>

    <?php include $root . '/app/view/fragment/fragmentCaveFooter.html'; ?>
</div>


<!-- ----- fin mesPropositions -->