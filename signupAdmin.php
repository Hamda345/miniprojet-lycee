<?php
include('bdd.php');
$error = null;
if(isset($_POST['register'])) {
    if($_POST['mot_de_passe'] == $_POST['pwd_conf']) {
        $stmt = $conn -> prepare("SELECT * FROM admin WHERE email=:em");
        $stmt->bindParam(':em', $_POST['email']);
        $stmt->execute();
        $userExist = $stmt->fetchObject();
        if(!$userExist) {
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $email = $_POST['email'];
            $pwd = password_hash($_POST['mot_de_passe'], PASSWORD_DEFAULT);
            $pwd_conf = $_POST['pwd_conf'];
            $stmt = $conn->prepare('INSERT INTO admin(nom, prenom, email, mot_de_passe) VALUES(:nm, :prn, :em, :pass)');
            $stmt->bindParam(':nm', $nom);
            $stmt->bindParam(':prn', $prenom);
            $stmt->bindParam(':em', $email);
            $stmt->bindParam(':pass', $pwd);
            $stmt->execute();
            if ($stmt->rowCount() != 0) {
                header("Location: listeEtud.php");
            }
        }
    } else{
        $error = "le mot de passe ne correspond pas!";
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Connexion Admin</title>
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
    <body>
        <h1 align="center" class="font-weight:bold;">Saisir vos coordonnés</h1>
        <form action="" method="POST" align="center">
            <table align="center">
                <tr><td><label>Nom :</label></td><td> <input type="text" name="nom"
                    required> </td></tr>
                <tr><td><label>Prenom :</label></td><td> <input type="text" name="prenom"
                    required> </td></tr>
                <tr><td><label>E-mail:</label></td><td> <input type="text" name="email"
                    required> </td></tr>
                <tr><td><label>Mot de Passe:</label></td><td> <input type="password" name="mot_de_passe"
                    required> </td></tr>
                <tr><td><label>Confirmer le Mot de Passe:</label></td><td> <input type="password" name="pwd_conf"
                    required> </td></tr>
            </table>
            <input type="submit" value="Sauvgarder" name="register" class="btn btn-success" align="center">
        </form>
    </body>
</html>
