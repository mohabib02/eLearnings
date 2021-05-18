<meta charser="utf-8" />
<?php
$bdd = new PDO('mysql:host=127.0.0.1;dbname=elearnings;charset=utft', '', '');

$articles = $bdd->query('SELECT title FROM articles ORDER BY id DESC');

if (isset($_GET['q']) and !empty($_GET['q'])) {
      $q = htmlspecialchars($_GET['q']);
      $articles = $bdd->query('SELECT title FROM articles WHERE title LIKE "%' . $q . '%" ORDER BY id DESC');
}
?>