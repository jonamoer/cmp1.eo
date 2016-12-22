
<?php
session_start();
require_once 'header.php';
$current = 'login.php';
require_once 'navigatie.php';


if(isset($_POST['login'])){

    $username = $_POST["gebruiker"];
    $password = $_POST["psw"];
    try{
        $stmt = $db->prepare("SELECT * FROM gebruiker WHERE (naam = :gebruiker AND wachtwoord = :psw)");
        $stmt ->bindParam(":gebruiker", $username); //<-- Look at Param name binded
        $stmt ->bindParam(":psw", $password);
        $stmt ->execute();
        }
    catch (PDOException $e){
        $message = $e . "Failed";
    }
    $result=$stmt->fetch();
    if($stmt->rowCount() == 1)
    {
        header("location index.php");
        $_SESSION['username'] = $username;
    }else{
        echo "failed";
    }
}
?>

<main>

    <div class="row">
    <form role="form" class="col s12" method="POST" action="login.php" >
        <div class="row">
            <div class="container">

                <div class="input-field col s6">
                    <i class="material-icons prefix">face</i>
                    <input name="gebruiker" id="icon_prefix" type="text" class="validate">
                    <label for="icon_prefix">Naam</label>
                </div>


                <div class="input-field col s6">
                    <i class="material-icons prefix">lock</i>
                    <input name="psw" id="icon_psw" type="password" class="validate">
                    <label for="icon_psw">password</label>
                </div>

                <div class="col s12" >
                    <button id="submit" class="btn waves-effect waves-light" type="submit" name="login">Login
                        <i class="material-icons right">send</i>
                    </button>

                </div>
            </div>
    </form>
    </div>




</main>
<?php require_once 'footer.php'; ?>
