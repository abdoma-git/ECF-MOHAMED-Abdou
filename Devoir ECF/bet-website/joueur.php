<?php 
    include ("connexion.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Espace - STANIA</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/fb93ded780.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    
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
                            <h1 class="card-title text-center">Ajouter un Joueur</h1>
                            <form method="POST"> <!-- Assurez-vous de spécifier l'action et la méthode du formulaire -->
                                <div class="mb-3">
                                    <label for="nom" class="form-label">Nom</label>
                                    <input type="text" id="nom" name="nom" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label for="prenom" class="form-label">Prénom</label>
                                    <input type="text" id="prenom" name="prenom" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label for="numero" class="form-label">Numéro de Joueur</label>
                                    <input type="text" id="numero" name="numero" class="form-control" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Ajouter</button>
                            </form>
                            
                            <?php 
                                
                                if ((!empty($_POST['nom'])) && (!empty($_POST['prenom'])) && (!empty($_POST['numero']))){

                                    $nom = $_POST['nom'];
                                    $prenom = $_POST['prenom'];
                                    $numero = $_POST['numero'];

                                    $joueur = $dba->prepare(" INSERT INTO `joueur`(`nom`,`prenom`,`numero`) VALUES (?,?,?) ");
                                    $joueur->execute(array($nom,$prenom,$numero));

                                    echo "Le joueur est ajoute avec success";
                                
                                }

                                
                                

                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>


    <footer class="bg-light">
        <section class="container" style="display: flex; justify-content: center; align-items: center; height: 100%;">
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
