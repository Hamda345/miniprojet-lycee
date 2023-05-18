<?php
include('bdd.php');
$error = null;
if(isset($_POST['connect'])) {
    $stmt = $conn->prepare("SELECT * FROM admin WHERE email=:em and nom=:nm ");
    $stmt->bindParam(':em', $_POST['email']);
    $stmt->bindParam(':nm', $_POST['nom']);
    $stmt->execute();

    $userExist = $stmt->fetchObject();
    if($userExist) {
        if(password_verify($_POST['mot_de_passe'], $userExist->mot_de_passe)) {
            session_start();
            $_SESSION['id'] = $userExist->id;
            $_SESSION['nom'] = $userExist->nom;
            header("Location: listeEtud.php");
        } else {
            $error = "Mot de passe incorrecte!";
        }
    } else{
        $error = "Compte n'existe pas";
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
        .error-message {
            color: red;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1 class="text-center font-weight-bold mt-4">Saisir vos coordonnées</h1>
        <form action="" method="POST">
            <div class="row justify-content-center">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="nom">Nom :</label>
                        <input type="text" class="form-control" id="nom" name="nom" required>
                    </div>
                    <div class="form-group">
                        <label for="email">E-mail:</label>
                        <input type="text" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="mot_de_passe">Mot de Passe:</label>
                        <input type="password" class="form-control" id="mot_de_passe" name="mot_de_passe" required>
                    </div>
                    <div class="text-center">
                        <input type="submit" value="Se Connecter" name="connect" class="btn btn-success">
                    </div>
                </div>
            </div>
        </form>
            <?php if ($error) : ?>
            <h3 class="error-message"><?php echo $error; ?></h3>
            <?php endif; ?>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</body>

</html>

