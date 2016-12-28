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
        $stmt2 = $db->prepare("SELECT drank FROM drank order by RAND() LIMIT 1");
        $stmt2 -> execute();

        $results2 = $stmt2->fetchAll();
        return $results2;

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
            <div class="col l10">
                <h3>Randomize</h3>


                <?php
                $results = getAllBars();
                foreach ($results as $row){

                    echo "<h4>Vanavond gaan we naar {$row['naam']}</h4>";
                }

                $results2 = getAllBooze();
                foreach ($results2 as $row){

                    echo "<h4>en we drinken de hele avond {$row['drank']}</h4>";
                }
                ?>



            </div>


            <!--End bars-->


        </div>
    </div>
</main>

<?php require_once 'footer.php'; ?>
