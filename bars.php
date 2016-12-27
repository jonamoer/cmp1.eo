
<?php
session_start();

require_once 'header.php';
/*Veradneren + aanpassing navigatie.php*/
$current = 'bars.php';
require_once 'navigatie.php';
function getAllBars(){
    //database
    require_once 'connectie.php';
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
?>

<main>
<div class="container">
    <div class="row">

        <!--Bars-->
        <div class="col l4">
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
                    echo "<td><a href='bars.php?delete_id={$row['id']}'><i class='material-icons'>delete</i></a></td>";
                    echo "</tr>";
                }
                ?>
                </tbody>
            </table>
        </div>


        <!--End bars-->

        <!--start drinks-->
        <div class="col l8 ">
            <h4>Drank</h4>
            <table class="highlight responsive-table bordered">
                <thead>
                <tr>
                    <th data-field="id">Name</th>
                    <th data-field="name">Item Name</th>
                    <th data-field="price">Item Price</th>
                </tr>
                </thead>

                <tbody>
                <tr>
                    <td>Alvin</td>
                    <td>Eclair</td>
                    <td>$0.87</td>
                </tr>
                <tr>
                    <td>Alan</td>
                    <td>Jellybean</td>
                    <td>$3.76</td>
                </tr>
                <tr>
                    <td>Jonathan</td>
                    <td>Lollipop</td>
                    <td>$7.00</td>
                </tr>
                </tbody>
            </table>

        </div>
    </div>
</div>







</main>
<?php require_once 'footer.php'; ?>
