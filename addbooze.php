
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



?>

<main>
<div class="row">
    <form class="col s12" method="POST" action="addbooze.php">
        <div class="row">
            <h3>Drank</h3>
            <div class="input-field col s6">
                <input name="drank" id="drank" type="text" class="validate">
                <label for="naam">drank</label>
            </div>
            <div class="col s12" >
                <button id="newDrank"class="btn waves-effect waves-light" type="submit" name="newDrank">Add Booze
                    <i class="material-icons right">send</i>
                </button>
            </div>
        </div>
    </form>
</div>
</main>

<?php require_once 'footer.php'; ?>
