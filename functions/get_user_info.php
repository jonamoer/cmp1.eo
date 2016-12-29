<?php
function getUserInfo()
{
    require "connectie.php";
    try {
        $stmt = $db->prepare("SELECT * FROM gebruiker WHERE username = '".$_SESSION['username']."'");
        $stmt->execute();
        $results = $stmt->fetchAll();
        return $results;
    }

    catch (PDOException $e) {
        $message = $e;
    }
}