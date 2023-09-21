<?php 
    include ("connexion.php");
    // la methode POST du formulaire nous cache les donnees saisies
    // la methide GET du formulaire ne cache pas les donnees saisies et les envoies dans l url
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - STANIA</title>
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
            <div class="col-md-6 col-sm-8">
                <div class="card">
                    <?php
                        if (isset($_GET["msg"])){
                            echo ' </br> <h5 class="card-title text-center"> Veuillez vous connecter pour acceder a votre compte </h5>';
                        }
                    ?>
                    <div class="card-body">
                        <h1 class="card-title text-center">Connexion</h1>
                        
                        <form method="POST" >
                            
                            <div class="mb-3">
                                <label for="username" class="form-label">Email</label>
                                <input type="email" id="username" name="email" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Mot de passe</label>
                                <input type="password" id="password" name="password" class="form-control" required>
                            </div>
                            <button type="submit" name="submit" class="btn w-100 text-white" style="background-color: #4d0f0f;">Se connecter</button>
                        </form>

                        <?php 
                            if ((!empty($_POST['email'])) && (!empty($_POST['password'])) ){

                                $user = $_POST["email"];
                                $pwd = md5($_POST["password"]);
                                
                                //la table des utilisateurs 
                                $users = $dba->prepare(" SELECT * FROM `pairs` ");
                                $users->execute();
                                $tableUsers = $users->fetchAll();
                                $point = 0;
                                //boucle sur les utilisateurs de la table Pairs
                                foreach ( $tableUsers as $ligne ){

                                    if ($ligne["Email"] == $user && $ligne["pwd"] == $pwd){

                                        $_SESSION["connecte"] = 1;
                                        $_SESSION["role"] = $ligne["role"];
                                        $_SESSION["nom"] = $ligne["Nom"];
                                        $_SESSION["prenom"] = $ligne["Prenom"];
                                        $_SESSION["email"] = $ligne["Email"];
                                        $_SESSION["username"] = $ligne["username"];

                                        if ($ligne["role"] == 0){
                                            header('Location: dashboard.php');

                                        }elseif ($ligne["role" == 1]){
                                            header('Location: dashboard_Admin.php');
                                        }

                                    }
                                }

                                if ( $point == 0){
                                    echo "utilisateur indisponible </br>";
                                }
                            }
    
                        ?>

                    </div>

                </div>

                    

                <div class="mt-3 text-center">
                    <p> Vous n'avez pas encore un compte ? Inscrivez-vous</p>
                    <a href="register.php" class="btn btn-primary">Inscription</a>
                    <p class="mt-2"><a href="reset_password.php">Mot de passe oublié ?</a></p> <!-- Bouton pour la réinitialisation de mot de passe -->
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
