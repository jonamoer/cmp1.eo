<?php
require_once 'header.php';
$current = 'registreer.php';
require_once 'navigatie.php';



if(isset($_POST['registreer'])) {
    require("connectie.php");
    $naam = $_POST["naam"];
    $email = $_POST["email"];
    $wachtwoord = $_POST["wachtwoord"];
    /*TODO password encrypt*/


    try {
        $stmt = $db->prepare("INSERT INTO gebruiker
                          (naam, email, wachtwoord )
                          VALUES (:naam,:email,:wachtwoord)");
        $stmt->bindParam(":naam", $naam);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":wachtwoord", $wachtwoord);
        $stmt->execute();
        $message = "Great succes";
        $db = null;
    } catch (PDOException $e) {
        $message = $e . "Failed";
    }

}




?>
<main>

    <div class="row">
        <form role="form" class="col s12" method="POST" action="registreer.php" >
            <div class="row">
                <div class="container">

                    <div class="input-field col s6">
                        <i class="material-icons prefix">face</i>
                        <input name="naam" id="icon_prefix" type="text" class="validate">
                        <label for="icon_prefix">Naam</label>
                    </div>

                    <div class="input-field col s6">
                        <i class="material-icons prefix">email</i>
                        <input name="email" id="icon_email" type="email" class="validate">
                        <label for="icon_email">Email</label>
                    </div>
                    <div class="input-field col s6">
                        <i class="material-icons prefix">lock</i>
                        <input name="wachtwoord" id="icon_psw" type="password" class="validate">
                        <label for="icon_psw">password</label>
                    </div>
                   <!-- <div class=" col s6 file-field input-field">
                        <div class="btn">
                            <span>Profielfoto</span>
                            <input type="file" name="profielfoto" class="formcontrol" >
                        </div>
                        <div class="file-path-wrapper">
                            <input class="file-path validate" type="text">
                        </div>
                    </div>-->
                    <div class="col s12" >
                        <button id="registreer" class="btn waves-effect waves-light" type="submit" name="registreer">registreer
                            <i class="material-icons right">send</i>
                        </button>

                </div>
            </div>
        </form>
    </div>
    <?php
    if(!empty($message)){
        echo "<p class='bg-success' >{$message}</p>";
    }
    ?>


</main>
<?php require_once 'footer.php'; ?>
