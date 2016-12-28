<?php
$host = "localhost";
$dbname = "cmp1_eo";
$username = "root";
$pass = "root";

$dns = "mysql:host={$host};dbname={$dbname}";

try{
    $db = new PDO($dns, $username, $pass);

    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    /*echo "<div id='succes'>"."conncetion database succesful"."</div>";
    echo '</br>';*/
}catch(PDOException $e){
    echo "<div id=fout>". "<div id='fout_titel'>" . "You failed misserable piece of shit" . "</div>" . "</br>" . "Errormessage: ". $e . "</div>";
};
