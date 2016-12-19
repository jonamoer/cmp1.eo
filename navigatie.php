<?php
$navigatie = [
  'index.php' => 'Home',
   'registreer.php' => 'Registreer',
    'addbar.php' => 'Add bar',
    'addresto.php' => 'Add resto'
];
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