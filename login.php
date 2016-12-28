
<?php
session_start();
require_once 'header.php';
$current = 'login.php';
require_once 'navigatie.php';
$errMsg ="";
if(isset($_POST['login'])){
    require_once "connectie.php";
    $username = $_POST["username"];
    $password = $_POST["password"];
    if($username == '')
        $errMsg = "geen gebruiker gedefineerd";
    if($password == '')
        $errMsg = "Geen wachtwoord";
    if ($errMsg == ''){
        $stmt = $db->prepare("SELECT id,username,password FROM gebruiker WHERE username =:username AND password =:password");
        $stmt ->bindParam(':username',$username);
        $stmt ->bindParam(':password', $password);
        $stmt->execute();
        $results = $stmt->fetch();
        if($stmt->rowCount() == 1 ){
            $_SESSION['username'] = $username;
            echo "<script>window.location = 'dashboard.php'</script>";
        }else{
            $errMsg = "Gebruiker en/of wachtwoord niet gevonden";
        }
    }
}
?>

<main>
    <?php echo $errMsg;?>
    <div class="row"></div>
    <div class="row">
        <div class="container">

            <form role="form" class="" method="POST" action="login.php" >
                <div class="row">

                    <div class="container">

                        <div class="input-field col s10">
                            <i class="material-icons prefix">face</i>
                            <input name="username" id="icon_prefix" type="text" class="validate">
                            <label for="icon_prefix">Naam</label>
                        </div>


                        <div class="input-field col s10">
                            <i class="material-icons prefix">lock</i>
                            <input name="password" id="icon_psw" type="password" class="validate">
                            <label for="icon_psw">password</label>
                        </div>

                        <div class="col s8" >
                            <button id="submit" class="btn waves-effect waves-light center-align" type="submit" name="login">Login
                                <i class="material-icons right">send</i>
                            </button>

                        </div>
                    </div>
            </form>
        </div>
    </div>




</main>
<?php require_once 'footer.php'; ?>