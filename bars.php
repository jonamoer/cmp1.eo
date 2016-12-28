
<?php
session_start();

require_once 'header.php';
/*Veradneren + aanpassing navigatie.php*/
$current = 'bars.php';
require_once 'navigatie.php';
require_once 'functions/getbars.php';


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
                    <th data-field="name">Bar</th>
                    <th data-field="adres">Adres</th>
                    <th data-fiels="delete">Delete</th>
                </tr>
                </thead>

                <tbody>
                <?php
                $results = getAllBars();
                foreach ($results as $row){
                    echo "<tr>";
                    echo "<td>{$row['naam']}</td>";
                    echo "<td>{$row['adres']}</td>";
                    echo "<td><a href='bars.php?delete_id={$row['id']}'><i class='material-icons'>delete</i></a></td>";
                    echo "</tr>";
                }
                ?>
                </tbody>
            </table>
        </div>


    </div>
</div>







</main>
<?php require_once 'footer.php'; ?>
