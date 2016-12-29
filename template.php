
<?php
session_start();
require_once 'header.php';
/*Veradneren + aanpassing navigatie.php*/
$current = 'index.php';
require_once 'navigatie.php'; ?>

<main>




</main>
<?php require_once 'footer.php'; ?>




<i class='material-icons prefix'>face</i> {$_SESSION['username']}
