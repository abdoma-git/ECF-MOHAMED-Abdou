<?php 
    include ("connexion.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Affectation d'Équipes</title>
    <link rel="stylesheet" href="style.css"> <!-- Ajoutez votre feuille de style CSS ici -->
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
                            <h1 class="card-title text-center">Affectation d'Équipes</h1>
                            <?php 
                                //la table des joueurs 
                                $equipes = $dba->prepare(" SELECT * FROM `equipe` ");
                                $equipes->execute();
                                $tableEquipes = $equipes->fetchAll();
                                //boucle sur les joueurs de la table Pairs
                        
                            ?>
                            <form method="POST"> <!-- Assurez-vous de spécifier l'action et la méthode du formulaire -->
                                <div class="mb-3">
                                    <label for="equipe1" class="form-label">Équipe 1</label>
                                    <select id="equipe1" name="equipe1" class="form-select" required>
                                        <option value="equipe1">Nom de l'Équipe 1</option>
                                        <?php 
                                            foreach ( $tableEquipes as $ligne ){
                                                print('
                                                    <option value='.$ligne["id"].'>
                                                    '.$ligne["nom"].'
                                                    </option>
                                                ');
                                            }
                                        ?>
                                        <!-- Inclure ici la liste des équipes disponibles -->
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="equipe2" class="form-label">Équipe 2</label>
                                    <select id="equipe2" name="equipe2" class="form-select" required>
                                        <option value="equipe2">Nom de l'Équipe 2</option>
                                        <?php 
                                            foreach ( $tableEquipes as $ligne ){
                                                print('
                                                    <option value='.$ligne["id"].'>
                                                    '.$ligne["nom"].'
                                                    </option>
                                                ');
                                            }
                                        ?>
                                        <!-- Inclure ici la liste des équipes disponibles -->
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="date" class="form-label">Date du match</label>
                                    <input type="date" id="date" name="date" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label for="date" class="form-label">Heure debut du match</label>
                                    <input type="time" id="date" name="heuredebut" class="form-control" required>
                                </div>                               
                                <div class="mb-3">
                                    <label for="cote1" class="form-label">Meteo</label>
                                    <input type="text" step="0.01" id="meteo" name="meteo" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label for="cote1" class="form-label">Cote de l'Équipe 1</label>
                                    <input type="number" step="0.01" id="cote1" name="cote1" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label for="cote2" class="form-label">Cote de l'Équipe 2</label>
                                    <input type="number" step="0.01" id="cote2" name="cote2" class="form-control" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Planifier le Match</button>
                            </form>

                            <?php
                                if ((!empty($_POST['equipe1'])) && (!empty($_POST['equipe2']))){
                                    
                                    $equipe1 = $_POST['equipe1'];
                                    $equipe2 = $_POST['equipe2'];
                                    $date = $_POST['date'];
                                    $heuredebut = $_POST['heuredebut'];
                                    $meteo = $_POST['meteo'];
                                    $cote1 = $_POST['cote1'];
                                    $cote2 = $_POST['cote2'];
                                    $status = "En attente";

                                    $affectation = $dba->prepare("INSERT INTO `match`(`team1`, `team2`, `match_day`, `status`, `heure_debut`, `heure_fin`, `meteo`, `cote1`, `cote2`) VALUES (?,?,?,?,?,NULL,?,?,?)");
                                    $affectation->execute(array($equipe1,$equipe2,$date,$status,$heuredebut,$meteo,$cote1,$cote2));

                                    echo "</br> Match ajoute avec success ";

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
