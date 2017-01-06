<?php
require "functions/get_user_info.php";
$nav ="";
$nav_drop ="";
if(isset($_SESSION['username'])){
    $navigatie = [
        'index.php' => 'Home',
        'users.php' => "Users",

    ];
    $dropdownNav = [
        'addbar.php' => "Add Bar",
        'addbooze.php' => "Add Booze",
        'addresto.php' => 'Add Resto',
        'addfood.php' => 'Add Food',
    ]
    ;}
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

foreach ($dropdownNav as $key => $value){
    $attr = '';
    if( $key == $current )
    {
        $attr = " active";
    }
    $nav_drop .= '<li' . $attr . '><a href=" '. $key . '">' . $value . '</a></li>';
}



?>


<nav>
    <div class="nav-wrapper light-blue darken-1">
      <?php
       if(isset($_SESSION['username'])){
      $results = getUserInfo();
      foreach ($results as $row) {
           echo "<a href='dashboard.php' class='brand-logo right'><img class='nav_pic' alt='Profile picture'src='uploads/{$row["profilepic"]}'></a>";
       }}
        else{
            echo "<a href='login.php' class='brand-logo right'><i class='material-icons prefix'>remove_circle</i></a>";
        }
        ?>

        <ul >
            <?php echo $nav;
            if(isset($_SESSION['username'])){
            echo '<li><a class="dropdown-button" href="#!" data-activates="dropdown1">Add<i class="material-icons right">arrow_drop_down</i></a></li>';}
            else{

            };
            ?>
        </ul>
        <ul id="dropdown1" class="dropdown-content">
            <?php echo $nav_drop ?>
        </ul>
        <ul class="right-align">
            <li><a class="right-align red darken-4" href="logout.php">Logout</a></li>
        </ul>
    </div>
</nav>