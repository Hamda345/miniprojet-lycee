<?php 
    $id = $_REQUEST['dd'];
    include("bdd.php");
    $conn->exec("DELETE from note WHERE id_etudiant = $id");
    header("Location:listeNotes_ens.php");
?>
