
<?php
session_start();
require_once 'header.php';
/*Veradneren + aanpassing navigatie.php*/
$current = 'users.php';
require_once 'navigatie.php';

function getAllUsers(){
    //database
    require_once 'connectie.php';
    try{
        $stmt = $db->prepare("SELECT * FROM gebruiker");
        $stmt -> execute();

        $results = $stmt->fetchAll();
        return $results;

    }
    catch (PDOException $e){
        $message = $e;
    }
}
if(isset($_GET["delete_id"])){
    require("connectie.php");

    $id = $_GET["delete_id"];



    try{
        //verwijder dat record met die ID
        $stmt = $db->prepare("DELETE FROM gebruiker WHERE id=:id");
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        header("location: users.php");
    }
    catch(PDOException $e){
        $message = $e;
    }
}

?>

<main>
    <div class="container">
        <div class="row">

            <!--Bars-->
            <div class="col s12">
                <h4>Gebruikers</h4>
                <table class="highlight responsive-table bordered">
                    <thead>
                    <tr>
                        <th data-field="name">ID</th>
                        <th data-field="naam">Naam</th>
                        <th data-field="email">Email</th>
                        <th data-field="email">Profielfoto</th>
                        <th data-fiels="delete">Delete</th>
                    </tr>
                    </thead>

                    <tbody>
                    <?php
                    $results = getAllUsers();
                    foreach ($results as $row){
                        echo "<tr>";
                        echo "<td>{$row['id']}</td>";
                        echo "<td>{$row['username']}</td>";
                        echo "<td>{$row['email']}</td>";
                        echo "<td><img class='profilepic' 
                                src='uploads/{$row['profilepic']}'
                                 alt='Alternatief profiel foto'>
                        </td>";
                        echo "<td><a href='users.php?delete_id={$row['id']}'><i class='material-icons'>delete</i></a></td>";
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