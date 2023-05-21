
<!-- ----- début monProjet -->
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
    <h1 class="text-center">Mon projet</h1>
        <br>
        <p>
            Cette application permet à l'utilisateur de chercher des informations générales sur la table recolte qui permet de relier les producteurs et les vins entre eux.
            Les fonctionnalités sont simples d'utilisation et les utilisateurs peuvent ainsi avoir un regard sur l'ensemble de la base de donnée.
        </p>
    <h3>Fonction 1 : Modification de la quantité d'un vin</h3>
    <p>Cette fonction permet de modifier la quantité d'une récolte dans la table récolte. Grâce à un formulaire, l'utilisateur peut définir la clé primaire.
    Dans la table récolte, la clé primaire est constituée de deux atributs. C'est pourquoi l'utilisateur doit choisir l'identifiant du producteur et l'identifiant du choix du vin.
    La table récolte permet de relier les deux tables producteurs et la table vin. Si jamais la clé demandée pour la modification n'existe pas, un message d'erreur apparaît. </p>

    <h3>Fonction 2 : Liste des quantités produites par producteur</h3>
    <p>
    Cette deuxième fonction permet d'afficher la liste de tous les producteurs, nom, prénom ainsi que leur identifiant. Dans ce tableau ce trouvent des données supplémentaires telles que la quantité totale de vin produite au total par le producteur
    , la région et le nombre de cru différents qu'ils ont pu produire. Sur la première page, les requêtes sont triées par l'ordre décroissant de la quantité totale produite. Cela permet de déterminer les plus gros producteurs de la base de donnée ainsi que les plus petits.
        J'ai essayé de rajouter une fonction pour améliorer l'utiliter de ce tableau. A l'aide d'un formulaire, l'utilisateur peut choisir l'attribut à partir du quel le tableau sera trié ( id, nom , prénom, nombre de cru et région). Cela permet à l'utilisateur de chercher les informations d'un manière et de pouvoir interragir directement avec l'ordre des attributs.
    </p>
    <p>
        En revanche, cette fonctionnalité ne fonctionne pas. J'ai cependant décidé de la laisser car j'ai passé du temps à essayer de la débuguer mais je n'ai pas réussi à trouver le problème.
        Il me semble que la valeur sélectionnée dans le formulaire n'est pas reçue par la requête sql. Pourtant, lorsque j'utilise la variable débug, la variable donnée à la fonction prend correctement la valeur choisie. De plus, si à la place de :ordre dans la requête je mets un artribut tel que region, la requête fonctionne.

    </p>
    <h3>Fonction 3 : Quantité totale produite pour un vin, détail par producteur</h3>
    <p>
        A l'aide d'un formulaire, l'utilisateur peut sélectionner l'id du vin dont il veut avoir plus de détails. Une fois sélectioné, deux tableaux s'affichent dans la page suivante. Le premier affiche le nom du cru sélectionné, la quantité produite et le nombre de producteur qui ont produit ce vin.
        Le deuxième tableau permet de voir plus en détail quels sont les producteurs qui ont produit ce vin, en quelle quantité et dans quelle région. C'est deux tableaux permettent à l'utilisateur qui cherche à acheter un cru en parliculier, un cru rare par exemple de savoir chez quel producteur il a le plus de chance de le trouver. En effet, l'utilisateur sélectionne le cru et il a plus de chance de le trouver chez le producteur qui en a produit le plus.
    </p>
    <h3>Fonction 4 : Liste pour un cru choisit des quantités produites dans l'année</h3>
    <p>
        Comme la fonction précédente, l'utilisateur choisit le nom d'un cru. Il ne choisit pas l'identifiant mais bine le nom. Selon le cru sélectionné, un tableau s'affiche permettant de savoir les diffenrentes années pendant lesquelles le cru à été produit en quelle quantité et quel est sont degré. On retrouve également le nombre de producteur qui ont produit ce cru. Ce tableau permet de déterminer quelles ont été les meilleures années de production du vin
    ainsi que les moins bonnes. L'utilisateur peut ensuite comparer ces valeurs avec celles du deuxième tableau qui représente la quantité totale de vin produite chauque année avec le nombre de prodcteur. Il est donc facile de visualiser qu'elles ont été les années productives ou non. On peut ainsi répérer si il y a eu des problèmes particuliers pendant un année tels que sécheresse, maladie des vignes, intempréries ...
    </p>
    <h3>Fonction 5 : Insertion d'un nouvelle récolte</h3>
   <p> La dernière fonction n'est pas très originale cependant j'estime qu'elle est nécessaire. Cette fonctionnalité est dans la continuité de l'insertion d'un vin et de l'insertion d'un producteur. En effet comme dit précedemment la table récolte relie les tables vin et producteur.
    En effet, si l'on créé un nouveau vin et un nouveau producteur, ils n'apparaîtront dans aucune des focntionnalités qui utilisent la table récolte. Un vin qui n'a jamais été produit et un producteur qui n'a jamais produit n'est pas très utile.
   </p>
    <h3>Idée d'une fontion non réalisée</h3>
    <p>J'ai eu comme idée de réalisé une fonctionnalité qui permettrait d'afficher pour un vin choisit les quantités produites chaques années tous producteurs confondus. Cela permettrait de mieux visualisé les données que l'on retrouve dans les tableaux de manière générale pour les requêtes qui impliquent des valeurs numériques. Je n'ai malheureusement pas les connaissances suffisantes pour pouvoir développer ce type de fonction.
    </p>
    </div>


    <?php include $root . '/app/view/fragment/fragmentCaveFooter.html'; ?>
</div>


<!-- ----- fin monProjet -->