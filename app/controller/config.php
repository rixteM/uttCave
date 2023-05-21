
<!-- ----- debut config -->
<?php
// Utile pour le débugage car c'est un interrupteur pour les echos et print_r.

if(!defined('DEBUG'))define('DEBUG', FALSE);

// Configuration de la base de données
$dsn = 'mysql:dbname=rixtemar;host=localhost;charset=utf8';
$username = 'rixtemar';
$password = 'jJMNjafG';

// chemin absolu vers le répertoire du projet
$root = "/home/etu/rixtemar/www/lo07_tp/tp14_mvc2";

if (DEBUG) {
 echo ("<ul>");
 echo ("<li>root = $root</li>");
 echo ("<li>---</li>");
 echo ("<li>dsn = $dsn</li>");
 echo ("<li>username = $username</li>");
 echo ("<li>password = $password</li>");
 //echo ("<li>action = $action</li>");
 echo ("</ul>");
}

?>

<!-- ----- fin config -->



