<?php
<<<<<<< HEAD
session_start();
if(isset($_SESSION['username'])){
    $navigatie = [
        'index.php' => 'Home',
        'logout.php' => 'Uitlogen',
    ];}
else{
    $navigatie = [
        'index.php' => 'Home',
        'login.php' => 'Login',
        'registreer.php' => 'registreer',
    ];


}
=======
$navigatie = [
  'index.php' => 'Home',
   'registreer.php' => 'Registreer',
    'addbar.php' => 'Add bar',
    'addresto.php' => 'Add resto'
];
>>>>>>> origin/master
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