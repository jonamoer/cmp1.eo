
<?php
session_start();
require_once 'header.php';?>


<!------------------navigatie----------------------------->

<?php
$current = 'addbar.php';
require_once 'navigatie.php';

if(isset($_POST['newBar'])){
    require("connectie.php");

    $naam = $_POST["naam"];
    $adres = $_POST["adres"];

    try{
        $stmt = $db->prepare("INSERT INTO bar (naam, adres) VALUES (:naam, :adres)");

        $stmt->bindParam(":naam", $naam);
        $stmt->bindParam(":adres", $adres);

        $stmt->execute();
        $message = "SUCCES";
        //CONNECTIE SLUITEN
        $db = null;

    }catch(PDOExeption $e)
    {
        $message = $e;
    }
}

function getAllBars(){
    //database
    require 'connectie.php';
    try{
        $stmt = $db->prepare("SELECT * FROM bar");
        $stmt -> execute();

        $results = $stmt->fetchAll();
        return $results;

    }
    catch (PDOException $e){
        $message = $e;
    }
}

if(isset($_GET["delete_bars"])){
    require "connectie.php";
    $id = $_GET["delete_bars"];

    try{
        //verwijder dat record met die ID
        $stmt = $db->prepare("DELETE FROM bar WHERE id=:id");
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        header("location: addbar.php");
    }
    catch(PDOException $e){
        $message = $e;
    }
}

?>

<main>
    <div class="container">

        <div class="row">
            <form class="col s12" method="POST" action="addbar.php">
                <h3>BARS</h3>
                    <div class="input-field col s6">
                        <input name="naam" id="naam" type="text" class="validate">
                        <label for="naam">Naam</label>
                    </div>

                    <div class="input-field col s6">
                        <input name="adres" id="adres" type="text" class="validate">
                        <label for="adres">Adres</label>
                    </div>

                <div class="col s12" >
                    <button id="newBar"class="btn waves-effect waves-light" type="submit" name="newBar">Add bar
                        <i class="material-icons right">add</i>
                    </button>
                </div>
            </form>
        </div>

        <div class="row">
            <div class="col l12">
                <h4>Bars</h4>
                <table class="highlight responsive-table bordered">
                    <thead>
                    <tr>
                        <th data-field="name">Bar</th>
                        <th data-field="adres">Adres</th>
                        <th data-fiels="delete">Delete</th>
                        <th data-fiels="delete">Bewerk</th>
                    </tr>
                    </thead>

                    <tbody>
                    <?php
                    $results = getAllBars();
                    foreach ($results as $row){
                        echo "<tr>";
                        echo "<td>{$row['naam']}</td>";
                        echo "<td>{$row['adres']}</td>";
                        echo "<td><a href='addbar.php?delete_bars={$row['id']}'><i class='material-icons'>delete</i></a></td>";
                        echo "<td><a href='edit_bar.php?edite_id={$row['id']}'><i class='material-icons'>edite</i></a></td>";
                        echo "</tr>";
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>

<?php require_once 'footer.php'; ?>
