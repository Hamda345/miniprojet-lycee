<?php
include('bdd.php');
$error = null;
if(isset($_POST['register'])) {
    if(isset($_POST['choix'])) {
        if ($_POST['choix'] == 'Enseignant') {
            if($_POST['mot_de_passe'] == $_POST['pwd_conf']) {
                $stmt = $conn -> prepare("SELECT * FROM enseignant WHERE email=:em");
                $stmt->bindParam(':em', $_POST['email']);
                $stmt->execute();
                $userExist = $stmt->fetchObject();
                if(!$userExist) {
                    $nom = $_POST['nom'];
                    $prenom = $_POST['prenom'];
                    $email = $_POST['email'];
                    $ecole = $_POST['ecole'];
                    $pwd = password_hash($_POST['mot_de_passe'], PASSWORD_DEFAULT);
                    $pwd_conf = $_POST['pwd_conf'];
                    $stmt = $conn->prepare('INSERT INTO enseignant(nom_enseignant, prenom_enseignant, email, mot_de_passe, ecole) VALUES(:nm, :prn, :em, :pass, :ecl)');
                    $stmt->bindParam(':nm', $nom);
                    $stmt->bindParam(':prn', $prenom);
                    $stmt->bindParam(':em', $email);
                    $stmt->bindParam(':pass', $pwd);
                    $stmt->bindParam(':ecl', $ecole);
                    $stmt->execute();
                    if ($stmt->rowCount() != 0) {
                        header("Location: listeNotes.php");
                    }
                }
            } else{
                $error = "le mot de passe ne correspond pas!";
            }
        }
        else if($_POST['choix'] == 'Etudiant') {
            if($_POST['mot_de_passe'] == $_POST['pwd_conf']) {
                $stmt = $conn -> prepare("SELECT * FROM etudiant WHERE email=:em");
                $stmt->bindParam(':em', $_POST['email']);
                $stmt->execute();
                $userExist = $stmt->fetchObject();
                if(!$userExist) {
                    $nom = $_POST['nom'];
                    $prenom = $_POST['prenom'];
                    $email = $_POST['email'];
                    $ecole = $_POST['ecole'];
                    $pwd = password_hash($_POST['mot_de_passe'], PASSWORD_DEFAULT);
                    $pwd_conf = $_POST['pwd_conf'];
                    $stmt = $conn->prepare('INSERT INTO etudiant(nom_etudiant, prenom_etudiant, email, mot_de_passe, ecole) VALUES(:nm, :prn, :em, :pass, :ecl)');
                    $stmt->bindParam(':nm', $nom);
                    $stmt->bindParam(':prn', $prenom);
                    $stmt->bindParam(':em', $email);
                    $stmt->bindParam(':pass', $pwd);
                    $stmt->bindParam(':ecl', $ecole);
                    $stmt->execute();
                    if ($stmt->rowCount() != 0) {
                        header("Location: listeNotes.php");
                    }
                }
            } else{
                $error = "le mot de passe ne correspond pas!";
            }
        }
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Connexion Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <style>
        body {
            font-family: "Times New Roman", Times, serif;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
        }

        input {
            margin-top: 15px;
            margin-left: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1 class="text-center font-weight-bold mt-4">Saisir vos coordonnées</h1>
        <form action="" method="POST">
            <div class="form-group row">
                <label for="nom" class="col-sm-2 col-form-label">Nom :</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nom" name="nom" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="prenom" class="col-sm-2 col-form-label">Prénom :</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="prenom" name="prenom" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label">E-mail:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="email" name="email" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="mot_de_passe" class="col-sm-2 col-form-label">Mot de Passe:</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="mot_de_passe" name="mot_de_passe" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="pwd_conf" class="col-sm-2 col-form-label">Confirmer le Mot de Passe:</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="pwd_conf" name="pwd_conf" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="ecole" class="col-sm-2 col-form-label">École:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="ecole" name="ecole" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="choix" class="col-sm-2 col-form-label">Vous êtes:</label>
                <div class="col-sm-10">
                    <select class="form-control" id="choix" name="choix" required>
                        <option value="Etudiant">Étudiant</option>
                        <option value="Enseignant">Enseignant</option>
                    </select>
                </div>
            </div>
            <div class="text-center">
                <input type="submit" value="Sauvegarder" name="register" class="btn btn-success">
                <a href="./index.php" class="btn btn-primary">Se connecter</a>
            </div>
        </form>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</body>

</html>

