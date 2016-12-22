<?php

session_start();
if(isset($_SESSION['username'])){
    $navigatie = [
        'index.php' => 'Home',
        'logout.php' => 'Uitlogen',
        'new_bar.php' => "Nieuwe bar toevoegen"
    ];}
else{
    $navigatie = [
        'index.php' => 'Home',
        'login.php' => 'Login',
        'registreer.php' => 'registreer',
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
    <div class="nav-wrapper">
        
        <ul class="left hide-on-med-and-down">
            <?php echo $nav ?>
        </ul>
    </div>
</nav>