
<?php
session_start();
require_once 'header.php';
/*Veradneren + aanpassing navigatie.php*/
$current = 'dashboard.php';
require_once 'navigatie.php';
if(isset($_GET["delete_user"])){
    require "connectie.php";
    $id = $_GET["delete_user"];

    try{
        //verwijder dat record met die ID
        $stmt = $db->prepare("DELETE FROM gebruiker WHERE id=:id");
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        header("location: logout.php");
    }
    catch(PDOException $e){
        $message = $e;
    }
}
?>

<main>
<div class="container">
    <div class="row">
        <?php
        $results = getUserInfo();
        foreach ($results as $row) {
            echo "<div class='col s12'><h1>Welkom, {$row["username"]}</h1></div>";
            echo "<div class='col s4'><img style='max-width: 350px' src='uploads/{$row["profilepic"]}'></div>";
            echo "<div class='col s8'>";
            echo "<h2>Gegevens:</h2>";
            echo "<div><h5>Naam: {$row["username"]}</h5></div>";
            echo "<div><h5>E-mail: {$row["email"]}</h5></div>";
            echo "<a class='btn waves-effect waves-light' href='edit_user.php?id={$row['id']}'><i class='material-icons right'>edite</i>Edite</a>";
            echo "<a class='btn waves-effect waves-light' href='dashboard.php?delete_user={$row['id']}'><i class='material-icons right'>delete</i>Delete</a>";
            echo "</div>";
        }?>
</div>
</div>
</main>
<?php require_once 'footer.php'; ?>