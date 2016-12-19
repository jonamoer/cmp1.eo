
<?php
session_start();
require_once 'header.php';
$current = 'login.php';
require_once 'navigatie.php';


if (isset($_POST['login'])){
    $username = $_POST["user"];
    $password = $_POST["psw"];

    if($username == "admin" && $password == "1234"){
        $_SESSION['username'] = $username;
        header("location: index.php");

    }else{
        echo "<div id=fout>" . "verkeerde login probeer het opnieuw" . "</div>";
    }




}else{
    echo "<div id='fout'>" . "Je bent nog niet ingelogd" ."</div>";
}

?>

<main>

    <div class="row">
    <form role="form" class="col s12" method="POST" action="login.php" >
        <div class="row">
            <div class="container">

                <div class="input-field col s6">
                    <i class="material-icons prefix">face</i>
                    <input name="user" id="icon_prefix" type="text" class="validate">
                    <label for="icon_prefix">Naam</label>
                </div>


                <div class="input-field col s6">
                    <i class="material-icons prefix">lock</i>
                    <input name="psw" id="icon_psw" type="password" class="validate">
                    <label for="icon_psw">password</label>
                </div>

                <div class="col s12" >
                    <button id="registreer" class="btn waves-effect waves-light" type="submit" name="login">Login
                        <i class="material-icons right">send</i>
                    </button>

                </div>
            </div>
    </form>
    </div>




</main>
<?php require_once 'footer.php'; ?>
