
<?php
error_reporting(E_ALL);


// Aggiungere la validazione dell'utente deve essere un email corretta


require "./class/validator/Validable.php";
require "./class/validator/ValidateRequired.php";
require "./class/validator/ValidateMail.php";
require "./class/validator/ValidateGender.php";

print_r ($_POST);

$validatorName = new ValidateRequired('', 'il nome è obbligatorio');
$validatorLastName = new ValidateRequired('', 'il cognome è obbligatorio');
$validatorGender = new ValidateGender();
$validatorEmail = new ValidateMail('email', "l'email è obbligatoria");


//print_r($_SERVER["REQUEST_METHOD"]);
if($_SERVER["REQUEST_METHOD"] === 'POST'){
//  echo "dati inviati adesso li devo controllare";

$validateName = $validatorName -> isValid($_POST['first_name']);
$isValidNameClass = $validatorName -> isValid($_POST['first_name']) ? '' : "is-invalid";

$validateLastName = $validatorLastName -> isValid($_POST['last_name']);
$isValidLastNameClass = $validatorLastName -> isValid($_POST['last_name']) ? '' : "is-invalid";

$validatedGender = $validatorGender -> isValid(!isset($_POST ["gender"]) ? '' : $_POST['gender']);
$checkGender =  $validatorGender -> Value();


$validateEmail = $validatorEmail -> isValid($_POST['email']);
$isValidEmailClass = $validatorEmail -> isValid($_POST['email']) ? '' : "is-invalid";







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
if ( $_SERVER['REQUEST_METHOD']== 'GET'){


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
                        <input type="text" value="<?php echo $validatorName->getValue() ?>" class="form-control <?php echo $isValidNameClass ?>" name="first_name" id="first_name" >
                        <!-- todo : mettere is-invalid -->
                        <?php
                        if (!$validatorName->getValid()){?>
                         <div class="invalid-feedback">
                             <!--L'equivalente di (< ? php echo .... ? >) è (<= ... ?>)-->
                        <?= $validatorName ->getMessage() ?>
                         </div>
                         <?php } ?>
                    </div>

                    <div class="mb-3">
                        <label for="last_name" class="form-label">Cognome</label>
                        <input type="text"  value="<?php echo $validatorLastName->getValue() ?>" class="form-control <?php echo $isValidLastNameClass?>" name="last_name" id="last_name" >
                        <?php
                        if (!$validatorLastName->getValid()){?>
                         <div class="invalid-feedback">
                             <!--L'equivalente di (< ? php echo .... ? >) è (<= ... ?>)-->
                        <?= $validatorLastName ->getMessage() ?>
                         </div>
                         <?php } ?>
                    </div>

                    <div class="mb-3">
                        <label for="birthday" class="form-label">Data di nascita</label>
                        <input type="date" class="form-control" name="birthday" id="birthday" >
                    </div>
                    <div class="mb-3">
                        <label for="birth_place" class="form-label">Luogo di nascita</label>
                        <select name="birth_place" id="birth_place">
                        <option value="">Seleziona</option>
                            <option value="”ag”">agrigento</option>
                            <option value="”al”">alessandria</option>
                            <option value="”an”">ancona</option>
                            <option value="”ao”">aosta</option>
                            <option value="”ar”">arezzo</option>
                            <option value="”ap”">ascoli piceno</option>
                            <option value="”at”">asti</option>
                            <option value="”av”">avellino</option>
                            <option value="”ba”">bari</option>
                            <option value="”bt”">barletta-andria-trani</option>
                            <option value="”bl”">belluno</option>
                            <option value="”bn”">benevento</option>
                            <option value="”bg”">bergamo</option>
                            <option value="”bi”">biella</option>
                            <option value="”bo”">bologna</option>
                            <option value="”bz”">bolzano</option>
                            <option value="”bs”">brescia</option>
                            <option value="”br”">brindisi</option>
                            <option value="”ca”">cagliari</option>
                            <option value="”cl”">caltanissetta</option>
                            <option value="”cb”">campobasso</option>
                            <option value="”ci”">carbonia-iglesias</option>
                            <option value="”ce”">caserta</option>
                            <option value="”ct”">catania</option>
                            <option value="”cz”">catanzaro</option>
                            <option value="”ch”">chieti</option>
                            <option value="”co”">como</option>
                            <option value="”cs”">cosenza</option>
                            <option value="”cr”">cremona</option>
                            <option value="”kr”">crotone</option>
                            <option value="”cn”">cuneo</option>
                            <option value="”en”">enna</option>
                            <option value="”fm”">fermo</option>
                            <option value="”fe”">ferrara</option>
                            <option value="”fi”">firenze</option>
                            <option value="”fg”">foggia</option>
                            <option value="”fc”">forli’-cesena</option>
                            <option value="”fr”">frosinone</option>
                            <option value="”ge”">genova</option>
                            <option value="”go”">gorizia</option>
                            <option value="”gr”">grosseto</option>
                            <option value="”im”">imperia</option>
                            <option value="”is”">isernia</option>
                            <option value="”sp”">la spezia</option>
                            <option value="”aq”">l’aquila</option>
                            <option value="”lt”">latina</option>
                            <option value="”le”">lecce</option>
                            <option value="”lc”">lecco</option>
                            <option value="”li”">livorno</option>
                            <option value="”lo”">lodi</option>
                            <option value="”lu”">lucca</option>
                            <option value="”mc”">macerata</option>
                            <option value="”mn”">mantova</option>
                            <option value="”ms”">massa-carrara</option>
                            <option value="”mt”">matera</option>
                            <option value="”vs”"> medio campidano</option>
                            <option value="”me”">messina</option>
                            <option value="”mi”">milano</option>
                            <option value="”mo”">modena</option>
                            <option value="”mb”">monza e della brianza</option>
                            <option value="”na”">napoli</option>
                            <option value="”no”">novara</option>
                            <option value="”nu”">nuoro</option>
                            <option value="”og”">ogliastra</option>
                            <option value="”ot”">olbia-tempio</option>
                            <option value="”or”">oristano</option>
                            <option value="”pd”">padova</option>
                            <option value="”pa”">palermo</option>
                            <option value="”pr”">parma</option>
                            <option value="”pv”">pavia</option>
                            <option value="”pg”">perugia</option>
                            <option value="”pu”">pesaro e urbino</option>
                            <option value="”pe”">pescara</option>
                            <option value="”pc”">piacenza</option>
                            <option value="”pi”">pisa</option>
                            <option value="”pt”">pistoia</option>
                            <option value="”pn”">pordenone</option>
                            <option value="”pz”">potenza</option>
                            <option value="”po”">prato</option>
                            <option value="”rg”">ragusa</option>
                            <option value="”ra”">ravenna</option>
                            <option value="”rc”">reggio di calabria</option>
                            <option value="”re”">reggio nell’emilia</option>
                            <option value="”ri”">rieti</option>
                            <option value="”rn”">rimini</option>
                            <option value="”rm”">roma</option>
                            <option value="”ro”">rovigo</option>
                            <option value="”sa”">salerno</option>
                            <option value="”ss”">sassari</option>
                            <option value="”sv”">savona</option>
                            <option value="”si”">siena</option>
                            <option value="”sr”">siracusa</option>
                            <option value="”so”">sondrio</option>
                            <option value="”ta”">taranto</option>
                            <option value="”te”">teramo</option>
                            <option value="”tr”">terni</option>
                            <option value="”to”">torino</option>
                            <option value="”tp”">trapani</option>
                            <option value="”tn”">trento</option>
                            <option value="”tv”">treviso</option>
                            <option value="”ts”">trieste</option>
                            <option value="”ud”">udine</option>
                            <option value="”va”">varese</option>
                            <option value="”ve”">venezia</option>
                            <option value="”vb”">verbano-cusio-ossola</option>
                            <option value="”vc”">vercelli</option>
                            <option value="”vr”">verona</option>
                            <option value="”vv”">vibo valentia</option>
                            <option value="”vi”">vicenza</option>
                            <option value="”vt”">viterbo</option>
                        </select>

                    <!-- <div class="mb-3">
                        <label for="birth_place" class="form-label">Luogo di nascita</label>
                        <input type="text" class="form-control" name="birth_place" id="birth_place" >
                    </div> -->

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
                            if(isset($validatedGender) && $validatedGender == false): ?>
                            <div class="invalid-feedback">
                            errore
                            <?php endif ?>
                           </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Nome utente</label>
                        <input type="text" value="<?php echo $validatorEmail->getValue() ?>" class="form-control <?php echo $isValidEmailClass ?>" name="email" id="email" >
                        <?php
                        if ($validatorEmail->getValue()){?>
                         <div class="invalid-feedback">
                             <!--L'equivalente di (< ? php echo .... ? >) è (<= ... ?>)-->
                        <?= $validatorEmail->getMessage() ?>
                         </div>
                         <?php } ?>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password"  class="form-control" name="password" id="password" >
                        <?php
                        if (isset($validateName) && !$validateName){?>
                        <div class="invalid-feedback">
                            La password è obbligatoria
                           </div>
                           <?php } ?>
                    </div>

                    <button class="btn btn-primary btn-sm" type="submit"> Crea </button>

                </form>

            </div>

            <div class="col-sm-4">
      </div>


        </section>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
    crossorigin="anonymous"></script>
</body>

</html>