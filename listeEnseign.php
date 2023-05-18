<?php
    include("bdd.php");
    session_start();
    if(!isset($_SESSION['nom'])) {
        header("Location:index.php");
    }
?>
<!DOCTYPE html>
<html>

<head>
    <title>Liste des Etudiants</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
</head>

<body>
        <?php
            $liste = $conn->query("SELECT  id_enseignant, nom_enseignant ,  prenom_enseignant, ecole FROM enseignant");
            $liste_enseignant = $liste->fetchAll();
        ?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="navbar-nav">
      <a class="nav-item nav-link active" href="listeEtud.php">Liste des Etudiants <span class="sr-only">(current)</span></a>
      <a class="nav-item nav-link" href="listeMat.php">Liste des Matieres</a>
      <a class="nav-item nav-link" href="listeNotes.php">Liste des Notes</a>
      <a class="nav-item nav-link" href="logout.php">Deconnexion</a>
    </div>
</nav>
        <div class="container"></div>
<h1 class="mt-4">Liste des Enseigants:</h1>
<table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>Ecole</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
<?php
    foreach ($liste_enseignant as $item) {
        echo"<tbody><tr><td>".$item['id_enseignant']."</td><td>".$item['nom_enseignant']."</td><td>".$item['prenom_enseignant']."</td><td>".$item['ecole']."</td><td><a href='supprimerEns.php?dd=$item[0]'>Supprimer</a></td></tr></tbody>";
    }
?>
            </tbody>
        </table>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</body>

</html>

