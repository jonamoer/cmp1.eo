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
    $email = $_POST["email"];
    $wachtwoord = $_POST["wachtwoord"];
    $id = $_GET['edit_id'];

    try{
        $stmt = $db->prepare("UPDATE gebruiker
							  SET username=:naam, email=:email, password=:wachtwoord WHERE username ='".$_SESSION['username']."'");
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
<div class="row">
    <form role="form" class="col s12" method="POST" action="edit_user.php" enctype="multipart/form-data" >
        <div class="row">
            <div class="container">
<?php
$results = getUserInfo();
foreach ($results as $row) { ?>
                <div class="input-field col s6">
                    <i class="material-icons prefix">face</i>
                    <input name="naam" id="icon_prefix" type="text" class="validate" value="<?php echo $row["username"]; ?>">
                    <label for="icon_prefix">Naam</label>
                </div>

                <div class="input-field col s6">
                    <i class="material-icons prefix">email</i>
                    <input name="email" id="icon_email" type="email" class="validate" value="<?php echo $row["email"]; ?>">
                    <label for="icon_email">Email</label>
                </div>
                <div class="input-field col s6">
                    <i class="material-icons prefix">lock</i>
                    <input name="wachtwoord" id="icon_psw" type="password" class="validate" value="<?php echo $row["password"]; ?>">
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