
<?php
session_start();

require_once 'header.php';
/*Veradneren + aanpassing navigatie.php*/
$current = 'bars.php';
require_once 'navigatie.php';

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

if(isset($_GET["delete_id"])){
    require("connectie.php");
    $id = $_GET["delete_id"];
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

if(isset($_GET["delete_bars"])){
    require "connectie.php";
    $id = $_GET["delete_bars"];

    try{
        //verwijder dat record met die ID
        $stmt = $db->prepare("DELETE FROM bar WHERE id=:id");
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        header("location: bars.php");
    }
    catch(PDOException $e){
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
        header("location: bars.php");
    }
    catch(PDOException $e){
        $message = $e;
    }
}
?>




<main>
    <div class="container">
        <div class="row">

            <!--Bars-->
            <div class="col l6">
                <h4>Bars</h4>
                <table class="highlight responsive-table bordered">
                    <thead>
                    <tr>
                        <th data-field="name">Bar</th>
                        <th data-field="adres">Adres</th>
                        <th data-fiels="delete">Delete</th>
                    </tr>
                    </thead>

                    <tbody>
                    <?php
                    $results = getAllBars();
                    foreach ($results as $row){
                        echo "<tr>";
                        echo "<td>{$row['naam']}</td>";
                        echo "<td>{$row['adres']}</td>";
                        echo "<td><a href='bars.php?delete_bars={$row['id']}'><i class='material-icons'>delete</i></a></td>";
                        echo "</tr>";
                    }
                    ?>
                    </tbody>
                </table>
            </div>

            <div class="col l6">
                <h4>Booze</h4>
                <table class="highlight responsive-table bordered">
                    <thead>
                    <tr>
                        <th data-field="name">Booze</th>
                        <th data-fiels="delete">Delete</th>
                    </tr>
                    </thead>

                    <tbody>
                    <?php
                    $results = getAllDrank();
                    foreach ($results as $row){
                        echo "<tr>";
                        echo "<td>{$row['drank']}</td>";
                        echo "<td><a href='bars.php?delete_drank={$row['id']}'><i class='material-icons'>delete</i></a></td>";
                        echo "</tr>";
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
</main>
<?php require_once 'footer.php'; ?>
