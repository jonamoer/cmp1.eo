<?php
session_start();
require_once 'header.php';
/*Veradneren + aanpassing navigatie.php*/
$current = 'edit_bar.php';
require_once 'navigatie.php';
require_once "functions/get_user_info.php";

if(isset($_POST['editBar'])){
    //geklikt op de edite knop
    require ("connectie.php");
    $naam = $_POST["naam"];
    $adres = $_POST["adres"];
    $id = $_POST['edit_id'];

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


?>
    <main>
        <div class="container">
            <div class="row">
                <form role="form" class="col s12" method="POST" action="edit_bar.php" enctype="multipart/form-data" >
                    <div class="row">
                        <div class="container">

                            <div class="input-field col s6">
                                <input name="naam"  type="text" class="validate" value="<?php echo $row["naam"]; ?>">
                                <label for="icon_prefix">Naam</label>
                            </div>

                            <div class="input-field col s6">
                                <input name="adres" type="text" class="validate" value="<?php echo $row["adres"]; ?>">
                                <label >Adres</label>
                            </div>

                            <div class="col s12" >
                                <button id="editBar" class="btn waves-effect waves-light" type="submit" name="editBar">Edit Bar
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