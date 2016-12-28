
<?php
session_start();
require_once 'header.php';
/*Veradneren + aanpassing navigatie.php*/
$current = 'dashboard.php';
require_once 'navigatie.php';
require_once 'functions/get_user_info.php';
?>

<main>
<div class="container">
    <?php echo $message;?>
    <div class="row">

        <h1 class="center-align"><?php echo "Welkom, " . $_SESSION["username"];?></h1>
            <?php
                $results = getUserInfo();
                foreach ($results as $row){
                    echo "<p>{$row['email']}</p>";
                    echo "<img class='profilepic' 
                                src='uploads/{$row['profilepic']}'
                                 alt='Alternatief profiel foto'>
                        ";
                } ?>


    </div>
</div>
</main>
<?php require_once 'footer.php'; ?>