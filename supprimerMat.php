<?php
    $id = $_REQUEST['dd'];
    include("bdd.php");
    $conn->exec("DELETE FROM matiere where id_matiere = $id");
    header("Location:listeMat.php");
?>
