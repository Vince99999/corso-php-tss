<?php

use crud\UserCRUD;
use validator\ValidateDate;
use validator\ValidateRequired;
use validator\ValidatorRunner;
use models\User;
use Registry\it\Provincia;
use Registry\it\Regione;

require "./config.php";
require "./autoload.php";
//print_r($_GET);
$user_id = filter_input(INPUT_GET, 'user_id', FILTER_VALIDATE_INT);

$crud = new UserCRUD;
$user = $crud->read($user_id);
//print_r($user);
//print_r($_POST);


$validatorRunner = new ValidatorRunner([
    'first_name' => new ValidateRequired($user->first_name, 'Il nome è obbligatorio'),
    'last_name'  => new ValidateRequired($user->last_name, 'Il cognome è obblicatorio'),
    'birthday'  => new ValidateRequired($user->birthday, 'La data di nascità non è valida'),
    'gender'  => new ValidateRequired($user->gender, 'Il Genere è obbligatorio'),
    'birth_place'  => new ValidateRequired($user->birth_place, 'La città è obbligatoria'),
    'regione_id' => new ValidateRequired($user->regione_id, 'La regione è obbligatoria'),
    'provincia_id' => new ValidateRequired($user->provincia_id, 'La provincia  è obbligatoria'),

    // 'username'  => new ValidateRequired($user->username,'Username è obbligatorio'),
    // // 'username:email'  => new ValidateMail('','Formato email non valido'),
   //  'password'  => new ValidateRequired('','Password è obbligatorio')
]);
extract($validatorRunner->getValidatorList());

//--------------------------------------------------------------------------

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   

    $validatorRunner->isValid();

    if ($validatorRunner->getValid()) {
   //     echo "posso inviare i dati di validazione";
      // print_r($_POST);
        $user = User::arrayToUser($_POST);
        print_r($user);
        $crud = new UserCRUD();
        $crud->update($user);

        header("location:index.php");
    }
}

?>


<?php require "./class/views/head-view.php" ?>




<section class="row">
    <div class="col-sm-8">
        <form class="mt-1 mt-md-5" action="edit-user.php?user_id= <? $user -> user_id?>" method="post">
            <div class="mb-3">
                <label for="first_name" class="form-label">nome</label>
                <input type="text" value="<?= $first_name->getValue() ?>" class="form-control <?php echo !$first_name->getValid() ? 'is-invalid' : ''  ?>" name="first_name" id="first_name">

                <?php if (!$first_name->getValid()) : ?>
                    <div class="invalid-feedback">
                        <?php echo $first_name->getMessage() ?>
                    </div>
                <?php endif ?>


            </div>
            <div class="mb-3">
                <label for="last_name" class="form-label">cognome</label>
                <input type="text" id="last_name" value="<?= $last_name->getValue() ?>" name="last_name" class="form-control <?php echo !$last_name->getValid() ? 'is-invalid' : '' ?>">
                <?php if (!$last_name->getValid()) : ?>
                    <div class="invalid-feedback">
                        <?php echo $last_name->getMessage() ?>
                    </div>
                <?php endif ?>
            </div>
            <div class="mb-3">
                     <!-- BIRTHDAY -->
                     <label for="birthday" class="form-label">Data di nascita</label>
                <input type="date" 
                value="<?= $birthday->getValue() ?>" 
                class="form-control <?php echo !$birthday->getValid() ? 'is-invalid':'' ?>" 
                name="birthday" 
                id="birthday"
                >
                <?php if (!$birthday->getValid()) : ?>
                    <div class="invalid-feedback">
                        <?= $birthday->getMessage() ?>
                    </div>
                <?php endif ?>
            </div>
            <div class="mb-3">
                <!-- BIRTH_PLACE -->
                <div class="row">
                    <div class="col">
                        <label for="birth_place" class="form-label">Luogo</label>
                        <input type="text" value="<?= $birth_place->getValue(); ?>" class="form-control <?php echo !$birth_place->getValid() ? 'is-invalid' : '' ?>" name="birth_place" id="birth_place">
                        <?php if (!$birth_place->getValid()) : ?>
                            <div class="invalid-feedback">
                                <?= $birth_place->getMessage(); ?>
                            </div>
                        <?php endif ?>
                    </div>

                    <div class="col">
                        <label for="birth_region" class="form-label">Regione</label>
                        <select id="birth_region" class="form-select birth_region  <?php echo !$regione_id->getValid() ? 'is-invalid' : '' ?>" name="regione_id">
                            <option value=""></option>
                            <?php foreach (Regione::all() as $key => $regione) : ?>
                                <option <?= ($regione_id->getValue() == $regione->regione_id) ? 'selected' : '' ?> value="<?= $regione->regione_id ?>"> <?= $regione->nome_regione ?> </option>;
                            <?php endforeach ?>
                        </select>
                        <?php
                        if (!$regione_id->getValid()) : ?>
                            <div class="invalid-feedback">
                                <?= $regione_id->getMessage(); ?>
                            </div>
                        <?php
                        endif ?>
                    </div>

                    <div class="col">
                        <label for="provincia_id" class="form-label">Provincia</label>
                        <select id="provincia_id" class="provincia_id form-select <?php echo !$provincia_id->getValid() ? 'is-invalid' : '' ?>" name="provincia_id">
                            <option value=""></option>
                            <?php foreach (Provincia::all() as $key => $provincia) : ?>
                                <option <?= ($provincia_id->getValue() == $provincia->provincia_id) ? 'selected' : '' ?> value="<?= $provincia->provincia_id ?>"> <?= $provincia->nome ?> </option>;
                            <?php endforeach ?>
                        </select>
                        <?php
                        if (!$provincia_id->getValid()) : ?>
                            <div class="invalid-feedback">
                                <?= $provincia_id->getMessage(); ?>
                            </div>
                        <?php endif ?>
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <!-- <h1><?php echo $gender->getValue() == 'M' ? 'AA' : 'BB' ?></h1> -->
                <label for="gender" class="form-label">Genere</label>
                <select name="gender" class="form-select <?php echo !$gender->getValid() ? 'is-invalid' : '' ?>" id="gender">
                    <option value=""></option>
                    <option <?php echo $gender->getValue() == 'M' ? 'selected' : ''  ?> value="M">M</option>
                    <option <?php echo $gender->getValue() == 'F' ? 'selected' : ''  ?> value="F">F</option>
                </select>
                <?php
                if (!$gender->getValid()) : ?>
                    <div class="invalid-feedback">
                        <?php echo $gender->getMessage() ?>
                    </div>
                <?php endif; ?>

                <input type="hidden" value="<?= $user_id?>" name="user_id" id="user_id">

                <button class="btn btn-primary btn-sm" type="submit">Modifica</button>
        </form>

            </div>

</section>

<?php require "./class/views/footer-view.php" ?>