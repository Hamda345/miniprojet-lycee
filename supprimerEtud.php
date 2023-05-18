<?php 
    $id = $_REQUEST['dd'];
    include("bdd.php");
    $conn->exec("DELETE FROM etudiant WHERE id_etudiant = $id");
    header("Location:listeEtud.php");
?>
