

<?php

use crud\UserCRUD;
require "../config.php";
require "./autoload.php";

$users = (new UserCRUD()) -> read();

//print_r($users)

?>

<?php require "./class/views/head-view.php" ?>


<table class="table">
<tr>
    <th>#</th>
    <th>nome</th>
    <th>cognome</th>
    <th>Comune</th>
    <th>Azioni</th>
    </tr>

   
<?php foreach ($users as $user) {?>
    <tr>
    <td> <?php echo $user -> user_id ?> </td>
    <td> <?php echo $user -> first_name ?> </td>
    <td> <?php echo $user -> last_name ?> </td>
    <td> <?php echo $user -> birth_place ?> </td>
    <td>
    <a href = "edit-user.php?user_id=<?= $user->user_id ?>" class= "btn btn-primary btm-xs">modifica</a>
    <a href = "delete_user.php?user_id=<?= $user->user_id ?>" class="btn btn-primary btm-xs">delete</a>
</td>
</tr>

<?php } ?>

</table>

<?php require "./class/views/footer-view.php"?>