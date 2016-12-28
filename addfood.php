
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



?>

<main>
    <div class="row">
        <form class="col s12" method="POST" action="addfood.php">
            <div class="row">
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
            </div>
        </form>
    </div>
</main>

<?php require_once 'footer.php'; ?>
