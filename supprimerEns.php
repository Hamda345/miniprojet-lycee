<?php 
    $id = $_REQUEST['dd'];
    include("bdd.php");
    $conn->exec("DELETE FROM enseignant WHERE id_enseignant = $id");
    header("Location:listeEnseign.php");
?>
