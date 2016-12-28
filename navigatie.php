<?php
require_once "functions/get_user_info.php";
$nav ="";
if(isset($_SESSION['username'])){
    $navigatie = [
        'index.php' => 'Home',
        'addbar.php' => "Add Bar",
        'addbooze.php' => "Add Booze",
        'bars.php' => "Check bars",
        'users.php' => "gebruikers",

    ];}
else{
    $navigatie = [
        'index.php' => 'Home',
        'login.php' => 'Login',
        'registreer.php' => 'Registreer',
    ];
}

foreach ($navigatie as $key => $value){
    $attr = '';
    if( $key == $current )
    {
        $attr = ' class="active"';
    }
    $nav .= '<li' . $attr . '><a href=" '. $key . '">' . $value . '</a></li>';
}
?>


<nav>
    <div class="nav-wrapper light-blue darken-1">

        
        <ul >
            <?php echo $nav ?>
        </ul>
        <ul class="right-align">
            <li><a class="right-align red darken-4" href="logout.php">Logout</a></li>
        </ul>
    </div>
</nav>