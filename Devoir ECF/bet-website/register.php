
<?php 
    include ("connexion.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription - STANIA</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/fb93ded780.js" crossorigin="anonymous"></script>
</head>
<body>

    <header>
        <?php 
            include ("menu.php");
        ?>
    </header>

    <main class="bg-light">
        <section class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h1 class="card-title text-center">Inscription</h1>
                            <form method="POST">
                                <div class="mb-3">
                                    <label for="username" class="form-label">Nom</label>
                                    <input type="text" id="nom" name="nom" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label for="username" class="form-label">Prénom</label>
                                    <input type="text" id="prenom" name="prenom" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Adresse e-mail</label>
                                    <input type="email" id="email" name="email" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Mot de passe</label>
                                    <input type="password" id="password" name="password" class="form-control" required>
                                </div>
                                
                                <button type="submit" class="btn w-100 text-white" style="background-color: #4d0f0f;">S'inscrire</button>
                            </form>

                            <?php 
                                if ((!empty($_POST['nom'])) && (!empty($_POST['prenom'])) && (!empty($_POST['email'])) && (!empty($_POST['password']))){
                                    
                                    $nom = $_POST["nom"];
                                    $prenom = $_POST["prenom"];

                                    $username = $_POST["nom"]. " " . $_POST["prenom"] ;

                                    $email = $_POST["email"];
                                    $pwd = md5($_POST["password"]);

                                    $_SESSION["nom"] = $nom;
                                    $_SESSION["prenom"] = $prenom;
                                    $_SESSION["username"] = $username;
                                    $_SESSION["email"] = $email;

                                    $utilisateur = $dba->prepare(" INSERT INTO `pairs`(`Nom`,`Prenom`,`username`,`Email`,`pwd`) VALUES (?,?,?,?,?) ");
                                    $utilisateur->execute(array($nom,$prenom,$username,$email,$pwd));

                                    echo " </br> Votre compte est cree avec success";

                                    header("location: login.php ");

                                }
                            ?>

                        </div>
                    </div>
                    <div class="mt-3 text-center">
                    <p>Vous avez déjà un compte ? Connectez-vous</p>
                    <a href="register.php" class="btn btn-primary">Connexion</a>
                </div>
                </div>
            </div>
        </section>
    </main>

    <footer class="bg-light">
        <section class="container" style="display: flex;
    justify-content: center;
    align-items: center;
    height: 100%;">
            <div class="footer-part">
                <div class="footer-logo">
                    <img src="images/Logo.png" alt="">
                </div>
                <div class="social-icons">
                    <i class="fab fa-instagram"></i>
                    <i class="fab fa-twitter"></i>
                    <i class="fab fa-youtube"></i>
                </div>
                <div class="copyright">
                    <p>Copyright &#169; 2023 STANIA</p>
                </div>
            </div>
        </section>
    </footer>
</body>
</html>
