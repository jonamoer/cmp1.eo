
<?php require_once 'header.php';?>


<!------------------navigatie----------------------------->

<?php
$current = 'addresto.php';
require_once 'navigatie.php'; ?>

<main>
    <div class="row">
        <form class="col s6">
            <div class="row">
                <h3>RESTO</h3>
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
                <h3>ETEN</h3>
                <div class="input-field col s12">
                    <select>
                        <option value="">Kies uw eten</option>
                        <option value="1">Spaghetti</option>
                        <option value="2">Stoofvlees</option>
                        <option value="3">Frieten</option>
                        <option value="4">Salade</option>
                        <option value="5">Pizza</option>
                        <option value="6">Balletjes in tomatensaus</option>
                    </select>
                </div>
            </div>
        </form>

        <div class="col s12" >
            <button id="registreer"class="btn waves-effect waves-light" type="submit" name="registreer">Add resto
                <i class="material-icons right">send</i>
            </button>

        </div>
</main>

<?php require_once 'footer.php'; ?>
