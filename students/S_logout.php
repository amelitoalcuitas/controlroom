<?php require 'connection.php'; ?>

<?php 
session_start();

unset($_SESSION["user"]);
unset($_SESSION["studid"]);


header("Location: ../index.html");


?>