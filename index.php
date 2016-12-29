<?php
session_start();

require_once 'header.php';
/*Veradneren + aanpassing navigatie.php*/
$current = 'index.php';
require_once 'navigatie.php';

function getAllBars(){
    //database
    require 'connectie.php';
    try{
        $stmt = $db->prepare("SELECT naam FROM bar order by RAND() LIMIT 1");
        $stmt -> execute();

        $results = $stmt->fetchAll();
        return $results;

    }
    catch (PDOException $e){
        $message = $e;
    }
}

function getAllBooze(){
    //database
    require 'connectie.php';
    try{
        $stmt = $db->prepare("SELECT drank FROM drank order by RAND() LIMIT 1");
        $stmt -> execute();

        $results = $stmt->fetchAll();
        return $results;

    }
    catch (PDOException $e){
        $message = $e;
    }
}

function getAllResto(){
    //database
    require 'connectie.php';
    try{
        $stmt = $db->prepare("SELECT naam FROM resto order by RAND() LIMIT 1");
        $stmt -> execute();

        $results = $stmt->fetchAll();
        return $results;

    }
    catch (PDOException $e){
        $message = $e;
    }
}

function getAllFood(){
    //database
    require 'connectie.php';
    try{
        $stmt = $db->prepare("SELECT eten FROM eten order by RAND() LIMIT 1");
        $stmt -> execute();

        $results = $stmt->fetchAll();
        return $results;

    }
    catch (PDOException $e){
        $message = $e;
    }
}
?>


<main>
    <div class="container">

        <div class="row">
            <!--Bars-->
            <div class="col l12">
                <h3>Randomize</h3>
                <?php
                $results = getAllResto();
                foreach ($results as $row){

                    echo "<h4>Vanavond gaan we naar " . "<div class='highlighted'>{$row['naam']}</div> en" . "</h4>";
                }

                $results = getAllFood();
                foreach ($results as $row){

                    echo "<h4> we eten " . "<div class='highlighted'>{$row['eten']}</div>." . "</h4>";
                }

                $results = getAllBars();
                foreach ($results as $row){

                    echo "<h4> Daarna gaan we naar " . "<div class='highlighted'>{$row['naam']}</div>" . "</h4>";
                }

                $results = getAllBooze();
                foreach ($results as $row){

                    echo "<h4> en we drinken de hele avond " . "<div class='highlighted'>{$row['drank']}</div>." . "</h4>";
                }


                ?>
            </div>
            <!--End bars-->
        </div>

        <div class="row">

            <div class="col s12" >
                <button class="btn waves-effect waves-light" type="button" value="Reload Page" onClick="window.location.href=window.location.href">
                        Randomize again
                        <i class="material-icons right">refresh</i>
                    </button>
            </div>
        </div>
    </div>
</main>

<?php require_once 'footer.php'; ?>
