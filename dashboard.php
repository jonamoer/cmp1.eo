
<?php
session_start();
require_once 'header.php';
/*Veradneren + aanpassing navigatie.php*/
$current = 'dashboard.php';
require_once 'navigatie.php';
function getImage()
{
    require "connectie.php";
    $user = $_SESSION["username"];
    try {
        $stmt = $db->prepare("SELECT * FROM gebruiker WHERE username = $user");
        $stmt ->bindParam("username",$user);
        $stmt->execute();
        $results = $stmt->fetchAll();
            return $results;
    }

    catch (PDOException $e) {
        $message = $e;
    }
}
?>

<main>
<div class="container">
    <?php echo $message;?>
    <div class="row">

        <h1 class="center-align"><?php echo "Welkom, " . $_SESSION["username"];?></h1>
            <?php
                $results = getImage();
                foreach ($results as $row){
                    echo "<img class='' 
                                src='uploads/{$row['profilepic']}'
                                 alt='Alternatief profiel foto'>
                        ";
                } ?>


    </div>
</div>
</main>
<?php require_once 'footer.php'; ?>