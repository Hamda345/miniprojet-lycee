<?php
    include("bdd.php");
    session_start();
    if(!isset($_SESSION['id_enseignant'])) {
      header("Location:index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Liste des Notes</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <style>
            body {
                font-family: "Times New Roman", Times, serif;
                background-repeat: no-repeat;
                background-attachment: fixed;
                background-size: cover;
                }
            input{
                margin-top:15px;
                margin-left:10px;
            }
        </style>
</head>
        <?php
            $liste = $conn->query("SELECT  id_etudiant, id_matiere , examen, control_contenu FROM note");
            $liste_notes = $liste->fetchAll();
        ?>

<body class="body">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="navbar-nav">
      <a class="nav-item nav-link active" href="listeEtud_ens.php">Liste des Etudiants <span class="sr-only">(current)</span></a>
      <a class="nav-item nav-link" href="listeMat_ens.php">Liste des Matierès</a>
      <a class="nav-item nav-link" href="logout.php">Deconnexion</a>
    </div>
</nav>
<h1>Liste des Notes:</h1>
<table class="table table-striped">
            <thead>
                <tr>
                    <th>ID Etudiant</th>
                    <th>ID Matiere</th>
                    <th>Examen</th>
                    <th>Control Contenu</th>
                </tr>
            </thead>
<?php
    foreach ($liste_notes as $item) {
        echo"<tbody><tr><td>".$item['id_etudiant']."</td><td>".$item['id_matiere']."</td><td>".$item['examen']."</td><td>".$item['control_contenu']."</td><td><a href='supprimerNote.php?dd=$item[0]'>Supprimer</a><a href='modifierNote.php'> Modifer</a></td></tr></tbody>";
    }
    echo"</tbody>";
?>
</table>
</body>
</html>
