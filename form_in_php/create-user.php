<?php

use Registry\it\Provincia;
use Registry\it\Regione;
use validator\ValidateGender;
use validator\ValidateMail;
use validator\ValidateRequired;

error_reporting(E_ALL);
// Aggiungere la validazione dell'utente deve essere un email corretta


print_r($_POST);

$validatorName = new ValidateRequired('', 'il nome è obbligatorio');
$validatorLastName = new ValidateRequired('', 'il cognome è obbligatorio');
$validatorGender = new ValidateGender();
$validatorEmail = new ValidateMail('email', "l'email è obbligatoria");


//print_r($_SERVER["REQUEST_METHOD"]);
if ($_SERVER["REQUEST_METHOD"] === 'POST') {
    //  echo "dati inviati adesso li devo controllare";

    $validateName = $validatorName->isValid($_POST['first_name']);
    $isValidNameClass = $validatorName->isValid($_POST['first_name']) ? '' : "is-invalid";

    $validateLastName = $validatorLastName->isValid($_POST['last_name']);
    $isValidLastNameClass = $validatorLastName->isValid($_POST['last_name']) ? '' : "is-invalid";

    $validatedGender = $validatorGender->isValid(!isset($_POST["gender"]) ? '' : $_POST['gender']);
    $checkGender =  $validatorGender->getValid();


    $validateEmail = $validatorEmail->isValid($_POST['email']);
    $isValidEmailClass = $validatorEmail->isValid($_POST['email']) ? '' : "is-invalid";

    //$validateLastName =  $validatorName -> isValid($_POST['last_name']);
    //$validatePassqword = $validatorName -> isValid($_POST['password']);


    //probabilmente dopo useremo 

    // if + assegnazione con l'operatore ternario
    //$isValidNameClass = $validatorName -> isValid($_POST['first_name']) ? '' : "is-invalid";
    // in questo caso si può usare la stessa istanza di classe 
    //$isValidLastNameClass = $validatorName -> isValid ($_POST['last_name']) ? '' : "is-invalid";
    //$isValidPassword = $validatorName -> isValid($_POST['password']) ? '' : "is-invalid";

    // var_dump ($isValidNameClass);
    // var_dump ($isValidLastNameClass);

    // $validatorGender = new ValidateRequired();
    // $validatedGender = $validatorGender -> isValid(!isset($_POST ["gender"]) ? '' : $_POST['gender']);


    //l'operatore ternario sostituisce la if con la relativa assegnazione di:

    // if($validatorName -> isValid($_POST['first_name'])){
    //     $isValidNameClass = '';
    // }else{

    //     $isValidNameClass = 'is-invalid';
    // }


    //  $validateLastName = $validatorLastName -> isValid($_POST['last_name']);




    // come associo la validazione a un campo /input / controllo
    // first_name -> required
    // birthday -> required | validDate

}
//UTILIZZEREMO UN SECONDO IF POICHE' L'ELSE PUO' RIFERIRSI A QUALSIASI CASO DEL $_SERVER
// else{

// echo "l'utente deve ancora compilare non devo ancora fare nulla";

// }

//(PS ctrl + u  sul browser per ottenere il codice statico fornito dal server al client)
// (utilizzanzo solo tasto destro + ispeziona sul broswer invece si ottiene il codice html modificato da javascript)

//QUESTO SCRIPT VIENE ESEGUITO QUANDO VISUALIZZO PER LA "PRIMA" VOLTA IL FORM DI REGISTRAZIONE
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Registrazione</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
    <!-- Form di registrazione PHP

        usare bootstrap
        usare filter_input per ottenere le informazioni

        create-user.php
            - nome first_name 
            - cognome last_name
            - data di nascita birthday
            - luogo di nascita birth_place
            - genere (M/F) gender
            
            - nome utente username
            - password  password

        Pagina che riceve i dati
            register-user.php

