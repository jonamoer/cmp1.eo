
<?php
session_start();
require_once 'header.php';?>


<!------------------navigatie----------------------------->

<?php
$current = 'addresto';
require_once 'navigatie.php';

if(isset($_POST['newResto'])){
    require("connectie.php");

    $naam = $_POST["naam"];
    $adres = $_POST["adres"];

    try{
        $stmt = $db->prepare("INSERT INTO resto (naam, adres) VALUES (:naam, :adres)");

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



?>

<main>
    <div class="row">
        <form class="col s12" method="POST" action="addresto.php">
            <div class="row">
                <h3>Resto</h3>
                <div class="input-field col s6">
                    <input name="naam" id="naam" type="text" class="validate">
                    <label for="naam">Naam</label>
                </div>
                <div class="input-field col s6">
                    <input name="adres" id="adres" type="text" class="validate">
                    <label for="adres">Adres</label>
                </div>
                <div class="col s12" >
                    <button id="newResto" class="btn waves-effect waves-light" type="submit" name="newResto">Add resto
                        <i class="material-icons right">send</i>
                    </button>
                </div>
            </div>
        </form>
    </div>
</main>

<?php require_once 'footer.php'; ?>