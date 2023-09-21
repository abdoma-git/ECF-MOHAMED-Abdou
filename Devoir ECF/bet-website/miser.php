<?php 
    include ("connexion.php");
    $equipes = $dba->prepare(" SELECT * FROM `equipe`");
    $equipes->execute();
    $tableEquipes = $equipes->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Miser - STANIA</title>
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
                            <h1 class="card-title text-center">Miser</h1>
                            <form method="POST">
                                <!-- Sélection de l'équipe et la mise -->
                                <div class="mb-3">
                                    <label for="team" class="form-label">Choisissez une équipe</label>
                                    <select id="team" name="team" class="form-select" required>
                                        <option selected>Sélectionnez une équipe</option>
                                        <?php 
                                            foreach ( $tableEquipes as $ligne ){
                                                print('
                                                    <option value='.$ligne["id"].'>
                                                    '.$ligne["nom"].'
                                                    </option>
                                                ');
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="amount" class="form-label">Montant de la mise</label>
                                    <input type="number" id="amount" name="mise" class="form-control" required>
                                </div>
                                <!-- Bouton de validation ou d'actualisation -->
                                <button type="submit" class="btn w-100 text-white" style="background-color: #4d0f0f;">Valider</button>
                            </form>
                            <?php

                            if (isset($_POST["team"]) && isset($_POST["mise"])){
                                
                                $teamMise = $_POST["team"];
                                $montant = $_POST["mise"];
                                $team1 = $_GET["team1"];
                                $team2 = $_GET["team2"];
                                $status = $_GET["smatch"];
                                $match = $team1 . " VS " . $team1;

                                $histo = $dba->prepare("INSERT INTO `historique_mise`(`date`, `id_match`, `Montant_mise`, `Equipe_mise`, `resultat`) 
                                                        VALUES (?,?,?,?,?) ");
                                $histo->execute(array(date("Y-m-d"),$match,$montant,$teamMise,$status));

                                if($histo){
                                    echo "</br>  Votre mise est enregistree avec success ";
                                }
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
