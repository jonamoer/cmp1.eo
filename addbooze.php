
<?php
session_start();
require_once 'header.php';?>


<!------------------navigatie----------------------------->

<?php
$current = 'addbooze.php';
require_once 'navigatie.php';

if(isset($_POST['newDrank'])){
    require("connectie.php");

    $drank = $_POST["drank"];

    try{
        $stmt = $db->prepare("INSERT INTO drank (drank) VALUES (:drank)");

        $stmt->bindParam(":drank", $drank);


        $stmt->execute();
        $message = "SUCCES";
        //CONNECTIE SLUITEN
        $db = null;

    }catch(PDOExeption $e)
    {
        $message = $e;
    }
}

function getAllDrank(){
    //database
    require 'connectie.php';
    try{
        $stmt = $db->prepare("SELECT * FROM drank");
        $stmt -> execute();

        $results = $stmt->fetchAll();
        return $results;

    }
    catch (PDOException $e){
        $message = $e;
    }
}

if(isset($_GET["delete_drank"])){
    require "connectie.php";
    $id = $_GET["delete_drank"];

    try{
        //verwijder dat record met die ID
        $stmt = $db->prepare("DELETE FROM drank WHERE id=:id");
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        header("location: addbooze.php");
    }
    catch(PDOException $e){
        $message = $e;
    }
}
?>

<main>
    <div class="container">
        <div class="row">
            <form class="col s12" method="POST" action="addbooze.php">
                <h3>Drank</h3>
                <div class="input-field col s6">
                    <input name="drank" id="drank" type="text" class="validate">
                    <label for="naam">Drank</label>
                </div>
                <div class="col s12" >
                    <button id="newDrank" class="btn waves-effect waves-light" type="submit" name="newDrank">Add Booze
                        <i class="material-icons right">add</i>
                    </button>
                </div>
            </form>
        </div>

        <div class="row">
            <div class="col l12">
                <h4>Booze</h4>
                <table class="highlight responsive-table bordered">
                    <thead>
                    <tr>
                        <th data-field="name">Booze</th>
                        <th data-fiels="delete">Delete</th>
                        <th data-fiels="delete">Bewerk</th>
                    </tr>
                    </thead>

                    <tbody>
                    <?php
                    $results = getAllDrank();
                    foreach ($results as $row){
                        echo "<tr>";
                        echo "<td>{$row['drank']}</td>";
                        echo "<td><a href='addbooze.php?delete_drank={$row['id']}'><i class='material-icons'>delete</i></a></td>";
                        echo "<td><a href='edit_booze.php?edit_id={$row['id']}'><i class='material-icons'>edit</i></a></td>";
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
