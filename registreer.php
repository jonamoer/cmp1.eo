<?php




require_once 'header.php';
$current = 'registreer.php';
require_once 'navigatie.php';
?>

<?php




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
                        <input name="psw" id="icon_psw" type="password" class="validate">
                        <label for="icon_psw">password</label>
                    </div>
                    <div class=" col s6 file-field input-field">
                        <div class="btn">
                            <span>Profielfoto</span>
                            <input type="file" name="profielfoto" class="formcontrol" >
                        </div>
                        <div class="file-path-wrapper">
                            <input class="file-path validate" type="text">
                        </div>

                    </div>
                    <div class="col s12" >
                        <button id="registreer"class="btn waves-effect waves-light" type="submit" name="registreer">registreer
                            <i class="material-icons right">send</i>
                        </button>

                </div>
            </div>
        </form>
    </div>


</main>
<?php require_once 'footer.php'; ?>
