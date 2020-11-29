<?php include('header2.php');

// TODO :   Si on a une session en cours...
//          Vider le tableau de session
//          Détruire la session en cours

$_SESSION = array();

session_destroy();

?>

<script>    window.location.replace("../index.php"); </script>



<?php include('footer.php'); ?>
