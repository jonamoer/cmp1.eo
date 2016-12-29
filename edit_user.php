
<?php
session_start();
require_once 'header.php';
/*Veradneren + aanpassing navigatie.php*/
$current = 'edit_user.php';
require_once 'navigatie.php';
require_once "functions/get_user_info.php";

if(isset($_POST['edit'])){
    //geklikt op de edite knop
    require ("connectie.php");
    $naam = $_POST["naam"];
    $familienaam = $_POST["familienaam"];
    $email = $_POST["email"];
    $id = $_POST["userid"];

    try{
        $stmt = $db->prepare("UPDATE gebruiker
							  SET naam=:naam, familienaam=:familienaam, email=:email WHERE id=:id");
        $stmt->bindParam(":naam", $naam);
        $stmt->bindParam(":familienaam", $familienaam);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":id", $id);

        $stmt->execute();
        $message = "SUCCES";
    }
    catch(PDOExeption $e){
        $message = $e;
    }
}

if(isset($_GET['edit_id']) && !empty($_GET['edit_id'])){
    //EDIT_ID BESTAAT,JUIJ
    $id = $_GET['edit_id'];

    //GEGEVENS OPROEPEN WAAR ID HET ZELFDE IS
    require("connectie.php");
    $stmt = $db->prepare("SELECT * FROM gebruiker WHERE id=:sid");
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
    <form role="form" class="col s12" method="POST" action="edit_user.php" enctype="multipart/form-data" >
        <div class="row">
            <div class="container">

                <div class="input-field col s6">
                    <i class="material-icons prefix">face</i>
                    <input name="naam" id="icon_prefix" type="text" class="validate" value="<?php echo $naam; ?>">
                    <label for="icon_prefix">Naam</label>
                </div>

                <div class="input-field col s6">
                    <i class="material-icons prefix">email</i>
                    <input name="email" id="icon_email" type="email" class="validate" value="<?php echo $email; ?>">
                    <label for="icon_email">Email</label>
                </div>
                <div class="input-field col s6">
                    <i class="material-icons prefix">lock</i>
                    <input name="wachtwoord" id="icon_psw" type="password" class="validate">
                    <label for="icon_psw">password</label>
                </div>
                <!--*****************************************PRofielfoto****************************************-->
                <div class=" col s6 file-field input-field">
                    <div class="btn">
                        <span>Profielfoto</span>
                        <!--Input profile foto-->
                        <input  id="profilepicture" name="profilepicture" type="file" >
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text">
                    </div>
                </div>
                <div class="col s12" >
                    <button id="edit" class="btn waves-effect waves-light" type="submit" name="Edit">Edit
                        <i class="material-icons right">send</i>
                    </button>

                </div>
            </div>
    </form>

</div>
</div>



</main>
<?php require_once 'footer.php'; ?>