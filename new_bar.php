
<?php

require_once 'header.php';
/*Veradneren + aanpassing navigatie.php*/
$current = 'new_bar.php';
require_once 'navigatie.php';





?>

<main>

 <div class="row">
     <div class="container">



         <div id="bar">
             <form role="form" class="col s12" method="POST" action="" >
                <div class="row">
            <div class="container">

                <div class="input-field col s6">
                    <i class="material-icons prefix">face</i>
                    <input name="gebruiker" id="icon_prefix" type="text" class="validate">
                    <label for="icon_prefix">Naam</label>
                </div>




                <div class="col s12" >
                    <button id="submit" class="btn waves-effect waves-light" type="submit" name="login">update
                        <i class="material-icons right">send</i>
                    </button>

                </div>
            </div>
    </form>
         </div>
    </div>
 </div>


</main>
<?php require_once 'footer.php'; ?>
