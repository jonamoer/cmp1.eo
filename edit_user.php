
<?php
session_start();
require_once 'header.php';
/*Veradneren + aanpassing navigatie.php*/
$current = 'edit_user.php';
require_once 'navigatie.php';
require_once "functions/get_user_info.php";
$id = $_GET['id'];
if(isset($_POST['edit'])){
    //geklikt op de edite knop
    require ("connectie.php");
    $id = $_POST["user_id"];
    $naam = $_POST["naam"];
    $email = $_POST["email"];
    $wachtwoord = $_POST["wachtwoord"];


    try{
        $stmt = $db->prepare("UPDATE gebruiker
							  SET username=:naam, email=:email, password=:wachtwoord WHERE id=:id");
        $stmt->bindParam(":naam", $naam);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":wachtwoord", $wachtwoord);
        $stmt->bindParam(":id", $id);

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
    <div class="row"></div>
<div class="row">
    <form role="form" class="col s12" method="POST" action="edit_user.php" >
        <div class="row">
            <div class="container">
<?php
$results = getUserInfo();
foreach ($results as $row) { ?>
                <div class="input-field col s6">
                    <i class="material-icons prefix">face</i>
                    <input name="user_id" id="icon_prefix" type="text" class="validate" value="<?php echo $row["id"]; ?> " readonly>
                    <label for="icon_prefix">ID</label>
                </div>
                <!--Username------------------------------------------------------------------------------------------------>
                <div class="input-field col s6">
                    <i class="material-icons prefix">face</i>
                    <input name="naam" id="icon_prefix" type="text" class="validate" value="<?php echo $row["username"]; ?>">
                    <label for="icon_prefix">Naam</label>
                </div>
                <!--Email---------------------------------------------------------------->
                <div class="input-field col s6">
                    <i class="material-icons prefix">email</i>
                    <input name="email" id="icon_email" type="email" class="validate" value="<?php echo $row["email"]; ?>">
                    <label for="icon_email">Email</label>
                </div>
                <!--PASSWORD------------------------------------------------------------------------------------------------>
                <div class="input-field col s6">
                    <i class="material-icons prefix">lock</i>
                    <input name="wachtwoord" id="icon_psw" type="password" class="validate" value="<?php echo $row["password"]; ?>">
                    <label for="icon_psw">password</label>
                </div>
                <!--*****************************************PRofielfoto****************************************-->
                <!-- BUTTON----------------------------------------------------------------------------------------->
                <div class="col s12" >
                    <button id="edit" class="btn waves-effect waves-light" type="submit" name="edit">Edit
                        <i class="material-icons right">send</i>
                    </button>

                </div>
            </div>
    </form>
<?php } ?>
</div>
</div>



</main>
<?php require_once 'footer.php'; ?>