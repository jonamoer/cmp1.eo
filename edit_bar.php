<?php
session_start();
require_once 'header.php';
/*Veradneren + aanpassing navigatie.php*/
$current = 'edit_bar.php';
require_once 'navigatie.php';
require_once "functions/get_user_info.php";

if(isset($_POST['editBar'])){
    //geklikt op de edit knop
    require ("connectie.php");

    $naam = $_POST["naam"];
    $adres = $_POST["adres"];
    $id = $_POST['userid'];

    try{
        $stmt = $db->prepare("UPDATE bar SET naam=:naam, adres=:adres, WHERE id=:id");
        $stmt->bindParam(":naam", $naam);
        $stmt->bindParam(":adres", $adres);
        $stmt->bindParam(":id", $id);
        header("location: addbar.php");

        $stmt->execute();
        $message = "SUCCES";
    }
    catch(PDOExeption $e){
        $message = $e;
    }
}

if(isset($_GET['edit_id']) && !empty($_GET['edit_id'])){

    $id = $_GET['edit_id'];

    //GEGEVENS OPROEPEN WAAR ID HET ZELFDE IS
    require("connectie.php");
    $stmt = $db->prepare("SELECT * FROM bar WHERE id=:sid");
    $stmt->bindParam(":sid",$id);
    $stmt->execute();
    $result = $stmt->fetch();
    //EXTRACTEN VAN GEGEVENS
    extract($result);
    //CONNECTIE SLUITEN
    $db = null;
}

?>
<main>
    <div class="container">
        <div class="row">
            <form role="form" class="col s12" method="POST" action="edit_bar.php">
                <div class="row">
                    <div class="container">

                        <div class="input-field col s6">
                            <input id="naam" name="naam"  type="text" class="validate" required value="<?php echo $naam; ?>">
                            <label for="naam">Naam</label>
                        </div>

                        <div class="input-field col s6">
                            <input id="adres" name="adres" type="text" class="validate" required value="<?php echo $adres; ?>">
                            <label for="adres">Adres</label>
                        </div>

                        <div class="input-field col s6">
                            <input id="userid" name="userid" type="text" class="validate" required readonly value="<?php echo $id; ?>">
                            <label for="id">Nieuw Id</label>
                        </div>

                        <div class="col s12" >
                            <button id="editBar" name="editBar" class="btn waves-effect waves-light" type="submit" >Edit Bar
                                <i class="material-icons right">send</i>
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</main>
<?php require_once 'footer.php'; ?>