-->

    <header class="bg-light p-1">
        <h1 class="display-6">Form di registrazione PHP</h1>
    </header>

    <main class="container">

        <section class="row">
            <div class="col-sm-4">
            </div>

            <div class="col-sm-4">

                <form class="mt-1 mt-md-5" action="create-user.php" method="POST">

                    <div class="mb-3">
                        <label for="first_name" class="form-label">Nome</label>
                        <input type="text" value="<?php echo $validatorName->getValue() ?>" class="form-control <?php echo $isValidNameClass ?>" name="first_name" id="first_name">
                        <!-- todo : mettere is-invalid -->
                        <?php
                        if (!$validatorName->getValid()) { ?>
                            <div class="invalid-feedback">
                                <!--L'equivalente di (< ? php echo .... ? >) è (<= ... ?>)-->
                                <?= $validatorName->getMessage() ?>
                            </div>
                        <?php } ?>
                    </div>

                    <div class="mb-3">
                        <label for="last_name" class="form-label">Cognome</label>
                        <input type="text" value="<?php echo $validatorLastName->getValue() ?>" class="form-control <?php echo $isValidLastNameClass ?>" name="last_name" id="last_name">
                        <?php
                        if (!$validatorLastName->getValid()) { ?>
                            <div class="invalid-feedback">
                                <!--L'equivalente di (< ? php echo .... ? >) è (<= ... ?>)-->
                                <?= $validatorLastName->getMessage() ?>
                            </div>
                        <?php } ?>
                    </div>


                    <div class="mb-3">
                        <div class="row">

                            <div class="col">

                                <label for="birth_region" class="form-label">regione</label>
                                <select class="birth_region" name="birth_region">
                                    <?php foreach (Regione::all() as $regione) : ?>
                                        <option value="<?= $regione->regione_id ?>"><?= $regione->nome_regione ?></option>
                                    <?php endforeach ?>

                                </select>
                            </div>

                            <div class="col">

                                <label for="birth_province" class="form-label">provincia</label>
                                <select class="birth_province" name="birth_province">
                                    <?php foreach (Provincia::all() as $provincia) : ?>
                                        <option value="<?= $provincia->provincia_id ?>"><?= $provincia->nome ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>

                            <div class="col">
                                <label for="birth_city" class="form-label">città</label>
                                <input type="text" class="form-control" class="mb-3">
                            </div>

                        </div>

                   


                    <div class="mb-3">
                        <span>Genere</span>
                        <div class="form-check">
                            <!-- TODO: METTERE IS-INVALID SU ENTRAMBI I GENERI -->
                            <input class="form-check-input <?php echo !$validatedGender  ? 'is-invalid' : '' ?>" type="radio" name="gender" id="gender_M" <?php                     ?>>
                            <label class="form-check-label" for="gender_M">
                                Maschile
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input <?php echo !$validatedGender  ? 'is-invalid' : '' ?> " type="radio" name="gender" id="gender_F" <?php               ?>>
                            <label class="form-check-label" for="gender_F">
                                Femminile
                            </label>
                            <?php
                            if (isset($validatedGender) && $validatedGender == false) : ?>
                                <div class="invalid-feedback">
                                    errore
                                <?php endif ?>
                                </div>
                        </div>

                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Nome utente</label>
                        <input type="text" value="<?php echo $validatorEmail->getValue() ?>" class="form-control <?php echo $isValidEmailClass ?>" name="email" id="email">
                        <?php
                        if ($validatorEmail->getValue()) { ?>
                            <div class="invalid-feedback">
                                <!--L'equivalente di (< ? php echo .... ? >) è (<= ... ?>)-->
                                <?= $validatorEmail->getMessage() ?>
                            </div>
                        <?php } ?>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" id="password">
                        <?php
                        if (isset($validateName) && !$validateName) { ?>
                            <div class="invalid-feedback">
                                La password è obbligatoria
                            </div>
                        <?php } ?>
                    </div>

                    <button class="btn btn-primary btn-sm" type="submit"> Crea </button>

                </form>

            </div>
                        </div>



        </section>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>