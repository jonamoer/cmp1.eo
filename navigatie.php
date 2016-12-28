<?php
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
require_once "functions/get_user_info.php";
?>


<nav>
    <div class="nav-wrapper light-blue darken-1">
        <a href="dashboard.php" class="brand-logo right"><?php
                                                            $results = getUserInfo();
                                                            foreach ($results as $row){
                                                            echo "<img class='nav_pic' 
                                                            src='uploads/{$row['profilepic']}'
                                                             alt='profiel foto ga naar dashboard'>
                        ";
            } ?></a>
        
        <ul >
            <?php echo $nav ?>
        </ul>
        <ul class="right-align">
            <li><a class="right-align red darken-4" href="logout.php">Logout</a></li>
        </ul>
    </div>
</nav>