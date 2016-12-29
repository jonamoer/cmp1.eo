
<?php
session_start();
require_once 'header.php';
/*Veradneren + aanpassing navigatie.php*/
$current = 'dashboard.php';
require_once 'navigatie.php';
require_once "functions/get_user_info.php";
?>

<main>
<div class="container">
    <?php echo $message;?>
    <div class="row">

        <h1 class="center-align"><?php echo "Welkom, " . $_SESSION["username"];?></h1>
    <div class="col s12">
        <h4>Uw gegevens</h4>
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
            $results = getUserInfo();
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