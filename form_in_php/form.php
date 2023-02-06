<!DOCTYPE HTML>
<html>  
<body>

<!-- value è un campo che viene compilato quando si inserisce il dato nello spazio messo a disposizione dall'input
quindi è un campo la cui esistenza è sottointesa ma che può essere precompilata anche all'interno
dello stesso tag eventualmente anche se in questo caso in fase di input nel broswer possono sempre essere modificati-->

<form action="log-in-response.php" method="post">
Name: <input type="text" value="Mario" name="first-name"><br>
Cognome <input type="text" value="Rossi" name="last-name"><br>
E-mail: <input type="email" value = "aaa@aaa.aaa" name="email"><br>
password <input type="text" value = "segretissimo" name="password"><br>
<input type="submit">
</form>

</body>
</html>
