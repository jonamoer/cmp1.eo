
<?php
session_start();
require_once 'header.php';
/*Veradneren + aanpassing navigatie.php*/
$current = 'dashboard.php';
require_once 'navigatie.php'; ?>

<main>
<div class="container">
    <div class="row">

        <h1 class="center-align"><?php echo "Welkom, " . $_SESSION["username"];?></h1>
    </div>
</div>



</main>
<?php require_once 'footer.php'; ?>