<?php
include('bdd.php');//inclure le fichier de connexion à la bdd
$error = null;
if(isset($_POST['connect'])) { //si le bouton de nom 'connect' est appuyé
    if(isset($_POST['choix'])) {
        if ($_POST['choix'] == 'Enseignant') {
            $stmt = $conn->prepare("SELECT * FROM enseignant WHERE email=:em and nom_enseignant=:nm");// prepartaion de la requete sql et eviter l'injection sql
            $stmt->bindParam(':em', $_POST['email']);//relier les valeur par les variables
            $stmt->bindParam(':nm', $_POST['nom']);
            $stmt->execute();

            $userExist = $stmt->fetchObject();//affectation de resultat dans userExist
            if($userExist) {//si userExist non vide
                if(password_verify($_POST['mot_de_passe'], $userExist->mot_de_passe)) {//hashage de mot de passe et le comparé par le mot de passe dans la bdd
                    session_start();//execution de la session pour vérifier si l'utilisateur est connecté
                    $_SESSION['id_enseignant'] = $userExist->id_enseignant;
                    $_SESSION['nom_enseignant '] = $userExist->nom_enseignant;
                    header("Location: listeNotes_ens.php");//redirection vers listeNotes_ens.php
                } else {
                    $error = "Mot de passe incorrecte!";
                }
            } else{
                $error = "Compte n'existe pas";
            }
        }
        if ($_POST['choix'] == 'Etudiant') {

            $stmt = $conn->prepare("SELECT * FROM etudiant WHERE email=:em and nom_etudiant=:nm");
            $stmt->bindParam(':em', $_POST['email']);
            $stmt->bindParam(':nm', $_POST['nom']);
            $stmt->execute();

            $userExist = $stmt->fetchObject();
            if($userExist) {
                if(password_verify($_POST['mot_de_passe'], $userExist->mot_de_passe)) {
                    session_start();
                    $_SESSION['id_etudiant'] = $userExist->id_etudiant;
                    $_SESSION['nom_etudiant'] = $userExist->nom_etudiant;
                    header("Location: listeNotes_etud.php");
                } else {
                    $error = "Mot de passe incorrecte!";
                }
            } else{
                $error = "Compte n'existe pas";
            }
        }
    }
}

?>
<!DOCTYPE html>
<html>

<head>
    <title>Connexion </title>
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
        .error-message {
            color: red;
        }

    </style>
</head>

<body>
    <div class="container">
        <h1 class="text-center font-weight-bold">Saisir vos coordonnées</h1>
        <form action="" method="post" class="text-center">
            <div class="form-group row">
                <label for="nom" class="col-sm-2 col-form-label">Nom :</label>
                <div class="col-sm-10">
                    <input type="text" name="nom" id="nom" class="form-control" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label">E-mail:</label>
                <div class="col-sm-10">
                    <input type="text" name="email" id="email" class="form-control" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="mot_de_passe" class="col-sm-2 col-form-label">Mot de Passe:</label>
                <div class="col-sm-10">
                    <input type="password" name="mot_de_passe" id="mot_de_passe" class="form-control" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="choix" class="col-sm-2 col-form-label">Vous êtes:</label>
                <div class="col-sm-10">
                    <select name="choix" id="choix" class="form-control" required>
                        <option value="Etudiant">Etudiant</option>
                        <option value="Enseignant">Enseignant</option>
                    </select>
                </div>
            </div>
            <div class="text-center">
                <input type="submit" value="Se Connecter" name="connect" class="btn btn-outline-success">
            </div>
        </form>
            <div class="text-center mt-2">
                <a href="./Inscription.php">S'inscrire</a>
            </div>
            <?php if ($error) : ?>
            <h3 class="error-message"><?php echo $error; ?></h3>
            <?php endif; ?>
        </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</body>

</html>

