<?php
session_start();
require_once 'header.php';
$current = 'registreer.php';
require_once 'navigatie.php';



if(isset($_POST['registreer'])) {
    require("connectie.php");

    $target_dir = "profilepictures/";
    $target_file = $target_dir ."profilepic_". $_FILES["profilepicture"]["name"];
    move_uploaded_file($_FILES["profilepicture"]["tmp_name"], $target_file);

    $naam = $_POST["naam"];
    $email = $_POST["email"];
    $wachtwoord = $_POST["wachtwoord"];
    /*TODO password encrypt*/
    $profilepicture_name = "profilepic_" . basename($_FILES["profilepicture"]["name"]);


    try {
        $stmt = $db->prepare("INSERT INTO gebruiker
                          (username, email, password, profilepic )
                          VALUES (:naam,:email,:wachtwoord,:profilepicture)");
        $stmt->bindParam(":naam", $naam);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":wachtwoord", $wachtwoord);
        $stmt->bindParam(":profilepicture", $profilepicture_name);
        $stmt->execute();
        header("location: index.php");
        $db = null;
    } catch (PDOException $e) {
        $message = $e . "Failed";
    }

}




?>
<main>

    <div class="row">
        <form role="form" class="col s12" method="POST" action="registreer.php" enctype="multipart/form-data >
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
                    <!--*****************************************PRofielfoto****************************************-->
                    <div class=" col s6 file-field input-field">
                        <div class="btn">
                            <span>Profielfoto</span>
                            <input  id="profilepicture" name="profilepicture" type="file" >
                        </div>
                        <div class="file-path-wrapper">
                            <input class="file-path validate" type="text">
                        </div>
                    </div>
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
