<?php
session_start();
require_once 'header.php';
/*Veradneren + aanpassing navigatie.php*/
$current = 'edit_booze.php';
require_once 'navigatie.php';
require_once "functions/get_user_info.php";

if(isset($_POST['editBooze'])){
    //geklikt op de edit knop
    require ("connectie.php");

    $drank = $_POST["drank"];
    $id = $_POST['userid'];

    try{
        $stmt = $db->prepare("UPDATE drank SET drank=:drank WHERE id=:id");
        $stmt->bindParam(":drank", $drank);
        $stmt->bindParam(":id", $id);
        header("location: addbooze.php");

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
    $stmt = $db->prepare("SELECT * FROM drank WHERE id=:sid");
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
                <form role="form" class="col s12" method="POST" action="edit_booze.php">
                    <div class="row">
                        <div class="container">

                            <div class="input-field col s6">
                                <input id="drank" name="drank"  type="text" class="validate" required value="<?php echo $drank; ?>">
                                <label for="drank">Naam</label>
                            </div>

                            <div class="input-field col s6">
                                <input id="userid" name="userid" type="text" class="validate" required readonly value="<?php echo $id; ?>">
                                <label for="id">Nieuw Id</label>
                            </div>

                            <div class="col s12" >
                                <button id="editBooze" name="editBooze" class="btn waves-effect waves-light" type="submit" >Edit Booze
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