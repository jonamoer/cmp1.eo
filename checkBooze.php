
<?php
session_start();
require_once 'header.php';
/*Veradneren + aanpassing navigatie.php*/
$current = 'index.php';
require_once 'navigatie.php';
function getAllDrank(){
    //database
    require_once 'connectie.php';
    try{
        $stmt = $db->prepare("SELECT * FROM drank");
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
            <div class="col l4">
                <h4>Bars</h4>
                <table class="highlight responsive-table bordered">
                    <thead>
                    <tr>
                        <th data-field="name">ID</th>
                        <th data-field="adres">Drank</th>
                    </tr>
                    </thead>

                    <tbody>
                    <?php
                    $results = getAllDrank();
                    foreach ($results as $row){
                        echo "<tr>";
                        echo "<td>{$row['id']}</td>";
                        echo "<td>{$row['drank']}</td>";
                        echo "</tr>";
                    }
                    ?>
                    </tbody>
                </table>
            </div>


            <!--End bars-->

        </div>
    </div>




</main>
<?php require_once 'footer.php'; ?>