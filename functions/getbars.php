<?php
function getAllBars(){
    //database
    require_once 'connectie.php';
    try{
        $stmt = $db->prepare("SELECT * FROM bar");
        $stmt -> execute();

        $results = $stmt->fetchAll();
        return $results;
        $db = null;

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