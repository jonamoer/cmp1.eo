
<?php
session_start();
require_once 'header.php';
/*Veradneren + aanpassing navigatie.php*/
$current = 'dashboard.php';
require_once 'navigatie.php';
?>

<main>
<div class="container">
    <div class="row">
        <?php
        $results = getUserInfo();
        foreach ($results as $row) {
            echo "<div class='col s12'><h1>Welkom, {$row["username"]}</h1></div>";
            echo "<div class='col s4'><img src='uploads/{$row["profilepic"]}'></div>";
            echo "<div class='col s8'>";
            echo "<h2>Gegevens:</h2>";
            echo "<div><h5>Naam: {$row["username"]}</h5></div>";
            echo "<div><h5>E-mail: {$row["email"]}</h5></div>";
            echo "<a class='btn waves-effect waves-light' href='edit_user.php?edite_id={$row['id']}'><i class='material-icons right'>edite</i>Edite</a>";
            echo "</div>";
        }?>
</div>
</div>
</main>
<?php require_once 'footer.php'; ?>