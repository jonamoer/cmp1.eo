
<?php
session_start();
require_once 'header.php';?>


<!------------------navigatie----------------------------->

<?php
$current = 'addfood.php';
require_once 'navigatie.php';

if(isset($_POST['newFood'])){
    require("connectie.php");

    $eten = $_POST["eten"];

    try{
        $stmt = $db->prepare("INSERT INTO eten (eten) VALUES (:eten)");

        $stmt->bindParam(":eten", $eten);


        $stmt->execute();
        $message = "SUCCES";
        //CONNECTIE SLUITEN
        $db = null;

    }catch(PDOExeption $e)
    {
        $message = $e;
    }
}

function getAllFood(){
    //database
    require 'connectie.php';
    try{
        $stmt = $db->prepare("SELECT * FROM eten");
        $stmt -> execute();

        $results = $stmt->fetchAll();
        return $results;

    }
    catch (PDOException $e){
        $message = $e;
    }
}

if(isset($_GET["delete_eten"])){
    require "connectie.php";
    $id = $_GET["delete_eten"];

    try{
        //verwijder dat record met die ID
        $stmt = $db->prepare("DELETE FROM eten WHERE id=:id");
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        header("location: addfood.php");
    }
    catch(PDOException $e){
        $message = $e;
    }
}

?>


<main>
    <div class="container">
        <div class="row">
            <form class="col s12" method="POST" action="addfood.php">
                <h3>Food</h3>
                <div class="input-field col s6">
                    <input name="eten" id="eten" type="text" class="validate">
                    <label for="eten">Eten</label>
                </div>
                <div class="col s12" >
                    <button id="newFood" class="btn waves-effect waves-light" type="submit" name="newFood">Add Food
                        <i class="material-icons right">send</i>
                    </button>
                </div>
            </form>
        </div>

        <div class="row">
            <div class="col l12">
                <table class="highlight responsive-table bordered">
                    <thead>
                    <tr>
                        <th data-field="name">Food</th>
                        <th data-fiels="delete">Delete</th>
                    </tr>
                    </thead>

                    <tbody>
                    <?php
                    $results = getAllFood();
                    foreach ($results as $row){
                        echo "<tr>";
                        echo "<td>{$row['eten']}</td>";
                        echo "<td><a href='addfood.php?delete_eten={$row['id']}'><i class='material-icons'>delete</i></a></td>";
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