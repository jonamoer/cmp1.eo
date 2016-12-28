
<?php
session_start();
require_once 'header.php';?>


<!------------------navigatie----------------------------->

<?php
$current = 'addbar.php';
require_once 'navigatie.php';

if(isset($_POST['nawBar'])){
    require("connectie.php");

    $naam = $_POST["naam"];
    $adres = $_POST["adres"];

    try{
        $stmt = $db->prepare("INSERT INTO bar
                              (naam, adres)
                               VALUES (:naam, :adres)");

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
        <form class="col s6" method="post" action="addbar.php">
            <div class="row">
                <h3>BAR</h3>
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
                        <i class="material-icons right">send</i>
                    </button>
            </div>
        </form>

<!--        <form class="col s6">-->
<!--            <div class="row">-->
<!--                <h3>DRANK</h3>-->
<!--                <div class="input-field col s12">-->
<!--                    <select>-->
<!--                        <option value="">Kies uw drank</option>-->
<!--                        <option value="1">Cola</option>-->
<!--                        <option value="2">Bier</option>-->
<!--                        <option value="3">Water</option>-->
<!--                        <option value="4">Wijn</option>-->
<!--                        <option value="5">Jenever</option>-->
<!--                        <option value="6">Duvel</option>-->
<!--                    </select>-->
<!--                </div>-->
<!--            </div>-->
<!--        </form>-->



    </div>
</main>

<?php require_once 'footer.php'; ?>
