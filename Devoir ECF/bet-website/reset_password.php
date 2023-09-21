<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réinitialisation de Mot de Passe - STANIA</title>
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
                            <h1 class="card-title text-center">Réinitialisation de Mot de Passe</h1>
                            <form>
                                <div class="mb-3">
                                    <label for="username" class="form-label">Nom d'utilisateur</label>
                                    <input type="text" id="username" name="username" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Adresse e-mail</label>
                                    <input type="email" id="email" name="email" class="form-control" required>
                                </div>
                                <button type="submit" class="btn w-100 text-white" style="background-color: #4d0f0f;">Réinitialiser le Mot de Passe</button>
                            </form>
                        </div>
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
