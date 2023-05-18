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

        <style>
        body {
            font-family: "Times New Roman", Times, serif;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
        }

        h1 {
            text-align: center;
            font-weight: bold;
        }

        form {
            text-align: center;
            margin-top: 50px;
        }

        table {
            margin: 0 auto;
        }

        td {
            padding: 10px;
        }

        input[type="text"],
        select {
            width: 200px;
        }

        .btn {
            margin-top: 20px;
        }
        </style>
</head>

<body>
    <?php
    $liste = $conn->query("SELECT id_etudiant, nom_etudiant, prenom_etudiant, ecole, age FROM etudiant");
    $liste_etudiant = $liste->fetchAll();
    ?>
<body class="body">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="navbar-nav">
      <a class="nav-item nav-link active" href="listeEnseign.php">Liste des Enseignants <span class="sr-only">(current)</span></a>
      <a class="nav-item nav-link active" href="listeMat.php">Liste des Matieres</a>
      <a class="nav-item nav-link active" href="listeNotes.php">Liste des Notes</a>
      <a class="nav-item nav-link active" href="logout.php">Deconnexion</a>
    </div>
</nav>
    <div class="container">
        <h1 class="mt-4">Liste des étudiants</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>École</th>
                    <th>Âge</th>
                </tr>
            </thead>
            <tbody>
<?php
    foreach ($liste_etudiant as $item) {
        echo"<tbody><tr><td>".$item['id_etudiant']."</td><td>".$item['nom_etudiant']."</td><td>".$item['prenom_etudiant']."</td><td>".$item['ecole']."</td><td>".$item['age']."</td><td><a href='supprimerEtud.php?dd=$item[0]' style='color: red;'><svg width='25' height='25' viewBox='0 0 16 16' fill='currentColor' xmlns='http://www.w3.org/2000/svg'><path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z'/><path d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z'/></svg></a></td></tr></tbody>";
    }
                        ?>
            </tbody>
        </table>

                <a href="saisirEtud.php" class="btn btn-outline-primary">Ajouter ou Modifier <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
                    <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z"/>
                </svg></a>
            </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</body>

</html>

