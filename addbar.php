
<?php require_once 'header.php';?>


<!------------------navigatie----------------------------->

<?php
$current = 'addbar.php';
require_once 'navigatie.php'; ?>

<main>
    <div class="row">
        <form class="col s6">
            <div class="row">
                <h3>BAR</h3>
                <div class="input-field col s6">
                    <input id="last_name" type="text" class="validate">
                    <label for="last_name">Naam</label>
                </div>
                <div class="input-field col s6">
                    <input id="last_name" type="text" class="validate">
                    <label for="last_name">Adres</label>
                </div>
            </div>
        </form>

        <form class="col s6">
            <div class="row">
                <h3>DRANK</h3>
                <div class="input-field col s12">
                    <select>
                        <option value="">Kies uw drank</option>
                        <option value="1">Cola</option>
                        <option value="2">Bier</option>
                        <option value="3">Water</option>
                        <option value="4">Wijn</option>
                        <option value="5">Jenever</option>
                        <option value="6">Duvel</option>
                    </select>
                </div>
            </div>
        </form>

        <div class="col s12" >
            <button id="registreer"class="btn waves-effect waves-light" type="submit" name="registreer">Add bar
                <i class="material-icons right">send</i>
            </button>

    </div>
</main>

<?php require_once 'footer.php'; ?>
